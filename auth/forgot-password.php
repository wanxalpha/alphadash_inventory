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

?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

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

                            <form class="mb-3" action="" method="POST" id="update_password">
                                <div class="mb-3">
                                    <label for="email" class="form-label">User Email</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Email" />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="input-group">
                                        <input name="reset_code" id="reset_code" class="form-control" type="text">
                                        <button class="input-group-text" onclick="forpass()">Send Code</button>
                                    </div>
                                </div>
                                <label for="email" class="form-label" hidden>Code</label>
                                <input name="sent_code" id="sent_code" class="form-control" type="text" value="" hidden>
                                <span id="message"></span>
                                <input type="text" class="form-control" id="my_mail" name="my_mail" placeholder="Email" value="support@alphacoretech.net" hidden />
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="button" id="chg_pass" name="chg_pass" onclick="chgpass()"> Change Password</button>
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
        function forpass() {
            event.preventDefault();
            var from_emp = $('#my_mail').val();
            var to_emp = $('#username').val();
            var subject = "Reset password";
            // var reason = $('#approval_remarks').val();

            var url = "../admin/controller/phpmailer/reset_password.php";

            $.get(url, {
                    from_emp: from_emp,
                    to_emp: to_emp,
                    subject: subject
                    // reason: reason
                })
                .done(function(data) {
                    if (data) {
                        var len = JSON.parse(data);
                        console.log(len);
                        
                        var status = len.status;
                        var code = len.code;
                        if (status == "ok") {
                            $('#message').html("Message Sent! Please Refresh Your Outlook Email");
                            $('#sent_code').val(code);
                        } else {
                            $('#message').html("Please enter valid email!");
                        }
                    } else {
                        console.log('email error');
                    }
                })
        }

        function chgpass(){
            var reset_code = $('#reset_code').val();
            var sent_code = $('#sent_code').val();

            // console.log(reset_code);
            // console.log(sent_code);

            if(reset_code = sent_code){
                // console.log("ok");
                window.location.href="change-password.php?code="+reset_code;
            }else{
                $('message').html("Wrong Code entered, Please Check Again");
            }
        }
    </script>
</body>

</html>