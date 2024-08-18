<?php
    include("config.php");
    session_start();

    $user_type = $_SESSION['user_type'];
    $id = $_POST['prod_id'];
    $name = $_POST['prod_name'];
    $price = $_POST['prod_price'];
    $quantity = $_POST['prod_quantity'];
    
    // switch ($user_type) {
    //     case 1: 
    //         $query = $conn->query("UPDATE warehouse_inventory SET name = '$name', price = '$price', quantity = '$quantity' WHERE id = '$id'");
    //         break;
    //     case 2:
    //         $query = $conn->query("UPDATE branch_inventory SET name = '$name', price = '$price', quantity = '$quantity' WHERE id = '$id'");
    //         break;
    //     case 3:
    //         $query = $conn->query("UPDATE branch_inventory SET name = '$name', price = '$price', quantity = '$quantity' WHERE id = '$id'");
    //         break;
    //     case 4:
    //         $query = $conn->query("UPDATE branch_inventory SET name = '$name', price = '$price', quantity = '$quantity' WHERE id = '$id'");
    //         break;
    //     default: die();
    // }

    if($user_type == 1){
        $query = $conn->query("UPDATE warehouse_inventory SET name = '$name', price = '$price', quantity = '$quantity' WHERE id = '$id'");
    }else{
        $query = $conn->query("UPDATE branch_inventory SET name = '$name', price = '$price', quantity = '$quantity' WHERE id = '$id'");
    }