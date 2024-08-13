<?php 
require_once 'include/conn.php';
include'include/auth_admin.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user where id='$id'";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$inc_type_id = $_GET['id'];



$sql_brgy = "SELECT incident.*, incident_type.inc_type, tbl_brgy.brgy from incident inner join incident_type on incident.inc_id = incident_type.id inner join tbl_brgy on incident.brgy_id=tbl_brgy.id WHERE inc_id=$inc_type_id";
$result_brgy1 = mysqli_query($conn, $sql_brgy);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'include/link.php';?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php include'include/navbar.php'?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include'include/sidebar.php'?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barangay List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                
                    <th>Name</th>
                      <th>gender</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Type of Incident</th>
                    <th>Cause of Incident</th>  
                    <th>Address of Incident</th>
                    <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                        
                    <?php  
                    while($row = mysqli_fetch_array($result_brgy1))  
                        {  
                            
                           echo "<tr>
                           <td>".$row['fname']." ". $row['mname']. " ". $row['lname']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['age']."</td>
                                <td>".$row['address']."</td>
                                <td>".$row['inc_type']."</td>
                                <td>".$row['cause_inc']."</td>
                                <td>".$row['brgy']."</td>
                                <td>".$row['date']. " " . $row['time']."</td>
                                <td><a href='view_brgy_inc.php?id=".$row['id'] ."' class='btn btn-primary' ><i class='fa fa-eye' ></i></a></td>
                              </tr>  
                           ";  
                        }  
                    ?> 
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                      <th>gender</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Type of Incident</th>
                    <th>Cause of Incident</th>  
                    <th>Address of Incident</th>
                    <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    
            </div>
            
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
    <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>
    
  </div>
  <!-- /.content-wrapper -->
  
<?php include'include/footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include'include/linkjs.php';?>
</script>
</body>
</html>
