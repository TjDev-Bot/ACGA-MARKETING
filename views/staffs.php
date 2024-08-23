<?php
require_once('components/_head.php');
?>
<div class="modal fade" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editStaffForm" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Staff ID</label>
                            <input type="text" name="staff_uid" id="staffUid" class="form-control" value="" hidden>
                            <input type="text" name="staff_id" id="staffId" class="form-control" value="" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Staff Name</label>
                            <input type="text" name="staff_name" id="staffName" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col col-md-6">
                            <label>Staff Username</label>
                            <input type="text" name="staff_username" id="staffUname" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
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
                    </div>
                    <div class="col-md-auto">
                        <label>Staff Status</label>
                        <select class="form-control" id="staffStatus" name="staff_status" aria-label="Default select example">
                          <option selected hidden>Choose Status</option>
                          <option value="active">Active</option>
                          <option value="disabled">Disabled</option>
                        </select>
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
              <a href="add_staff.php" class="btn btn-outline-warning">
                <i class="fas fa-user-plus"></i> Add New Staffs
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th scope="col">Staff ID</th>
                    <th class="text-success" scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th class="text-success" scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = $conn->query("SELECT * FROM staffs");
                  while ($row = $query->fetch_assoc()) {
                  ?>
                    <tr>
                      <td></td>
                      <td><?= $row['staff_id'] ?></td>
                      <td><?= ucwords($row['name']); ?></td>
                      <td><?= ucwords($row['username'])?></td>
                      <td>
                        <button class="btn btn-sm btn-info editStaff" data-toggle='modal' data-target='#editStaff' data-staff-id="<?=$row['id']?>">Edit</button>
                        <button class="btn btn-sm btn-warning deleteStaff" data-staff-uid="<?=$row['id']?>">Delete</button>
                      </td>
                    </tr>
                  <?php } ?>
                  <!-- <tr>
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
                  </tr> -->
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