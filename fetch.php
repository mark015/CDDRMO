<?php
require_once("include/conn.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['get_option']))
{
 $id = $_POST['get_option'];
$sql = "select * from inc_kind where inc_type_id='$id'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
                                
    while($row = mysqli_fetch_array($result)) {  
            echo "<option value='".$row['id']."'>".$row['disc']."</option>";
    }
}else{
    echo "<option>N/A</option>";

}
 exit;
}
?>