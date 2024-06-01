<?php 
    include('config.php');
    session_start();
    $user_type = $_SESSION['user_type'];

    if($user_type == 1){
        $getInv = $conn->query("SELECT * FROM inventory WHERE inventory_type = '$user_type'");
        while($rows = $getInv->fetch_assoc()){
            echo "<tr>
            <td>".$rows['image']."</td>
            <td>".$rows['invoice_id']."</td>
            <td>".$rows['name']."</td>
            <td>₱ ".$rows['price']."</td>
            <td></td>
            </tr>";
        }
    }