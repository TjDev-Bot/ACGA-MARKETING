<?php
include("config.php");
session_start();

$type = $_GET['type'];

switch ($type) {
    case 'hold':
        $order_id = $_POST['orderuid'];
        $query = $conn->query("SELECT held_orders.product_id, held_orders.quantity, branch_inventory.retail_price FROM held_orders 
            INNER JOIN branch_inventory 
            ON held_orders.product_id = branch_inventory.id 
            WHERE checkout_id = $order_id");
        $total = 0;

        while ($row = $query->fetch_assoc()) {
            $price = intval($row['quantity']) * intval($row['retail_price']);
            $quantity = $row['quantity'];
            $product_id = $row['product_id'];
            $conn->query("UPDATE branch_inventory SET quantity =  quantity - $quantity WHERE id = $product_id");
        };
        if ($query) {
            $stmt = $conn->prepare("INSERT INTO ordered_items (checkout_id, product_id, user_type, price, quantity, date)
                SELECT checkout_id, product_id, user_type, ?, quantity, date 
                FROM held_orders 
                WHERE checkout_id = ?");
            $stmt->bind_param("di", $price, $order_id);
            if ($stmt->execute()) {
                $conn->query("DELETE FROM held_orders WHERE checkout_id = $order_id");
            }
            $stmt->close();
            echo "success";
        } else {
            echo "error";
        }
        break;
    case 'purchase':
        $product_id = $_POST['product_id'];
        $checkout_id = $_POST['checkout_id'];
        $user_type = $_SESSION['user_type'];
        $date = date("Y-m-d H:i:s");

        $query = $conn->query("SELECT checkout.product_id, checkout.quantity, branch_inventory.retail_price 
                FROM checkout 
                INNER JOIN branch_inventory ON checkout.product_id = branch_inventory.id 
                WHERE checkout.id = $product_id");

        while ($row = $query->fetch_assoc()) {
            $productuid = $row['product_id'];
            $quantity = $row['quantity'];
            $price = intval($row['quantity']) * intval($row['retail_price']);
            $conn->query("UPDATE branch_inventory SET quantity =  quantity - $quantity WHERE id = $productuid");

            $insert = $conn->query("INSERT INTO ordered_items (checkout_id, product_id, user_type, price, quantity)
                    VALUES ('$checkout_id', '$productuid', '$user_type', '$price', '$quantity')");
        }
        if ($insert) {
            $conn->query("DELETE FROM checkout WHERE id = '$product_id' AND user_id = '$user_type'");
            $stmt = $conn->prepare("INSERT INTO sales (inventory_type, invoice_id, category_type, image, name, quantity, unit_price, retail_price, description)
            SELECT inventory_type, invoice_id, category_type, image, name, ?, unit_price, retail_price, description
            FROM branch_inventory 
            WHERE id = ?");
            $stmt->bind_param("ss", $quantity, $productuid);
            $stmt->execute();
            $stmt->close();
            echo "success";
        } else {
            echo "failed";
        }
        break;

    default:
        # code...
        break;
}
