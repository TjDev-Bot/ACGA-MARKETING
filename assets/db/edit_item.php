<?php
    include('config.php');

    $item_id = $_GET['item_id'];
    $query = $conn->query("SELECT * FROM inventory WHERE id = $item_id");
    $fetch = $query->fetch_assoc();
    echo json_encode($fetch);
