<?php
    include("config.php");
    session_start();

    $order_id = $_GET['orderID'];
    $items = [];
    $query = $conn->query("SELECT branch_inventory.invoice_id, branch_inventory.name, branch_inventory.unit_price, held_orders.quantity 
    FROM held_orders INNER JOIN branch_inventory ON held_orders.product_id = branch_inventory.id WHERE held_orders.checkout_id = $order_id");
    while($row = $query->fetch_assoc()){
        $items[] = $row;
    }
    // $query = $conn->query("SELECT * FROM held_orders WHERE checkout_id = $order_id");
    // while($row = $query->fetch_assoc()){
    //     $items[] = $row;
    // }

    echo json_encode($items);