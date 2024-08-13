<?php 
    require_once 'include/conn.php';
    include'include/auth_admin.php';
    
    
    $query1 = "SELECT * FROM `tbl_brgy` WHERE `id` = '$brgy_id'";
    $result_object1 = mysqli_query($conn, $query1);
    $brgy_data = mysqli_fetch_assoc($result_object1);
    
    $sql_inc = "SELECT * from tbl_brgy";
    $result_brgy1 = mysqli_query($conn, $sql_inc);
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
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
          
            
          <!-- ./col -->
         
          <!-- ./col -->
          
          <!-- ./col -->
         
          <!-- ./col -->
            
            <div class="card-body p-0">
                <div class="bs-stepper">
                  
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <form method="post" action="add_process.php" enctype="multipart/form-data">
                    
                    <div id="information-part" class="card" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-row">
                         
                        
                        <div class="form-group col-md-12">
                          <label for="address_inc">Add Barangay</label>
                          <input type="brgy" class="form-control" id="brgy" name="brgy">
                        </div>
                      </div> 
                      
                      <button type="submit"  class="btn btn-primary" name="add_brgy">Add</button>
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
                
                    <th>Barangay</th>
                    <th>Action</th>
                      
                  </thead>
                  <tbody>
                    
                        
                    <?php  
                    while($row = mysqli_fetch_array($result_brgy1))  
                        {  
                            
                           echo "<tr>
                                <td>".$row['brgy']."</td>
                                <td>
                                <a class='btn btn-outline-danger' href='delete_brgy.php?id=".$row['id']."'><i class='fa fa-trash'></i></a>
                                <a class='btn btn-outline-primary' href='view_brgy.php?id=".$row['id']."'><i class='fa fa-eye'></i></a>
                                </td>
                                </tr>
                                
                           ";  
                        }  
                    ?> 
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Barangay</th>
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
