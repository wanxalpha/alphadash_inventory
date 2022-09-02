<?php
include_once("../../../include/config.php");

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

//personal information	
$fullname = htmlspecialchars($_POST['fullname']);
$gender = htmlspecialchars($_POST['gender']);
$email = htmlspecialchars($_POST['email']);
$birthday = htmlspecialchars($_POST['birthday']);
$identity = htmlspecialchars($_POST['identity']);
$phone = htmlspecialchars($_POST['mobile']);
$department = htmlspecialchars($_POST['department']);
$designation = htmlspecialchars($_POST['designation']);
$home_tel = htmlspecialchars($_POST['home_tel']);
$address = htmlspecialchars($_POST['per_address']);
$cor_address = htmlspecialchars($_POST['cor_address']);
$country = htmlspecialchars($_POST['country']);
// $international = htmlspecialchars($_POST['passport']);
// $local = htmlspecialchars($_POST['card']);
$race = htmlspecialchars($_POST['race']);
$religion = htmlspecialchars($_POST['religion']);
$epf_no = htmlspecialchars($_POST['epf_no']);
$socso_no = htmlspecialchars($_POST['socso']);
$eis_no = htmlspecialchars($_POST['eis_no']);
$tax_no = htmlspecialchars($_POST['tax_no']);
$marital = htmlspecialchars($_POST['marital']);

if ($marital == 1) {
    $spouse = "no";
    $children = "0";
} else {
    $spouse = htmlspecialchars($_POST['spouse']);
    $children = htmlspecialchars($_POST['children']);
}

$permit_from = htmlspecialchars($_POST['permit_from']);
$permit_to = htmlspecialchars($_POST['permit_to']);
$ec1_name = htmlspecialchars($_POST['ec1_name']);
$ec1_relationship = htmlspecialchars($_POST['ec1_relation']);
$ec1_contact = htmlspecialchars($_POST['ec1_contact']);
$ec2_name = htmlspecialchars($_POST['ec2_name']);
$ec2_relationship = htmlspecialchars($_POST['ec2_relation']);
$ec2_contact = htmlspecialchars($_POST['ec2_contact']);
$emp_code = htmlspecialchars($_POST['emp_code']);

$profile_pic = $_FILES['picture_image']['name'];
if($profile_pic != ""){
    $profile_pic = strtotime($now);
	$final_file = str_replace(' ', '-', $profile_pic);
	$profile_name = $final_file . '.jpg';

    $location = "../../../upload/profile/".$profile_name;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    $valid_extensions = array("jpg","jpeg","png","pdf");
    $pic_status = 0;
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
        if(move_uploaded_file($_FILES['picture_image']['tmp_name'],$location)){
                $pic_status = 1;
        }else{
            $pic_status = 0;
        }
    }
}else{
    $sql_profile = "SELECT * FROM employees WHERE f_emp_id='$emp_code'";
    $result_profile = mysqli_query($conn, $sql_profile);
    $rows_profile = mysqli_fetch_array($result_profile);
    $profile_name = $rows_profile['f_picture'];
    // $profile_name = "none";
}

$personal = $_FILES['identity_file']['name'];
if($personal != ""){
    $personal_name = $emp_id . '-personal.pdf';
    $location = "../../../upload/personal/".$personal_name;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    $valid_extensions = array("jpg","jpeg","png","pdf");
    $pic_status = 0;
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
        if(move_uploaded_file($_FILES['identity_file']['tmp_name'],$location)){
                $pic_status = 1;
        }else{
            $pic_status = 0;
        }
    }
}else{
    $sql_personal = "SELECT * FROM employees WHERE f_emp_id='$emp_code'";
    $result_personal = mysqli_query($conn, $sql_personal);
    $rows_personal = mysqli_fetch_array($result_personal);
    $personal_name = $rows_personal['f_identity_img'];
}

$permit = $_FILES['permit_file']['name'];
if($permit != ""){
    $permit_name = $emp_id . '-permit.pdf';
    $location = "../../../upload/work_permit/".$permit_name;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    $valid_extensions = array("jpg","jpeg","png","pdf");

    $pic_status = 0;
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
        if(move_uploaded_file($_FILES['permit_file']['tmp_name'],$location)){
                $pic_status = 1;
        }else{
            $pic_status = 0;
        }
    }
}else{
    $sql_permit = "SELECT * FROM employees WHERE f_emp_id='$emp_code'";
    $result_permit = mysqli_query($conn, $sql_permit);
    $rows_permit = mysqli_fetch_array($result_permit);
    $permit_name = $rows_permit['f_permit_picture'];
}


$sql = "UPDATE employees SET f_picture='$profile_name', f_full_name='$fullname', f_gender='$gender', f_email='$email', f_birth_date='$birthday', f_identity='$identity', f_contact='$phone', f_home_tel='$home_tel', f_address='$address', f_cor_address='$cor_address', f_country='$country', f_race='$race', f_religion='$religion', f_marital='$marital', f_spouse='$spouse', f_children='$children', f_department='$department', f_designation='$designation', f_permit_from='$permit_from', f_permit_to='$permit_to', f_permit_picture='$permit_name', f_ec1_name='$ec1_name', f_ec1_relationship='$ec1_relationship', f_ec1_contact='$ec1_contact', f_ec2_name='$ec2_name', f_ec2_relationship='$ec2_relationship', f_ec2_contact='$ec2_contact', f_modified_date='$now' WHERE f_emp_id='$emp_code'";
$result = mysqli_query($conn, $sql);

$sql2 = "UPDATE bank_slip SET f_epf='$epf_no', f_socso='$socso_no', f_tax='$tax_no', f_eis='$eis_no', f_modified_date='$now' WHERE f_emp_id='$emp_code'";
$result2 = mysqli_query($conn, $sql2);

if ($result && $result2) {
    $sql_id = "SELECT * FROM employees WHERE f_emp_id='$emp_code'";
    $result_id = mysqli_query($conn, $sql_id);
    $rows_id = mysqli_fetch_array($result_id);
    $emp_id = $rows_id['f_id'];

    echo $emp_id;
} else {
    echo '0';
}

$dbh = null;

?>
