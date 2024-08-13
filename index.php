<?php
session_start();
include 'include/conn.php';

$conn = new mysqli($servername, $username, $password, $dbname);
unset($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel = "icon" href = 
"dist/img/logo.jpg" 
        type = "image/x-icon">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
</head>
<title>CDRRMO SAN CARLOS</title>

<style>
    body{
    background: url(http://mymaplist.com/img/parallax/back.png);
	background-color: #444;
    background: url(http://mymaplist.com/img/parallax/pinlayer2.png),url(http://mymaplist.com/img/parallax/pinlayer1.png),url(http://mymaplist.com/img/parallax/back.png);    
}

.vertical-offset-100{
    padding-top:100px;
}
.logo{
    height: 100px;
    width:100px;
    margin-bottom: 20px;
}
.text{
    text-shadow: 2px 2px black;
    font-weight: bold;
    color: gray;
    font-size: 30px;
    font-family: "Libre Baskerville", serif;
}
    
</style>
<body>
    <?php
    
    // checking if "login" key in post variable exists
if (isset( $_POST['login'] ) ) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $pass2 = hash('sha256',$pass);
    
    
    $query = "SELECT * FROM `user` WHERE `uname` = '$uname'";
    $result_object = mysqli_query($conn, $query); // connection to db
    $user_data = mysqli_fetch_assoc($result_object); // convert obj to array
   if(is_null($user_data)) {
        echo "
                <script>
                swal({
                    title: 'Contact the Administrator!!',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 2000
                },
                function(){
                    window.location.href = 'index.php?';
                });
                </script>"; 
           
       
   }else{
       if($user_data['uname']==$uname){
           if($user_data['brgy_id']== 0){
                if($user_data['pass'] == $pass){
                   $_SESSION['id'] = $user_data['id'];
                   echo "
                    <script>
                        swal({
                            title: 'Successfully Login!!',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        },
                        function(){
                            window.location.href = 'home.php?';
                        });
                    </script>";  
               }else{
                 echo "
                    <script>
                    swal({
                        title: 'Incorrect password!!',
                        type: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    },
                    function(){
                        window.location.href = 'index.php?';
                    });
                    </script>"; 
               }  
               
           }else{
               if($user_data['pass'] == $pass2){
                   $_SESSION['id'] = $user_data['id'];
                   echo "
                    <script>
                    swal({
                        title: 'Welcome CDRRMO!!',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    },
                    function(){
                        window.location.href = 'user.php?';
                    });
                    </script>";  
               }else{
                 echo "
                    <script>
                    swal({
                        title: 'Incorrect password!!',
                        type: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    },
                    function(){
                        window.location.href = 'index.php?';
                    });
                    </script>"; 
               }
           }
           
           
       }
       
   }
}

    
    ?>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<center><h3 class="panel-title text"> CDRRMO San Carlos</h3></center>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="">
                    <fieldset>
                        <center><img src="dist/img/logo.jpg" class="logo"></center>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="User Name" name="uname" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" minlength="6" required name="pass" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
            }
        });
  });
});
</script>
</body>
</html>
