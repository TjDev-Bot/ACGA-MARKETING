<?php
    include("config.php");

    $staff_id = $_GET['staff_id'];


    $query = $conn->query("
        SELECT 
            staffs.*, 
            users.user_type, 
            users.status, 
            branches.branch_id
        FROM staffs
        INNER JOIN users ON staffs.username = users.username
        INNER JOIN branches ON branches.branch_id = users.user_type
        WHERE staffs.id = $staff_id
    ");
    $fetch = $query->fetch_assoc();
    echo json_encode($fetch);