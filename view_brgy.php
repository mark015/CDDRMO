<?php 
    require_once 'include/conn.php';
    include('include/auth_admin.php');
    $id = $_GET['id'];
    
    $query1 = "SELECT * FROM `tbl_brgy` WHERE `id` = '$id'";
    $result_object1 = mysqli_query($conn, $query1);
    $brgy_data1 = mysqli_fetch_assoc($result_object1);
    
    $sql_inc = "SELECT * from user where brgy_id=$id";
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
                  <div class="bs-stepper-content card">
                    <!-- your steps content here -->
                    <form method="post" action="update_process.php?id=<? echo $brgy_data1['id'];?>" enctype="multipart/form-data">
                    
                    <div id="information-part" class="" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-row">
                         
                        
                        <div class="form-group col-md-12">
                          <label for="address_inc">Barangay</label>
                          <input type="brgy" class="form-control" id="brgy" name="brgy" value="<? echo $brgy_data1['brgy'];?>">
                        </div>
                      </div> 
                      
                      <button type="submit"  class="btn btn-success" name="update_brgy">Update</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              
              <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#add_brgy"><i class="fa fa-plus"></i></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Password</th>
                    <th>Action</th>
                      
                  </thead>
                  <tbody>
                    
                        
                    <?php  
                    while($row = mysqli_fetch_array($result_brgy1))  
                        {  
                            
                           echo "<tr>
                                <td>".$row['uname']."</td>
                                <td>".$row['pos']."</td>
                                <td>".$row['pass']."</td>
                                <td>
                                <a class='btn btn-outline-danger' href='delete_user.php?id=".$row['id']."&&brgy_id=".$brgy_data1['id']."'><i class='fa fa-trash'></i></a>
                                <a class='btn btn-outline-primary' href='view_brgy.php?id=".$row['id']."&&brgy_id".$id."'><i class='fa fa-eye'></i></a>
                                </td>
                                </tr>
                                
                           ";  
                        }  
                    ?> 
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Barangay</th>
                    <th>Role</th>
                    <th>Password</th>
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
  
  <!-- Modal -->
<div class="modal fade" id="add_brgy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><? echo $brgy_data1['brgy'];?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                    <form method="post" action="add_process.php?id=<? echo $brgy_data1['id'];?>" enctype="multipart/form-data">
      <div class="modal-body">
         <div class="bs-stepper-content card">
                    <!-- your steps content here -->
                    
                    <div id="information-part" class="" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-row">
                         
                        
                        <div class="form-group col-md-12">
                          <label for="uname">User Name</label>
                          <input type="name" class="form-control" id="uname" name="uname" required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="pass">Password</label>
                          <input type="password" class="form-control" id="pass" name="pass"required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="role">Role</label>
                          <input type="name" class="form-control" id="role" name="role" required>
                        </div>
                        
                      </div> 
                    </div>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" name="add_user">Add</button>
      </div>
    </div>
    </form>
  </div>
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
