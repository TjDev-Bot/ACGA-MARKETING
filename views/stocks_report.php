<?php

require_once('components/_head.php');
?>

<body>
    <!-- Sidenav -->
    <?php
    require_once('components/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php
        require_once('components/_topnav.php');
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
                        <div class="card-header border-0" style="color: orange;">
                            <b>Stocks Report...</b>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Product Code</th>
                                        <th class="text-success" scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th class="text-success" scope="col">Unit Price</th>
                                        <th scope="col">Retail Price</th>
                                        <th class="text-success" scope="col">Quantity</th>
                                        <th scope="col">Out Branch</th>
                                        <th class="text-success" scope="col">Date Created</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $conn->query("SELECT * FROM branch_inventory ORDER BY id DESC");
                                    $query2 = $conn->query("SELECT * FROM archived_product ORDER BY id DESC");
                                    $data = [];
                                    while ($rows = $query->fetch_assoc()) {
                                        $data[] = $rows;
                                    }
                                    while ($row2 = $query2->fetch_assoc()) {
                                        $data[$rows] = $row2;
                                    }

                                    foreach ($data as $row) {
                                        switch($row['inventory_type']){
                                            case 1:
                                                $inventory_type = "Hardware Branch";
                                                break;
                                            case 2:
                                                $inventory_type = "Appliances Branch";
                                                break;
                                            case 3:
                                                $inventory_type = "Aggriculture Branch";
                                                break;
                                        }
                                    ?>
                                        <tr>
                                            <td><?= strtoupper($row['invoice_id']) ?></td>
                                            <td><?= ucwords($row['name']) ?></td>
                                            <td><?= ucwords($row['category_type']) ?></td>
                                            <td>₱ <?= number_format($row['unit_price'], 2)?></td>
                                            <td>₱ <?= number_format($row['retail_price'], 2)?></td>
                                            <td><?= $row['quantity'] ?></td>
                                            <td><?= $inventory_type ?></td>
                                            <td><?= date("M d, Y", strtotime($row['date_created']))?></td>
                                            <td><?= $row['quantity'] ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-danger">Archived</span>'?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php
            require_once('components/_footer.php');
            ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('components/_scripts.php');
    ?>
</body>

</html>