<?php
//calling the config file
include_once("../include/config.php");

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);
// $day = date("D", $t);

// adding new users code begins here
if (isset($_POST['add_user'])) {
	$fname = htmlspecialchars($_POST['firstname']);
	$lname = htmlspecialchars($_POST['lastname']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['confirm_pass']);
	$phone = htmlspecialchars($_POST['phone']);
	$address = htmlspecialchars($_POST['address']);
	//grabing user profile picture
	$file = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder = "profiles/";
	$new_file_name = strtolower($file);
	$final_file = str_replace(' ', '-', $new_file_name);
	if ($password != $confirm_password) {
		echo "<script>alert('Your passwords do not match');</script>";
	} else {
		//moving the picture into new location and set file name to be $image.
		if (move_uploaded_file($file_loc, $folder . $final_file)) {
			$image = $final_file;
		}
		$password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users(FirstName,LastName,UserName,Email,Password,Phone,Address,Picture)
			values(:fname,:lname,:username,:email,:password,:phone,:address,:pic)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $fname, PDO::PARAM_STR);
		$query->bindParam(':lname', $lname, PDO::PARAM_STR);
		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->bindParam(':phone', $phone, PDO::PARAM_STR);
		$query->bindParam(':address', $address, PDO::PARAM_STR);
		$query->bindParam(':pic', $image, PDO::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if ($lastInsert > 0) {
			move_uploaded_file($file_loc, $folder . $final_file);
			echo "<script>alert('New User Has Been Added');</script>";
			echo "<script>window.location.href='users.php';</script>";
		} else {
			echo "<script>alert('Something went wrong.');</script>";
		}
	}
}
//adding  users ends here 

//adding assets begins here
elseif (isset($_POST['add_asset'])) {
	$asset = htmlspecialchars($_POST['asset_name']);
	$asset_id = htmlspecialchars($_POST['asset_id']);
	$purchase_date = htmlspecialchars($_POST['purchase_date']);
	$purchase_from = htmlspecialchars($_POST['purchase_from']);
	$manufacturer = htmlspecialchars($_POST['manufacturer']);
	$model = htmlspecialchars($_POST['model']);
	$status = htmlspecialchars($_POST['status']);
	$supplier = htmlspecialchars($_POST['supplier']);
	$condition = htmlspecialchars($_POST['condition']);
	$warrant = htmlspecialchars($_POST['warranty']);
	$price = htmlspecialchars($_POST['value']);
	$asset_user = htmlspecialchars($_POST['asset_user']);
	$description = htmlspecialchars($_POST['description']);
	$sql = "INSERT INTO `assets` ( `assetName`, `assetId`, `PurchaseDate`, `PurchaseFrom`, `Manufacturer`, `Model`, `Status`, `Supplier`, `AssetCondition`, `Warranty`, `Price`, `AssetUser`, `Description`)
		 VALUES (:name, :id, :purchaseDate, :purchasefrom, :manufacturer, :model, :stats, :supplier, :condition, :warranty, :price, :user, :describe)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $asset, PDO::PARAM_STR);
	$query->bindParam(':id', $asset_id, PDO::PARAM_STR);
	$query->bindParam(':purchaseDate', $purchase_date, PDO::PARAM_STR);
	$query->bindParam(':purchasefrom', $purchase_from, PDO::PARAM_STR);
	$query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
	$query->bindParam(':model', $model, PDO::PARAM_STR);
	$query->bindParam(':stats', $status, PDO::PARAM_INT);
	$query->bindParam(':supplier', $supplier, PDO::PARAM_STR);
	$query->bindParam(':condition', $condition, PDO::PARAM_STR);
	$query->bindParam(':warranty', $warrant, PDO::PARAM_STR);
	$query->bindParam(':price', $price, PDO::PARAM_INT);
	$query->bindParam(':user', $asset_user, PDO::PARAM_STR);
	$query->bindParam(':describe', $description, PDO::PARAM_STR);
	$query->execute();
	$lastinserted = $dbh->lastInsertId();
	if ($lastinserted > 0) {
		echo "<script>alert('Asset Has Been Added');</script>";
		echo "<script>window.location.href='assets.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong Please Again.');</script>";
	}
}
//adding assets code ends here.

