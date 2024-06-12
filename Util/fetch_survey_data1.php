<?php
include('dbcon.php');

// Fetch survey data from the database
$query = "SELECT 
            studentID,
            SUM(IF(answers = 'Yes', 1, 0)) AS total_yes_sum
          FROM survey_answers
          WHERE survey_type_id = 1
          GROUP BY studentID";

$result = mysqli_query($conn, $query);

// Prepare data in JSON format
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $studentID = $row['studentID'];
    $totalYesSum = $row['total_yes_sum'];
    
    // Determine label based on total yes count
    if ($totalYesSum >= 4) {
        $label = 'High';
    } else if ($totalYesSum == 3) {
        $label = 'Mid';
    } else {
        $label = 'Low';
    }
    
    // Store survey data along with label
    $data[] = array(
        'studentID' => $studentID,
        'total_yes_count' => $totalYesSum,
        'label' => $label
    );
}

// Output JSON data
echo json_encode($data);

mysqli_close($conn);
?>
