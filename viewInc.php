<?php

require_once('include/conn.php');
$conn = new mysqli($servername, $username, $password, $dbname);

$value = "<div class='row'>";
$sql = "SELECT * from tbl_brgy";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
            
    while($row = $result->fetch_assoc()) {
        $brgy_id =$row['id'];
        $sql1 = "SELECT count(id) from incident where brgy_id=$brgy_id" ;
        $qry = mysqli_query($conn,$sql1);
        $data = mysqli_fetch_array($qry);
$value .= "
<div class=' col-2 col-md-3'>
<div class='small-box bg-info'>
<div class='inner'>
  <h3 class='font'>" . $data['count(id)']."</h3>

  <p class='font'>".$row['brgy']."</p>
</div>
<div class='icon'>
  <i class='ion ion-person-add'></i>
</div>
<a href='brgy_record.php?id=". $row['id']. "' class='small-box-footer font'>More info <i class='fas fa-arrow-circle-right'></i></a>
</div></div>
";
    }
}
$value .= "
</div>";


echo json_encode(['status'=>'success','html'=>$value]);

?>