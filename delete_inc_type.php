<!DOCTYPE html>
<html>
    <head>
  </head>
  <?php
  include('include/link.php');
  ?>
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
// sql to delete a record
$sql = "DELETE FROM incident_type WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "
    <script>
        swal({
          title: 'Successfully Add !!',
          type: 'success',
          showConfirmButton: false,
          timer: 3000
        },
        function(){
          window.location.href = 'add_inc_type.php';
      });
    </script>";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
</body>