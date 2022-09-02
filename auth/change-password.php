<?php
session_start();
// error_reporting(0);
include_once("config.php");

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curtime = date("H:i", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

$reset_code = $_GET['code'];

if (isset($_POST['login'])) {

    $newpass = htmlspecialchars($_POST['new_password']);
    $conpass = htmlspecialchars($_POST['confirm_password']);
    $recode = htmlspecialchars($_POST['reset_code']);

    if($newpass != "" || $conpass != ""){
        if($newpass == $conpass){
            // echo "ok";
            $query = "SELECT * FROM employees WHERE f_password='$recode' AND f_delete='N'";
            $result = mysqli_query($conn, $query);
            $num = mysqli_num_rows($result);
    
            if ($num == 1) {
                // echo "ok2";
                $row = mysqli_fetch_array($result);
                $emp_id = $row['f_id'];
                $emp_level = $row['f_user_level'];
                $emp_email = $row['f_com_email'];
    
                // $sql = "INSERT INTO login_time (f_emp_id, f_clock_in, f_created_date, f_modified_date) VALUES ('$emp_id', '$curtime', '$now', '$now')";
                $sql = "UPDATE employees SET f_password='$newpass', f_modified_date='$now' WHERE f_password='$recode'";
                $result = mysqli_query($conn, $sql);
    
                $_SESSION['member_id'] = $member_id;
                $_SESSION['userlogin'] = $emp_email;
    
                if ($emp_level == "Admin") {
                    header('Location:  ../admin/dashboard/dashboard-a.php');
                } else {
                    header('Location:  ../user/dashboard/dashboard-u.php');
                }
            } else {
    
                echo '
                <script>
                    alert("Incorrect Username or Password");
                    window.location = "";
                </script>
                ';
            }
        }
    }else{
        echo '
        <script>
            alert("Please Enter The New Password");
            window.location = "";
        </script>
        ';
    }  
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login | HRMS Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

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

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->
    <div class="bg-img">
        <div class="container-xxl">

            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card2">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <img alt="" src="assets/img/avatars/logo.png" style="width: 50%;  height:80%;">
                            </div>
                            <!-- /Logo -->

                            <form class="mb-3" action="" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">New Password</label>
                                    <input type="text" class="form-control" id="new_password" name="new_password" placeholder="Please enter new password" />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Confirm Password</label>
                                        <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Please confirm password" />
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="reset_code" name="reset_code" placeholder="Please confirm password" value="<?php echo $reset_code ?>" hidden/>
                                <span id="message"></span>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit" name="login"> Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>

    </script>
</body>

</html>