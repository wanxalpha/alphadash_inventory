<?php
include_once("../menu/menu-dash-a.php");

// echo $emp_name; exit;
$emp_id = $_GET['emp_id'];

$sql = "SELECT * FROM employees WHERE f_id='$emp_id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
$picture = $rows['f_picture'];
$full_name = $rows['f_full_name'];
$emp_code = $rows['f_emp_id'];
$email = $rows['f_email'];
$com_email = $rows['f_com_email'];
$identity = $rows['f_identity'];
$contact = $rows['f_contact'];
$home_tel = $rows['f_home_tel'];
$join_date = $rows['f_join_date'];
$birth_date = $rows['f_birth_date'];
// $national = $rows['f_national'];
$country = $rows['f_country'];
$address = $rows['f_address'];
$gender = $rows['f_gender'];
$department = $rows['f_department'];
$designation = $rows['f_designation'];
$image = $rows['f_picture'];
$marital = $rows['f_marital'];
$spouse = $rows['f_spouse'];
$children = $rows['f_children'];
$ec1_name = $rows['f_ec1_name'];
$ec1_relation = $rows['f_ec1_relationship'];
$ec1_contact = $rows['f_ec1_contact'];
$ec2_name = $rows['f_ec2_name'];
$ec2_relation = $rows['f_ec2_relationship'];
$ec2_contact = $rows['f_ec2_contact'];
$race = $rows['f_race'];
$religion = $rows['f_religion'];
$mobile_all = $rows['f_mobile_all'];
$parking_all = $rows['f_park_all'];
$permit_from = $rows['f_permit_from'];
$permit_to = $rows['f_permit_to'];
// echo $sql; echo '<br>'; echo $birth_date; exit;

$sql2 = "SELECT * FROM bank_slip WHERE f_emp_id='$emp_code'";
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
$bank_name = $rows2['f_bank'];
$bank_branch = $rows2['f_bank_branch'];
$bank_acc = $rows2['f_bank_acc'];
$salary = $rows2['f_salary'];
$epf_no = $rows2['f_epf'];
$socso = $rows2['f_socso'];
$eis_no = $rows2['f_eis'];
$tax = $rows2['f_tax'];

$sql3 = "SELECT * FROM designations WHERE f_id = '$designation'";
$result3 = mysqli_query($conn, $sql3);
$rows3 = mysqli_fetch_array($result3);
$designation2 = $rows3['f_position'];

$sql4 = "SELECT * FROM departments WHERE f_id = '$department'";
$result4 = mysqli_query($conn, $sql4);
$rows4 = mysqli_fetch_array($result4);
$department2 = $rows4['f_department'];

if ($marital == 1) {
    $marital_status = "Single";
} else {
    $marital_status = "Married";
}

$sql5 = "SELECT * FROM bank WHERE f_id = '$bank_name'";
$result5 = mysqli_query($conn, $sql5);
$rows5 = mysqli_fetch_array($result5);
$bank_name2 = $rows5['f_bank_name'];

