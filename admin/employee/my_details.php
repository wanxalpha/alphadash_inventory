<?php
include_once("../menu/menu-dash-a.php");


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
$permit_to = $rows['f_permit_to'];
$password = $rows['f_password'];
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

$sql6 = "SELECT * FROM education_background WHERE f_delete='N' AND f_emp_id='$emp_code'";
$result6 = mysqli_query($conn, $sql6);
$rows6 = mysqli_fetch_array($result6);
$company1 = $rows6['f_company1'];
$position1 = $rows6['f_position1'];
$company2 = $rows6['f_company2'];
$position2 = $rows6['f_position2'];
$company3 = $rows6['f_company3'];
$position3 = $rows6['f_position3'];
$school_name1 = $rows6['f_school_name1'];
$course1 = $rows6['f_course1'];
$school_name2 = $rows6['f_school_name2'];
$course2 = $rows6['f_course2'];
$school_name3 = $rows6['f_school_name3'];
$course3 = $rows6['f_course3'];

// if(isset($_POST['upload'])) {
   
//     $profile_pic = $_FILES['picture_image']['name'];
//     if($profile_pic != ""){
//         $profile_pic = strtotime($now);
//         $final_file = str_replace(' ', '-', $profile_pic);
//         $profile_name = $final_file . '.jpg';
    
//         $location = "../../../upload/profile/".$profile_name;
//         $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
//         $imageFileType = strtolower($imageFileType);
    
//         $valid_extensions = array("jpg","jpeg","png","pdf");
//         $pic_status = 0;
//         if(in_array(strtolower($imageFileType), $valid_extensions)) {
//             if(move_uploaded_file($_FILES['picture_image']['tmp_name'],$location)){
//                     $pic_status = 1;
//             }else{
//                 $pic_status = 0;
//             }
//         }
//     }else{
//         $sql_profile = "SELECT * FROM employees WHERE f_emp_id='$emp_code'";
//         $result_profile = mysqli_query($conn, $sql_profile);
//         $rows_profile = mysqli_fetch_array($result_profile);
//         $profile_name = $rows_profile['f_picture'];
       
//     }

//     $sql_upload = "UPDATE employees SET f_picture='$profile_name' WHERE f_emp_id='$emp_code'";
//     $result = mysqli_query($conn, $sql);
// }

