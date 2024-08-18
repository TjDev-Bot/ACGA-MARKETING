<?php
include("config.php");
session_start();

$stock_id = $_POST['stock_id'];
$stock_quantity = $_POST['stock_quantity'];
$stock_branch = $_POST['stock_branch'];
$date = date("Y-m-d H:i:s");

$getquantity = $conn->query("SELECT quantity, invoice_id FROM warehouse_inventory WHERE id = $stock_id");
$getquantity = $getquantity->fetch_assoc();
$status = '';
$invoice_id = $getquantity['invoice_id'];
$branch = $conn->query("SELECT * FROM branch_inventory WHERE invoice_id = '$invoice_id'");
// $rowBranch = $branch->num_rows;

if (intval($stock_quantity) > intval($getquantity['quantity'])) {
    $status = 'over_limit';
}else {
    if($branch->num_rows > 0) {
        $conn->query("UPDATE warehouse_inventory SET quantity = quantity - '$stock_quantity', out_branch = '$stock_branch'  WHERE id = '$stock_id'");
        $conn->query("UPDATE branch_inventory SET quantity = quantity + '$stock_quantity' WHERE invoice_id = '$invoice_id' AND inventory_type = '$stock_branch'");
    }else{
        $conn->query("UPDATE warehouse_inventory SET quantity = quantity - $stock_quantity, out_branch = $stock_branch  WHERE id = $stock_id");
        $stmt = $conn->prepare("INSERT INTO branch_inventory (inventory_type, invoice_id, category_type, image, name, quantity, unit_price, retail_price, description)
        SELECT ?, invoice_id, category_type, image, name, ?, unit_price, retail_price, description
        FROM warehouse_inventory 
        WHERE id = ?");
        $stmt->bind_param("sss", $stock_branch, $stock_quantity, $stock_id);
        $stmt->execute();
        $stmt->close();
    }

    $status = 'success';
    if(intval($stock_quantity) == intval($getquantity["quantity"])) {
        $conn->query("DELETE FROM warehouse_inventory WHERE id = $stock_id");
        $status = "success";
    }
}

echo $status;