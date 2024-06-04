<?php
    include('config.php');
    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $user = $query->fetch_assoc();

    $_SESSION['user_type'] = $user['user_type'];
    $_SESSION['user_id'] = $user['id'];

    if($query){
        echo "success";
    }else{
        echo "failed";
    }