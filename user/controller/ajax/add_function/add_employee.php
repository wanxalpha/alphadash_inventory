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
// $username = htmlspecialchars($_POST['username']);
$phone = htmlspecialchars($_POST['phone']);
$home_tel = htmlspecialchars($_POST['home_tel']);
$address = htmlspecialchars($_POST['per_address']);
$cor_address = htmlspecialchars($_POST['cor_address']);
$email = htmlspecialchars($_POST['email']);
$birthday = htmlspecialchars($_POST['Birthday']);
$gender = htmlspecialchars($_POST['Gender']);
$country = htmlspecialchars($_POST['country']);
$international = htmlspecialchars($_POST['passport']);
$local = htmlspecialchars($_POST['card']);
$permit_from = htmlspecialchars($_POST['permit_from']);
$permit_to = htmlspecialchars($_POST['permit_to']);
$bank = htmlspecialchars($_POST['bank']);
$bank_branch = htmlspecialchars($_POST['bank_branch']);
$bank_acc = htmlspecialchars($_POST['bank_acc']);
$epf_no = htmlspecialchars($_POST['epf_no']);
$socso_no = htmlspecialchars($_POST['socso_no']);
$eis_no = htmlspecialchars($_POST['eis']);
$lhdn_no = htmlspecialchars($_POST['lhdn_no']);
$marital = htmlspecialchars($_POST['marital']);
$ec1_name = htmlspecialchars($_POST['ec1_name']);
$ec1_relationship = htmlspecialchars($_POST['ec1_relationship']);
$ec1_contact = htmlspecialchars($_POST['ec1_contact']);
$ec2_name = htmlspecialchars($_POST['ec2_name']);
$ec2_relationship = htmlspecialchars($_POST['ec2_relationship']);
$ec2_contact = htmlspecialchars($_POST['ec2_contact']);
$race = htmlspecialchars($_POST['race']);
$religion = htmlspecialchars($_POST['religion']);
$emp_status = htmlspecialchars($_POST['emp_status']);

//company information
$emp_id = htmlspecialchars($_POST['emp_id']);
$com_email = htmlspecialchars($_POST['com_email']);
$salary = htmlspecialchars($_POST['salary']);
$mobile_all = htmlspecialchars($_POST['mobile_all']);
$park_all = htmlspecialchars($_POST['park_all']);
$department = htmlspecialchars($_POST['department']);
$designation = htmlspecialchars($_POST['designation']);
$password = htmlspecialchars($_POST['password']);
$join_date = htmlspecialchars($_POST['join_date']);

//others information
// $row_num = htmlspecialchars($_POST['row_num']);
// $datetime = htmlspecialchars($_POST['datetime']);

/* Getting file name */
$profile_pic = $_FILES['picture_image']['name'];
$resume = $_FILES['resume_file']['name'];
$personal = $_FILES['identity_file']['name'];
$permit = $_FILES['permit_file']['name'];

if($profile_pic != ""){
    $profile_pic = strtotime($now);
	$final_file = str_replace(' ', '-', $profile_pic);
	$profile_name = $final_file . '.jpg';
}else{
    $profile_name = "none";
}

/*profile pic Location */
$location = "../../../upload/profile/".$profile_name;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png","pdf");

$pic_status = 0;
/* Check file extension */
if(in_array(strtolower($imageFileType), $valid_extensions)) {
   /* Upload file */
   if(move_uploaded_file($_FILES['picture_image']['tmp_name'],$location)){
        $pic_status = 1;
        // echo 'pic ok'. "<br>";
   }else{
       $pic_status = 0;
    //    echo 'pic not ok'. "<br>";
   }
}

if($resume != ""){
    $resume_name = $emp_id . '-resume.pdf';
}else{
    $resume_name = "none";
}

/*resume Location */
$location = "../../../upload/resume/".$resume_name;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png","pdf");

$pic_status = 0;
/* Check file extension */
if(in_array(strtolower($imageFileType), $valid_extensions)) {
   /* Upload file */
   if(move_uploaded_file($_FILES['resume_file']['tmp_name'],$location)){
        $pic_status = 1;
        // echo 'resume ok'. "<br>";
   }else{
       $pic_status = 0;
    //    echo 'resume not ok'. "<br>";
   }
}

