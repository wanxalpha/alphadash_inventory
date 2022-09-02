<?php
session_start();
include 'connection/config.php';


$em = $_POST['em'];
$em =strtoupper($em);
echo $em;
$pa = $_POST['pa'];
// echo $em;
// echo $pa;
$sql = "SELECT * FROM project_member WHERE f_emel='$em' AND f_password='$pa'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$num = mysqli_num_rows($result);
if ($num > 0){
        // $rol = $row['ROLE_PROJECT'];
        // $positionUser = $row['POSITION_USER'];
        // $skillUser = $row['SKILL_USER'];
        // $imagePath = $row['IMAGE_PATH'];
        // $bil = $row['BIL'];
        // $fullName = $row['FULL_NAME'];
        $depart = $row['f_department'];
        $id = $row['f_id'];
        $fullName = $row['f_name'];
        $picture = $row['f_picture'];
        $positionUser = $row['f_designation'];
        $idCom = $row['f_id_com'];

        $_SESSION['department'] = $depart;
        $_SESSION['username'] = $em;
        $_SESSION['position'] = $positionUser;
        $_SESSION['bil'] = $id;
        $_SESSION['idCom'] = $idCom;
        // $_SESSION['skill'] = $skillUser;
        $_SESSION['image'] = $picture;
        $_SESSION['fullname'] = $fullName;
       
        if ($positionUser == "TEAM"){
            header("Location:tdetail.php");
        }else if ($positionUser == "MANAGEMENT" || $positionUser == "PROJECT MANAGER" || $positionUser == "SALES"){
            header("Location:dashboard.php");
        }
   
	
}else{

    // echo $em;
    echo '<script>alert("Your username/password is not match!")</script>';
    header("Refresh:0; url=login.php");

	
}
// $result = json_encode($response);
// echo $result;
?>