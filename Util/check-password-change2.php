<?php
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if all fields are required
    if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
        echo "All fields are required.";
    } else {
        // Check if email exists in the database
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Check if new password and confirm password are the same
            if ($newPassword === $confirmPassword) {
                // Update password in the database
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET verification_code=? WHERE email=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $hashedPassword, $email);
                $stmt->execute();

                // Output success message
                echo "Change password successful!";

                // Redirect to login.php after 3 seconds
                header("refresh:2;url=login.php");
                exit();
            } else {
                // Output error message for mismatched passwords
                echo "Passwords do not match";
            }
        } else {
            // Output error message for email not found
            echo "Email not found in our records.";
        }
    }
}

$conn->close();
?>