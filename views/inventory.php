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
                            <div class="col d-flex p-2">
                                <b class="text-warning">Branch Inventory...</b>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th scope="col">Branch</th>
                                        <th scope="col">Inventory Count</th>
                                        <th scope="col">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $conn->query("SELECT * FROM branches");
                                    while ($row = $query->fetch_assoc()) {
                                        $branchItems = $conn->query("SELECT * FROM branch_inventory WHERE inventory_type = $row[branch_id]");
                                        $branchItemsCount = $branchItems->num_rows;
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $row['branch_name'] ?></td>
                                            <td><?=$branchItemsCount?></td>
                                            <td><a href="specific_inventory.php?branch=<?=$row['branch_id']?>" class="btn btn-sm btn-info">Go To</a></td>
                                            <td></td>
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