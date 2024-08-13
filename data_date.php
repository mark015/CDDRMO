<?php
header('Content-Type: application/json');

require_once('include/conn.php');

 $conn = new mysqli($servername, $username, $password, $dbname);
$sqlQuery = "SELECT count(id) as count,MONTHNAME(date) as month FROM `incident` group by MONTH(date) order by MONTH(date)";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>