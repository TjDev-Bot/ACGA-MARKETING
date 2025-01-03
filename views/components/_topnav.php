
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <?php 
                $branch_name = "";
                if($user_type != 0){
                    $branch_name = $conn->query("select branch_name from branches where branch_id = '$user_type'")->fetch_assoc()['branch_name'];
                }else{
                    $branch_name = ' ';
                }
            ?>
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php"><?= $branch_name ?> <?=$user_id == 1 ? 'Admin' : 'Branch'?> Dashboard</a>
            <!-- Form -->

            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="assets/img/theme/2.png">
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?=ucwords($username)?></span>
                            </div>
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
                        <a href="../assets/db/logout.php" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
