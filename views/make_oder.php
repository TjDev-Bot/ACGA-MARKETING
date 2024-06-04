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
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
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
              <form method="POST" enctype="multipart/form-data">
                <div class="form-row">

                  <div class="col-md-4">
                    <label>Customer Name</label>
                    <select class="form-control" name="customer_name" id="custName" onChange="getCustomer(this.value)">
                      <option value="">Select Customer Name</option>
                      
                        <option></option>
                    </select>
                    <input type="hidden" name="order_id" value="" class="form-control">
                  </div>

                  <div class="col-md-4">
                    <label>Customer ID</label>
                    <input type="text" name="customer_id" readonly id="customerID" class="form-control">
                  </div>

                  <div class="col-md-4">
                    <label>Order Code</label>
                    <input type="text" name="order_code" value="" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <?php
                  // $prod_id = $_GET['prod_id'];
                  // $ret = "SELECT * FROM  rpos_products WHERE prod_id = '$prod_id'";
                  // $stmt = $mysqli->prepare($ret);
                  // $stmt->execute();
                  // $res = $stmt->get_result();
                  // while ($prod = $res->fetch_object()) {
                ?>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Product Price ($)</label>
                      <input type="text" readonly name="prod_price" value="$ " class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label>Product Quantity</label>
                      <input type="text" name="prod_qty" class="form-control" value="">
                    </div>
                  </div>
                <?php 
                // } 
              ?>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="make" value="Make Order" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
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