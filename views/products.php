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
                            <a href="add_product.php" class="btn btn-outline-warning">
                                <i class="fas fa-utensils"></i> Add New Product
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="productTable">
                                    
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