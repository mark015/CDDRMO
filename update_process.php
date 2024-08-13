
<!DOCTYPE html>
<head></head>
<body>
<?php
include('include/link.php');
require_once('include/conn.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ( isset( $_POST['update_brgy'] ) ) {
    $brgy=$_POST['brgy'];
    $id =$_GET['id'];
    
    $sql = "UPDATE tbl_brgy SET brgy='$brgy' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      
        echo "
            <script>
                alert('Succesfully Updated!!');
                window.location.href='add_brgy.php';
            </script>";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}
if ( isset( $_POST['update_inc_type'] ) ) {
    $inc_type=$_POST['inc_type'];
    $id =$_GET['id'];
    
    $sql = "UPDATE incident_type SET inc_type='$inc_type' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
            swal({
              title: 'Successfully Updated !!',
              type: 'success',
              showConfirmButton: false,
              timer: 3000
            },
            function(){
              window.location.href = 'add_inc_type.php';
          });
        </script>";


    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}

if ( isset( $_POST['update_inc_kind'] ) ) {
    $inc_type=$_POST['type'];
    $disc=$_POST['disc'];
    $id =$_GET['id'];
    $ids =$_GET['ids'];
    
    $sql = "UPDATE inc_kind SET inc_type_id='$inc_type', disc='$disc' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      
        echo "
            <script>
            swal({
                title: 'Successfully Updated !!',
                type: 'success',
                showConfirmButton: false,
                timer: 3000
              },
              function(){
                window.location.href = 'add_inc_kind.php?id=$ids';
            });
            </script>";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}
if(isset( $_POST['update_user'])){
    $id = $_GET['id'];
    $uname = $_POST['uname'];
    $new_pass = $_POST['new_pass'];
    $old_pass = $_POST['old_pass'];
    $brgy = $_POST['brgy'];
    $hash_pass = hash('sha256', $old_pass);
    $hash_new_pass = hash('sha256', $new_pass);
    $sql = "SELECT * FROM user where id='$id'";
    $qry = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($qry);
    
    if($data['pass'] == $hash_pass){
         $sql = "UPDATE user SET uname='$uname', pass='$hash_new_pass' , brgy_id='$brgy' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      
        echo "
             <script>
            swal({
                title: 'Successfully Updated !!',
                type: 'success',
                showConfirmButton: false,
                timer: 3000
              },
              function(){
                window.location.href = 'user.php';
            });
            </script>";
    }else{
        echo "error";
    }
    
}else{
        echo "<script>
            swal({
                title: '!!',
                type: 'error',
                showConfirmButton: false,
                timer: 2000
              },
              function(){
                window.location.href = 'user.php';
            });
            </script>";
    }
}


if(isset( $_POST['update_admin'])){
    $id = $_GET['id'];
    $uname = $_POST['uname'];
    $new_pass = $_POST['new_pass'];
    $old_pass = $_POST['old_pass'];
    $sql = "SELECT * FROM user where id='$id'";
    $qry = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($qry);
    
    if($data['pass'] == $old_pass){
         $sql = "UPDATE user SET uname='$uname', pass='$new_pass' , brgy_id='$brgy' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      
        echo "
             <script>
            swal({
                title: 'Successfully Updated !!',
                type: 'success',
                showConfirmButton: false,
                timer: 3000
              },
              function(){
                window.location.href = 'home.php';
            });
            </script>";
    }else{
        echo "error";
    }
    
}else{
        echo "<script>
            swal({
                title: '!!',
                type: 'error',
                showConfirmButton: false,
                timer: 2000
              },
              function(){
                window.location.href = 'update_admin.php';
            });
            </script>";
    }
}



?>
</body>