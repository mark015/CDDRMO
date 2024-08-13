<?php

    include'conn.php';
    session_start();
    if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: index.php");
        
    }
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id = $_SESSION['id'];
    
    $query = "SELECT * FROM `user` WHERE `id` = '$id'";
    $result_object = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_assoc($result_object);
    $brgy_id= $user_data['brgy_id'];
    
    if($user_data['pos'] != 'admin' || $user_data['pos'] == 'user'){
        header("location: index.php");
    }
?>