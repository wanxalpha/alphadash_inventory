<?php

$file_role = $_SESSION['role'] == 'User' ? 'user' : 'admin';

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Alphadash</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/fontawesome/css/regular.min.css">
    <link rel="stylesheet" href="../../assets/vendor/fontawesome/css/solid.min.css">


    <!--calendar CSS-->
    <link rel="stylesheet" href="../../assets/lib/main.css" />
    <script src="../../assets/lib/main.js"></script>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
    <link rel="stylesheet" href="../../assets/vendor/libs/sweet-alert/dist/sweetalert2.min.css">

    <!--calendar-->

</head>

<body>
    <!-- Layout wrapper -->
    
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="../dashboard/setting.php">

                        <img alt="" src="../../../<?php echo $file_role ?>/assets/img/avatars/<?php echo $company_logo ?>" style="margin-left:50px; height:100px; width:110px;">
                        

                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="profile-card">
                    <div class="profile-image">
                        <img alt="" src="../../../<?php echo $file_role ?>/upload/profile/<?php echo $emp_pic ?>" style="border-radius:100%; height:100px; width:100px;">
                    </div>
                    <div class="profile-info">
                        <h3>
                            <?php echo $emp_name ?>
                        </h3>
                        <small>
                            <?php echo $post_name ?>
                        </small>
                        <h5>
                            <?php echo $_SESSION['role'] ?>
                        </h5>
                        <br>
                        <?php if($_SESSION['designation_name']){?>
                            <small>
                                <?php echo $_SESSION['designation_name'] ?>
                            </small>
                        <?php } ?>
                    </div>
                </div>

                <!-- <div class="menu-inner-shadow"></div> -->

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->

                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Dashboard</span></li>

                    <li class="menu-item">
                        <a href="../dashboard/index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Inventory</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>

                    <?php if($_SESSION['designation'] == '4'){ ?>
                    <!-- merchant -->
                        <li class="menu-item">
                            <a href="../available_stock/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                                <div data-i18n="Documentation">Available Stock</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="../stock_in/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                                <div data-i18n="Documentation">Stock In</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="../stock_out/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar me-2"></i>
                                <div data-i18n="Documentation">Stock Out</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="../stock_out_by_customer/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar me-2"></i>
                                <div data-i18n="Documentation">Stock Out By Customer</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="../merchant_customer/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                                <div data-i18n="Documentation">Customer List</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="../refund/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar me-2"></i>
                                <div data-i18n="Documentation">Stock Return</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="../inventory_account/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar me-2"></i>
                                <div data-i18n="Documentation">Stakeholders</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="../product/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar me-2"></i>
                                <div data-i18n="Documentation">Product</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Setting</div>
                            </a>

                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="../product_category/index.php" class="menu-link">
                                        <div data-i18n="Blank">Product Category</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="../stakeholder_category/index.php" class="menu-link">
                                        <div data-i18n="Blank">Stakeholder Category</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } elseif ($_SESSION['designation'] == '3') {?>
                    <!-- supplier -->
                        <li class="menu-item">
                            <a href="../stock_out_supplier/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                                <div data-i18n="Documentation">Stock Out</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="../refund/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar me-2"></i>
                                <div data-i18n="Documentation">Stock Return</div>
                            </a>
                        </li>
                    <?php } elseif ($_SESSION['designation'] == '2') {?>
                    <!-- retailer -->
                        <li class="menu-item">
                            <a href="../available_stock_customer/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                                <div data-i18n="Documentation">Available Stock</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="../retailer_customer/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                                <div data-i18n="Documentation">Customer List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="../stock_in_customer/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                                <div data-i18n="Documentation">Stock In</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="../stock_out_customer/index.php" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                                <div data-i18n="Documentation">Stock Out</div>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
                    <!-- <li class="menu-item">
                        <a href="#" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog me-2"></i>
                            <div data-i18n="Support">Setting</div>
                        </a>
                    </li> -->
                    <li class="menu-item">
                        <a href="../../../auth/logout.php" class="menu-link">
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
                                        <img src="../../../../<?php echo $file_role ?>/upload/profile/<?php echo $emp_pic ?>" alt class="w-px-40 h-auto rounded-circle" />
                                        
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="../../../<?php echo $file_role ?>/upload/profile/<?php echo $emp_pic ?>" alt class="w-px-40 h-auto rounded-circle" />
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
                                        <a class="dropdown-item" href="../dashboard/myprofile.php">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="../dashboard/setting.php">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="../../../auth/logout.php">
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