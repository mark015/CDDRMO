<?php 
require_once 'include/conn.php';
include'include/auth_admin.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user where id='$id'";
$result = $conn->query($sql);
$data =  $result->fetch_assoc();
$brgy_id = $_GET['id'];



  $sql_brgy = "SELECT *,incident.id as dii, incident_type.inc_type, tbl_brgy.brgy from incident 
  inner join incident_type on incident.inc_id = incident_type.id
  inner join tbl_brgy on incident.brgy_id=tbl_brgy.id 
  inner join inc_kind on incident.inc_kind=inc_kind.id WHERE brgy_id=$brgy_id";
$result_brgy1 = mysqli_query($conn, $sql_brgy);


  $sql_it = "SELECT * FROM incident_type";
  $result_it = mysqli_query($conn, $sql_it);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'include/link.php';?>
    <style>
      @media print{
        .header{
          top: 0;
          position: fixed;
        }
      }
    </style>
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
                    
                    <th>Type of Incident</th>
                    <th>Cause of Incident</th>  
                    <th>Kind of Incident</th> 
                    <th>Address of Incident</th>
                    <th>Date</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                        
                    <?php  
                    while($row = mysqli_fetch_array($result_brgy1))  
                        {  
                            
                           echo "<tr>
                           <td>".$row['fname']." ". $row['mname']. " ". $row['lname']."</td>
                               
                                <td>".$row['inc_type']."</td>
                                <td>".$row['cause_inc']."</td>
                                <td>".$row['disc']."</td>
                                <td>".$row['brgy']."</td>
                                <td>".$row['date']. " " . $row['time']."</td>
                                <td>
                                  <a href='view_brgy_inc.php?id=".$row['dii'] ."' class='btn btn-outline-primary' ><i class='fa fa-eye' ></i></a>
                                  <button class='btn btn-outline-danger' Onclick='return ConfirmDelete(".$row['dii'].");'' type='submit' name='actiondelete' value=''><i class='fa fa-trash'></i></button>
                                </td>
                                
                              </tr>  
                           ";  
                        }  
                    ?> 
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Type of Incident</th>
                    <th>Cause of Incident</th>
                    <th>Kind of Incident</th>  
                    <th>Address of Incident</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-3">
                      <input type="month" onchange="show_bar()" id="filter_date" class="form form-control" >
                    </div>
                    <div class="col-md-3">
                      <select onchange="show_bar()" id="filter_type" class="form form-control" >
                      <option value="">Select Incident Type</option>
                        <?php
                          while($row = mysqli_fetch_array($result_it)) {
                            echo '<option value="'.$row['id'].'">'.$row['inc_type'].'</option>';
                          }
                        ?>
                        
                        
                      </select>
                    </div>
                  </div>

                <div id="brgy" class="position-relative">
                  
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
    <!-- /.content -->
    
    <!-- The Modal -->
    
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
    window.location.href='delete_brgy_record.php?id='+id+'&&ids=<?php echo $brgy_id;?>';      // submitting the form when user press yes
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


        function show_bar(){

          var date = $('#filter_date').val();
          var type = $('#filter_type').val();

          var holder = (date) ? 'date' : 'type';

          // bypass value
          if(date && type) {
            holder = 'both';
          }

          console.log(holder);
         
          $.ajax({
            type: 'post',
            url: 'data_brgy_admin.php',
            data: {
              select: holder,
              date: date,
              type: type,
              brgy_id: <?php echo $brgy_id;?>
            },
            success:function(val){

              var name = [];
              var marks = [];
              var gender = [];
              var male = [];
              var female = [];

              switch(holder) {
                case 'date':

                  for (var i in val) {
                    name.push(val[i].inc_type);
                    marks.push(val[i].count);
                    male.push(val[i].male);
                    female.push(val[i].female);
                  }

                  break;

                case 'type':

                  for (var i in val) {
                    name.push(val[i].disc);
                    marks.push(val[i].count);
                    male.push(val[i].male);
                    female.push(val[i].female);
                  }

                  break;

                default:

                  for (var i in val) {
                    name.push(val[i].disc);
                    marks.push(val[i].count);
                    male.push(val[i].male);
                    female.push(val[i].female);
                    gender.push(val[i].gen);
                  }

                  break;
              }
              
              
              var chartdata = {
                labels: name,
                datasets: [{
                  label: "Male",
                  backgroundColor: "lightblue",
                  borderColor: "blue",
                  // hoverBackgroundColor: '#CCCCCC',
                  // hoverBorderColor: '#666666',
                  data: male
                },
                {
                  label: 'Female',
                  backgroundColor: "pink",
                  borderColor: "red",
                  // hoverBackgroundColor: '#CCCCCC',
                  // hoverBorderColor: '#666666',
                  data: female
                }
              
              ]
              };

              build_chart(chartdata);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
              // alert('Please select in two filters'); 
            } 
          });
        }

        function create_canvas(id) {

          var canvas = document.createElement('canvas');
          var div = document.getElementById(id);

          canvas.id = 'canvas_chart';
          canvas.width = 1200;
          canvas.height = 500;
          div.appendChild(canvas);
        }

        function build_chart(chartdata) {

          $('.chartjs-size-monitor').remove();
          $('#canvas_chart').remove();

          create_canvas('brgy');

          var graphTarget = document.getElementById('canvas_chart');

          var barGraph = new Chart(graphTarget, {
              type: 'bar',
              data: chartdata
          });
        }

        
</script>
</script>
</body>
</html>
