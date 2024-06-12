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
    $currentUsername = $_SESSION['username'];

    // New username from the form
    $newUsername = trim($_POST['newUsername']);
    // Old username from the form
    $oldUsername = trim($_POST['oldUsername']);

    // Check if all fields are filled
    if (empty($newUsername) || empty($oldUsername)) {
        http_response_code(400);
        echo "All fields are required.";
        exit;
    }

    // Check if the old username matches the current username
    if ($oldUsername !== $currentUsername) {
        http_response_code(400);
        echo "Invalid old username";
        exit;
    }

    // Check if the new username is already taken
    $sql_check_username = "SELECT * FROM users WHERE username = ?";
    $stmt_check_username = $conn->prepare($sql_check_username);
    $stmt_check_username->bind_param("s", $newUsername);
    $stmt_check_username->execute();
    $result_check_username = $stmt_check_username->get_result();

    if ($result_check_username->num_rows > 0 && $newUsername !== $currentUsername) {
        http_response_code(400);
        echo "Username already taken";
        exit;
    }

    // Prepare and execute the SQL statement to update the username
    $sql = "UPDATE users SET username = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newUsername, $currentUsername);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Update the username in the session
        $_SESSION['username'] = $newUsername;
        http_response_code(200);
    } else {
        http_response_code(400);
        echo "Usernames are the same";
    }

    $stmt->close();
    $conn->close();
}
?>
