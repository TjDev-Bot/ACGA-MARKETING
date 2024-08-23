<?php
    include("config.php");
    session_start();

    $user_type = $_SESSION['user_type'];
    $item_id = $_GET['item_id'];

    if($user_type == 0){
        $query = "SELECT * FROM warehouse_inventory WHERE id = $item_id ORDER BY date_updated DESC";
    }else{
        $query = "SELECT * FROM branch_inventory WHERE id = $item_id ORDER BY date_updated DESC";
    }
    // switch($user_type) {
    //     case 0: 
    //             $query = "SELECT * FROM warehouse_inventory WHERE id = $item_id ORDER BY date_updated DESC";
    //         break;
    //     case 1:
    //         break;
    //     case 2:
    //         break;
    //     case 3:
    //         break;
    //     default: die();
    // }

    $getInv = $conn->query($query);
    $rows = $getInv->fetch_assoc();
    echo json_encode($rows);