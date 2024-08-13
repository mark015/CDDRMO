<?php 
    session_start();
    require_once 'include/conn.php';
    include'include/auth_user.php';
    $id=$_GET['id'];

    $query1 = "SELECT * FROM `incident` WHERE `id` = '$id'";
    $result_object1 = mysqli_query($conn, $query1);
    $data = mysqli_fetch_assoc($result_object1);
    $brgy_id= $data['brgy_id'];
    $query = "SELECT * FROM `tbl_brgy` WHERE `id` = '$brgy_id'";
    $result_object = mysqli_query($conn, $query);
    $brgy_data = mysqli_fetch_assoc($result_object);
    
    $query2 = "SELECT * FROM `incident_type` WHERE `id` = '".$data['inc_id']."'";
    $result_object2 = mysqli_query($conn, $query2);
    $data2 = mysqli_fetch_assoc($result_object2);
    
    $img = explode("/",$data['img']);
    $count_img=count($img);
    
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
    <?php include'include/navbar_user.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include'include/sidebar_user.php';?>

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
        <h1>Incident Record</h1>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
              <?php 
        // for($i=0; $i<$count_img-1;$i++){
      ?>     
                   
 
 
    <?php 
    // }
    ?>
          <!-- ./col -->
         <div class="card col d-flex justify-content-center">
    <div class="card-body" style="text-align:ceter;">
      <h4 class="card-title"><?php ?></h4>
      
      <?php 
        for($i=0; $i<$count_img-1;$i++){
      ?>
 
        <img src="dist/img/<?php echo $img[$i];?>" alt="img" style="width:100%">


        
      <?php }?>
    </div>
  </div>
<div class="card col d-flex justify-content-center">
    <div class="card-body" style="text-align:ceter;">
      
     <h2 class="">Name:<b> <?php echo " " .$data['fname'] . " " . $data['mname'] ." ". $data['lname'];?></b></h2>
     <h2 class="">Gender:<b> <?php echo " " .$data['gender'];?></b></h2>
     <h2 class="">Age: <b><?php echo " " .$data['age'];?></b></h2>
     <h2 class="">Address:<b> <?php echo " " .$data['address'];?></b></h2>
     <h2 class="">Address of Incident:<b> <?php echo " " .$brgy_data['brgy'];?></b></h2>
     <h2 class="">Type of Incident:<b> <?php echo " " .$data2['inc_type'];?></b></h2>
     <h2 class="">Cause of Incident: <b><?php echo " " .$data['cause_inc'];?></b></h2>
     <h2 class="">Date: <b><?php echo " " .$data['date'];?></b></h2>
     
     

  </div>
    </div>
  </div>
          <!-- ./col -->
          
          <!-- ./col -->
         
          <!-- ./col -->
            
            <div class="card-body p-0">
                <div class="bs-stepper">
                  
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    
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
