<?php
header('Content-Type: application/json');

require_once('include/conn.php');

 $conn = new mysqli($servername, $username, $password, $dbname);
 $id = $_POST['brgy_id'];
 $date = $_POST['date'];
 $type = $_POST['type'];
 $date_month = explode('-',$date);

 $select = $_POST['select'];

//  SELECT count(incident.inc_id) as count, incident_type.inc_type,SUM( gender='Male') as male, SUM( gender='Female') as female
//  from incident inner join incident_type on incident.inc_id = incident_type.id 
//  where brgy_id='1' AND month(date)=2
//  group by incident_type.inc_type

//aironcanabano026@gmail.com


 if($select == 'date') {

	$sqlQuery = "SELECT count(incident.inc_id) as count, incident_type.inc_type,
	SUM( gender='Male') as male,
	SUM( gender='Female') as female 
					from incident inner join incident_type on incident.inc_id = incident_type.id 
					where brgy_id='$id' AND month(date)=$date_month[1] and year(date)=$date_month[0]
					group by incident_type.inc_type;";

 } else if($select == 'type') {

	$sqlQuery = "SELECT 
					count(incident.inc_kind) as count, 
					inc_kind.disc,
					incident_type.inc_type,
					SUM( gender='Male') as male,
					SUM( gender='Female') as female
					
					from 
						incident 
							inner join 
						incident_type on incident.inc_id = incident_type.id 
							inner join 
						inc_kind on incident.inc_kind = inc_kind.id	
					
					where brgy_id='$id' 
						AND incident_type.id = $type 
					
					group by inc_kind.disc;";

} else {

	$sqlQuery = "
					SELECT count(incident.inc_kind) as count, inc_kind.disc, 
						incident.gender as gen,
						SUM( gender='Male') as male,
						SUM( gender='Female') as female
					from 
						incident 
							inner join 
						incident_type on incident.inc_id = incident_type.id 
							inner join 
						inc_kind on incident.inc_kind = inc_kind.id	
					
					where brgy_id='$id' 
						AND month(date)=$date_month[1] 
						AND incident_type.id = $type
						and year(date)=$date_month[0] 
					
					group by inc_kind.disc;";

}

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>