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
                        <div class="card-header border-0">
                            <div class="row">
                                <div class="col d-flex p-2 align-items-center">
                                    <a href="inventory.php" class="btn btn-outline-warning">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                    <?php
                                        if (isset($_GET['branch'])) {
                                            $branch = $_GET['branch'];
                                        }

                                        $get = $conn->query("SELECT branch_name FROM branches WHERE branch_id = '$branch'");
                                        $branch_name = $get->fetch_assoc();
                                    ?>
                                    <b class="text-warning"><?=$branch_name['branch_name']?> Inventory...</b>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Product Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Retail Price</th>
                                        <th scope="col">Quantity</th>
                                        <th class="text-success" scope="col">Date Created</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $conn->query("SELECT * FROM branch_inventory WHERE inventory_type = '$branch' ORDER BY id DESC");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $row['invoice_id'] ?></td>
                                            <td><?= ucwords($row['name']) ?></td>
                                            <td><?= ucwords($row['category_type']) ?></td>
                                            <td>₱ <?= number_format($row['unit_price'], 2) ?></td>
                                            <td>₱ <?= number_format($row['retail_price'], 2) ?></td>
                                            <td><?= $row['quantity'] ?></td>
                                            <td><?= date("M d, Y", strtotime($row['date_created'])) ?></td>
                                            <td><span class="badge badge-success">Active</span></td>
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