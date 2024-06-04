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
            <a href="add_customer.php" class="btn btn-outline-warning">
              <i class="fas fa-user-plus"></i> Add New Customer
            </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Ace Batingal</td>
                    <td>0912334440</td>
                    <td>ace@gmail.com</td>
                    <td><button class="btn btn-info">Edit</button></td>
                  </tr>
                  <tr>
                    <td>Edlian Baran</td>
                    <td>091244444</td>
                    <td>baran@gmail.com</td>
                    <td><button class="btn btn-info">Edit</button></td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>09123444121</td>
                    <td>doe@gmail.com</td>
                    <td><button class="btn btn-info">Edit</button></td>
                  </tr>
                  <tr>
                    <td>Werner Keanu</td>
                    <td>09123344220</td>
                    <td>werner@gmail.com</td>
                    <td><button class="btn btn-info">Edit</button></td>
                  </tr>
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