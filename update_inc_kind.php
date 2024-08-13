<?php 
    require_once 'include/conn.php';
    include'include/auth_admin.php';
    $ids = $_GET['id'];
    
    $query1 = "SELECT *, incident_type.id as di FROM `inc_kind` 
    inner join incident_type on inc_kind.inc_type_id = incident_type.id
     WHERE inc_kind.id = '$ids'";
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
                    <form method="post" action="update_process.php?id=<?php echo $ids . '&&ids='. $inc_kind_data['di'];?>" enctype="multipart/form-data">
                    
                    <div id="information-part" class="" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-row">
                         
                        
                        <div class="form-group col-md-6">
                          <label for="address_inc">Kind of Incident</label>
                          <input type="text" class="form-control" id="brgy" name="disc" value="<?php echo $inc_kind_data['disc'];?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="address_inc">Type of Incident</label>
                          <select class="form-control required" name="type" aria-label="Default select example" >
                            <option value="<?php echo $inc_kind_data['di'];?>"><?php echo $inc_kind_data['inc_type'];?></option>
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
                      
                      <button type="submit"  class="btn btn-success" name="update_inc_kind">Update</button>
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



<?php include'include/linkjs.php';?>

</body>
</html>
