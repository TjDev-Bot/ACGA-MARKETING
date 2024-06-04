<!DOCTYPE html>
<html>
<head>
<style>
    /* Custom CSS for the navigation bar */
    .custom-navbar {
      background-color: #002C3E; /* Dark black background color */
      /* color: #fff !important; White font color */
    }
    .yellow-icon {
      color: yellow !important;
    }
    .orange-icon {
      color: orange !important;
    }
    .center-image {
      display: flex;
      align-items: center;
    }
  </style>
</head>
<body>

<?php


?>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light custom-navbar" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0 center-image" href="dashboard.php">
        LOGO
      <!-- <img src="" class="navbar-brand-img" alt="..."> -->
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="change_profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.php">
                <img src="assets/img/brand/1.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php" style="color: #fff;">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="inventory.php" style="color: #fff;">
              <i class="fas fa-warehouse text-primary"></i> Inventory
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="customes.php" style="color: #fff;">
              <i class="fas fa-users text-primary"></i> Customers
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="products.php" style="color: #fff;">
              <i class="ni ni-bullet-list-67 text-primary"></i>Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payments.php" style="color: #fff;">
              <i class="ni ni-credit-card text-primary"></i> Payments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php" style="color: #fff;">
              <i class="ni ni-cart text-primary"></i> Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receipts.php" style="color: #fff;">
              <i class="fas fa-file-invoice-dollar text-primary"></i> Receipts
            </a>
          </li>
      </ul>
      <!-- Divider -->
      <hr class="my-3">
      <!-- Heading -->
      <h6 class="navbar-heading text-muted" style="color: #fff;">Reporting</h6>
      <!-- Navigation -->
      <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
          <a class="nav-link" href="orders_reports.php" style="color: #fff;">
          <i class="fas fa-shopping-basket yellow-icon"></i> Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="payments_reports.php" style="color: #fff;">
          <i class="fas fa-funnel-dollar yellow-icon"></i> Payments
          </a>
        </li>
      </ul>
      <hr class="my-3">
      <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
          <a class="nav-link" href="../assets/db/logout.php" style="color: #fff;">
          <i class="fas fa-sign-out-alt orange-icon"></i> Log Out
          </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



</body>
</html>