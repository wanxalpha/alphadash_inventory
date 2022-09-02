<?php
	session_start();
	// error_reporting(0);
	 include_once("connection/config.php");

	mysqli_set_charset($connect, "utf8");

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$t = time();
	$now = date("Y-m-d H:i:s", $t);
	$curtime = date("H:i", $t);
	$curdate = date("Y-m-d", $t);
	$year = date("Y", $t);
	$hour = date("H", $t);
	$minute = date("i", $t);

	// // include_once("../include/config.php");
	// if(isset($_POST['login'])){
		
	// 	$username = htmlspecialchars($_POST['username']);
	// 	$password = htmlspecialchars($_POST['password']);

	// 	$query = "SELECT * FROM employees WHERE f_com_email='$username' AND f_password='$password' AND f_delete='N'"; 
	// 	$result = mysqli_query( $connect, $query ); 
	// 	$num = mysqli_num_rows( $result );

	// 	if ( $num == 1 ) {
            
  //           $row = mysqli_fetch_array( $result );
  //           $emp_id = $row['f_id'];

	// 		$query = "SELECT * FROM login_time WHERE f_emp_id='$emp_id'";
	// 		$result = mysqli_query( $connect, $query ); 
	// 		$num = mysqli_num_rows( $result );

	// 		if($num > 0){
	// 			$sql = "UPDATE login_time SET f_clock_in = '$curtime', f_modified_date = '$now' WHERE f_emp_id = '$emp_id'";
	// 			$result = mysqli_query( $connect, $sql ); 

	// 			$_SESSION['member_id'] = $member_id;
  //           	$_SESSION['userlogin'] = $username;
	// 			header('Location: ../dashboard/dashboard-a.php');
	// 		}else{
	// 			$sql = "INSERT INTO login_time (f_emp_id, f_clock_in, f_created_date, f_modified_date) VALUES ('$emp_id', '$curtime', '$now', '$now')";
	// 			$result = mysqli_query( $connect, $sql ); 

	// 			$_SESSION['member_id'] = $member_id;
  //           	$_SESSION['userlogin'] = $username;
	// 			header('Location:  ../dashboard/dashboard-a.php');
	// 		}
            
  //       } else {

  //           echo '
	// 		<script>
	// 			alert("Incorrect Username or Password");
	// 			window.location = "";
	// 		</script>
	// 		';

  //       }

	// }
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login | Project Management</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

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

              <form class="mb-3" action="in-app.php" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    name="em"
                    placeholder="text"
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="pa">Password</label>
                    <a href="forgot-password.php">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      class="form-control"
                      name="pa"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
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
                  <button class="btn btn-primary d-grid w-100" type="submit" name="login"><a href="../dashboard/dashboard-a.php"></a> Login</button>
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
  </body>
</html>
