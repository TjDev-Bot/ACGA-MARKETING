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
        <div style="background-image: url(assets/img/theme/ag.jpg); background-size: cover;" class="header pb-8 pt-5 pt-md-8">
            <span class="mask bg-gradient-dark opacity-5"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--9">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header" style="height: 0px; border: 0;">
                            <div class="row">
                                <div class="col">
                                    <h3 class="text-bold text-start">Products</h3>
                                </div>
                                <div class="col col-sm-5">
                                    <div class="input-group input-group-sm mb-3">
                                        <input type="text" class="form-control" placeholder="Search Product" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-outline-primary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-0">

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-header" style="height: 0px; border: 0;">
                            <h3 class="text-bold text-center">Checkout</h3>
                        </div>
                        <div class="card-body border-0">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col-auto">Product Name</th>
                                            <th scope="col-auto">Quantity</th>
                                            <th scope="col-auto">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Test Product</td>
                                            <td>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-primary" id="inputGroup-sizing-sm" type="button">-</button>
                                                    </div>
                                                    <input type="number" class="form-control input-sm text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 10px;" min="0">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" id="inputGroup-sizing-sm" type="button">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>500</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <h5>Sub Total: </h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>500</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Tax: <span style="color: green; text-decoration: underline;">4%</span></h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>3</h5>
                                </div>
                            </div>
                            <div class="row total">
                                <div class="col">
                                    <h5><b>Total</b></h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5 style="color:green;">503</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end mt-3">
                <div class="col-md-auto">
                    <button class="btn btn-lg btn-outline-danger" type="button">Cancel Order</button>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-lg btn-outline-info" type="button">Hold Order</button>
                </div>
                <div class="col col-lg-3">
                    <button class="btn btn-lg btn-success w-100" type="button">Checkout</button>
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