<!DOCTYPE html>
<header>
  <?php include('include/link.php');?>
</header>
<body>
<?php
require_once'include/conn.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$ids = $_GET['ids'];
// sql to delete a record
$sql = "DELETE FROM inc_kind WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "
  <script>
      swal({
        title: 'Successfully Deleted !!',
        type: 'success',
        showConfirmButton: false,
        timer: 3000
      },
      function(){
        window.location.href='add_inc_kind.php?id=$ids';
    });
  </script>";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
</body>