if($personal != ""){
    $personal_name = $emp_id . '-personal.pdf';
}else{
    $personal_name = "none";
}

/*personal Location */
$location = "../../../upload/personal/".$personal_name;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png","pdf");

$pic_status = 0;
/* Check file extension */
if(in_array(strtolower($imageFileType), $valid_extensions)) {
   /* Upload file */
   if(move_uploaded_file($_FILES['identity_file']['tmp_name'],$location)){
        $pic_status = 1;
        // echo 'personal ok'. "<br>";
   }else{
       $pic_status = 0;
    //    echo 'personal not ok'. "<br>";
   }
}

if($permit != ""){
    $permit_name = $emp_id . '-permit.pdf';
}else{
    $permit_name = "none";
}

/*permit Location */
$location = "../../../upload/work_permit/".$permit_name;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png","pdf");

$pic_status = 0;
/* Check file extension */
if(in_array(strtolower($imageFileType), $valid_extensions)) {
   /* Upload file */
   if(move_uploaded_file($_FILES['permit_file']['tmp_name'],$location)){
        $pic_status = 1;
        // echo 'permit ok'. "<br>";
   }else{
       $pic_status = 0;
    //    echo 'permit not ok'. "<br>";
   }
}

if ($race == "Others") {
    $race2 = htmlspecialchars($_POST['race2']);
} else {
    $race2 = $race;
}

if ($religion == "Others") {
    $religion2 = htmlspecialchars($_POST['religion2']);
} else {
    $religion2 = $religion;
}

if ($country != "Malaysia") {
    $identity = $international;
} else {
    $identity = $local;
}

$epf_amt = $salary * 0.09;
$socso_amt = $salary * 0.005;
$eis_amt = $salary * 0.002;

// echo $marital;
if ($marital == 1) {
    $spouse = "0";
    $children = "0";
} else {
    $spouse = htmlspecialchars($_POST['spouse']);
    $children = htmlspecialchars($_POST['children']);
}


if ($permit_from == "") {
    $permit_from = "0";
}

if ($permit_to == "") {
    $permit_to = "0";
}

$sql = "INSERT INTO employees (f_emp_id, f_full_name, f_emp_status, f_contact, f_home_tel, f_address, f_cor_address, f_email, f_birth_date, f_gender, f_country, f_identity, f_identity_img, f_race, f_religion, f_permit_from, f_permit_to, f_marital, f_spouse, f_children, f_ec1_name, f_ec1_relationship, f_ec1_contact, f_ec2_name, f_ec2_relationship, f_ec2_contact, f_picture, f_permit_picture, f_resume, f_com_email, f_mobile_all, f_park_all, f_department, f_designation, f_password, f_join_date, f_created_date, f_modified_date) VALUES ('$emp_id', '$fullname', '$emp_status', '$phone', '$home_tel', '$address', '$cor_address', '$email', '$birthday', '$gender', '$country', '$identity', '$personal_name', '$race2', '$religion2', '$permit_from', '$permit_to', '$marital', '$spouse', '$children', '$ec1_name', '$ec1_relationship', '$ec1_contact', '$ec2_name', '$ec2_relationship', '$ec2_contact', '$profile_name', '$permit_name', '$resume_name', '$com_email', '$mobile_all', '$park_all', '$department', '$designation', '$password', '$join_date', '$now', '$now')";
// echo $sql . "<br>"; exit;

$result = mysqli_query($conn, $sql);

$id = mysqli_insert_id($conn);

$sql2 = "INSERT INTO bank_slip (f_emp_id, f_bank, f_bank_branch, f_bank_acc, f_salary, f_epf, f_epf_num, f_socso, f_socso_num, f_tax, f_epf, f_eis_num, f_created_date, f_modified_date) VALUES('$emp_id', '$bank', '$bank_branch', '$bank_acc', '$salary', '$epf_no', '$epf_amt', '$socso_no', '$socso_amt','$lhdn_no', '$eis_no', '$eis_amt', '$now', '$now')";
$result2 = mysqli_query($conn, $sql2);
// echo $sql2; exit;

if ($result && $result2) {
    // echo "<script>alert('Employee Has Been Added.');</script>";
    // echo "<script>window.location.href='index.php';</script>";
    echo '1';
} else {
    // echo "<script>alert('Something Went Wrong');</script>";
    echo '0';
}

$dbh = null;

?>
