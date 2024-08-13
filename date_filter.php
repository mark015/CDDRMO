<?php 
    require_once 'include/conn.php';
    include'include/auth_admin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  

  <?php include'include/link.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->


  <!-- Navbar -->
    <?php include'include/navbar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include'include/sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
            
          <!-- ./col -->
         
          <!-- ./col -->
          
          <!-- ./col -->
         
          <!-- ./col -->
            
            <div class="card-body p-0">
                <div class="bs-stepper">
                  
                  </div>
                  <div class="bs-stepper-content card">
                    <!-- your steps content here -->
                    <form method="get" action="" enctype="multipart/form-data">
                    <h1>Date Filter</h1>
                    <div id="information-part" class="" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                          <input type="date" class="form-control" id="date_from" name="date_from" value="<? if(isset($_GET['date_from'])){ echo $_GET['date_from']; }?>">
                        </div>
                        <div class="form-group col-md-5">
                          <input type="date" class="form-control" id="date_to" name="date_to" value="<? if(isset($_GET['date_to'])){ echo $_GET['date_to']; }?>">
                        </div>
                        <div class="col-md-2">
                      <button type="submit"  class="btn btn-primary" name="filter">Filter</button>
                      </div>
                      </div> 
                      
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              
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
                      
                  </thead>
                  <tbody>
                    
                        
                    <?php  
                        if(isset($_GET['filter'])){
                            $date_from = $_GET['date_from'];
                            $date_to = $_GET['date_to'];
                            $sql_filter = "SELECT incident.*, incident_type.inc_type, tbl_brgy.brgy from incident inner join incident_type on incident.inc_id = incident_type.id inner join tbl_brgy on incident.brgy_id=tbl_brgy.id WHERE date between '$date_from' and '$date_to' order by date";
                            $result_filter = mysqli_query($conn, $sql_filter);
                            while($row = mysqli_fetch_array($result_filter))  
                        {  
                            
                            echo "<tr>
                           <td>".$row['fname']." ". $row['mname']. " ". $row['lname']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['age']."</td>
                                <td>".$row['address']."</td>
                                <td>".$row['inc_type']."</td>
                                <td>".$row['cause_inc']."</td>
                                <td>".$row['brgy']."</td>
                                <td>".date('F j, Y', strtotime($row['date']))."</td>
                                <td><a href='view_brgy_inc.php?id=".$row['id'] ."' class='btn btn-primary' ><i class='fa fa-eye' ></i></a></td>
                              </tr>  
                           "; 
                        }  
                            
                            
                            
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
  </div>
  <!-- /.content-wrapper -->
<?php include'include/footer.php';?>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<?php include'include/linkjs.php';?>

</body>
</html>
