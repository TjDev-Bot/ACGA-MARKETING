<?php
    include('config.php');

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql = $conn->query("UPDATE checkout SET quantity = $quantity WHERE id = $product_id");
    echo $product_id;