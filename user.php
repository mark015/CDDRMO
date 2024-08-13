<?php 
    require_once 'include/conn.php';
    include'include/auth_user.php';
    
    
    $query1 = "SELECT * FROM `tbl_brgy` WHERE `id` = '$brgy_id'";
    $result_object1 = mysqli_query($conn, $query1);
    $brgy_data = mysqli_fetch_assoc($result_object1);
    
    $sql_inc = "SELECT * from incident_type";
    $result_inc = mysqli_query($conn, $sql_inc);
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
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <h1>Add Incidents</h1>
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
                    <div id="logins-part" class="content font" role="tabpanel" aria-labelledby="logins-part-trigger">
                       <h3>Patient Info:</h3>
                       <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="fname">First Name</label>
                          <input type="fname" class="form-control" name="fname" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="mname">Midle Name</label>
                          <input type="mname" class="form-control"  name="mname" placeholder="Midle Name" required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="lname">Last Name</label>
                          <input type="lname" class="form-control" name="lname" placeholder="Last Name" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="lname">Suffix</label>
                          <input type="lname" class="form-control" name="suffix" placeholder="Jr. / Sr.">
                        </div>
                      </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="gender">Gender</label>
                              <select id="gender" class="form-control" type="text" name="gender">
                                <option selected>Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                        <div class="form-group col-md-4">
                          <label for="age">Age</label>
                          <input type="age" class="form-control" id="age" placeholder="Age" name="age" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="Address">address</label>
                          <input type="address" class="form-control" id="address" placeholder="Address" name="address" required>
                        </div>
                      </div>
                      
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <br><h3 style="font-family: 'Courier New', Courier, monospace;">Incident's Info:</h3>
                    <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="type_in">Type Of Incidents</label>
                              <select id="type_in" onchange="fetch_select(this.value);"  class="form-control" type="type_in" name="type_inc">
                                <option selected>Choose...</option>
                                <?php  
                                while($row = mysqli_fetch_array($result_inc))  
                                    { 
                                        echo "<option value='".$row['id']."'>".$row['inc_type']."</option>";
                                    }?>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="type_in">Kind Of Incidents</label>
                              <select id="jt" class="form form-control" type="select" name="kind">
                                <option selected>Choose...</option>
                              </select>
                            </div>
                        <div class="form-group col-md-3">
                          <label for="c_inc">Cause of Incident</label>
                          <input type="c_inc" class="form-control" id="c_inc" name="c_inc" placeholder="Cause of Incident">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="address_inc">Address of Incident</label>
                          <input type="addres_inc" class="form-control" id="address_inc" name="add_inc" value="<?php echo $brgy_data['brgy'];?>">
                        </div>
                      </div> 
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="">Date of Incident</label>
                            <input type="date" class="form-control"  name="date_inc">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="gender">Time</label>
                            <input  type="time"  id="gender" class="form-control"name="time">
                          </div>   
                      </div>
                      <div class="form-group col-md-12">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" id="img" name="img[]" multiple="multiple" required>
                          </div>
                          <div class="input-group-append">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="form-group col-md-12">
                          <label for="reported_by">Reported By:</label>
                          <input type="text" class="form-control" id="address_inc" name="rep_by" >
                        </div>
                        <div class="form-group col-md-12">
                          <label for="address_inc">Incident Reported By:</label>
                          <input type="text" class="form-control" id="c_number" name="inc_rep_by">
                        </div>
                        </div>
                      <button type="submit"  class="btn btn-primary" name="submit">Submit</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch.php',
 data: {
  get_option:val
 },
 success: function (val) {
  document.getElementById("jt").innerHTML=val; 
  console.log(val);
 }
 });
}
</script>

<?php include'include/linkjs.php';?>

</body>
</html>
