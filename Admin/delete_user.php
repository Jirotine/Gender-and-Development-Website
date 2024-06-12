<?php
include('../Util/dbcon.php');

// Check if the studentID is provided
if(isset($_GET['studentID'])) {
    // Sanitize the studentID to prevent SQL injection
    $studentID = mysqli_real_escape_string($conn, $_GET['studentID']);

    // Delete the user from the database
    $sql = "DELETE FROM users WHERE studentID = '$studentID'";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the admin page after successful deletion
        header("Location: adminDashboard.php");
        exit();
    } else {
        // Handle errors
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Redirect back to the admin page if studentID is not provided
    header("Location: adminDashboard.php");
    exit();
}

// Close the database connection
$conn->close();
?>