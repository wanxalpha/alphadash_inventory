<?php
session_start();
include '../connection/config.php';


$em = $_POST['em'];
$em =strtoupper($em);
$pa = $_POST['pa'];
// echo $em;
// echo $pa;
$sql = "SELECT * FROM alpha_member WHERE USER_NAME='$em' && PASS_WORD='$pa'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$num = mysqli_num_rows($result);
if ($num > 0){
        $rol = $row['ROLE_PROJECT'];
        $positionUser = $row['POSITION_USER'];
        $skillUser = $row['SKILL_USER'];
        $imagePath = $row['IMAGE_PATH'];
        $bil = $row['BIL'];
        $fullName = $row['FULL_NAME'];

        $_SESSION['role'] = $rol;
        $_SESSION['username'] = $em;
        $_SESSION['position'] = $positionUser;
        $_SESSION['bil'] = $bil;
        $_SESSION['skill'] = $skillUser;
        $_SESSION['image'] = $imagePath;
        $_SESSION['fullname'] = $fullName;
       
        if ($rol == "TEAM"){
            header("Location:../dashboard.php");
        }else if ($rol == "PROJECT MANAGER"){
            header("Location:../dashboard.php");
        }
   
	
}else{

  
    echo '<script>alert("Your username/password is not match!")</script>';
    header("Refresh:0; url=login.php");

	
}
// $result = json_encode($response);
// echo $result;
?>