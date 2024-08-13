<?php
header('Content-Type: application/json');

require_once('include/conn.php');

 $conn = new mysqli($servername, $username, $password, $dbname);
 $id = $_GET['id'];
$sqlQuery = "SELECT count(incident.inc_id) as count, incident_type.inc_type,
SUM( gender='Male') as male,
SUM( gender='Female') as female 
from incident inner join incident_type on incident.inc_id = incident_type.id 
 where brgy_id='$id' 
group by incident_type.inc_type;";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>