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
            <?php
            if (isset($_GET['branch'])) {
                $branch = $_GET['branch'];
            }

            $get = $conn->query("SELECT branch_name FROM branches WHERE branch_id = '$branch'");
            $branch_name = $get->fetch_assoc();
            ?>
            <div class="row">
                <?php
                    if($branch == 1){
                        include('./branch_inventory/hardware.php');
                    }
                    if($branch == 2){
                        include('./branch_inventory/appliances.php');
                    }
                    if($branch == 3){
                        include('./branch_inventory/aggriculture.php');
                    }
                ?>
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