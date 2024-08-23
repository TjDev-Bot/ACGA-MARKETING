<?php
include('config.php');
session_start();
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
// if ($user_type == 1) {
//     $query = "SELECT * FROM inventory ORDER BY date_updated DESC";
// }else{
//     $query = "SELECT * FROM inventory WHERE inventory_type = '$user_type' ORDER BY date_updated DESC";
// }

if($user_id = 1) {
    $query = "SELECT * FROM warehouse_inventory ORDER BY date_updated DESC";
}else{
    $query = "SELECT * FROM branch_inventory WHERE inventory_type = '$user_type' ORDER BY date_updated DESC";
}

$getInv = $conn->query($query);
while ($rows = $getInv->fetch_assoc()) {
    if($rows['image'] !== ""){
        $image = '../images/products/'.$rows['image'];
    }else{
        $image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpGKdbvFIR82hted9BOKd81zoingkwRgr-HQ&s';
    }

    $admin = '';
    $admin_btn = '';
    if($user_id == 1){
        switch($rows['out_branch']){
            case 1:
                $branch = "Hardware Branch";
                break;
            case 2:
                $branch = "Appliances Branch";
                break;
            case 3:
                $branch = "Aggriculture Branch";
                break;
            default: $branch = "Not Assigned Yet";
        }
        $admin = '<td>'.$branch .'</td>';
        $admin_btn = "<button class='btn btn-sm btn-outline-primary' data-toggle='modal' data-target='#outItem' onclick='outItem(" . $rows['id'] . ")'>Out</button>";
    }
    
    echo "<tr>
            <td>
                <div style='width: 50px; height: 50px; overflow: hidden; position: relative;'>
                <img src='".$image."' alt='item_image' class='img-fluid img-thumbnail' style='width: 100%; height: 100%; object-fit: cover; object-position: center;'>
                </div>
            </td>
            <td>" . strtoupper($rows['invoice_id']) . "</td>
            <td>" . ucwords($rows['name']) . "</td>
            <td>" . ucwords($rows['category_type']) . "</td>
            <td>₱ " . number_format($rows['unit_price'], 2) . "</td>
            <td>₱ " . number_format($rows['retail_price'], 2) . "</td>
            <td>" . $rows['quantity'] . "</td>
            <td>
                " . $admin_btn . "
                <button class='btn btn-sm btn-outline-info' data-toggle='modal' data-target='#editItem' onclick='editItem(" . $rows['id'] . ")'>Edit</button>
                <button onclick='deleteItem(" . $rows['id'] . ")' class='btn btn-sm btn-outline-warning' >Delete</button>
            </td>
            </tr>";
}
