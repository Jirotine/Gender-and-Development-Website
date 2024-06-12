<?php
include('dbcon.php');

// Query to get unique student responses per month
$sql = "SELECT MIN(Date) as Date 
        FROM survey_answers 
        WHERE survey_type_id = 2
        GROUP BY studentID, YEAR(Date), MONTH(Date)";
$result = $conn->query($sql);

$data = array_fill(0, 12, 0); // Initialize counts array with zeros

if ($result->num_rows > 0) {
    // Process each row
    while($row = $result->fetch_assoc()) {
        $date = strtotime($row["Date"]);
        $month = date('n', $date) - 1; // Month is zero-based
        $data[$month]++;
    }
}

$conn->close();

// Return data as JSON
echo json_encode($data);
?>
