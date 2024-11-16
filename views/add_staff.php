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
              <form id="add_staff" method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Staff Number</label>
                    <input type="number" name="staff_number" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Staff Name</label>
                    <input type="text" name="staff_name" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-3">
                    <label>Staff Type</label>
                    <select class="form-control" id="staffType" name="staff_type" aria-label="Default select example">
                      <option selected hidden>Choose Category</option>
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
                  <div class="col-md-3">
                    <label>Branch Type</label>
                    <select class="form-control" id="branchType" name="branch_type" aria-label="Default select example">
                      <option selected hidden>Choose Branch</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Staff Username</label>
                    <input type="text" name="staff_username" class="form-control" value="">
                  </div>
                  <div class="col-md-5">
                    <label>Staff Password</label>
                    <input type="password" name="staff_password" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addStaff" value="Submit" class="btn btn-success" value="">
              </form>
              <input type="button" onclick="window.history.go(-1)" value="Cancel" class="btn btn-outline-warning" value="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#staffType').change(function(){
        var staffType = $(this).val();
        $.ajax({
          url: '../assets/db/get_branches.php',
          type: 'GET',
          dataType: 'json',
          data: {
            staffType: staffType
          },
          success: function(response){
            $('#branchType').empty();
            $.each(response, function(key, value){
              $('#branchType').append(`
                <option value="${value.id}">${value.branch_name}</option>
              `);
            });
          }
        });
      });
    });
  </script>
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