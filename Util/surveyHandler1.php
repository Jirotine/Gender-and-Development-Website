<?php
session_start();

include('dbcon.php');

// Check if user is logged in
if (!isset($_SESSION['studentID'])) {
    echo "Error: User not logged in.";
    exit;
}

$studentID = $_SESSION['studentID'];

// Check if user has already submitted the survey
$query = "SELECT * FROM survey_answers WHERE studentID = '$studentID' AND survey_type_id = 1;";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo "You have already submitted a response";
    exit;
}

// Check if all fields are filled
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['question1']) && isset($_POST['question2']) &&
    isset($_POST['question3']) && isset($_POST['question4']) &&
    isset($_POST['question5'])) {

    // Retrieve the answers from the POST request
    $questions = [
        1 => $_POST['question1'],
        2 => $_POST['question2'],
        3 => $_POST['question3'],
        4 => $_POST['question4'],
        5 => $_POST['question5']
    ];
    $currentDate = date('Y-m-d H:i:s');

    // Get email of the logged-in user
    $email_query = "SELECT email FROM users WHERE studentID = '$studentID'";
    $email_result = mysqli_query($conn, $email_query);
    $row = mysqli_fetch_assoc($email_result);
    $email = $row['email'];

    // Insert survey data into the survey_answers table
    $success = true;
    foreach ($questions as $question_id => $answer) {
        $sql = "INSERT INTO survey_answers (survey_type_id, studentID, question_id, answers, Date, email) 
                VALUES (1, '$studentID', $question_id, '$answer', '$currentDate', '$email')";
        if (!mysqli_query($conn, $sql)) {
            $success = false;
            break;
        }
    }

    if ($success) {
        echo "Survey submitted successfully";
    } else {
        echo "Unable to submit the survey.";
    }
} else {
    echo "All fields are required.";
}

mysqli_close($conn);
?>
