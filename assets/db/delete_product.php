<?php
    include('config.php');
    session_start();

    $user_type = $_SESSION['user_type'];
    $item_id = $_POST['prod_id'];

    // switch($user_type) {
    //     case 1: 
    //             $query = $conn->query("DELETE FROM warehouse_inventory WHERE id = $item_id");
    //         break;
    //     case 2:
    //             $query = $conn->query("DELETE FROM warehouse_inventory WHERE id = $item_id");
    //         break;
    //     case 3:
    //             $query = $conn->query("DELETE FROM warehouse_inventory WHERE id = $item_id");
    //         break;
    //     case 4:
    //             $query = $conn->query("DELETE FROM warehouse_inventory WHERE id = $item_id");
    //         break;
    //     default: die();
    // }
    
    if($user_type == 0){
        $query = $conn->query("DELETE FROM warehouse_inventory WHERE id = $item_id");
    }else{
        $query = $conn->query("DELETE FROM branch_inventory WHERE id = $item_id");
    }

    if($query){
        $conn->query("DELETE FROM held_orders WHERE product_id = $item_id");
        echo "success";
    }else{
        echo "failed";
    }