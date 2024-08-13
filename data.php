<?php
header('Content-Type: application/json');

require_once('include/conn.php');

 $conn = new mysqli($servername, $username, $password, $dbname);
$sqlQuery = "SELECT count(incident.inc_id) as count, incident_type.inc_type from incident inner join incident_type on incident.inc_id = incident_type.id group by incident_type.inc_type;";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>