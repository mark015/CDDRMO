
<!DOCTYPE html>
<html>
    <head>
  </head>
  <?php
  include('include/link.php');
  ?>
<body>
<?php
require_once('include/conn.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ( isset( $_POST['submit'] ) ) {
    date_default_timezone_set("Asia/Manila");
    $date = date('Y-m-d h:i:sa');
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $type_inc = $_POST['type_inc'];
    $cause_inc = $_POST['c_inc'];
    $add_inc = $_POST['add_inc'];   
    $kind = $_POST['kind'];  
    $suffix = $_POST['suffix'];   
    $rep_by =$_POST['rep_by'];
    $inc_rep_by = $_POST['inc_rep_by'];
    $date_inc = $_POST['date_inc'];
    $time = $_POST['time'];
    $im = "";
    
    
    
    $img = $_FILES['img']['name'];
    $total = count($_FILES['img']['name']);
    
    // Loop through each file
    for($i=0; $i<$total; $i++) {
        $im .= $img[$i] . "/";
      //Get the temp file path
      $tmpFilePath = $_FILES['img']['tmp_name'][$i];
    
      //Make sure we have a filepath
      if ($tmpFilePath != ""){
        //Setup our new file path
        $newFilePath = "dist/img/" . $_FILES['img']['name'][$i];
    
        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
          //Handle other code here
          
    
        }
      }
    }
        
        $sql = "SELECT * FROM tbl_brgy WHERE brgy='$add_inc'";
        $qry = mysqli_query($conn,$sql);
        $brgy_data = mysqli_fetch_array($qry);
        $brgy_id=$brgy_data['id'];
        
        
        
        $query1 = "INSERT INTO `incident`(`id`, `brgy_id`, `inc_id`, `fname`, `mname`, `lname` , `suffix`, `gender`, `age`, `address`, `cause_inc`, `inc_kind`, `date`, `time`, `img`, `report_by`, `inc_report_by`) VALUES ('','$brgy_id', '$type_inc', '$fname', '$mname', '$lname', '$suffix' , '$gender', '$age', '$address', '$cause_inc', '$kind', '$date_inc' , '$time', '$im' ,'$rep_by','$inc_rep_by')";
                $result = mysqli_query($conn, $query1);
                if ($result == TRUE) {  
                    echo "
                        <script>
                        swal({
                            title: 'Successfully Add !!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1000
                          },
                          function(){
                            window.location.href = 'user.php';
                        });
                        </script>";
                } else { 
                    echo "
                    <script>
                    swal({
                        title: 'Something went wrong !!',
                        type: 'error',
                        showConfirmButton: false,
                        timer: 1000
                      },
                      function(){
                        window.location.href = 'user.php';
                    });
                    </script>";
            }
        
    
}

if(isset($_POST['add_brgy'])){
    $brgy = $_POST['brgy'];
    
    $sql = "SELECT * FROM tbl_brgy WHERE brgy='$brgy'";
    $qry = mysqli_query($conn,$sql);
    $brgy_data = mysqli_fetch_array($qry);
  
         $query1 = "INSERT INTO `tbl_brgy`(`id`, `brgy`) VALUES ('', '$brgy' )";
                $result = mysqli_query($conn, $query1);
                if ($result == TRUE) {
                    echo "
                        <script>
                        swal({
                            title: 'Successfully Add !!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1000
                          },
                          function(){
                            window.location.href = 'add_brgy.php';
                        });
                        </script>";
                } else { 
                echo "
                    <script>
                        alert('Something Went Wrong!!');
                        window.location.href='user.php';
                    </script>";
            }
        
    
}


if(isset($_POST['add_inc_type'])){
    $inc_type = $_POST['inc_type'];
    $sql = "SELECT * FROM incident_type where inc_type='$inc_type'";
    $qry = mysqli_query($conn,$sql);
    $inc_type_data = mysqli_fetch_array($qry);
    
        $query1 = "INSERT INTO `incident_type`(`id`, `inc_type`) VALUES ('', '$inc_type' )";
        $result = mysqli_query($conn, $query1);
        if ($result == TRUE) {
                echo "<script>
                swal({
                    title: 'Successfully Add !!',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 2000
                  },
                  function(){
                    window.location.href = 'add_inc_type.php';
                });
                       </script>";
                

        } else { 
        echo "
            <script>
                alert('Something Went Wrong!!');
                window.location.href='user.php';
            </script>";
            }
}


// if(isset($_POST['add_user'])){
//     $uname = $_POST['uname'];
//     $pass =$_POST['pass'];
//     $brgy = $_POST['brgy'];
//     $hash_pass = hash("sha256", $pass);
    
//         // $query1 = "INSERT INTO `user`(`id`, `uname`, `pass`, `pos`, `brgy_id`) VALUES ('','','','','')";
//         // $result = mysqli_query($conn, $query1);
//         // if ($result == TRUE) {
//         //         echo "<script>
//         //         swal({
//         //             title: 'Successfully Add !!',
//         //             type: 'success',
//         //             showConfirmButton: false,
//         //             timer: 2000
//         //           },
//         //           function(){
//         //             window.location.href = 'add_inc_type.php';
//         //         });
//         //               </script>";
                

//         // } else { 
//         // echo "
//         //     <script>
//         //         alert('Something Went Wrong!!');
//         //         window.location.href='user.php';
//         //     </script>";
//         //     }
// }



if(isset($_POST['add_inc_kind'])){
    $inc_kind = $_POST['kind'];
    $inc_type = $_POST['type'];
    
    $sql = "SELECT * FROM inc_kind WHERE disc='$inc_kind'";
    $qry = mysqli_query($conn,$sql);
    $inc_kind_data = mysqli_fetch_array($qry);
    
         $query1 = "INSERT INTO `inc_kind`(`id`, `inc_type_id`, `disc`) VALUES ('','$inc_type','$inc_kind')";
                $result = mysqli_query($conn, $query1);
                if ($result == TRUE) {
                    echo "
                        <script>
                        swal({
                            title: 'Successfully Add !!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 2000
                          },
                          function(){
                            window.location.href = 'add_inc_kind.php?id=$inc_type';
                        });
                        </script>";
                } else { 
                echo "
                    <script>
                        alert('Something Went Wrong!!');
                        window.location.href='user.php';
                    </script>";
            }
        
    
}


if(isset($_POST['add_user'])){
    $brgy_id=$_GET['id'];
    $uname = $_POST['uname'];
    
    $brgy = $_POST['brgy'];
    $pass = $_POST['pass'];
    $hash_pass = hash('sha256', $pass);

         $query1 = "INSERT INTO `user`(`id`, `uname`, `pass`, `pos`, `brgy_id` ) VALUES ('', '$uname', '$hash_pass', 'user', '$brgy')";
                $result = mysqli_query($conn, $query1);
                if ($result == TRUE) {
                    echo "
                        <script>
                        swal({
                            title: 'Successfully Add !!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 2000
                          },
                          function(){
                            window.location.href = 'add_user.php';
                        });
                        </script>";
                } else { 
                echo "
                    <script>
                        alert('Something Went Wrong!!');
                        window.location.href='view_brgy.php?id=$brgy_id';
                    </script>";
            }
  
    
}





?>
</body>