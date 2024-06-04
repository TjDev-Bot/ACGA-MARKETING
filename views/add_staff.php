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
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Staff Number</label>
                    <input type="text" name="staff_number" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Staff Name</label>
                    <input type="text" name="staff_name" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Staff Email</label>
                    <input type="email" name="staff_email" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Staff Password</label>
                    <input type="password" name="staff_password" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addStaff" value="Add Staff" class="btn btn-success" value="">
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