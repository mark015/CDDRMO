<?php 
    require_once 'include/conn.php';
    include'include/auth_admin.php';
    $id = $_GET['id'];

    $query1 = "
SELECT *, user.id as uid from user inner join tbl_brgy on user.brgy_id = tbl_brgy.id where user.id='$id'";
    $result_object1 = mysqli_query($conn, $query1);
    $user_data1 = mysqli_fetch_assoc($result_object1);
    
    
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
            <h1 class="m-0">Update User Data</h1>
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
              <div class="bs-stepper-content">
                <!-- your steps content here -->
                <form method="post" action="update_process.php?id=<?php echo $user_data1['uid'];?>" enctype="multipart/form-data">
                
                <div id="information-part" class="card" role="tabpanel" aria-labelledby="information-part-trigger">
                <div class="form-row">
                     
                    
                    <div class="form-group col-md-12">
                      <label for="address_inc">User Name</label>
                      <input type="brgy" class="form-control" id="brgy" name="uname" value="<?php echo $user_data1['uname'];?>" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="address_inc">Old Password</label>
                      <input type="password" class="form-control" minlength="6" id="brgy" name="old_pass" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="address_inc">New Password</label>
                      <input type="password" class="form-control" minlength="6" id="brgy" name="new_pass" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address_inc">Barangay</label>
                        <select name="brgy" class="form-control" required>
                            <option value="<?php echo $user_data1['id'];?>" ><?php echo $user_data1['brgy'];?></option>
                            <?php  
                            while($row = mysqli_fetch_array($result_brgy1))
                                {
                                   echo "<option value='".$row['id']."'>".$row['brgy']."</option>"; 
                                }
                            ?>
                        </select>
                    </div>
                  </div> 
                  
                  <button type="submit"  class="btn btn-primary" name="update_user">Add</button>
                </div>
                </form>
              </div>
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
    window.location.href='delete_user.php?id='+id;      // submitting the form when user press yes
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
