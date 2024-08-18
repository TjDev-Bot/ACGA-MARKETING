<?php
    include('config.php');
    session_start();

    $user_type = $_SESSION['user_type'];
    $product_id = $_POST['product_id'];

    $conn->query("DELETE FROM checkout WHERE id = '$product_id' AND user_id = '$user_type'");
