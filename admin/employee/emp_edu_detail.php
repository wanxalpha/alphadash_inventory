<?php 
include_once("../menu/menu-dash-a.php"); 

$emp_id = $_GET['emp_id'];

$sql = "SELECT * FROM employees WHERE f_id='$emp_id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
$emp_code = $rows['f_emp_id'];
$country = $rows['f_country'];

$sql2 = "SELECT * FROM education_background WHERE f_emp_id='$emp_code'";
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
$edu_id = $rows['f_id'];
$company1 = $rows2['f_company1'];
$position1 = $rows2['f_position1'];
$exp_year1 = $rows2['f_year_exp1'];
$salary1 = $rows2['f_salary1'];
$company2 = $rows2['f_company2'];
$position2 = $rows2['f_position2'];
$exp_year2 = $rows2['f_year_exp2'];
$salary2 = $rows2['f_salary2'];
$company3 = $rows2['f_company3'];
$position3 = $rows2['f_position3'];
$exp_year3 = $rows2['f_year_exp3'];
$salary3 = $rows2['f_salary3'];
$school_name1 = $rows2['f_school_name1'];
$course1 = $rows2['f_course1'];
$grad_year1 = $rows2['f_grad_year1'];
$result1 = $rows2['f_result1'];
$school_name2 = $rows2['f_school_name2'];
$course2 = $rows2['f_course2'];
$grad_year2 = $rows2['f_grad_year2'];
$result2 = $rows2['f_result2'];
$school_name3 = $rows2['f_school_name3'];
$course3 = $rows2['f_course3'];
$grad_year3 = $rows2['f_grad_year3'];
$result3 = $rows2['f_result3'];
$skill1 = $rows2['f_skill1'];
$skill_exp1 = $rows2['f_skill_exp1'];
$skill2 = $rows2['f_skill2'];
$skill_exp2 = $rows2['f_skill_exp2'];
$skill3 = $rows2['f_skill3'];
$skill_exp3 = $rows2['f_skill_exp3'];
$skill4 = $rows2['f_skill4'];
$skill_exp4 = $rows2['f_skill_exp4'];
$skill5 = $rows2['f_skill5'];
$skill_exp5 = $rows2['f_skill_exp5'];

?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Human Resource / <a href="emp_detail.php" style="color:#6c747c!important">Employee Details</a> /</span> Education </h4>

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
                        <!-- <a class="nav-link" href="emp_pers_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-user me-1"></i> Personal Info</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="emp_edu_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-book"></i> Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_bank_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Bank & Payslips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_leave.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Leaves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_claims.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Claims</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_purchase.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Purchase Requisition</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">School/University Details</h5>
                    <div class="card-body"><br>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th>Study Type</th> -->
                                        <th>School/University/Professional Name</th>
                                        <th>Field of Study</th>
                                        <th>Year of Graduate</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    if($school_name1 != ""){
                                        echo '
                                        <tr>
                                            <td> <input type="text" id="emailExLarge" class="form-control" value="'.$school_name1.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$course1.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$grad_year1.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$result1.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    if($school_name2 != ""){
                                        echo '
                                        <tr>
                                            <td> <input type="text" id="emailExLarge" class="form-control" value="'.$school_name2.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$course2.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$grad_year2.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$result2.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    if($school_name3 != ""){
                                        echo '
                                        <tr>
                                            <td> <input type="text" id="emailExLarge" class="form-control" value="'.$school_name3.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$course3.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$grad_year3.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control"  value="'.$result3.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Company Details</h5>
                    <div class="card-body"><br>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Company Names</th>
                                        <th>Position</th>
                                        <th>Years of Experience</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    if($company1 != ""){
                                        echo '
                                        <tr>
                                            <td> <input type="text" id="emailExLarge" class="form-control" value="'.$company1.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$position1.'"/></td>
                                            <td><input type="number" min="0" class="form-control" value="'.$exp_year1.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$salary1.'"/></td>
                                        </tr>
                                    ';   
                                    }
                                    if($company2 != ""){
                                        echo '
                                        <tr>
                                            <td> <input type="text" id="emailExLarge" class="form-control" value="'.$company2.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$position2.'"/></td>
                                            <td><input type="number" min="0" class="form-control" value="'.$exp_year2.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$salary2.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    if($company3 != ""){
                                        echo '
                                        <tr>
                                            <td> <input type="text" id="emailExLarge" class="form-control" value="'.$company3.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$position3.'"/></td>
                                            <td><input type="number" min="0" class="form-control" value="'.$exp_year3.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$salary3.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Skillset Details</h5>
                    <div class="card-body"><br>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Skillset</th>
                                        <th>Year of Experience</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="skill_table">
                                    <?php
                                    if($skill1 != ""){
                                        echo '
                                        <tr>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill1.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill_exp1.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    if($skill2 != ""){
                                        echo '
                                        <tr>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill2.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill_exp2.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    if($skill3 != ""){
                                        echo '
                                        <tr>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill3.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill_exp3.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    if($skill4 != ""){
                                        echo '
                                        <tr>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill4.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill_exp4.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    if($skill5 != ""){
                                        echo '
                                        <tr>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill5.'"/></td>
                                            <td><input type="text" id="emailExLarge" class="form-control" value="'.$skill_exp5.'"/></td>
                                        </tr>
                                        ';   
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <!-- / Content -->
    <?php include_once("../menu/footer.php"); ?>