<?php 
    require_once 'include/conn.php';
    include'include/auth_admin.php';

    $ids=$_GET['id'];
    
    $sql_inc = "SELECT * from incident_type 
    inner join inc_kind on incident_type.id=inc_kind.inc_type_id where incident_type.id=$ids
    order by inc_type_id";
    $result_incident_type = mysqli_query($conn, $sql_inc);  
    
    $query1 = "SELECT * from incident_type where id='$ids'";
    $result_object1 = mysqli_query($conn, $query1);
    $inc_kind_data = mysqli_fetch_assoc($result_object1);
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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                    <form method="post" action="add_process.php" enctype="multipart/form-data">
                    
                    <div id="information-part" class="" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-row">
                         
                        
                        <div class="form-group col-md-6">
                          <label for="kind_inc">Kind of Incident</label>
                          <input type="text" class="form-control" id="inc_type" name="kind">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inc_type">Incident Type</label>
                          <select class="form-control required" name="type" aria-label="Default select example" >
                            <option value="<?php echo $inc_kind_data['id'];?>"><?php echo $inc_kind_data['inc_type'];?></option>
                             <?php
                              $sql_kind = "SELECT * from incident_type";
                              $result_incident_kind = mysqli_query($conn, $sql_kind);
                              while($row = mysqli_fetch_array($result_incident_kind))  
                                  {  
                                      
                                    echo "
                                    <option value=".$row['id'].">".$row['inc_type'] ."</option>
                                    ";  
                                  }  
                              ?> 
                          </select>
                        </div>
                      </div> 
                      
                      <button type="submit"  class="btn btn-primary" name="add_inc_kind">Add</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              
              <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $inc_kind_data['inc_type'];?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kind of Incident</th>
                    <th>Incident</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    
                        
                    <?php  
                    while($row = mysqli_fetch_array($result_incident_type))  
                        {  
                            
                           echo "<tr>
                                    <td>".$row['disc']."</td>
                                    <td>".$row['inc_type']."</td>
                                    <td>
                                    <button class='btn btn-outline-danger' Onclick='return ConfirmDelete(".$row['id'].",".$ids.");'' type='submit' name='actiondelete' value='$id'><i class='fa fa-trash'></i></button>
                                    <a class='btn btn-outline-success' href='update_inc_kind.php?id=".$row['id']."'><i class='fa fa-pen'></i></a>
                                    </td>
                                </tr>
                           ";  
                        }  
                    ?> 
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kind of Incident</th>
                    <th>Incident</th>
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
function ConfirmDelete(id,ids) {
  event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "You want to delete?"+ids,
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
    window.location.href='delete_inc_kind.php?id='+id +'&&ids='+ids;      // submitting the form when user press yes
  } else {
    swal(
      "Cancelled",
     "Your file is safe :)", 
     "error",{
      buttons: false,
     });
  }
});
}
</script>

<?php include'include/linkjs.php';?>

</body>
</html>
