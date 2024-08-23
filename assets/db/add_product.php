<?php
    include('config.php');
    session_start();

    $prod_name = $_POST['prod_name'];
    $prod_code = $_POST['prod_code'];
    $prod_cat = $_POST['prod_category'];
    $prod_quantity = $_POST['prod_quantity'];
    
    $prod_img = $_FILES['prod_img']['name'];
    $prod_img_temp = $_FILES['prod_img']['tmp_name'];

    $prod_unitprice = $_POST['prod_unitprice'];
    $prod_retailprice = $_POST['prod_retailprice'];
    $prod_desc = $_POST['prod_desc'];

    $datenow = date('Y-m-d H:i:s');
    $response = [];

    if($_SESSION['user_id'] == 1){
        $SELECT = "SELECT id From warehouse_inventory Where id = ? Limit 1";
        $INSERT = "INSERT INTO warehouse_inventory (out_branch, name, invoice_id, category_type, image, quantity, unit_price, retail_price, description, date_updated) 
           VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
           ON DUPLICATE KEY UPDATE invoice_id = invoice_id";
    }else{
        $SELECT = "SELECT id From branch_inventory Where id = ? Limit 1";
        $INSERT = "INSERT INTO branch_inventory (inventory_type, name, invoice_id, category_type, image, quantity, unit_price, retail_price, description, date_updated) 
           VALUES ('$_SESSION[user_type]', ?, ?, ?, ?, ?, ?, ?, ?, ?) 
           ON DUPLICATE KEY UPDATE invoice_id = invoice_id";
    }

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $user_type);
    $stmt->execute();
    $stmt->bind_result($user_type);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssssssss", $prod_name, $prod_code, $prod_cat, $prod_img, $prod_quantity, $prod_unitprice, $prod_retailprice, $prod_desc, $datenow);
        $stmt->execute();
        move_uploaded_file($prod_img_temp, "../../images/products/$prod_img");
        
        $response = [
            'status' => 'success',
            'message' => 'Checkout Successful'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Product Already Checked Out'
        ];
    }

    echo json_encode($response);