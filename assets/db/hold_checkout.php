<?php
    include('config.php');
    session_start();

    $user_type = $_SESSION['user_type'];
    $product_id = $_POST['product_id'];
    $checkout_id = $_POST['checkout_id'];
    $date = date("Y-m-d");
    // $checkoutUID = rand(10000, 99999);
    $query = $conn->query("SELECT * FROM checkout WHERE user_id = $user_type AND id = $product_id");
    $row = $query->fetch_assoc();
    $productuid = $row['product_id'];
    $quantity = $row['quantity'];
    $conn->query("INSERT INTO held_orders (checkout_id, user_type, product_id, quantity, date) 
    VALUES ('$checkout_id', '$user_type', '$productuid', '$quantity', '$date')");
    
    if($query){
        $conn->query("DELETE FROM checkout WHERE id = '$product_id' AND user_id = '$user_type'");
    }
    
    // echo json_encode($row);
    // $conn->query("UPDATE checkout SET checkout_id = $checkout_id WHERE id = $product_id");
    // // $conn->query("INSERT INTO held_orders (checkout_id, user_type, date) VALUES ('$checkout_id', '$user_type', '$date')");
    // $query = $conn->query("INSERT INTO held_orders (checkout_id, user_type, date)
    //                     SELECT '$checkout_id', '$user_type', '$date'
    //                     FROM dual
    //                     WHERE NOT EXISTS (
    //                         SELECT 1 FROM held_orders WHERE checkout_id = '$checkout_id'
    //                     )");
    // if($query){
    //     echo "success";
    // }else{
    //     echo "failed";
    // }