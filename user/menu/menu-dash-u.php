<?php
session_start();
include_once("../include/config.php");
if (strlen($_SESSION['userlogin']) == 0) {
	header('location:../../auth/login.php');
}

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curtime = date("H:i", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);
$today = date("d-M-Y", $t);
$month = date("M", $t);
$startOfDay = date("Y-m-d 00:00:00");
$endOfDay = date("Y-m-d 23:59:59");

// $member_id = $_SESSION['member_id'];
$username = $_SESSION['userlogin'];

$sql = "SELECT * FROM employees WHERE f_com_email='$username'";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
$emp_id = $row['f_id'];
$emp_name = $row['f_full_name'];
$emp_code = $row['f_emp_id'];
$designation = $row['f_designation'];
$emp_pic = $row['f_picture'];

$sql2 = "SELECT * FROM designations WHERE f_id='$designation'";
$results2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($results2);
$post_name = $row2['f_position'];

$sql3 = "SELECT * FROM login_time WHERE f_emp_id='$emp_id' AND f_created_date BETWEEN '$startOfDay' AND '$endOfDay' ORDER BY f_id DESC LIMIT 1";
// echo $sql3; exit;
$results3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($results3);
$clock_in = $row3['f_clock_in'];

if($clock_in == "null" || $clock_in == ""){
  header('location:../../auth/login.php');
}
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Alphadash</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <!--calendar CSS-->
    <link rel="stylesheet" href="../assets/lib/main.css" />
    <script src="../assets/lib/main.js"></script>

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

    <!--calendar-->
    
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <span class="app-brand-logo demo">
            <a href="dashboard-a.html" >
              
                <img alt="" src="../assets/img/avatars/logo.png" style="margin-left:50px; height:100px; width:110px;">
             
            </a>
            </span>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="profile-card">
              <div class="profile-image">
                <img alt="" src="../../admin/upload/profile/<?php echo $emp_pic?>" style="border-radius:100%; height:100px; width:100px;">
              </div>
              <div class="profile-info">
                  <h3>
                      <?php echo $emp_name?>
                  </h3>
                  <small>
                      <?php echo $post_name?>
                  </small>
              </div>
          </div>

          <!-- <div class="menu-inner-shadow"></div> -->

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Dashboard</span></li>

            <li class="menu-item">
                <a href="../dashboard/dashboard-a.php" target="_blank" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Human Resource</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="../../sales_marketing/resource/dashboard/index.php" target="_blank" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Sales & Marketing</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="../dashboard/dashboard-a.php" target="_blank" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Project Management</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>

            <!-- Layouts -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-folder"></i>
                    <div data-i18n="Layouts">Application Form</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="../employee/leaves.php" class="menu-link">
                            <div data-i18n="Without navbar">Leave</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../employee/claims.php" class="menu-link">
                            <div data-i18n="Fluid">Monthly Claim</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../employee/purchase.php" class="menu-link">
                            <div data-i18n="Fluid">Purchase Requisition</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="../employee/facility.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Documentation">Facility Booking</div>
              </a>
            </li>
            <li class="menu-item">
                <a href="../employee/quotes.php" class="menu-link">
                <i class="menu-icon tf-iconsbx bx bx-book-open"></i>
                <div data-i18n="Documentation">Quote</div>
              </a>
            </li>
            <li class="menu-item">
                <a href="../employee/handbook.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Employee Handbook</div>
              </a>
            </li>

          
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <!-- <li class="menu-item">
              <a href="" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog me-2"></i>
                <div data-i18n="Support">Setting</div>
              </a>
            </li> -->
            <li class="menu-item">
                <a href="../../auth/logout.php" class="menu-link">
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

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
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
                      <img src="../../admin/upload/profile/<?php echo $emp_pic?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../admin/upload/profile/<?php echo $emp_pic?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $emp_name?></span>
                            <small class="text-muted"><?php echo $post_name?></small>
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
                    <!-- <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li> -->
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../../auth/logout.php">
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

          <!-- / Navbar -->