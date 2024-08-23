<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="NSBM">
    <title>A.C.G.A MARKETING</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/icons/site.webmanifest">
    <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <link type="text/css" href="assets/css/main.css" rel="stylesheet">
    <script src="assets/js/swal.js"></script>
    <!--Load Swal-->
    <?php if (isset($success)) { ?>
        <!--This code for injecting success alert-->
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $success; ?>", "success");
                },
                100);
        </script>

    <?php } ?>
    <?php if (isset($err)) { ?>
        <!--This code for injecting error alert-->
        <script>
            setTimeout(function() {
                    swal("Failed", "<?php echo $err; ?>", "error");
                },
                100);
        </script>

    <?php } ?>
    <?php if (isset($info)) { ?>
        <!--This code for injecting info alert-->
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $info; ?>", "info");
                },
                100);
        </script>

    <?php } ?>
    <?php
        include('../assets/db/config.php');
        session_start();
        $user_type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];
        $username = "";
        
        if($user_id != 1){
            $query = $conn->query("SELECT * FROM users INNER JOIN staffs ON users.username = staffs.username WHERE users.id = $user_id");
            $row = $query->fetch_assoc();
            $username = $row['name'];
            $getInventory = $conn->query("SELECT COUNT(id) as inventory_count FROM branch_inventory WHERE inventory_type = $user_type");
            $fetchInventory = $getInventory->fetch_assoc();
            $getHeldOrders = $conn->query("SELECT COUNT(distinct checkout_id) as held_count FROM held_orders WHERE user_type = $user_type");
            $fetchHeldOrers = $getHeldOrders->fetch_assoc();
            $getOrders = $conn->query("SELECT COUNT(distinct checkout_id) as order_count FROM ordered_items WHERE user_type = $user_type");
            $fetchOrers = $getOrders->fetch_assoc();
            $getSales = $conn->query("SELECT price, quantity FROM ordered_items WHERE user_type = $user_type");
            $totalSales = 0;
            while($row = $getSales->fetch_assoc()){
                $totalSales += intval($row['price']) * intval($row['quantity']);
            }
        }else{
            $username = "Admin Admin";
            $getInventory = $conn->query("SELECT COUNT(id) as inventory_count FROM warehouse_inventory");
            $fetchInventory = $getInventory->fetch_assoc();
            $getHeldOrders = $conn->query("SELECT COUNT(distinct checkout_id) as held_count FROM held_orders ");
            $fetchHeldOrers = $getHeldOrders->fetch_assoc();
            $getOrders = $conn->query("SELECT COUNT(distinct checkout_id) as order_count FROM ordered_items ");
            $fetchOrers = $getOrders->fetch_assoc();
            $getSales = $conn->query("SELECT price, quantity FROM ordered_items");
            $totalSales = 0;
            while($row = $getSales->fetch_assoc()){
                $totalSales += intval($row['price']) * intval($row['quantity']);
            }
        }
    ?>
</head>
<div id="loader" class="parent-container" hidden>
  <div class="circle"></div>
</div>
<html>