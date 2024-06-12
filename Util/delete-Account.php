<?php
session_start();

include('dbcon.php');

if (isset($_SESSION['studentID'])) {

    $studentID = $_SESSION['studentID'];

    $query = $conn->prepare("DELETE FROM users WHERE studentID = ?");
    $query->bind_param("s", $studentID);

    if ($query->execute()) {
        session_unset();
        session_destroy();
        http_response_code(200);
        exit;
    } else {
        http_response_code(500);
        exit;
    }
} else {
    http_response_code(401);
    exit;
}
?>
