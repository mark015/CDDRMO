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
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td>Juan Delacruz</td>
                    <td>Male</td>
                    <td>35</td>
                    <td>brgy. 1</td>
                    <td>Vicular Accident</td>
                        <td>ambot</td>
                        <td>brgy. 2</td>
                        <td></td>
                  </tr>
                 
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
