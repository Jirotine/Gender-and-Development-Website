<?php
require_once('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $code = $_POST['Code'];

    // Check if email exists in the database
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['code'] == $code) {
            echo "Code Successful";
        } else {
            echo "Invalid Code";
        }
    } else {
        echo "Email not found in our records.";
    }
}

$conn->close();
?>