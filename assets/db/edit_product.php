<?php
    include("config.php");
    session_start();

    $user_type = $_SESSION['user_id'];
    $id = $_POST['prod_id'];
    $name = $_POST['prod_name'];
    $retailprice = $_POST['prod_retail_price'];
    $unitprice = $_POST['prod_unit_price'];
    $quantity = $_POST['prod_quantity'];

    if($user_type == 1){
        $query = $conn->query("UPDATE warehouse_inventory SET name = '$name', unit_price = '$unitprice', retail_price = '$retailprice', quantity = '$quantity' WHERE id = '$id'");
    }else{
        $query = $conn->query("UPDATE branch_inventory SET name = '$name', unit_price = '$unitprice', retail_price = '$retailprice', quantity = '$quantity' WHERE id = '$id'");
    }