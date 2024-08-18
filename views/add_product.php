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
            <div class="card-header border-0">
              <h3>Please Fill All Fields</h3>
            </div>
            <div class="card-body">
              <form id="add_product" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-4">
                    <label>Product Name</label>
                    <input type="text" name="prod_name" class="form-control" required>
                    <input type="hidden" name="user_type" value="<?= $user_type ?>" class="form-control">
                  </div>
                  <div class="col-md-5">
                    <label>Invoice Number</label>
                    <input type="text" name="prod_code" value="" class="form-control" value="" required>
                  </div>
                  <div class="col-md-3">
                    <label>Quantity</label>
                    <input type="number" name="prod_quantity" value="" class="form-control" value="" required>
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col col-md-4">
                    <label>Product Image</label>
                    <input type="file" name="prod_img" class="btn btn-outline-success form-control" value="">
                  </div>
                  <div class="col-md-2">
                    <label>Unit Price</label>
                    <input type="number" name="prod_unitprice" class="form-control" value="" required>
                  </div>
                  <div class="col-md-2">
                    <label>Retail Price</label>
                    <input type="number" name="prod_retailprice" class="form-control" value="" required>
                  </div>
                  <!-- <?php
                   if ($user_type == 1) {
                  ?>
                    <div class="col-md-3">
                      <label>Inventory Type</label>
                      <select class="form-control" name="prod_type" aria-label="Default select example" required>
                        <option selected hidden disabled>Inventory Type</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>

                  <?php } ?>  -->
                  <div class="col-md-4">
                    <label>Product Category</label>
                    <input type="text" name="prod_category" class="form-control" value="" required>
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Product Description</label>
                    <textarea rows="5" name="prod_desc" class="form-control" value="" required></textarea>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="row">
                    <div class="col">
                      <input type="submit" name="addProduct" value="Add Product" class="btn btn-success">
                    </div>
              </form>
              <div class="col">
                <input type="button" value="Cancel" onclick="window.history.go(-1)" class="btn btn-outline-warning">
              </div>
            </div>
          </div>
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