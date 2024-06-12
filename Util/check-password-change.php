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

    // Get the current username from the session
    $studentID = $_SESSION['studentID'];

    // New password from the form
    $newPassword = trim($_POST['newPassword']);
    // Old password from the form
    $oldPassword = trim($_POST['oldPassword']);

    // Check if all fields are filled
    if (empty($newPassword) || empty($oldPassword)) {
        http_response_code(400);
        echo "All fields are required";
        exit;
    }

    // Check if old password and new password are the same
    if ($newPassword === $oldPassword) {
        http_response_code(400);
        echo "Passwords are the same";
        exit;
    }

    // Retrieve the hashed password from the database
    $stmt = $conn->prepare("SELECT verification_code FROM users WHERE studentID = ?");
    $stmt->bind_param("s", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentPassword = $row["verification_code"];
        if (password_verify($oldPassword, $currentPassword)) {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET verification_code = ? WHERE studentID = ?");
            $stmt->bind_param("ss", $hashedNewPassword, $studentID);
            if ($stmt->execute()) {
                http_response_code(200);
                echo "Password changed successfully";
            } else {
                http_response_code(500);
                echo "Error updating password: " . $conn->error;
            }
        } else {
            http_response_code(400);
            echo "Invalid old password";
        }
    } else {
        http_response_code(400);
        echo "User not found";
    }

    $stmt->close();
    $conn->close();
}
?>
