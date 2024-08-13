<?php 
require_once'include/conn.php';
include'include/auth_admin.php';
$id= $_SESSION['id'];
 $conn = new mysqli($servername, $username, $password, $dbname);
    $id = $_SESSION['id'];
    
    $query_date = "SELECT count(id) as month,MONTH(date) FROM `incident` group by MONTH(date) order by MONTH(date)";
    $result_object_date = mysqli_query($conn, $query_date);
    $data_date = mysqli_fetch_assoc($result_object_date);
    
    // $sql ="SELECT count(incident.inc_id) as count, incident_type.inc_type from incident inner join incident_type on incident.inc_id = incident_type.id group by incident_type.inc_type";
    //      $result = mysqli_query($conn,$sql);
    //      $chart_data="";
    //      while ($row = mysqli_fetch_array($result)) { 
 
    //         $name[]  = $row['inc_type']  ;
    //         $count[] = $row['count'];
    //     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include'include/link.php';?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script type="text/javascript">
        
    //     function OpenBootstrapPopup() {
    //      $("#simpleModal").modal('show');
    // }
    </script>
<style>
  .font{
    font-family: 'Courier New', Courier, monospace;
    font-weight: bold;
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
<?php include'include/navbar.php';?>
  <!-- Main Sidebar Container -->
<?php include'include/sidebar.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        
      <div class="container-fluid"  >
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
        <div class="card col-lg-12">
          <div card=" card-title"><h3 class="font">Barangay Incidents</h3></div>
            <div id="incidents"></div>
        </div>
          <!-- <div class="col-md-8">.col-md-8</div>
          <div class="col-6 col-md-4">.col-6 .col-md-4</div> -->

            
            <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title font">Monthly Incident Reports</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span><b></b></span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4" >
                  <canvas id="month" height="200"></canvas>
                </div>

                
              </div>
            </div>
                <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title font">Incidents Reports</h3>
                </div>
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

                <div class="position-relative mb-4" id="xx">
                  <canvas id="incident-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  
                </div>
              </div>
            </div>
                
            </div>
            
            
            
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    
    <div id="simpleModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer Details Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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

<?php include'include/linkjs.php';?>


<script>
function view_record()
{
    $.ajax(
        {
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


        function showGraph()
        {
            
                $.post("data.php",
                function (data)
                {
                     var name = [];
                    var marks = [];
                     
                    for (var i in data) {
                        name.push(data[i].inc_type);
                        marks.push(data[i].count);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Incident Records',
                                backgroundColor: '#17a2b8',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };
                        
                    var graphTarget = $("#incident-chart");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            
        }

function showGraph1()
        {
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

</body>
</html>