//adding of goal types stats here
elseif (isset($_POST['add_goal_type'])) {
	$type = htmlspecialchars($_POST['type']);
	$description = htmlspecialchars($_POST['description']);
	$status = htmlspecialchars($_POST['status']);
	$sql = "INSERT INTO `goal_type` ( `Type`, `Description`, `Status`) 
		VALUES (:type, :description, :status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':type', $type, PDO::PARAM_STR);
	$query->bindParam(':description', $description, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();
	$lastinserted = $dbh->lastInsertId();
	if ($lastinserted > 0) {
		echo "<script>alert('Goal Type Has Been Added');</script>";
		echo "<script>window.location.href='goal-type.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong.Re-check goal type may already exist');</script>";
	}
} //goal type adding code ends here.

//adding of goal tracking code starts here
elseif (isset($_POST['add_goal'])) {
	$type = htmlspecialchars($_POST['goal_type']);
	$subject = htmlspecialchars($_POST['subject']);
	$target = htmlspecialchars($_POST['target']);
	$start = htmlspecialchars($_POST['start_date']);
	$end = htmlspecialchars($_POST['end_date']);
	$description = htmlspecialchars($_POST['description']);
	$status = htmlspecialchars($_POST['status']);
	$progress = htmlspecialchars($_POST['progress']);
	$sql = "INSERT INTO `goals` ( `Type`, `Subject`, `Target`, `StartDate`, `EndDate`, `Description`, `Status`,`progress`) 
		VALUES (:type,:subject,:target,:start,:end, :description, :status,:progress)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':type', $type, PDO::PARAM_STR);
	$query->bindParam(':subject', $subject, PDO::PARAM_STR);
	$query->bindParam(':target', $target, PDO::PARAM_STR);
	$query->bindParam(':start', $start, PDO::PARAM_STR);
	$query->bindParam(':end', $end, PDO::PARAM_STR);
	$query->bindParam(':description', $description, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->bindParam(':progress', $progress, PDO::PARAM_STR);
	$query->execute();
	$lastinserted = $dbh->lastInsertId();
	if ($lastinserted > 0) {
		echo "<script>alert('Goal Has Been Added');</script>";
		echo "<script>window.location.href='goal-tracking.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong.Re-check goal type may already exist');</script>";
	}
}
//goal tracking code ends here

//client adding code starts here
elseif (isset($_POST['add_client'])) {
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['confirmpass']);
	$client_id = htmlspecialchars($_POST['clientid']);
	$phone = htmlspecialchars($_POST['phone']);
	$company = htmlspecialchars($_POST['company']);
	$address = htmlspecialchars($_POST['address']);
	//grabing user profile picture
	$propic = $_FILES["propic"]["name"];
	$extension = substr($propic, strlen($propic) - 4, strlen($propic));

	if ($password != $confirm_password) {
		echo "<script>alert('Your passwords do not match');</script>";
	} else {
		$propic = md5($propic) . time() . $extension;
		move_uploaded_file($_FILES["propic"]["tmp_name"], "clients/" . $propic);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO `clients` (`FirstName`, `LastName`, `UserName`, `Email`, `Password`, `ClientId`, `Phone`, `Company`, `Address`, `Status`, `Picture`) 
					VALUES (:fname, :lname, :username, :email, :password, :id, :phone, :company, :address,'1',:pic)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $firstname, PDO::PARAM_STR);
		$query->bindParam(':lname', $lastname, PDO::PARAM_STR);
		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->bindParam(':id', $client_id, PDO::PARAM_STR);
		$query->bindParam(':phone', $phone, PDO::PARAM_STR);
		$query->bindParam(':company', $company, PDO::PARAM_STR);
		$query->bindParam(':address', $address, PDO::PARAM_STR);
		$query->bindParam(':pic', $propic, PDO::PARAM_STR);
		$query->execute();
		$lastInsert = $dbh->lastInsertId();
		if ($lastInsert > 0) {

			echo "<script>alert('Client Has Been Added');</script>";
			echo "<script>window.location.href='clients.php';</script>";
		} else {
			echo "<script>alert('Something went wrong.');</script>";
		}
	}
} //adding client code ends here

