<?php
    include('config.php');
    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM users WHERE username = '$username'");
    $user = $query->fetch_assoc();

    $_SESSION['user_type'] = $user['user_type'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['branch_type'] = $user['branch_type'];
    
    if($query){
        if(password_verify($password, $user['password'])){
            if($user['status'] != 'disabled'){
                echo "success";
            }else{
                echo "disabled";
            }
        }else{
            echo "error";
        }
        
    }else{
        echo "failed";
    }