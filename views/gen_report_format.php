<?php
require_once('components/_head.php');
?>
<body>
    <div class="main-content">
        <div class="container-fluid mt-4">
            <div class="container-header">

            </div>
            <table class="table table-bordered table-striped text-center text-dark">
            <caption>Reports on Sales</caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Order Code</th>
                        <th scope="col">Product Invoice ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Retail Price</th>
                        <th scope="col">Order Quantity</th>
                        <th scope="col">Order Total Price</th>
                        <th scope="col">Order Date</th>
                    </tr>
                </thead>
                <tbody id="report_table">
                    <?php 
                        if(isset($_GET['data'])){
                            $data = $_GET['data'];
                        }
                        $total_price = 0;
                        $price = 0;
                        $quantity = 0;
                        $response = json_decode($data, true);
                        foreach($response as $key => $value){
                            // $price += $value['retail_price'];
                            // $quantity += $value['quantity'];
                            $total_price += intval($value['retail_price']) * intval($value['quantity']);
                            $retail_price = intval($value['retail_price']) * intval($value['quantity']);
                    ?>
                        <tr>
                            <td scope="row"><?=$value['checkout_id']?></td>
                            <td><?=strtoupper($value['invoice_id'])?></td>
                            <td><?=ucfirst($value['name'])?></td>
                            <td>₱ <?= number_format($value['retail_price'], 2) ?></td>
                            <td>x <?=$value['quantity']?></td>
                            <td>₱ <?= number_format($retail_price, 2) ?></td>
                            <td><?= date("M d, Y", strtotime($value['date'])) ?></td>
                        </tr>
                    <?php  
                        } 
                    ?> 
                </tbody>
                <tfoot class="table-borderless  ">
                    <tr>
                        <th scope="row">Total Price</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>₱ <?= number_format($total_price, 2) ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php
    require_once('components/_scripts.php');
    ?>
</body>
</html>