//adding departments code starts here
elseif (isset($_POST['add_department'])) {
	$department_name = htmlspecialchars($_POST['department_name']);
	$department_code = htmlspecialchars($_POST['department_code']);
	$sql = "INSERT INTO departments (f_department, f_dep_code, f_log) VALUES ('$department_name', '$department_code', '$datetime')";
	$result  = mysqli_query($conn, $sql);

	if ($result > 0) {
		echo "<script>alert('Department Has Been Added');</script>";
		echo "<script>window.location.href='departments.php';</script>";
	} else {
		echo "<script>alert('Something went wrong.');</script>";
	}
} //adding departments code ends here

//adding desginations code starts from here
elseif (isset($_POST['add_designation'])) {
	$name = htmlspecialchars($_POST['designation']);
	$department = htmlspecialchars($_POST['department']);
	$post_code = htmlspecialchars($_POST['post_code']);

	$sql = "INSERT INTO designations (f_position, f_department, f_post_code, f_log) VALUES ('$name', '$department', '$post_code', '$now')";
	// echo $sql; exit;
	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "<script>alert('Designation Has Been Added');</script>";
		echo "<script>window.location.href='designations.php';</script>";
	} else {
		echo "<script>alert('Something Went wrong');</scrip>";
	}
} //adding designations code ends here

//adding holidays starts here
elseif (isset($_POST['add_holiday'])) {
	$holiday_name = htmlspecialchars($_POST['holiday_name']);
	$holiday_date1 = htmlspecialchars($_POST['holiday_date1']);
	$holiday_day1 = htmlspecialchars($_POST['holiday_day1']);
	$holiday_date2 = htmlspecialchars($_POST['holiday_date2']);
	$holiday_day2 = htmlspecialchars($_POST['holiday_day2']);
	$replacement_date = htmlspecialchars($_POST['replacement_date']);
	$replacement_day = htmlspecialchars($_POST['replacement_day']);
	$duplicate = htmlspecialchars($_POST['duplicate']);

	if ($replacement_date == "") {
		$replacement_date = "none";
	}

	if ($replacement_day == "") {
		$replacement_day = "none";
	}

	$sql = "INSERT INTO holidays(f_holiday_name, f_start_date, f_start_day, f_end_date, f_end_day, f_replacement_date, f_replacement_day, f_duplicate, f_created_date, f_modified_date) VALUES ('$holiday_name', '$holiday_date1', '$holiday_day1', '$holiday_date2', '$holiday_day2', '$replacement_date', '$replacement_day', '$duplicate', '$now', '$now')";
	// echo $sql; exit;
	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "<script>alert('Holiday Has Been Added');</script>";
		echo "<script>window.location.href='holidays.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong.');</script>";
	}
} //adding holidays ends here

