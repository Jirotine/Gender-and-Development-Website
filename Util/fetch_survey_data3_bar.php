<?php
include('dbcon.php');


$sql = "SELECT MIN(Date) as Date 
        FROM survey_answers 
        WHERE survey_type_id = 3
        GROUP BY studentID, YEAR(Date), MONTH(Date)";
$result = $conn->query($sql);

$data = array_fill(0, 12, 0); 

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $date = strtotime($row["Date"]);
        $month = date('n', $date) - 1;
        $data[$month]++;
    }
}

$conn->close();

echo json_encode($data);
?>
