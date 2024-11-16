<?php
require_once('components/_head.php');
?>
<div class="modal fade" id="editItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editSpecificProduct" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Product Code</label>
                            <input type="text" name="prod_id" id="prodID" class="form-control" value="" hidden>
                            <input type="text" name="prod_code" id="prodCODE" class="form-control" value="" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" name="prod_name" id="prodNAME" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col col-md-6">
                            <label>Product Retail Price</label>
                            <input type="number" name="prod_retail_price" id="prodRetailPRICE" class="form-control" value="">
                        </div>
                        <div class="col col-md-6">
                            <label>Product Unit Price</label>
                            <input type="number" name="prod_unit_price" id="prodUnitPRICE" class="form-control" value="">
                        </div>
                        <div class="col-md-12">
                            <label>Product Quantity</label>
                            <input type="number" name="prod_quantity" id="prodQUANTITY" class="form-control" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="outItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="outSpecificProduct" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Out Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Product Code</label>
                            <input type="text" name="stock_id" id="stockID" class="form-control" value="" hidden>
                            <input type="text" name="stock_code" id="stockCODE" class="form-control" value="" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" name="stock_name" id="stockNAME" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="number" name="stock_quantity" id="stockQUANTITY" class="form-control" value="" required>
                        </div>
                        <div class="col col-md-6">
                            <label>Type of Branch</label>
                            <select class="form-control" name="stock_branch" id="stockBRANCH" aria-label="Default select example" required>
                                <option selected hidden disabled>Inventory Type</option>
                                <?php 
                                    $query = $conn->query('SELECT * FROM branches');
                                    while ($row = $query->fetch_assoc()) {
                                ?>
                                    <option value="<?= $row['branch_id'] ?>"><?= $row['branch_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col col-md-12">
                            <label>Branch Name</label>
                            <select class="form-control" name="branch_name" id="branchNameStock" aria-label="Default select example" required>
                                <option selected hidden disabled>Branch Name</option>
                                <?php 
                                    $querys = $conn->query('SELECT * FROM branch_name');
                                    while ($rows = $querys->fetch_assoc()) {
                                        ?>
                                        <option data-branch-id="<?=$rows['branch_id']?>" value="<?= $rows['id'] ?>"><?= ucwords($rows['branch_name']) ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Out Stocks</button>
            </div>
            </form>
        </div>
    </div>
</div>
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
        <div style="background-image: url(assets/img/theme/ag.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
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
                        <div class="card-header border-0 align-items-center">
                            <div class="row">
                                <div class="col">
                                    <a href="add_product.php" class="btn btn-warning">
                                        Add New Product
                                    </a>
                                </div>
                                <div class="col col-sm-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Filter By Category
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <?php 
                                                if($user_type == 0){
                                                    $query = $conn->query('SELECT * FROM warehouse_inventory');
                                                }else{
                                                    $query = $conn->query('SELECT * FROM branch_inventory');
                                                }
                                                while($row = $query->fetch_assoc()){
                                                    echo "<button class='dropdown-item' type='button'>".ucfirst($row['category_type'])."</button>";
                                                }
                                            ?>
                                            <!-- <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                            <button class="dropdown-item" type="button">Something else here</button> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-auto">
                                    <div class="input-group input-group-md mb-3">
                                        <input type="text" class="form-control" id="searchProduct" placeholder="Search Product" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-outline-primary" onclick="searchProduct()" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- <div class="col col-sm-9">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" placeholder="Search Product" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-outline-primary" type="button">Search</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="table-responsive" style="height: 350px; overflow: auto">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-success" scope="col">Image</th>
                                        <th scope="col">Product Code</th>
                                        <th class="text-success" scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th class="text-success" scope="col">Unit Price</th>
                                        <th scope="col">Retail Price</th>
                                        <th class="text-success" scope="col">Quantity</th>
                                        <th class="text-success" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="productTable" >

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

    <script>
        $(document).ready(function() {
            $('#stockBRANCH').change(function() {
                var selectedBranchId = $(this).val()
                if (!selectedBranchId) {
                    $('#branchNameStock option').show();
                } else {
                    $('#branchNameStock option').each(function() {
                        if ($(this).data('branch-id') == selectedBranchId) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                }
                $('#branchNameStock').val('');
                $('#branchNameStock option:first').show();
            });
        });
    </script>
    <!-- Argon Scripts -->
    <?php
    require_once('components/_scripts.php');
    ?>

</body>

</html>