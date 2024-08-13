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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
            
            <div class="card">
                <div class="card-title">
                  
                </div>
                <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"></span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative">
                  <canvas id="brgy_incident-chart" height="500" width="1200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  
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
function view_record()
{
  $.ajax({
    url: 'viewInc.php',
    method: 'post',
    success: function(data)
    {
        data = $.parseJSON(data);
        if(data.status=='success')
        {
            $('#incidents').html(data.html);
            console.log('data');
        }
    }
  })
}


$(document).ready(function () {
    showGraph();
    showGraph1();
    view_record();
});


function showGraph(){
  {
    $.post("data_brgy.php?id=<?php echo $brgy_id;?>",
    function (data)
    {
        console.log(data);
        var name = [];
        var marks = [];
        var male = [];
        var female = [];

        for (var i in data) {
          name.push(data[i].inc_type);
          marks.push(data[i].count);
          male.push(data[i].male);
          female.push(data[i].female);
        }

        var chartdata = {
            labels: name,
            datasets: [
                {
                    label: 'Male',
                    backgroundColor: "lightblue",
                    borderColor: "blue",
                    // hoverBackgroundColor: '#CCCCCC',
                    // hoverBorderColor: '#666666',
                    data: male
                },
                {
                    label: 'Female',
                    backgroundColor: 'pink',
                    borderColor: 'red',
                    // hoverBackgroundColor: '#CCCCCC',
                    // hoverBorderColor: '#666666',
                    data: female
                }
            ]
        };

        var graphTarget = $("#brgy_incident-chart");

        var barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata
        });
    });
  }
}

function showGraph1(){
  {
      $.post("data_date.php",
      function (data)
      {
            var name = [];
          var marks = [];

          for (var i in data) {
              name.push(data[i].month);
              marks.push(data[i].count);
          }
          var chartdata = {
            labels: name,
            datasets: [
                {
                  label: 'Monthly Reports',
                  backgroundColor: '#17a2b8',
                  borderColor: '#46d5f1',
                  hoverBackgroundColor: '#CCCCCC',
                  hoverBorderColor: '#666666',
                  data: marks
                }
            ]
          };

          var graphTarget = $("#month");

          var barGraph = new Chart(graphTarget, {
              type: 'line',
              data: chartdata
          });
      });
  }
}
</script>

<?php include'include/linkjs.php';?>

</body>
</html>
