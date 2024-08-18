<?php
    include('config.php');
    session_start();

    $user_type = $_SESSION['user_type'];
    $product_id = $_POST['productId'];
    $response = [];

    $SELECT = "SELECT product_id FROM checkout WHERE product_id = ? LIMIT 1";
    $INSERT = "INSERT INTO checkout (product_id, user_id, quantity) 
            VALUES (?, ?, 1) 
            ON DUPLICATE KEY UPDATE product_id = VALUES(product_id)";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
    $stmt->bind_result($product_id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ss", $product_id, $user_type);
        $stmt->execute();

        $response = [
            'status' => 'success',
            'message' => 'Checkout Successful'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Product Already Checked Out or Checkout ID is not 0'
        ];
    }

    echo json_encode($response);
