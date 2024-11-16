<?php
    include('config.php');
    session_start();

    $staff_type = $_POST['staff_type'];
    $branch_type = $_POST['branch_type'];
    $staff_id = $_POST['staff_number'];
    $staff_name = $_POST['staff_name'];
    $staff_username = $_POST['staff_username'];
    $staff_pass = $_POST['staff_password'];
    $secure_pass = password_hash($staff_pass, PASSWORD_DEFAULT);

    // $sql = $conn->query('INSERT INTO staff 
    // (staff_id, name, username, password) 
    // VALUES 
    // ("'.$staff_id.'", "'.$staff_name.'", "'.$staff_username.'", "'.$secure_pass.'")');

    $SELECT = "SELECT staff_id From staffs Where staff_id = ? Limit 1";
    $INSERT = "INSERT INTO staffs (staff_id, staff_branch, name, username, password) 
           VALUES (?, ?, ?, ?, ?) 
           ON DUPLICATE KEY UPDATE staff_id = staff_id";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $staff_id);
    $stmt->execute();
    $stmt->bind_result($staff_id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssss", $staff_id, $branch_type, $staff_name, $staff_username, $secure_pass);
        $stmt->execute();

        $conn->query('INSERT INTO users 
        (user_type, branch_type, username, password, status) 
        VALUES 
        ("'.$staff_type.'", "'.$branch_type.'", "'.$staff_username.'", "'.$secure_pass.'", "active")');
        $response = [
            'status' => 'success',
            'message' => 'Staff Added Successfuly!'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Staff Already Exists!'
        ];
    }

    echo json_encode($response);