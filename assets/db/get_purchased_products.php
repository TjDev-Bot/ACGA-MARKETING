<?php
    include("config.php");
    session_start();

    $order_id = $_GET['purchase_ID'];
    $items = [];
    $query = $conn->query("SELECT 
    branch_inventory.invoice_id, 
    branch_inventory.name, 
    branch_inventory.unit_price, 
    ordered_items.quantity 
    FROM ordered_items 
    INNER JOIN branch_inventory 
    ON ordered_items.product_id = branch_inventory.id 
    WHERE ordered_items.checkout_id = $order_id");
    while($row = $query->fetch_assoc()){
        $items[] = $row;
    }

    echo json_encode($items);