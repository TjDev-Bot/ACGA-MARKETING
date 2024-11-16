<?php

    include('config.php');

    $staff_type = $_GET['staffType'];

    $query = $conn->query("SELECT * FROM branch_name WHERE branch_id = $staff_type");
    while($row = $query->fetch_assoc()){
        $data[] = $row;
    }
    echo json_encode($data);