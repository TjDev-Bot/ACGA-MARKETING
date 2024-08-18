<?php
    include("config.php");
    session_start();

    $type = $_GET['type'];
    
    switch ($type) {
        case 'hold':
            $order_id = $_POST['orderuid'];
            $query = $conn->query("SELECT held_orders.product_id, held_orders.quantity, inventory.price FROM held_orders 
            INNER JOIN inventory 
            ON held_orders.product_id = inventory.id 
            WHERE checkout_id = $order_id");
            $total = 0;

            while($row = $query->fetch_assoc()){
                $price = intval($row['quantity']) * intval($row['price']);
                // $total += $totalprice;
                $quantity = $row['quantity'];
                $product_id = $row['product_id'];
                $conn->query("UPDATE inventory SET quantity =  quantity - $quantity WHERE id = $product_id");
            };
            if($query){
                // $conn->query("INSERT INTO ordered_items (checkout_id, product_id, user_type, total_price = $total, quantity, date)
                // SELECT checkout_id, product_id, user_type, quantity, date 
                // FROM held_orders 
                // WHERE checkout_id = $order_id");
        
                $stmt = $conn->prepare("INSERT INTO ordered_items (checkout_id, product_id, user_type, price, quantity, date)
                SELECT checkout_id, product_id, user_type, ?, quantity, date 
                FROM held_orders 
                WHERE checkout_id = ?");
                $stmt->bind_param("di", $price, $order_id);
                if($stmt->execute()){
                    $conn->query("DELETE FROM held_orders WHERE checkout_id = $order_id");
                }
                $stmt->close();
                echo "success";
            }else{
                echo "error";
            }
            break;
        case 'purchase':
                $product_id = $_POST['product_id'];
                $checkout_id = $_POST['checkout_id'];
                $user_type = $_SESSION['user_type'];
                $date = date("Y-m-d");
                $query = $conn->query("SELECT checkout.product_id, checkout.quantity, inventory.price FROM checkout INNER JOIN inventory ON checkout.product_id = inventory.id WHERE checkout.id = $product_id");
                while($row = $query->fetch_assoc()){
                    $productuid = $row['product_id'];
                    $quantity = $row['quantity'];
                    $price = intval($row['quantity']) * intval($row['price']);
                    $conn->query("UPDATE inventory SET quantity =  quantity - $quantity WHERE id = $productuid");

                    $insert = $conn->query("INSERT INTO ordered_items (checkout_id, product_id, user_type, price, quantity, date)
                    VALUES ('$checkout_id', '$productuid', '$user_type', '$price', '$quantity', '$date')");
                }
                if($insert){
                    $conn->query("DELETE FROM checkout WHERE id = '$product_id' AND user_id = '$user_type'");
                    echo "success";
                }else{
                    echo "failed";
                }
            break;

        default:
            # code...
            break;
    }
    