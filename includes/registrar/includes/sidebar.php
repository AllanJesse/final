<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboard</li>
                                <li>
                                    <a href="index.php" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Departments</li>
                                <li>
                                    <?php
                    
                                        $query = "SELECT * FROM departments";
                                        $result = mysqli_query($con, $query);
                                        if(!$result){
                                            die("QUERY FAILED" . mysqli_error($con));
                                        }
                                    ?>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-study"></i>
                                        All Departments
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>

                                    <ul>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <li>
                                            <a href="<?php echo $row['url'];?>">
                                                <i class="metismenu-icon"></i>
                                                <?php echo $row['depart_name']; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </li>


                                <li  >
                                    <a href="add_depart.php">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Add Departments
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Files</li>
                                <li>
                                    <a href="upload.php">
                                        <i class="metismenu-icon pe-7s-file"></i>
                                        File Upload
                                    </a>
                                </li>
                                <li>
                                    <a href="uploads.php">
                                        <i class="metismenu-icon pe-7s-cloud-upload"></i>
                                        View Uploaded Files
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Users</li>
                                <li>
                                    <a href="user.php">
                                        <i class="metismenu-icon fas fa-users">
                                        </i>View All Users
                                    </a>
                                </li>
                                <li>
                                    <a href="add_user.php">
                                        <i class="metismenu-icon fa fa-fw fa-user">
                                        </i>Add User
                                    </a>
                                </li>
                                <li>
                                    <a href="profile.php">
                                        <i class="metismenu-icon pe-7s-user">
                                        </i>Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>