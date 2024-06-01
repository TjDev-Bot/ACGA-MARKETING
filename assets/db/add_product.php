<?php
    include('config.php');

    $prod_name = $_POST['prod_name'];
    $user_type = $_POST['user_type'];
    $prod_code = $_POST['prod_code'];
    $prod_quantity = $_POST['prod_quantity'];

    $prod_img = $_FILES['prod_img']['name'];
    $prod_img_temp = $_FILES['prod_img']['tmp_name'];

    $prod_price = $_POST['prod_price'];
    $prod_desc = $_POST['prod_desc'];

    $datenow = date('Y-m-d H:i:s');

    $insert = $conn->query("INSERT INTO inventory 
        (inventory_type, name, invoice_id, image, quantity, price, description, date_updated) VALUES 
        ('$user_type', '$prod_name', '$prod_code', '$prod_img', '$prod_quantity', '$prod_price', '$prod_desc', '$datenow')");
    
    if($insert){
        move_uploaded_file($prod_img_temp, "../../images/products/$prod_img");
        echo "success";
    }else{
        echo "failed";
    }