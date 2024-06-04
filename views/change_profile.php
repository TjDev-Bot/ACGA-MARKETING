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

        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
            style="min-height: 600px; background-image: url(assets/img/theme/1.png); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello John Doe</h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can customize your profile as you
                            want And also update account password.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="assets/img/theme/2.png" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                        </div>
                                        <div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    John Doe</span>
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i> johndoe@gmail.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My account</h3>
                                </div>
                                <div class="col-4 text-right">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">User Name</label>
                                                <input type="text" name="admin_name" value="" id="input-username"
                                                    class="form-control form-control-alternative" ">
                      </div>
                    </div>
                    <div class=" col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email
                                                        address</label>
                                                    <input type="email" id="input-email" value="" name="admin_email"
                                                        class="form-control form-control-alternative">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="submit" id="input-email" name="ChangeProfile"
                                                        class="btn btn-warning form-control-alternative" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form method=" post">
                                <h6 class="heading-small text-muted mb-4">Change Password</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Old
                                                    Password</label>
                                                <input type="password" name="old_password" id="input-username"
                                                    class="form-control form-control-alternative">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">New Password</label>
                                                <input type="password" name="new_password"
                                                    class="form-control form-control-alternative">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Confirm New
                                                    Password</label>
                                                <input type="password" name="confirm_password"
                                                    class="form-control form-control-alternative">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="submit" id="input-email" name="changePassword"
                                                    class="btn btn-warning form-control-alternative"
                                                    value="Change Password">
                                            </div>
                                        </div>
                                    </div>
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
  require_once('components/_sidebar.php');
  ?>
</body>

</html>