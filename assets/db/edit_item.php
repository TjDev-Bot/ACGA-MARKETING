<?php
    include('config.php');
    session_start();

    $user_type = $_SESSION['user_type'];
    $item_id = $_GET['item_id'];

    if($user_type == 0){
        $query = $conn->query("SELECT * FROM warehouse_inventory WHERE id = $item_id");
    }else{
        $query = $conn->query("SELECT * FROM branch_inventory WHERE id = $item_id");
    }
    // switch ($user_type) {
    //     case 0: 
    //         $query = $conn->query("SELECT * FROM warehouse_inventory WHERE id = $item_id");
    //         break;
    //     case 1:
    //         $query = $conn->query("SELECT * FROM branch_inventory WHERE id = $item_id");
    //         break;
    //     case 2:
    //         $query = $conn->query("SELECT * FROM branch_inventory WHERE id = $item_id");
    //         break;
    //     case 3:
    //         $query = $conn->query("SELECT * FROM branch_inventory WHERE id = $item_id");
    //         break;
    //     default: die();
    // }

    // $query = $conn->query("SELECT * FROM warehouse_inventory WHERE id = $item_id");  
    $fetch = $query->fetch_assoc();
    echo json_encode($fetch);