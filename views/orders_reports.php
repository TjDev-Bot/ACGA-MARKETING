<?php

require_once ('components/_head.php');
?>
<div class="modal fade" id="checkOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Check Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive h-25">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Product Code</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody id="ordered_items">

                        </tbody>
                    </table>
                    <input type="text" value="" id="checkoutUID" name="orderuid" hidden />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-warning btn-md" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<body>
    <!-- Sidenav -->
    <?php
    require_once ('components/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php
        require_once ('components/_topnav.php');
        ?>
        <!-- Header -->
        <div style="background-image: url(assets/img/theme/ag.jpg); background-size: cover;"
            class="header  pb-8 pt-5 pt-md-8">
            <span class="mask bg-gradient-dark opacity-5"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0 align-items-center" style="color: orange;">
                            <div class="row">
                                <div class="col d-flex p-2">
                                    <b>Order Reports...</b>
                                </div>
                                
                                <div class="col col-sm-auto">
                                    <div class="d-flex align-items-center mb-2">
                                        <label class="p-2 me-2">From: </label>
                                        <input type="date" id="dateFrom" class="form-control dateFilter">
                                    </div>
                                </div>
                                <div class="col col-sm-auto">
                                    <div class="d-flex align-items-center mb-2">
                                        <label class="p-2 me-2">To: </label>
                                        <input type="date" id="dateTo" class="form-control dateFilter">
                                    </div>
                                </div>

                                <div class="col col-sm-auto">
                                    <div class="input-group input-group-md mb-2">
                                        <input type="text" class="form-control" id="searchOrder"
                                            placeholder="Search Product" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-md btn-outline-primary" onclick="searchOrder()"
                                                type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-success" scope="col">Order Code</th>
                                        <th scope="col">Items</th>
                                        <th class="text-success" scope="col">Total Price</th>
                                        <th scop="col">Date</th>
                                        <th scope="col">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="orderTable">
                                    <?php
                                    $query = $conn->query("SELECT * FROM sales ORDER BY id DESC");
                                    // $checkout_ids = [];
                                    // $totalprice = 0;
                                    // $total_items = 0;
                                    // while ($row = $query->fetch_assoc()) {
                                    //     $checkout_id = $row['checkout_id'];
                                    //     if (!isset($checkout_ids[$checkout_id])) {
                                    //         $checkout_ids[$checkout_id] = [
                                    //             'checkout_id' => $row['checkout_id'],
                                    //             'total_price' => 0,
                                    //             'date' => $row['date'],
                                    //             'invoice_id' => $row['invoice_id'],
                                    //             'item_count' => 0,
                                    //         ];
                                    //     }
                                    //     $totalprice = $row['quantity'] * $row['price'];
                                    //     $checkout_ids[$checkout_id]['total_price'] += $totalprice;
                                    //     $checkout_ids[$checkout_id]['item_count'] += $row['quantity'];
                                    // }

                                    // //   print_r($checkout_ids);
                                    // foreach ($checkout_ids as $checkout_id => $data) {
                                        ?>
                                        <!-- <tr>
                                            <td></td>
                                            <td><?= $data['checkout_id'] ?></td>
                                            <td><?= $data['item_count'] ?></td>
                                            <td>₱ <?= number_format($data['total_price'], 2) ?></td>
                                            <td><?= date("M d, Y", strtotime($data['date'])) ?></td>
                                            <td>
                                                <button data-ordered-id="<?= $checkout_id ?>" data-toggle='modal'
                                                    data-target='#checkOrder'
                                                    class='btn btn-sm btn-info check_order'>Check</button>
                                            </td>
                                            <td></td>
                                        </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php
            require_once ('components/_footer.php');
            ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once ('components/_scripts.php');
    ?>
</body>

</html>