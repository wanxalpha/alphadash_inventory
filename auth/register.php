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

// if (isset($_POST['login'])) {

// }
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login | HRMS Admin</title>

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
                                <img alt="" src="assets/img/avatars/logo.png" style="width: 50%; height:80%;">
                            </div>
                            <!-- /Logo -->

                                <form method="POST" enctype="multipart/form-data" id="add_emp_form" action="../admin/controller/ajax/add_function/add_admin.php">
                                    <div class="row mb-4">
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Employee ID<span class="text-danger">*</span></label>
                                            <input name="emp_id" id="add_emp_id" required class="form-control" type="text" onchange="check_id()">
                                        </div>
                                        <div class="col-md-6 mb-0">
                                            <label for="emailExLarge" class="form-label">First Name<span class="text-danger">*</span></label>
                                            <input name="first_name" id="add_fist_name" required class="form-control" type="text">
                                        </div>
                                        <div class="col-md-6 mb-0">
                                            <label for="emailExLarge" class="form-label">Last Name<span class="text-danger">*</span></label>
                                            <input name="last_name" id="add_last_name" required class="form-control" type="text">
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Company Names<span class="text-danger">*</span></label>
                                            <input name="com_name" required class="form-control" type="name">
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Company Email<span class="text-danger">*</span></label>
                                            <input name="com_email" required class="form-control" type="email">
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Contact<span class="text-danger">*</span></label>
                                            <input name="contact" required class="form-control" type="text">
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Address 1<span class="text-danger">*</span></label>
                                            <input name="address_1" required class="form-control" type="text">
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Address 2<span class="text-danger">*</span></label>
                                            <input name="address_2" required class="form-control" type="text">
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Address 3<span class="text-danger">*</span></label>
                                            <input name="address_3" required class="form-control" type="text">
                                        </div>
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Password<span class="text-danger">*</span></label>
                                            <input name="password" id="password" required class="form-control" type="text">
                                        </div> 
                                        <div class="col-md-12 mb-0">
                                            <label for="emailExLarge" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                                            <input name="com_password" id="com_password" required class="form-control" type="text" onkeydown="check_password()">
                                        </div>
                                    </div>

                            <div class="modal-footer">
                                <button type="submit" name="add_employee" id="add_emp_button" class="btn btn-primary submit-btn">Save</button>
                                <button type="button" id="loadbutton" style="display:none;" class="btn btn-primary submit-btn"><i class="fa fa-circle-o-notch fa-spin"></i></button>
                            </div>
                            <!-- <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="add_employee" id="add_emp_button">Submit</button>
                            </div> -->
                            </form>
                        </div>
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
        function check_password(){
            var pass1 = $('#password').val();
            var pass2 = $('#com_password').val();

            if(pass1 != $pass2){
                console.log("wrong");
                $("#add_emp_button").attr("disabled","disabled");
            }
        }


        function check_id() {
            var emp_id = $('#add_emp_id').val();
            console.log(emp_id);

            var url = "../admin/controller/ajax/employee/check_id.php";

            $.get(url, {
                    emp_id: emp_id
                })
                .done(function(data) {
                    if (data) {
                        console.log(data);
                        var len = JSON.parse(data);
                        var status = len.success;

                        if (status == 1) {
                            var num = len.num_rows;
                            console.log(num);
                            if (num > 0) {
                                alert("This Employee ID is existed");
                                $('#add_emp_id').css('border-color', 'red');
                            } else {
                                console.log("new user");
                                $('#add_emp_id').css('border-color', '');
                            }
                        }
                    }
                })
        }
        
        $(document).ready(function() {
            $("#department").change(function() {
                // department = $('#department').val();
                var department = $(this).val();

                console.log(department);
                if (department != "") {

                    var url = "../admin/controller/ajax/check_emp/sel_post.php";

                    $.get(url, {
                            department: department
                        })
                        .done(function(data) {
                            if (data) {
                                console.log(data);
                                $("#designation").empty();
                                var len = JSON.parse(data);
                                for (var i = 0; i < len.length; i++) {
                                    var id = len[i]['id'];
                                    var post = len[i]['name'];

                                    $("#designation").append("<option value='" + id + "'>" + post + "</option>");
                                }

                            } else {
                                console.log('no data');
                            }
                        })
                }
            })
        });
    </script>
</body>

</html>