?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Human Resource / <a href="emp_detail.php" style="color:#6c747c!important">Employee Details</a> /</span> Personal Info </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                    <?php
                        if($country == "Malaysia"){
                            echo '
                            <a class="nav-link" href="emp_pers_detail.php?emp_id='.$emp_id.'"><i class="bx bx-user me-1"></i> Personal Info</a>
                            ';
                        }else{
                            echo '
                            <a class="nav-link" href="emp_pers_detail_int.php?emp_id='.$emp_id.'"><i class="bx bx-user me-1"></i> Personal Info</a>
                            ';
                        }
                        
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_edu_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-book"></i> Academic & Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_bank_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Bank & Payslips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_leave.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Leaves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_claims.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i>Claims</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_purchase.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Purchase Requisition</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <form method="post" enctype="multipart/form-data" id="update_emp_form">
                        <div class="card-body"><br>
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="../upload/profile/<?php echo $image ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="picture_image" name="picture_image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>

                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-6 mb-0">
                                    <label for="nameExLarge" class="form-label">Name</label>
                                    <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter Name" value="<?php echo $full_name ?>" />
                                </div>
                                <div class="col-6 mb-0">
                                    <label for="emailExLarge" class="form-label">Gender</label>
                                    <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $gender ?>" readonly />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col mb-0">
                                    <label for="emailExLarge" class="form-label">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="xxxx@xxx.xx" value="<?php echo $email ?>" />
                                </div>
                                <div class="col mb-0">
                                    <label for="dobExLarge" class="form-label">DOB</label>
                                    <input type="text" id="birthday" name="birthday" class="form-control" placeholder="DD / MM / YY" value="<?php echo $birth_date ?>" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col mb-0">
                                    <label for="emailExLarge" class="form-label">Passport</label>
                                    <input type="text" id="identity" name="identity" class="form-control" value="<?php echo $identity ?>" />
                                </div>
                                <div class="col mb-0">
                                    <label for="formFile" class="form-label">Upload Pssport Photo</label>
                                    <input class="form-control" type="file" id="formFile" id="identity_file" name="identity_file"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col mb-0">
                                    <label for="dobExLarge" class="form-label">Phone No</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+60</span>
                                        <input type="text" class="form-control" value="<?php echo $contact ?>" id="mobile" name="mobile"/>
                                    </div>
                                </div>
                                <div class="col mb-0">
                                    <label for="dobExLarge" class="form-label">House No</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+60</span>
                                        <input type="text" class="form-control" value="<?php echo $home_tel ?>" id="home_tel" name="home_tel"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label for="dobExLarge" class="form-label">Permanent Address</label>
                                    <input type="text" id="per_address" name="per_address" class="form-control" placeholder="Address" value="<?php echo $address ?>" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <label for="dobExLarge" class="form-label">Correspondence Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $address ?>" id="cor_address" name="cor_address"/>
                                        <span class="input-group-text">Same as Permanent Address</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="dobExLarge" class="form-label">Country</label>
                                    <input type="text" id="country" name="country" class="form-control" value="<?php echo $country ?>" readonly />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Race</label>
                                    <select class="select form-control" id="race" name="race">
                                        <option value="">-</option>
                                        <option value="Malay" <?php if($race == "Malay") echo 'selected' ?>>Malay</option>
                                        <option value="Chinese" <?php if($race == "Chinese") echo 'selected' ?>>Chinese</option>
                                        <option value="Indian" <?php if($race == "Indian") echo 'selected' ?>>Indian</option>
                                        <option value="Others" <?php if($race == "Others") echo 'selected' ?>>Others</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Religion</label>
                                    <input type="text" id="religion" name="religion" class="form-control" value="<?php echo $religion ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">LHDN No</label>
                                    <input type="text" id="tax_no" name="tax_no" class="form-control" value="<?php echo $tax ?>" />
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">EPF No</label>
                                    <input type="text" id="epf_no" name="epf_no" class="form-control" value="<?php echo $epf_no ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">SOCSO No</label>
                                    <input type="text" id="socso" name="socso" class="form-control" value="<?php echo $socso ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">EIS No</label>
                                    <input type="text" id="eis_no" name="eis_no" class="form-control" value="<?php echo $eis_no?>"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Marital Status</label>
                                    <select class="select form-control" id="marital" name="marital" onchange="change_marital()">
                                        <option value="">-</option>
                                        <?php
                                        if ($marital == "1") {
                                            echo '
                                                <option value="1" selected>Single</option>
                                                <option value="2">Married</option>
                                                <option value="3">Divorced</option>
                                                <option value="4">Widowed</option>
                                            ';
                                        } elseif ($marital == "2") {
                                            echo '
                                                <option value="1">Single</option>
                                                <option value="2" selected>Married</option>
                                                <option value="3">Divorced</option>
                                                <option value="4">Widowed</option>
                                            ';
                                        } elseif ($marital == "3") {
                                            echo '
                                                <option value="1">Single</option>
                                                <option value="2">Married</option>
                                                <option value="3" selected>Divorced</option>
                                                <option value="4">Widowed</option>
                                            ';
                                        } elseif ($marital == "4") {
                                            echo '
                                                <option value="1">Single</option>
                                                <option value="2">Married</option>
                                                <option value="3">Divorced</option>
                                                <option value="4" selected>Widowed</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php 
                                if($spouse != "no"){
                                    echo '
                                    <div class="col-md-4 mb-0" id="spouse_div" style="display:block;">
                                        <label for="emailExLarge" class="form-label">Spouse Name</label>
                                        <input type="text" id="spouse" name="spouse" class="form-control" value="'.$spouse.'"/>
                                    </div>
                                    ';
                                }else{
                                    echo '
                                    <div class="col-md-4 mb-0" id="spouse_div" style="display:none;">
                                        <label for="emailExLarge" class="form-label">Spouse Name</label>
                                        <input type="text" id="spouse" name="spouse" class="form-control" value="'.$spouse.'"/>
                                    </div>
                                    '; 
                                }
                                ?>
                                <?php 
                                if($children != "0"){
                                    echo '
                                    <div class="col-md-4 mb-0" id="child_div" style="display:block;">
                                        <label for="emailExLarge" class="form-label">Dependant</label>
                                        <input type="text" id="children" name="children" class="form-control" value="'.$children.'"/>
                                    </div>
                                    ';
                                }else{
                                    echo '
                                    <div class="col-md-4 mb-0" id="child_div" style="display:none;">
                                        <label for="emailExLarge" class="form-label">Dependant</label>
                                        <input type="text" id="children" name="children" class="form-control" value="'.$children.'"/>
                                    </div>
                                    ';
                                }
                                ?>      
                            </div>
                            <div class="row mb-4">
                                <label for="emailExLarge" class="form-label"><b>Work Permit</b></label>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Permit From</label>
                                    <input type="text" id="permit_from" name="permit_from" class="form-control" value="<?php echo $permit_from ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Permit To</label>
                                    <input type="text" id="permit_to" name="permit_to" class="form-control" value="<?php echo $permit_to ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Upload Permit</label>
                                    <input type="file" id="permit_file" name="permit_file" class="form-control" accept="application/pdf"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="emailExLarge" class="form-label"><b>Emergency Contact 1</b></label>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Name</label>
                                    <input type="text" id="ec1_name" name="ec1_name" class="form-control" value="<?php echo $ec1_name ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Relationship</label>
                                    <input type="text" id="ec1_relation" name="ec1_relation" class="form-control" value="<?php echo $ec1_relation ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Contact No</label>
                                    <input type="text" id="ec1_contact" name="ec1_contact" class="form-control" value="<?php echo $ec1_contact ?>" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="emailExLarge" class="form-label"><b>Emergency Contact 2</b></label>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Name</label>
                                    <input type="text" id="ec2_name" name="ec2_name" class="form-control" value="<?php echo $ec2_name ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Relationship</label>
                                    <input type="text" id="ec2_relation" name="ec2_relation" class="form-control" value="<?php echo $ec2_relation ?>" />
                                </div>
                                <div class="col-md-4 mb-0">
                                    <label for="emailExLarge" class="form-label">Contact No</label>
                                    <input type="text" id="ec2_contact" name="ec2_contact" class="form-control" value="<?php echo $ec2_contact ?>" />
                                </div>
                            </div>
                            <div class="mt-2">
                                <input type="text" id="emp_code" name="emp_code" class="form-control" value="<?php echo $emp_code ?>" hidden/>
                                <!-- <button type="submit" class="btn btn-primary me-2">Save changes</button> -->
                                <button type="button" class="btn btn-primary me-2" onclick="update_employee()">Save Changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <!-- /Account -->
                </div>
                <div class="card">
                    <h5 class="card-header">Deactivate Account</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0"><br>
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete his/her account?</h6>
                                <p class="mb-0">Once you delete this account, there is no going back. Please be certain.</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" onsubmit="return false">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                                <label class="form-check-label" for="accountActivation">Confirm account deactivation</label>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <script>
        function change_marital() {

            var marital = $('#marital').val();
            console.log(marital);

            if(marital != 1){
                $('#spouse_div').css("display","block");
                $('#child_div').css("display","block");
            }else{
                $('#spouse_div').css("display","none");
                $('#child_div').css("display","none");
            }
        }

        function update_employee() {

            let myForm = document.getElementById('update_emp_form');
            let formData = new FormData(myForm);
            console.log(formData);

            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]); 
            }

            $.ajax({
                url: '../controller/ajax/edit_function/update_employee.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        alert('update complete');
                    } else {
                        alert('update failed');
                    }
                },
            });
        }
    </script>

    <?php include_once("../menu/footer.php"); ?>