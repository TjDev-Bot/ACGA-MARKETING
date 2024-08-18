<?php
    include("config.php");
    session_start();

    $user_type = $_SESSION['user_type'];
    $item_id = $_GET['item_id'];

    switch($user_type) {
        case 1: 
                $query = "SELECT * FROM warehouse_inventory WHERE id = $item_id ORDER BY date_updated DESC";
            break;
        case 2:
            break;
        case 3:
            break;
        case 4:
            break;
        default: die();
    }

    $getInv = $conn->query($query);
    $rows = $getInv->fetch_assoc();
    echo json_encode($rows);