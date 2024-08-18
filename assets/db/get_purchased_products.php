<?php
    include("config.php");
    session_start();

    $order_id = $_GET['purchase_ID'];
    $items = [];
    $query = $conn->query("SELECT 
    inventory.invoice_id, 
    inventory.name, 
    inventory.price, 
    ordered_items.quantity 
    FROM ordered_items 
    INNER JOIN inventory 
    ON ordered_items.product_id = inventory.id 
    WHERE ordered_items.checkout_id = $order_id");
    while($row = $query->fetch_assoc()){
        $items[] = $row;
    }

    echo json_encode($items);