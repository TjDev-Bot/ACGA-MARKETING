<?php
    include("config.php");
    session_start();

    $id = $_POST['prod_id'];
    $name = $_POST['prod_name'];
    $price = $_POST['prod_price'];
    $quantity = $_POST['prod_quantity'];
    
    $query = $conn->query("UPDATE inventory SET name = '$name', price = '$price', quantity = '$quantity' WHERE id = '$id'");