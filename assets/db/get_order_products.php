<?php
    include("config.php");
    session_start();

    $order_id = $_GET['orderID'];
    $items = [];
    $query = $conn->query("SELECT inventory.invoice_id, inventory.name, inventory.price, held_orders.quantity 
    FROM held_orders INNER JOIN inventory ON held_orders.product_id = inventory.id WHERE held_orders.checkout_id = $order_id");
    while($row = $query->fetch_assoc()){
        $items[] = $row;
    }
    // $query = $conn->query("SELECT * FROM held_orders WHERE checkout_id = $order_id");
    // while($row = $query->fetch_assoc()){
    //     $items[] = $row;
    // }

    echo json_encode($items);