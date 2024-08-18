<?php
    include('config.php');

    $item_id = $_POST['prod_id'];
    $query = $conn->query("DELETE FROM inventory WHERE id = $item_id");
    if($query){
        $conn->query("DELETE FROM held_orders WHERE product_id = $item_id");
        echo "success";
    }else{
        echo "failed";
    }