//adding employees code starts from here
elseif (isset($_POST['add_employee'])) {

	//personal information	
	$fullname = htmlspecialchars($_POST['fullname']);
	$username = htmlspecialchars($_POST['username']);
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
	$lhdn_no = htmlspecialchars($_POST['lhdn_no']);
	$marital = htmlspecialchars($_POST['marital']);
	$ec1_name = htmlspecialchars($_POST['ec1_name']);
	$ec1_relationship = htmlspecialchars($_POST['ec1_relationship']);
	$ec1_contact = htmlspecialchars($_POST['ec1_contact']);
	$ec2_name = htmlspecialchars($_POST['ec2_name']);
	$ec2_relationship = htmlspecialchars($_POST['ec2_relationship']);
	$ec2_contact = htmlspecialchars($_POST['ec2_contact']);
	$permit_image2 = htmlspecialchars($_POST['permit_image_two']);
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
	$row_num = htmlspecialchars($_POST['row_num']);
	$datetime = htmlspecialchars($_POST['datetime']);

	// echo $post_code; echo "<br>";

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

	//grabbing the picture
	$file = $_FILES['picture_image']['name'];
	$file_loc = $_FILES['picture_image']['tmp_name'];
	$folder = "../employees/";
	$file2 = strtotime($now);
	$final_file = str_replace(' ', '-', $file2);
	$final_file2 = $final_file . '.jpg';

	if (move_uploaded_file($file_loc, $folder . $final_file2)) {
		$image = $final_file;
	}

	if ($permit_image2 == "") {

		$filename2 = $_FILES['permit_image']['name'];
		$destination = '../employees/' . $filename2;
		$extension = pathinfo($filename2, PATHINFO_EXTENSION);
		$file = $_FILES['permit_image']['tmp_name'];
		$size = $_FILES['permit_image']['size'];
	} else {
		$filename2 = "none";
	}

	// name of the uploaded file
	$filename = $_FILES['identity_image']['name'];
	if ($identity == "Malaysia") {
		$file_name = 'ic_' . $emp_id . '.pdf';
	} else {
		$file_name = 'passport_' . $emp_id . '.pdf';
	}
	$destination = '../employees/' . $file_name;
	$extension = pathinfo($file_name, PATHINFO_EXTENSION);
	$file = $_FILES['identity_image']['tmp_name'];
	$size = $_FILES['identity_image']['size'];

	if ($permit_from == "") {
		$permit_from = "0";
	}

	if ($permit_to == "") {
		$permit_to = "0";
	}

	$sql = "INSERT INTO employees (f_emp_id, f_full_name, f_emp_status, f_contact, f_home_tel, f_address, f_cor_address, f_email, f_birth_date, f_gender, f_country, f_identity, f_identity_img, f_race, f_religion, f_permit_from, f_permit_to, f_marital, f_spouse, f_children, f_ec1_name, f_ec1_relationship, f_ec1_contact, f_ec2_name, f_ec2_relationship, f_ec2_contact, f_picture, f_permit_picture, f_com_email, f_mobile_all, f_park_all, f_department, f_designation, f_password, f_join_date, f_created_date, f_modified_date) VALUES ('$emp_id', '$fullname', '$emp_status', '$phone', '$home_tel', '$address', '$cor_address', '$email', '$birthday', '$gender', '$country', '$identity', '$file_name', '$race2', '$religion2', '$permit_from', '$permit_to', '$marital', '$spouse', '$children', '$ec1_name', '$ec1_relationship', '$ec1_contact', '$ec2_name', '$ec2_relationship', '$ec2_contact', '$final_file2', '$filename2', '$com_email', '$mobile_all', '$park_all', '$department', '$designation', '$password', '$join_date', '$now', '$now')";
	// echo $sql . "<br>"; 

	$result = mysqli_query($conn, $sql);

	$id = mysqli_insert_id($conn);

	$sql2 = "INSERT INTO bank_slip (f_emp_id, f_bank, f_bank_branch, f_bank_acc, f_salary, f_epf, f_epf_num, f_socso, f_socso_num, f_tax, f_eis_num, f_created_date, f_modified_date) VALUES('$emp_id', '$bank', '$bank_branch', '$bank_acc', '$salary', '$epf_no', '$epf_amt', '$socso_no', '$socso_amt','$lhdn_no', '$eis_amt', '$now', '$now')";
	$result2 = mysqli_query($conn, $sql2);
	// echo $sql2; exit;

	if ($result && $result2) {
		echo "<script>alert('Employee Has Been Added.');</script>";
		echo "<script>window.location.href='index.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong');</script>";
	}
} 
//ading employees code ends here

