<?php
include("config.php");
session_start();

$order_id = $_GET['purchase_ID'];
$items = [];

$check_branch = $conn->query("SELECT * FROM ordered_items INNER JOIN branch_inventory ON ordered_items.product_id = branch_inventory.id 
    WHERE ordered_items.checkout_id = $order_id");
if ($check_branch->num_rows == 0) {
    $query = $conn->query("SELECT 
        archived_product.invoice_id, 
        archived_product.name, 
        archived_product.unit_price,
        archived_product.retail_price,
        ordered_items.quantity 
        FROM ordered_items 
        INNER JOIN archived_product 
        ON ordered_items.product_id = archived_product.id 
        WHERE ordered_items.checkout_id = $order_id");
} else {
    $query = $conn->query("SELECT 
    branch_inventory.invoice_id, 
    branch_inventory.name, 
    branch_inventory.unit_price,
    branch_inventory.retail_price,
    ordered_items.quantity 
    FROM ordered_items 
    INNER JOIN branch_inventory 
    ON ordered_items.product_id = branch_inventory.id 
    WHERE ordered_items.checkout_id = $order_id");
}

while ($row = $query->fetch_assoc()) {
    $items[] = $row;
}

echo json_encode($items);
