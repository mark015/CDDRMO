<!DOCTYPE html>
<head>
    <?php include('include/link.php');?>
</head>
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
$sql = "DELETE FROM user WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "
    <script>
        swal({
          title: 'Successfully Deleted!!',
          type: 'success',
          showConfirmButton: false,
          timer: 2000
        },
        function(){
          window.location.href = 'add_user.php';
      });
    </script>";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
    <?php include('include/linkjs.php');?>
</body>