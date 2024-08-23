<?php



require_once('components/_head.php');
?>
<div class="modal fade" id="editOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="editCheckoutOrder" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive h-25">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Product Code</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody id="ordered_items">

              </tbody>
            </table>
            <input type="text" value="" id="checkoutUID" name="orderuid" hidden/>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-md">Checkout</button>
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
            <div class="card-header border-0" style="color: orange;">
              Active Hold Orders...
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><b></b></th>
                    <th scope="col"><b>Order Code</b></th>
                    <th scope="col"><b>Total Price</b></th>
                    <th scope="col"><b>Date</b></th>
                    <th scope="col"><b>Action</b></th>
                    <!-- <th scope="col"><b></b></th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = $conn->query("SELECT held_orders.*, branch_inventory.unit_price FROM held_orders INNER JOIN branch_inventory ON held_orders.product_id = branch_inventory.id ORDER BY held_orders.id DESC");
                  $checkout_ids = [];
                  $totalprice = 0;
                  while ($row = $query->fetch_assoc()) {
                    $checkout_id = $row['checkout_id'];
                    if (!isset($checkout_ids[$checkout_id])) {
                      $checkout_ids[$checkout_id] = [
                        'total_price' => 0,
                        'date' => $row['date']
                      ];
                    }
                    $totalprice = $row['quantity'] * $row['unit_price'];
                    $checkout_ids[$checkout_id]['total_price'] += $totalprice;
                  }

                  foreach ($checkout_ids as $checkout_id => $data) {
                  ?>
                    <tr>
                      <td></td>
                      <td><?= $checkout_id ?></td>
                      <td>₱ <?= number_format($data['total_price'], 2) ?></td>
                      <td><?= date("M d, Y", strtotime($data['date'])) ?></td>
                      <td>
                        <button data-order-id="<?= $checkout_id ?>" data-toggle='modal' data-target='#editOrder' class='btn btn-sm btn-outline-info edit_order'>Edit</button>
                        <button data-order-uid="<?= $checkout_id ?>" class='btn btn-sm btn-outline-warning delete_order'>Delete</button>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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