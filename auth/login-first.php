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
                                <img alt="" src="assets/img/avatars/logo.png" style="width: 50%;  height:80%;">
                            </div>
                            <!-- /Logo -->

                            <form class="mb-3" action="" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">User Email</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Email" />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                        <a href="forgot-password.php">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me" />
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <!-- <button class="btn btn-primary d-grid w-100" type="submit" id="login" name="login">Login</button> -->
                                    <button class="btn btn-primary d-grid w-100" id="login" name="login">Login</button>
                                </div>
                                <!-- <div class="mb-3">
                <a class="btn btn-primary d-grid w-100" href="register.php">Register</a>
                </div> -->
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

    <script type="text/javascript">
        $(document).ready(function() {
            console.log("ready!");

            $("#login").click(function() {

                var username = $('#username').val();
                var password = $('#password').val();

                console.log(data);

                $.ajax({
                    url: 'http://localhost/Alphaweb/MainController/getUserSubscription',
                    type: "post",
                    success: function(savingStatus) {

                        var getData = JSON.parse(savingStatus);

                        console.log(getData);
                        return false;

                        $.each(getData, function(key, value) {

                            if (username == value['EMAIL'] && password == value['PASSWORD']) {
                                console.log(username);
                                console.log(value['EMAIL']);
                                $.ajax({
                                    url: "save-first.php",
                                    type: "POST",
                                    data: {
                                        FIRST_NAME: value['FIRST_NAME'],
                                        LAST_NAME: value['LAST_NAME'],
                                        COMPANY_NAME: value['COMPANY_NAME'],
                                        CONTACT_NUMBER: value['CONTACT_NUMBER'],
                                        EMAIL: value['EMAIL'],
                                        DESIGNATION: value['DESIGNATION'],
                                        PASSWORD: value['PASSWORD']
                                    },
                                    //cache: false,
                                    success: function(dataResult) {
                                        console.log("Data Save Successfull");
                                        return true;
                                    }
                                });

                            } else {
                                console.log("Error" + value['EMAIL']);
                            }

                            //console.log(k);
                            //console.log(value['EMAIL']);
                        });

                        //return false;
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert("Error encountered while saving the comments.");
                        return false;
                    }
                });

                return false;
            });


        });
    </script>
</body>

</html>