<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gad";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        http_response_code(500);
        die("Connection failed: " . $conn->connect_error);
    }

    $studentID = trim($_POST['studentID']);
    $verification_code = $_POST['verification_code'];

    if (empty($studentID) || empty($verification_code)) {
        http_response_code(400);
        echo "All fields are required";
        exit;
    }

    // Check in the users table
    $sql = "SELECT * FROM users WHERE studentID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();

if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($verification_code, $row["verification_code"])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['studentID'] = $studentID;
            http_response_code(200);
            echo json_encode(["message" => "Login successful!", "redirect" => "../index.php"]);
            exit;
        } else {
            http_response_code(400);
            echo "Invalid Password";
            exit;
        }
    }

    // Check in the admin table
    $sql_admin = "SELECT * FROM admin WHERE username = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("s", $studentID);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows == 1) {
        $row_admin = $result_admin->fetch_assoc();
        if ($verification_code === $row_admin["password"]) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $studentID;
            http_response_code(200);
            echo json_encode(["message" => "Admin login successful!", "redirect" => "../Admin/adminDashboard.php"]);
            exit;
        } else {
            http_response_code(400);
            echo "Invalid password";
            exit;
        }
    }

    // No user found
    http_response_code(400);
    echo "Invalid student ID";

    $stmt_admin->close();
    $stmt->close();
    $conn->close();
}
?>