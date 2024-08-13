<?php
session_start();
include 'include/conn.php';

$conn = new mysqli($servername, $username, $password, $dbname);
unset($_SESSION['id']);

if (isset( $_POST['login'] ) ) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    
    
    $query = "SELECT * FROM `user` WHERE `uname` = '$uname'";
    $result_object = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_assoc($result_object);
    
   if(is_null($user_data)) {
        echo "
                <script>
                    window.location.href='index.php';
                </script>"; 
           
       
   }else{
       if($user_data['uname']==$uname){
           if($user_data['brgy_id']== 0){
                if($user_data['pass'] == $pass){
                   $_SESSION['id'] = $user_data['id'];
                   echo "
                    <script>
                        window.location.href='home.php';
                    </script>";  
               }else{
                 echo "
                    <script>
                        window.location.href='index.php';
                    </script>"; 
               }  
               
           }else{
               if($user_data['pass'] == $pass){
                   $_SESSION['id'] = $user_data['id'];

                   echo "
                    <script>
                        window.location.href='user.php';
                    </script>";  
               }else{
                 echo "
                    <script>
                        window.location.href='index.php';
                    </script>"; 
               }
           }
           
           
       }
       
   }
}
?>