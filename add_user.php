<?php 
    require_once 'include/conn.php';
    include'include/auth_admin.php';
    

    $sql_user = "SELECT *, user.id as did from user inner join tbl_brgy on user.brgy_id=tbl_brgy.id ";
    $result_user = mysqli_query($conn, $sql_user);  
    
    
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
                          <label for="address_inc">User Name</label>
                          <input type="text" class="form-control" id="brgy" name="uname" required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="address_inc">Password</label>
                          <input type="password" class="form-control" minlength="6" id="brgy" name="pass" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address_inc">Barangay</label>
                            <select name="brgy" class="form-control" required>
                                <option value="" >Select Barangay</option>
                                <?php  
                                while($row = mysqli_fetch_array($result_brgy1))  
                                    {
                                       echo "<option value='".$row['id']."'>".$row['brgy']."</option>"; 
                                    }
                                ?>
                            </select>
                        </div>
                      </div> 
                      
                      <button type="submit"  class="btn btn-primary" name="add_user">Add</button>
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
                
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Barangay</th>
                    <th>Action</th>
                      
                  </thead>
                  <tbody>
                    
                        
                    <?php  
                    while($row = mysqli_fetch_array($result_user))  
                        {  
                            
                           echo "<tr>
                                <td>".$row['uname']."</td>
                                <td>".$row['pass']."</td>
                                <td>".$row['pos']."</td>
                                <td>".$row['brgy']."</td>
                                <td>
                                <button class='btn btn-outline-danger' Onclick='return ConfirmDelete(".$row['did'].");'' type='submit' name='actiondelete' value=''><i class='fa fa-trash'></i></button>
                                <a class='btn btn-outline-success' href='update_user.php?id=".$row['did']."'><i class='fa fa-pen'></i></a>
                                </td>
                                </tr>
                                
                           ";  
                        }  
                    ?> 
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Role</th>
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

<script>
function ConfirmDelete(id) {
  event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "You want to delete?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, Delete it!",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false,
      timer: 3000
},
function(isConfirm){
  if (isConfirm) {
    window.location.href='delete_user.php?id='+id;
  } else {
    swal(
      "Cancelled",
     "Your file is safe :)", 
     "error",{
      "closeOnConfirm": false,
     });
  }
});
}
</script>

<?php include'include/linkjs.php';?>

</body>
</html>