?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>My Details</h4>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body"><br>
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="../../admin/upload/profile/<?php echo $image ?>" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?php echo $emp_name ?></h4>
                                <p class="text-secondary mb-1"><?php echo $designation2 ?></p>
                                <p class="text-muted font-size-sm"><?php echo $emp_code ?></p>
                                <!-- <form method="post" action="" enctype='multipart/form-data'>
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type='file' name='picture_image' multiple class="account-file-input" />
                                        </label>
                                        <button type="submit" name="upload" class="btn btn-outline-secondary account-image-reset mb-4">Submit</button>
                                    </div>
                                </form> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3 mb-3">
                    <h5 class="card-header2">Working Experience</h5>
                    <div class="card-body">
                        <div class="experience-box">
                            <ul class="experience-list">
                                <?php
                                if ($company1 != "") {
                                    echo '
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">' . $company1 . '</a>
                                                <div>' . $position1 . '</div><br>
                                            </div>
                                        </div>
                                    </li>  
                                    ';
                                }
                                if ($company2 != "") {
                                    echo '
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">' . $company2 . '</a>
                                                <div>' . $position2 . '</div><br>
                                            </div>
                                        </div>
                                    </li>  
                                    ';
                                }
                                if ($company3 != "") {
                                    echo '
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">' . $company3 . '</a>
                                                <div>' . $position3 . '</div><br>
                                            </div>
                                        </div>
                                    </li>  
                                    ';
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="demo class-inline">
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalCenter">Edit</button>
                                </div>
                                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <form>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Working Experience</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-2">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Company Names</th>
                                                                    <th>Position</th>
                                                                    <th>Years of Experience</th>
                                                                    <th>Salary</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0" id="company_table">
                                                                <?php
                                                                $sql = "SELECT * FROM education_background WHERE f_emp_id='$emp_code' AND f_delete='N'";
                                                                $result = mysqli_query($conn, $sql);
                                                                $nums = mysqli_num_rows($result);

                                                                if ($nums > 0) {
                                                                    while ($rows = mysqli_fetch_array($result)) {
                                                                        $company1 = $rows['f_company1'];
                                                                        $position1 = $rows['f_position1'];
                                                                        $salary1 = $rows['f_salary1'];
                                                                        $exp_year1 = $rows['f_year_exp1'];
                                                                        $company2 = $rows['f_company2'];
                                                                        $position2 = $rows['f_position2'];
                                                                        $salary2 = $rows['f_salary2'];
                                                                        $exp_year2 = $rows['f_year_exp2'];
                                                                        $company3 = $rows['f_company3'];
                                                                        $position3 = $rows['f_position3'];
                                                                        $salary3 = $rows['f_salary3'];
                                                                        $exp_year3 = $rows['f_year_exp3'];

                                                                        if ($company1 != "") {
                                                                            echo '
                                                                            <tr>
                                                                                <td style="width: 10%;">
                                                                                    <button type="button" value="1" onclick="add_company()" class="btn btn-icon btn-primary">
                                                                                        <span class="tf-icons bx bx-plus"></span>
                                                                                    </button>
                                                                                </td>
                                                                                <td><input type="text" id="company_name1" name="company_name1" class="form-control" placeholder="" value="' . $company1 . '"></td>
                                                                                <td><input type="text" id="position1" name="position1" class="form-control" placeholder="" value="' . $position1 . '"></td>
                                                                                <td><input type="text" id="year_exp1" name="year_exp1" class="form-control" placeholder="" value="' . $exp_year1 . '"></td>
                                                                                <td><input type="text" id="old_salary1" name="old_salary1" class="form-control" placeholder="Total Amount" value="' . $salary1 . '"></td>
                                                                            </tr>
                                                                            ';
                                                                        }
                                                                        if ($company1 == "") {
                                                                            echo '
                                                                            <tr>
                                                                                <td style="width: 10%;">
                                                                                    <button type="button" value="1" onclick="add_company()" class="btn btn-icon btn-primary">
                                                                                        <span class="tf-icons bx bx-plus"></span>
                                                                                    </button>
                                                                                </td>
                                                                                <td><input type="text" id="company_name1" name="company_name1" class="form-control" placeholder="" value=""></td>
                                                                                <td><input type="text" id="position1" name="position1" class="form-control" placeholder="" value=""></td>
                                                                                <td><input type="text" id="year_exp1" name="year_exp1" class="form-control" placeholder="" value=""></td>
                                                                                <td><input type="text" id="old_salary1" name="old_salary1" class="form-control" placeholder="Total Amount" value=""></td>
                                                                            </tr>
                                                                            ';
                                                                        }
                                                                        if ($company2 != "") {
                                                                            echo '
                                                                                <tr id="company_row2">
                                                                                    <td style="width: 10%;">
                                                                                        <button type="button" value="2" onclick="remove_company(this)" class="btn btn-icon btn-danger">
                                                                                            <span class="tf-icons bx bx-minus"></span>
                                                                                        </button>
                                                                                    </td>
                                                                                    <td><input type="text" id="company_name2" name="company_name2" class="form-control" placeholder="" value="' . $company2 . '"></td>
                                                                                    <td><input type="text" id="position2" name="position2" class="form-control" placeholder="" value="' . $position2 . '"></td>
                                                                                    <td><input type="text" id="year_exp2" name="year_exp2" class="form-control" placeholder="" value="' . $exp_year2 . '"></td>
                                                                                    <td><input type="text" id="old_salary2" name="old_salary2" class="form-control" placeholder="Total Amount" value="' . $salary2 . '"></td>
                                                                                </tr>
                                                                                ';
                                                                        }
                                                                        if ($company3 != "") {
                                                                            echo '
                                                                                <tr id="company_row3">
                                                                                    <td style="width: 10%;">
                                                                                        <button type="button" value="3" onclick="remove_company(this)" class="btn btn-icon btn-danger">
                                                                                            <span class="tf-icons bx bx-minus"></span>
                                                                                        </button>
                                                                                    </td>
                                                                                    <td><input type="text" id="company_name3" name="company_name3" class="form-control" placeholder="" value="' . $company3 . '"></td>
                                                                                    <td><input type="text" id="position3" name="position3" class="form-control" placeholder="" value="' . $position3 . '"></td>
                                                                                    <td><input type="text" id="year_exp3" name="year_exp3" class="form-control" placeholder="" value="' . $exp_year3 . '"></td>
                                                                                    <td><input type="text" id="old_salary3" name="old_salary3" class="form-control" placeholder="Total Amount" value="' . $salary3 . '"></td>
                                                                                </tr>
                                                                                ';
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <input type="text" id="emp_code4" name="emp_code" class="form-control" placeholder="" value="<?php echo $emp_code ?>" hidden>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" id="com_save" class="btn btn-primary" onclick="update_company()">Save changes</button>
                                                    <button type="button" id="com_load" style="display:none;" class="btn btn-primary submit-btn">
                                                        <div class="spinner-border spinner-border-sm text-dark" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="card mt-3 mb-3">
                    <h5 class="card-header2">Academic</h5>
                    <div class="card-body">
                        <div class="experience-box">
                            <ul class="experience-list">
                                <?php
                                if ($school_name1 != "") {
                                    echo '
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">' . $school_name1 . '</a>
                                                <div>' . $course1 . '</div><br>
                                            </div>
                                        </div>
                                    </li>  
                                    ';
                                }
                                if ($school_name2 != "") {
                                    echo '
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">' . $school_name2 . '</a>
                                                <div>' . $course2 . '</div><br>
                                            </div>
                                        </div>
                                    </li>  
                                    ';
                                }
                                if ($school_name3 != "") {
                                    echo '
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">' . $school_name3 . '</a>
                                                <div>' . $course3 . '</div><br>
                                            </div>
                                        </div>
                                    </li>  
                                    ';
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="demo class-inline">
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit_edu">Edit</button>
                                </div>
                                <div class="modal fade" id="edit_edu" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Academic</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                               
                                                <div class="row g-2">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Study Type</th>
                                                                <th>School/University/Professional Name</th>
                                                                <th>Field of Study</th>
                                                                <th>Year of Graduate</th>
                                                                <th>Result</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0" id="education_table">
                                                            <?php
                                                            $sql = "SELECT * FROM education_background WHERE f_emp_id='$emp_code' AND f_delete='N'";
                                                            $result = mysqli_query($conn, $sql);
                                                            $nums = mysqli_num_rows($result);

                                                            if ($nums > 0) {
                                                                while ($rows = mysqli_fetch_array($result)) {
                                                                    $study_type1 = $rows['f_study_type1'];
                                                                    $school_name1 = $rows['f_school_name1'];
                                                                    $course1 = $rows['f_course1'];
                                                                    $grad_year1 = $rows['f_grad_year1'];
                                                                    $result1 = $rows['f_result1'];
                                                                    $study_type2 = $rows['f_study_type2'];
                                                                    $school_name2 = $rows['f_school_name2'];
                                                                    $course2 = $rows['f_course2'];
                                                                    $grad_year2 = $rows['f_grad_year2'];
                                                                    $result2 = $rows['f_result2'];
                                                                    $study_type3 = $rows['f_study_type3'];
                                                                    $school_name3 = $rows['f_school_name3'];
                                                                    $course3 = $rows['f_course3'];
                                                                    $grad_year3 = $rows['f_grad_year3'];
                                                                    $result3 = $rows['f_result3'];


                                                                    if ($school_name1 != "") {
                                                                        echo '
                                                                        <tr>
                                                                            <td style="width: 10%;">
                                                                                <button type="button" value="1" onclick="add_education()" class="btn btn-icon btn-primary">
                                                                                    <span class="tf-icons bx bx-plus"></span>
                                                                                </button>
                                                                            </td>
                                                                            <td>
                                                                                <select required name="study_type1" id="study_type1" class="form-control select">
                                                                                    <option>Select Study Type</option>
                                                                                    ' ?>
                                                                        <?php
                                                                        if ($study_type1 == 1) {
                                                                            echo '
                                                                                        <option value="1" selected>High School</option>
                                                                                        <option value="2">Professional</option>
                                                                                        <option value="3">University</option>
                                                                                        ';
                                                                        } elseif ($study_type1 == 2) {
                                                                            echo '
                                                                                        <option value="1">High School</option>
                                                                                        <option value="2" selected>Professional</option>
                                                                                        <option value="3">University</option>
                                                                                        ';
                                                                        } elseif ($study_type1 == 3) {
                                                                            echo '
                                                                                        <option value="1">High School</option>
                                                                                        <option value="2">Professional</option>
                                                                                        <option value="3" selected>University</option>
                                                                                        ';
                                                                        }
                                                                        ?>
                                                                    <?php echo '
                                                                                </select>
                                                                            </td>
                                                                            <td><input type="text" id="school_name1" name="school_name1" class="form-control" placeholder="" value="' . $school_name1 . '"></td>
                                                                            <td><input type="text" id="course1" name="course1" class="form-control" placeholder="" value="' . $course1 . '"></td>
                                                                            <td><input type="text" id="grauduate1" name="grauduate1" class="form-control" placeholder="" value="' . $grad_year1 . '"></td>
                                                                            <td><input type="text" id="result1" name="result1" class="form-control" placeholder="" value="' . $result1 . '"></td>
                                                                        </tr>
                                                                        ';
                                                                    }
                                                                    if ($school_name2 != "") {
                                                                        echo '
                                                                        <tr id="education_row2">
                                                                            <td style="width: 10%;">
                                                                                <button type="button" value="2" onclick="remove_education(this)" class="btn btn-icon btn-danger">
                                                                                    <span class="tf-icons bx bx-minus"></span>
                                                                                </button>
                                                                            </td>
                                                                            <td>
                                                                                <select required name="study_type2" id="study_type2" class="form-control select">
                                                                                    <option>Select Study Type</option>
                                                                                    ' ?>
                                                                        <?php
                                                                        if ($study_type2 == 1) {
                                                                            echo '
                                                                                        <option value="1" selected>High School</option>
                                                                                        <option value="2">Professional</option>
                                                                                        <option value="3">University</option>
                                                                                        ';
                                                                        } elseif ($study_type2 == 2) {
                                                                            echo '
                                                                                        <option value="1">High School</option>
                                                                                        <option value="2" selected>Professional</option>
                                                                                        <option value="3">University</option>
                                                                                        ';
                                                                        } elseif ($study_type2 == 3) {
                                                                            echo '
                                                                                        <option value="1">High School</option>
                                                                                        <option value="2">Professional</option>
                                                                                        <option value="3" selected>University</option>
                                                                                        ';
                                                                        }
                                                                        ?>
                                                                    <?php echo '
                                                                                </select>
                                                                            </td>
                                                                            <td><input type="text" id="school_name2" name="school_name2" class="form-control" placeholder="" value="' . $school_name2 . '"></td>
                                                                            <td><input type="text" id="course2" name="course2" class="form-control" placeholder="" value="' . $course2 . '"></td>
                                                                            <td><input type="text" id="grauduate2" name="grauduate2" class="form-control" placeholder="" value="' . $grad_year2 . '"></td>
                                                                            <td><input type="text" id="result2" name="result2" class="form-control" placeholder="" value="' . $result2 . '"></td>
                                                                        </tr>
                                                                        ';
                                                                    }
                                                                    if ($school_name3 != "") {
                                                                        echo '
                                                                        <tr id="education_row3">
                                                                            <td style="width: 10%;">
                                                                                <button type="button" value="3" onclick="remove_education(this)" class="btn btn-icon btn-danger">
                                                                                    <span class="tf-icons bx bx-minus"></span>
                                                                                </button>
                                                                            </td>
                                                                            <td>
                                                                                <select required name="study_type3" id="study_type3" class="form-control select">
                                                                                    <option>Select Study Type</option>
                                                                                    ' ?>
                                                                        <?php
                                                                        if ($study_type3 == 1) {
                                                                            echo '
                                                                                        <option value="1" selected>High School</option>
                                                                                        <option value="2">Professional</option>
                                                                                        <option value="3">University</option>
                                                                                        ';
                                                                        } elseif ($study_type3 == 2) {
                                                                            echo '
                                                                                        <option value="1">High School</option>
                                                                                        <option value="2" selected>Professional</option>
                                                                                        <option value="3">University</option>
                                                                                        ';
                                                                        } elseif ($study_type3 == 3) {
                                                                            echo '
                                                                                        <option value="1">High School</option>
                                                                                        <option value="2">Professional</option>
                                                                                        <option value="3" selected>University</option>
                                                                                        ';
                                                                        }
                                                                        ?>
                                                            <?php echo '
                                                                                </select>
                                                                            </td>
                                                                            <td><input type="text" id="school_name3" name="school_name3" class="form-control" placeholder="" value="' . $school_name3 . '"></td>
                                                                            <td><input type="text" id="course3" name="course3" class="form-control" placeholder="" value="' . $course3 . '"></td>
                                                                            <td><input type="text" id="grauduate3" name="grauduate3" class="form-control" placeholder="" value="' . $grad_year3 . '"></td>
                                                                            <td><input type="text" id="result3" name="result3" class="form-control" placeholder="" value="' . $result3 . '"></td>
                                                                        </tr>
                                                                        ';
                                                                    }
                                                                    if ($school_name1 == "") {
                                                                        echo '
                                                                        <tr>
                                                                            <td style="width: 10%;">
                                                                                <button type="button" value="1" onclick="add_education()" class="btn btn-icon btn-primary">
                                                                                    <span class="tf-icons bx bx-plus"></span>
                                                                                </button>
                                                                            </td>
                                                                            <td>
                                                                                <select required name="study_type1" id="study_type1" class="form-control select">
                                                                                    <option>Select Study Type</option>
                                                                                    <option value="1">High School</option>
                                                                                    <option value="2">Professional</option>
                                                                                    <option value="3">University</option>
                                                                                </select>
                                                                            </td>
                                                                            <td><input type="text" id="school_name1" name="school_name1" class="form-control" placeholder="" value=""></td>
                                                                            <td><input type="text" id="course1" name="course1" class="form-control" placeholder="" value=""></td>
                                                                            <td><input type="text" id="grauduate1" name="grauduate1" class="form-control" placeholder="" value=""></td>
                                                                            <td><input type="text" id="result1" name="result1" class="form-control" placeholder="" value=""></td>
                                                                        </tr>
                                                                        ';
                                                                    }
                                                                }
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <input type="text" id="emp_code5" name="emp_code" class="form-control" placeholder="" value="<?php echo $emp_code ?>" hidden>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" id="edu_save" class="btn btn-primary" onclick="update_education()">Save changes</button>
                                                <button type="button" id="edu_load" style="display:none;" class="btn btn-primary submit-btn">
                                                    <div class="spinner-border spinner-border-sm text-dark" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> -->
                    </div>
                </div>

            </div>


            <!--Personal Details-->
            <div class="col-md-8">
                <div class="card mb-3">
                    <h5 class="card-header2">Profile Details</h5>
                    <form method="" enctype="multipart/form-data" id="profile_form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="full_name" name="full_name" value="<?php echo $emp_name ?>" readonly />
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">D.O.B</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="date" id="birth_date" name="birth_date" value="<?php echo $birth_date ?>" readonly/>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Mobile No</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="mobile" name="mobile" value="<?php echo $contact ?>" readonly/>
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Home No</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="home_tel" name="home_tel" value="<?php echo $home_tel ?>"readonly/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Personal Email</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="email" id="email" name="email" value="<?php echo $email ?>" readonly/>
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Company Email</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="email" id="com_email" name="com_email" value="<?php echo $com_email ?>" readonly />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input class="form-control" type="text" id="address" name="address" value="<?php echo $address ?>" readonly/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">

                                    <input class="form-control" type="text" id="gender" name="gender" value="<?php echo $gender ?>" readonly/>
                                </div> 


                                <div class="col-sm-2">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="password" name="password" value="<?php echo $password ?>" />
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Designation</h6>
                                </div>
                                <div class="col-sm-10 mb-4 text-secondary">
                                <input class="form-control" type="text" id="designation" name="designation" value="<?php echo $designation2 ?>" readonly/>
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Department</h6>
                                </div>
                                <div class="col-sm-10  text-secondary">
                                <input class="form-control" type="text" id="department" name="department" value="<?php echo $department2 ?>" readonly/>
                                  
                                </div>
                                
                            </div>
                            <hr>
                            <input class="form-control" type="text" id="emp_code" name="emp_code" value="<?php echo $emp_code ?>" hidden />
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="demo class-inline">
                                        <button class="btn btn-info" id="profile_save" onclick="check_bday()">Save</button>
                                        <button type="button" id="profile_load" style="display:none;" class="btn btn-primary submit-btn">
                                            <div class="spinner-border spinner-border-sm text-dark" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card mb-3">
                    <h5 class="card-header2">Personal Details</h5>
                    <!-- <form enctype="multipart/form-data" id="personal_form"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Identification Card</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="identity" name="identity" value="<?php echo $identity ?>" readonly/>
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Nationality</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="national" name="national" value="<?php echo $country ?>" readonly />
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Race</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">

                                    <input class="form-control" type="text" id="race" name="race" value="<?php echo $race ?>" readonly/>

                                  
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Religion</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">

                                    <input class="form-control" type="text" id="religion" name="religion" value="<?php echo $religion ?>" readonly/>

                                  
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Marital Status</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">

                                        <?php
                                        if ($marital == "1") {
                                            echo '
                                            <input class="form-control" type="text" id="marital" name="marital" value="Single" readonly/>
                                               
                                            ';
                                        } elseif ($marital == "2") {
                                            echo '
                                            <input class="form-control" type="text" id="marital" name="marital" value="Married" readonly/>
                                            ';
                                        } elseif ($marital == "3") {
                                            echo '
                                            <input class="form-control" type="text" id="marital" name="marital" value="Divorced" readonly/>
                                            ';
                                        } elseif ($marital == "4") {
                                            echo '
                                            <input class="form-control" type="text" id="marital" name="marital" value="Widowed" readonly/>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Spouse Name</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="spouse" name="spouse" value="<?php echo $spouse ?>" readonly/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">No. of Children</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="children" name="children" value="<?php echo $children ?>" readonly/>
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">SOCSO No</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="socso_no" name="socso_no" value="<?php echo $socso ?>" readonly/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Tax No</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="lhdn_no" name="lhdn_no" value="<?php echo $tax ?>" readonly/>
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">EPF No</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="epf_no" name="epf_no" value="<?php echo $epf_no ?>" readonly/>
                                </div>
                            </div>
                            <!-- <hr>
                            <input class="form-control" type="text" id="emp_code2" name="emp_code" value="<?php echo $emp_code ?>" hidden />
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="demo class-inline">
                                        <button class="btn btn-info" id="personal_save" onclick="update_personal()">Save</button>
                                        <button type="button" id="personal_load" style="display:none;" class="btn btn-primary submit-btn">
                                            <div class="spinner-border spinner-border-sm text-dark" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                    </div>

                                </div>
                            </div> -->
                        </div>
                    <!-- </form> -->
                </div>
                <div class="card mb-3">
                    <h5 class="card-header2">Emergency Contact</h5>
                    <!-- <form enctype="multipart/form-data" id="emergency_form"> -->
                        <div class="card-body">
                            <div class="row">
                                <p>Primary Contact</p>
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-10 mb-4 text-secondary">
                                    <input class="form-control" type="text" id="ec1_name" name="ec1_name" value="<?php echo $ec1_name ?>" readonly/>
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Relationship</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="ec1_relation" name="ec1_relation" value="<?php echo $ec1_relation ?>" readonly/>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="ec1_contact" name="ec1_contact" value="<?php echo $ec1_contact ?>" readonly/>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <p>Secondary Contact</p>
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-10 mb-4 text-secondary">
                                    <input class="form-control" type="text" id="ec2_name" name="ec2_name" value="<?php echo $ec2_name ?>" readonly/>
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Relationship</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="ec2_relation" name="ec2_relation" value="<?php echo $ec2_relation ?>" readonly/>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="ec2_contact" name="ec2_contact" value="<?php echo $ec2_contact ?>" readonly/>
                                </div>
                            </div>
                            <!-- <hr>
                            <input class="form-control" type="text" id="emp_code3" name="emp_code" value="<?php echo $emp_code ?>" hidden />
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="demo class-inline">
                                        <button class="btn btn-info" id="contact_save" onclick="update_emergency()">Save</button>
                                        <button type="button" id="contact_load" style="display:none;" class="btn btn-primary submit-btn">
                                            <div class="spinner-border spinner-border-sm text-dark" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                    </div>

                                </div>
                            </div> -->
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function add_company() {
        var rowCount = $('#company_table tr').length;
        // console.log(rowCount + " row count");
        var i = rowCount + 1;
        // console.log(i + " added row count");

        if (i <= 3) {
            var html = '';
            html += '<tr id="company_row' + i + '">';
            html += '<td style="width: 10%;"><button type="button" value="' + i + '" onclick="remove_company(this)" class="btn btn-icon btn-danger"><span class="tf-icons bx bx-minus"></span></button></td>';
            html += '';
            html += '<td><input type="text" id="company_name' + i + '" name="company_name' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="position' + i + '" name="position' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="year_exp' + i + '" name="year_exp' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="old_salary' + i + '" name="old_salary' + i + '" class="form-control" placeholder="Total Amount" value=""></td>';
            html += '</tr>';

            $('#company_table').append(html);
        } else {
            alert("Maximum 3 company needed only");
        }
    }

    function remove_company(objButton) {
        console.log(objButton.value);
        $('#company_row' + objButton.value + '').remove();
    }

    function add_education() {
        var rowCount = $('#education_table tr').length;
        // console.log(rowCount + " row count");
        var i = rowCount + 1;
        // console.log(i + " added row count");

        if (i <= 3) {
            var html = '';
            html += '<tr id="education_row' + i + '">';
            html += '<td style="width: 10%;"><button type="button" value="' + i + '" onclick="remove_education(this)" class="btn btn-icon btn-danger"><span class="tf-icons bx bx-minus"></span></button></td>';
            html += '<td><select required name="study_type' + i + '" id="study_type' + i + '" class="form-control select"><option>Select Study Type</option><option value="1">High School</option><option value="2">Professional</option><option value="3">University</option></select></td>';
            html += '<td><input type="text" id="school_name' + i + '" name="school_name' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="course' + i + '" name="course' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="grauduate' + i + '" name="grauduate' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="result' + i + '" name="result' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '</tr>';

            $('#education_table').append(html);
        } else {
            alert("Maximum 3 education needed only");
        }
    }

    function remove_education(objButton) {
        console.log(objButton.value);
        $('#education_row' + objButton.value + '').remove();
    }

    function update_company() {

        $('#com_save').css("display", "none");
        $('#com_load').css("display", "block");

        console.log("ok");
        var emp_id = $('#emp_code4').val();
        var company = $('#company_table tr').length;
        console.log(emp_id);
        console.log(company);

        for (let i = company; i <= company; i++) {
            console.log("ok2");

            var company_name = $('#company_name' + i).val();
            var position = $('#position' + i).val();
            var year_exp = $('#year_exp' + i).val();
            var old_salary = $('#old_salary' + i).val();

            var url = '../controller/ajax/employee/update_company.php';

            $.get(url, {
                    emp_id: emp_id,
                    i: i,
                    company_name: company_name,
                    position: position,
                    year_exp: year_exp,
                    old_salary: old_salary
                })
                .done(function(data) {
                    if (data) {
                        console.log(data);

                        var len = JSON.parse(data);
                        var status = len.success;

                        if (status == 1) {
                            var num = len.i;
                            console.log("update company" + num + " success");

                            if (num == company) {
                                console.log("all complete");
                                window.location.href = 'my_details.php';
                            }
                        } else {
                            alert("failed");
                        }
                    }
                })
        }
    }

    function update_education() {

        $('#edu_save').css("display", "none");
        $('#edu_load').css("display", "block");

        var emp_id = $('#emp_code5').val();
        var education = $('#education_table tr').length;

        for (let i = education; i <= education; i++) {

            var study_type = $('#study_type' + i).val();
            var school_name = $('#school_name' + i).val();
            var course = $('#course' + i).val();
            var graduate = $('#grauduate' + i).val();
            var result = $('#result' + i).val();

            var url = "../controller/ajax/employee/update_education.php";

            $.get(url, {
                    emp_id: emp_id,
                    i: i,
                    study_type: study_type,
                    school_name: school_name,
                    course: course,
                    graduate: graduate,
                    result: result
                })
                .done(function(data) {
                    if (data) {

                        var len = JSON.parse(data);
                        var status = len.success;
                        console.log(status);
                        if (status == 1) {
                            var num = len.i;
                            console.log("update education" + num + " success");

                            if (num == education) {
                                console.log("all complete");
                                window.location.href = 'my_details.php';
                            }
                        }
                    }
                })
        }
    }

    function check_bday() {

        $('#profile_load').css("display", "block");
        $('#profile_save').css("display", "none");

        var birthdate = new Date($('#birth_date').val());
        var today = new Date();

        var day1 = birthdate.getDate();
        var month1 = birthdate.getMonth() + 1;
        var year1 = birthdate.getFullYear();

        var date1 = [day1, month1, year1].join('/');
        console.log(date1);

        var day2 = today.getDate();
        var month2 = today.getMonth() + 1;
        var year2 = today.getFullYear();

        var date2 = [day2, month2, year2].join('/');
        console.log(date2);

        var diff_year = year2 - 18;
        console.log(diff_year);

        var year_set = [day2, month2, diff_year].join('/');

        if (year1 >= diff_year) {
            alert("Your Age is Not Applicable To Work");
            $('#birth_date').css('border-color', 'red');

            $('#profile_load').css("display", "none");
            $('#profile_save').css("display", "block");
        } else {
            $('#birth_date').css('border-color', '');
            update_profile();
        }
    }

    function update_profile() {

        $('#profile_load').css("display", "block");
        $('#profile_save').css("display", "none");

        full_name = $('#full_name').val();
        birth_date = $('#birth_date').val();
        mobile = $('#mobile').val();
        home_tel = $('#home_tel').val();
        email = $('#email').val();
        com_email = $('#com_email').val();
        address = $('#address').val();
        gender = $('#gender').val();
        department = $('#department').val();
        designation = $('#designation').val();
        password = $('#password').val();

        let myForm = document.getElementById('profile_form');
        let formData = new FormData(myForm);

        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        event.preventDefault();
        if(full_name && birth_date && mobile && home_tel && email && com_email && address && gender!="" && department && designation && password){
            $.ajax({
                url: '../controller/ajax/update_function/update_profile.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response == 1) {
                        alert('update profile complete');
                        window.location.href = 'my_details.php';
                    } else {
                        alert('update profile failed');
                    }
                },
            });
        }else{
            alert("Please Check Empty Spaces!");
            window.location.href = 'my_details.php';
        }
        
    }

    function update_personal() {

        $('#personal_save').css("display", "none");
        $('#personal_load').css("display", "block");

        let myForm = document.getElementById('personal_form');
        let formData = new FormData(myForm);

        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        event.preventDefault();

        $.ajax({
            url: '../controller/ajax/update_function/update_personal.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    alert('update personal complete');
                    window.location.href = 'my_details.php';
                } else {
                    alert('update personal failed');
                }
            },
        });
    }

    function update_emergency() {

        $('#contact_save').css("display", "none");
        $('#contact_load').css("display", "block");

        let myForm = document.getElementById('emergency_form');
        let formData = new FormData(myForm);

        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        event.preventDefault();

        $.ajax({
            url: '../controller/ajax/update_function/update_eme_contact.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    alert('update family complete');
                    window.location.href = 'my_details.php';
                } else {
                    alert('update family failed');
                }
            },
        });
    }

</script>


<?php include_once("../menu/footer.php"); ?>