<?php
    include('config.php');
    session_start();

    // $user_type = $_SESSION['user_type'];
    $order_id = $_POST['order_id'];

    $conn->query("DELETE FROM held_orders WHERE checkout_id = '$order_id'");