// adding leave code start
elseif (isset($_POST['add_leave'])) {
	$emp_id = htmlspecialchars($_POST['employee']);
	$leave_type = htmlspecialchars($_POST['leave_type']);
	$half_day = htmlspecialchars($_POST['half_day']);

	if ($half_day == "on") {
		// echo 'ok'; exit;
		$start_date = htmlspecialchars($_POST['choose_date']);
		$end_date = htmlspecialchars($_POST['choose_date']);
		$start_time = htmlspecialchars($_POST['time_one']);
		$end_time = htmlspecialchars($_POST['time_two']);
		$day_count = '0.5';
	} else {
		// echo 'ok2'; exit;
		$start_date = htmlspecialchars($_POST['starting_at']);
		$end_date = htmlspecialchars($_POST['ends_on']);
		$start_time = '00:00:00';
		$end_time = '23:59:59';
		$day_count = htmlspecialchars($_POST['days_count']);
		
	}

	$reason = htmlspecialchars($_POST['reason']);
	// $file_name = htmlspecialchars($_POST['leave_image']);

	$file = $_FILES['picture_image']['name'];
	// echo $file; exit;
	$file_loc = $_FILES['picture_image']['tmp_name'];
	$folder = "../leave/";
	$file2 = strtotime($now);
	$final_file = str_replace(' ', '-', $file2);
	$final_file2 = 'leave_' . $final_file . '.jpg';

	if (move_uploaded_file($file_loc, $folder . $final_file2)) {
		$image = $final_file;
	}

	$sql = "INSERT INTO leaves (f_emp_id, f_leave_type, f_start_date, f_end_date, f_start_time, f_end_time, f_total, f_reason, f_status, f_image, f_created_date, f_modified_date) VALUES ('$emp_id', '$leave_type', '$start_date', '$end_date', '$start_time', '$end_time', '$day_count', '$reason', 'Pending', '$final_file2', '$now', '$now')";
	// echo $sql;exit;
	$result = mysqli_query($conn, $sql);
	if ($result) {

		echo "<script>alert('Leaves Has Been Added');</script>";
		echo "<script>window.location.href='leaves.php';</script>";
	} else {
		echo "<script>alert('Something went wrong');</script>";
	}
}
// adding leave code ends here

//adding facility starts here
elseif (isset($_POST['add_facility'])) {
	$emp_id = htmlspecialchars($_POST['employee']);
	$choose_time = htmlspecialchars($_POST['choose_date']);
	$time_one = htmlspecialchars($_POST['time_one']);
	$time_two = htmlspecialchars($_POST['time_two']);
	$room = htmlspecialchars($_POST['room']);
	$description = htmlspecialchars($_POST['description']);

	$sql = "INSERT INTO facility(f_emp_id, f_date, f_from_time, f_to_time, f_room, f_description, f_created_date, f_modified_date) VALUES ('$emp_id', '$choose_time', '$time_one', '$time_two', '$room', '$description', '$now', '$now')";
	// echo $sql; exit;
	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "<script>alert('Facility Booking Has Been Added');</script>";
		echo "<script>window.location.href='facility.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong.');</script>";
	}
} //adding facility ends here

// editing leave code start here
elseif (isset($_POST['edit_leave'])) {
	$leave_id = htmlspecialchars($_POST['edit_leave_id']);
	$day_count = htmlspecialchars($_POST['edit_day_count']);
	$reason = htmlspecialchars($_POST['edit_reason']);

	$file = $_FILES['edit_picture_image']['name'];
	// echo $file; exit;
	$file_loc = $_FILES['edit_picture_image']['tmp_name'];
	$folder = "../leave/";
	$file2 = strtotime($now);
	$final_file = str_replace(' ', '-', $file2);
	$final_file2 = 'leave_' . $final_file . '.jpg';

	if (move_uploaded_file($file_loc, $folder . $final_file2)) {
		$image = $final_file;
	}

	$sql = "UPDATE leaves SET f_reason='$reason', f_status='Pending', f_image='$final_file2', f_modified_date='$now' WHERE f_id='$leave_id'";
	// echo $sql;exit;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Leaves Has Been Updated');</script>";
		echo "<script>window.location.href='leaves.php';</script>";
	} else {
		echo "<script>alert('Something went wrong');</script>";
	}
}
// editing leave code ends here

