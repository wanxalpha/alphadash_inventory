<?php
 require_once("connection/session.php");
//  include "config.php";

if (!isset($_SESSION['fullname'])){
	echo "<script>window.location.href='../auth/logout.php';</script>";
    exit;
}

 $role = $_SESSION['department'];
 $theName = $_SESSION['username'];
 $positionUser = $_SESSION['position'];
 $bil = $_SESSION['bil'];
//  $skillUser = $_SESSION['skill'];
 $imagePath = $_SESSION['image'];
 $fullName = $_SESSION['fullname'];
 $idCom = $_SESSION['idCom'];

 
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Alphadash</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/regular.min.css">
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/solid.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--calendar CSS-->
    <link rel="stylesheet" href="assets/lib/main.css" />
    <script src="assets/lib/main.js"></script>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <link rel="stylesheet" href="assets/vendor/libs/sweet-alert/dist/sweetalert2.min.css">

    <!--calendar-->

</head>

<body>
    <!-- Layout wrapper -->
    
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="dashboard-a.html">

                        <img alt="" src="assets/img/avatars/logo.png" style="margin-left:50px; height:100px; width:110px;">

                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="profile-card">
                    <div class="profile-image">
                        <img alt="" src="../upload/profile/<?php echo $emp_pic ?>" style="border-radius:100%; height:100px; width:100px;">
                    </div>
                    <div class="profile-info">
                        <h3>
                            <?php echo $fullName ?>
                        </h3>
                        <small>
                            <?php echo $positionUser ?>
                        </small>
                    </div>
                </div>

                <!-- <div class="menu-inner-shadow"></div> -->

                <ul class="menu-inner py-1">
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Project Management</span></li>

                <?php
                    if ($positionUser == "MANAGEMENT" || $positionUser == "PROJECT MANAGER" || $positionUser == "SALES"){
                ?>
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <!-- <a href="../admin/dashboard/dashboard-a.php" class="menu-link"> -->
                        <a href="../pm/dashboard.php" class="menu-link">

                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <!-- <a href="../admin/dashboard/dashboard-a.php" class="menu-link"> -->
                        <a href="../pm/prodetail.php" class="menu-link">

                            <i class="menu-icon tf-icons bx bx-chart"></i>
                            <div data-i18n="Analytics">Project Details</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <!-- <a href="../admin/dashboard/dashboard-a.php" class="menu-link"> -->
                        <a href="../pm/modul.php" class="menu-link">

                            <i class="menu-icon tf-icons bx bx-album"></i>
                            <div data-i18n="Analytics">Project Module</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <!-- <a href="../admin/dashboard/dashboard-a.php" class="menu-link"> -->
                        <a href="../pm/approval.php" class="menu-link">

                            <i class="menu-icon tf-icons bx bx-album"></i>
                            <div data-i18n="Analytics">Approval</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <!-- <a href="../admin/dashboard/dashboard-a.php" class="menu-link"> -->
                        <a href="../pm/setup.php" class="menu-link">

                            <i class="menu-icon tf-icons bx bx-cog me-2"></i>
                            <div data-i18n="Analytics">Project Setup</div>
                        </a>
                    </li>
                    <?php
                        }else if ($positionUser == "TEAM"){
                    ?>
                     <li class="menu-item">
                        <!-- <a href="../admin/dashboard/dashboard-a.php" class="menu-link"> -->
                        <a href="../pm/tdetail.php" class="menu-link">

                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <!-- <a href="../admin/dashboard/dashboard-a.php" class="menu-link"> -->
                        <a href="../pm/prodetail.php" class="menu-link">

                            <i class="menu-icon tf-icons tf-icons bx bx-folder"></i>
                            <div data-i18n="Analytics">Project Completed</div>
                        </a>
                    </li>
                    <?php
                        }
                        ?>

                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
             
                    <li class="menu-item">
                        <a href="log-app.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                            <div data-i18n="Documentation">Logout</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../upload/profile/<?php echo $emp_pic ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="../upload/profile/<?php echo $emp_pic ?>" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?php echo $emp_name ?></span>
                                                    <small class="text-muted"><?php echo $post_name ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="../employee/my_details.php">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="../auth/logout.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>