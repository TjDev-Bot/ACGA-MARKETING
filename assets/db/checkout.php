<?php
    include('config.php');
    session_start();

    $response = [];
    $data = [];
    $user_type = $_SESSION['user_type'];
    $total = 0;
    $getCheckout = $conn->query("SELECT * FROM checkout WHERE user_id = '$user_type'");
    while ($rows2 = $getCheckout->fetch_assoc()) {
        $getproductinfo = $conn->query("SELECT * FROM inventory WHERE id = '$rows2[product_id]'");
        $rows3 = $getproductinfo->fetch_assoc();
        $total += $rows3['price'];
        
        $rows2['product_info'] = $rows3;
        $data[] = $rows2;
        // $rows2['product_info'] = $rows3;
        // $response[] = $rows2;

    }
    $response = [
        'data' => $data,
        'total_price' => $total
    ];
    // $response['total_price'] = $total;
    echo json_encode($response);