//add visitor details
elseif(isset($_POST["add_visitor"])){
	$v_name = $_POST["v_name"];
    $c_name = $_POST["c_name"];
    $v_phone = $_POST["v_phone"];
    $v_email = $_POST["v_email"];
    $v_purpose = $_POST["v_purpose"];
	$v_date = $_POST["v_date"];
    
    $v_sql = "INSERT INTO `visitor`(`id`, `visitor_name`, `comp_name`, `phone_no`, `email`, `purpose`, `date`) VALUES (NULL, :v_name,
    :c_name, :v_phone, :v_email, :v_purpose, :v_date)";

    $v_query = $dbh->prepare($v_sql);

    $v_query->bindParam(':v_name', $v_name);
    $v_query->bindParam(':c_name', $c_name);
    $v_query->bindParam(':v_phone', $v_phone);
    $v_query->bindParam(':v_email', $v_email);
    $v_query->bindParam(':v_purpose', $v_purpose);
	$v_query->bindParam(':v_date', $v_date);

    $v_query->execute();

    if($v_query){
        ?>
        <script>
        alert("Successful adding visitor details");
        window.location.href = '../employee/visitor.php';
        </script>
        <?php
        
    }else{
        ?>
        <script>
        alert("Unsuccessful adding visitor details <?php echo $dbh->error;?> ");
        window.location.href = '../employee/visitor.php';
        </script>
    <?php
    }
}
//visitor details ends here

//add job vacancy
elseif(isset($_POST["add_vacancy"])){
	$job = $_POST["job"];
    $avail = $_POST["avail"];
    
    $j_sql = "INSERT INTO `vacancy`(`id`, `position`, `availibility`) VALUES (NULL, :job, :avail)";

    $j_query = $dbh->prepare($j_sql);

    $j_query->bindParam(':job', $job);
    $j_query->bindParam(':avail', $avail);
    $j_query->execute();

    if($j_query){
        ?>
        <script>
        alert("Successful adding job vacancy");
        window.location.href = '../employee/vacancy.php';
        </script>
        <?php
        
    }else{
        ?>
        <script>
        alert("Unsuccessful adding job vacancy <?php echo $dbh->error;?> ");
        window.location.href = '../employee/vacancy.php';
        </script>
    <?php
    }
}
//end here

//add quotes
elseif(isset($_POST["add_quotes"])){
	$qdate = $_POST["qdate"];
    $quotes = $_POST["quotes"];
	$proposal = $_POST["proposal"];
	$user = $_POST["username"];
    
    $qsql = "INSERT INTO `quotes`(`id`, `quotes`, `proposal`, `name`, `date`) VALUES (NULL, :quotes, :proposal, :username, :qdate)";

    $q_query = $dbh->prepare($qsql);

    $q_query->bindParam(':quotes', $quotes);
    $q_query->bindParam(':proposal', $proposal);
	$q_query->bindParam(':qdate', $qdate);
	$q_query->bindParam(':username', $user);
    $q_query->execute();

    if($q_query){
        ?>
        <script>
        alert("Successful adding quotes and proposal");
        window.location.href = '../employee/quotes.php';
        </script>
        <?php
        
    }else{
        ?>
        <script>
        alert("Unsuccessful quotes and proposal <?php echo $dbh->error;?> ");
        window.location.href = '../employee/quotes.php';
        </script>
    <?php
    }
}

