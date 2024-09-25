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
            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-lg-7">
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
                            <div class="container mt-3">
                                <div class="row g-2 overflow-auto" style="height: 300px; overflow: auto">
                                    <!-- <?php
                                            for ($i = 1; $i <= 50; $i++) {
                                            ?>
                                            <div class="col col-sm-3">
                                                <div class="p-3 card shadow">
                                                    <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpGKdbvFIR82hted9BOKd81zoingkwRgr-HQ&s" alt="Card image cap">
                                                    <h6 class="card-title text-center">Card title</h6>
                                                    <button class="btn btn-primary btn-sm addCheckoutProduct" data-target-product-id="<?= $rows['id']; ?>">+ ADD</button>
                                                </div>
                                            </div>
                                        <?php } ?> -->
                                    <?php
                                    $user_type = $_SESSION['user_type'];
                                    $sql = "SELECT * FROM branch_inventory WHERE inventory_type = $user_type ORDER BY date_updated DESC";

                                    $getInv = $conn->query($sql);
                                    while ($rows = $getInv->fetch_assoc()) {
                                        if ($rows['image'] == '') {
                                            $image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpGKdbvFIR82hted9BOKd81zoingkwRgr-HQ&s';
                                        } else {
                                            $image = '../images/products/' . $rows['image'];
                                        }
                                        if($rows['quantity'] != 0){
                                    ?>
                                        <div class="col col-sm-3">
                                            <div class="p-3 card shadow">
                                                <div class="d-flex justify-content-center" style='width: 100%; height: 50px; overflow: hidden; margin-left: auto; margin-right: auto;'>
                                                    <img class="card-img-top" src="<?= $image ?>" alt="Card image cap" style='width: 100%; height: 100%; object-fit: cover; '> 
                                                </div>
                                                <!-- <img class="" src="<?= $image ?>" alt=""> -->
                                                <h6 class="card-title text-center"><?= ucwords($rows['name']) ?></h6>
                                                <button class="btn btn-primary btn-sm addCheckoutProduct" data-target-product-id="<?= $rows['id']; ?>">+ ADD</button>
                                            </div>
                                        </div>
                                    <?php 

                                    }} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card shadow">
                        <div class="card-header" style="height: 0px; border: 0;">
                            <h3 class="text-bold text-center">Checkout</h3>
                        </div>
                        <div class="card-body border-0">
                            <div class="table-responsive" style="height: 250px">
                                <!-- class="table table-sm align-items-center table-striped table-hover" -->
                                <table class="table table-sm align-items-center table-striped table-hover" style="width: 100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"><b>Product Name</b></th>
                                            <th scope="col"><b>Quantity</b></th>
                                            <th scope="col"><b>Price</b></th>
                                        </tr>
                                    </thead>
                                    <tbody id="checkoutTable" class="overflow-auto">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <h5>Total Amount: </h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5 id="total"></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Tax: </h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>4%</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="row justify-content-end mt-3">
                <div class="col-md-auto">
                    <button class="btn btn-lg btn-outline-danger ordr cancel" type="button" disabled>Cancel Order</button>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-lg btn-outline-info ordr hold" type="button" disabled>Hold Order</button>
                </div>
                <div class="col col-lg-5">
                    <button class="btn btn-lg btn-success w-100 ordr purchase" type="button" disabled>Checkout</button>
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