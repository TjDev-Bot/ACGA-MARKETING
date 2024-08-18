<?php
include('config.php');
session_start();
$user_type = $_SESSION['user_type'];

if ($user_type == 1) {
    $query = "SELECT * FROM inventory ORDER BY date_updated DESC";
}else{
    $query = "SELECT * FROM inventory WHERE inventory_type = '$user_type' ORDER BY date_updated DESC";
}
$getInv = $conn->query($query);
while ($rows = $getInv->fetch_assoc()) {
    if($rows['image'] !== ""){
        $image = '../images/products/'.$rows['image'];
    }else{
        $image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpGKdbvFIR82hted9BOKd81zoingkwRgr-HQ&s';
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
            <td>₱ " . number_format($rows['price'], 2) . "</td>
            <td>" . $rows['quantity'] . "</td>
            <td>
            <button class='btn btn-sm btn-outline-info' data-toggle='modal' data-target='#editItem' onclick='editItem(" . $rows['id'] . ")'>Edit</button>
            <button onclick='deleteItem(" . $rows['id'] . ")' class='btn btn-sm btn-outline-warning' >Delete</button>
            </td>
            </tr>";
}
