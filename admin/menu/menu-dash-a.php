<?php
session_start();
error_reporting(1);
include_once("../include/config.php");
if (strlen($_SESSION['userlogin']) == 0) {
    header('location:../auth/login.php');
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
$startofday = date("Y-m-d 00:00:00", $t);
$endofday = date("Y-m-d 23:59:59", $t);
$todate = date("jS F Y", $t);
// echo $t;
// $member_id = $_SESSION['member_id'];
$username = $_SESSION['userlogin'];
$alert = $_SESSION['alert_session'];
$company_id = $_SESSION['company'];

// echo $company_id; exit;

$month = date('F');

$sql = "SELECT * FROM employees WHERE f_com_email='$username'";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
$emp_id = $row['f_id'];
$emp_name = $row['f_full_name'];
$emp_code = $row['f_emp_id'];
$designation = $row['f_designation'];
$emp_pic = $row['f_picture'];
$user_level = $row['f_user_level'];

if ($emp_pic == "") {
    $emp_pic = "roger.jpeg";
}

$sql2 = "SELECT * FROM designations WHERE f_id='$designation'";
$results2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($results2);
$post_name = $row2['f_position'];

$sql3 = "SELECT * FROM login_time WHERE f_emp_id='1' AND f_created_date BETWEEN '$startofday' AND '$endofday' ORDER BY f_id DESC LIMIT 1";
// echo $sql3; exit;
$results3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($results3);
$clock_in = $row3['f_clock_in'];

$sql4 = "SELECT * FROM leaves WHERE f_status = 'pending'";
$result4 = $dbh->prepare($sql4);
$result4->execute();
$row_count = $result4->rowCount();

$sql5 = "SELECT * FROM claims WHERE f_status = 'pending'";
$result5 = $dbh->prepare($sql5);
$result5->execute();
$row_count2 = $result5->rowCount();

$sql6 = "SELECT * FROM purchase WHERE f_status = 'pending'";
$result6 = $dbh->prepare($sql6);
$result6->execute();
$row_count3 = $result6->rowCount();

$sql = "SELECT * FROM company WHERE f_id='$company_id'";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
$company_logo = $row['f_logo'];

if ($company_logo == "") {
    $company_logo = "logo.png";
}



?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Alphadash</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="../assets/css/fullcalendar.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!--calendar CSS-->
    <link rel="stylesheet" href="../assets/lib/main.css" />
    <script src="../assets/lib/main.js"></script>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <!--calendar-->

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="../employee/setting.php">
                        <i class="fa fa-edit"></i>
                        <img alt="" src="../assets/img/avatars/<?php echo $company_logo ?>" style="margin-left:50px; height:100px; width:110px;">
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <!-- <div class="profile-card">
                    <div class="profile-image">
                        <a href="../employee/emp_pers_detail.php">
                            <i class="fa fa-edit"></i>
                            <img alt="" src="../upload/profile/<?php echo $emp_pic ?>" style="border-radius:100%; height:100px; width:100px;">
                        </a>
                    </div>
                    <div class="profile-info">
                        <h3>
                            <?php echo $emp_name ?>
                        </h3>
                        <small>
                            <?php echo $post_name ?>
                        </small>
                        <h3>
                            <?php echo $user_level ?>
                        </h3>
                    </div>
                </div> -->

                <input type="text" id="load_session" name="load_session" value="<?php echo $alert ?>" hidden>

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
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Sales & Marketing</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/dashboard/index.php" class="menu-link">
                                    <div data-i18n="Blank">Sales Dashboard</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/sales_account/index.php" class="menu-link">
                                    <div data-i18n="Blank">Sales Person Account</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/product_service/index.php" class="menu-link">
                                    <div data-i18n="Without menu">Product Service</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/product_category/index.php" class="menu-link">
                                    <div data-i18n="Blank">Product Category</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/team_member/index.php" class="menu-link">
                                    <div data-i18n="Blank">Sales Team</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/sales_sector/index.php" class="menu-link">
                                    <div data-i18n="Blank">Product Sector</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/sales_person/index.php" class="menu-link">
                                    <div data-i18n="Blank">Sales Person KPI</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/sales_funnel/index.php" class="menu-link">
                                    <div data-i18n="Blank">Sales Funnel</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../../sales_marketing/resource/sales_appoinment/index.php" class="menu-link">
                                    <div data-i18n="Blank">Sales Appointment</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Project Management</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="../project_management/dashboard.php" class="menu-link">
                                    <div data-i18n="Blank">Project Dashboard</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../project_management/prodetail.php" class="menu-link">
                                    <div data-i18n="Without menu">Project Details</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../project_management/modul.php" class="menu-link">
                                    <div data-i18n="Blank">Project Module</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../project_management/approval.php" class="menu-link">
                                    <div data-i18n="Blank">Project Approval</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../project_management/setup.php" class="menu-link">
                                    <div data-i18n="Blank">Project Setup</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>

                    <!-- Layouts -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Layouts">Human Resource</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="../employee/designation.php" class="menu-link">
                                    <div data-i18n="Blank">Department & Designation</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../employee/emp_detail.php" class="menu-link">
                                    <div data-i18n="Without menu">Employee Detail</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../employee/holiday.php" class="menu-link">
                                    <div data-i18n="Blank">Holiday</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../employee/memo.php" class="menu-link">
                                    <div data-i18n="Blank">Memo / Notice</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../employee/handbook.php" class="menu-link">
                                    <div data-i18n="Blank">Employee Handbook</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-folder"></i>
                            <div data-i18n="Layouts">Application Form</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="../employee/leaves.php" class="menu-link">
                                    <div data-i18n="Without navbar">Leave</div>&nbsp;&nbsp;
                                    <?php if ($row_count > 0) {
                                    ?>
                                        <span class="badge badge-center bg-label-danger"><?php echo $row_count; ?></span>
                                    <?php
                                    }
                                    ?>

                                </a>

                            </li>
                            <li class="menu-item">
                                <a href="../employee/claim.php" class="menu-link">
                                    <div data-i18n="Fluid">Claim</div>&nbsp;&nbsp;
                                    <?php if ($row_count2 > 0) {
                                    ?>
                                        <span class="badge badge-center bg-label-danger"><?php echo $row_count2; ?></span>
                                    <?php
                                    }
                                    ?>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../employee/purchase.php" class="menu-link">
                                    <div data-i18n="Fluid">Purchase Request</div>
                                    <?php if ($row_count3 > 0) {
                                    ?>
                                        <span class="badge badge-center bg-label-danger"><?php echo $row_count3; ?></span>
                                    <?php
                                    }
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="../employee/facility.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home"></i>
                            <div data-i18n="Analytics">Facility Booking</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../employee/visitor.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div data-i18n="Analytics">Visitor Details</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../employee/vacancy.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-bell"></i>
                            <div data-i18n="Analytics">Job Vacancies</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../employee/quotes.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book-open"></i>
                            <div data-i18n="Analytics">Quotes / Proposal </div>
                        </a>
                    </li>

                    <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Sales & Marketing</span></li>

                    <li class="menu-item">
                        <a href="../../auth/logout.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                            <div data-i18n="Documentation">Sales Person</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="../../auth/logout.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                            <div data-i18n="Documentation">Sales Funnel</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="../../../sales_marketing/resource/sales_appoinment/index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                            <div data-i18n="Documentation">Sales Appointment</div>
                        </a>
                    </li> -->

                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
                    <li class="menu-item">
                        <a href="../employee/setting.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog me-2"></i>
                            <div data-i18n="Support">Setting</div>
                        </a>
                    </li>
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