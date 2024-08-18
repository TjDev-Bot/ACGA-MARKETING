<?php
    include("config.php");

    $staff_uid = $_POST['staff_uid'];
    $staff_username = $_POST['staff_username'];
    $staff_type = $_POST['staff_type'];
    $staff_status = $_POST['staff_status'];

    $query = $conn->query("UPDATE staffs SET username = '$staff_username' WHERE id = '$staff_uid'");
    $query = $conn->query("UPDATE users SET user_type = '$staff_type', status = '$staff_status' WHERE username = '$staff_username'");

    echo "success";
    // echo json_encode($data);