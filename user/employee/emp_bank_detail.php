<?php 
include_once("../menu/menu-dash-a.php"); 

$emp_id = $_GET['emp_id'];

$sql = "SELECT * FROM employees WHERE f_id='$emp_id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
$emp_code = $rows['f_emp_id'];
$mobile_all = $rows['f_mobile_all'];
$park_all = $rows['f_park_all'];
$country = $rows['f_country'];

$sql2 = "SELECT * FROM bank_slip WHERE f_emp_id='$emp_code'";
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
$bank_id = $rows['f_id'];
$bank_name = $rows2['f_bank'];
$bank_branch = $rows2['f_bank_branch'];
$bank_acc = $rows2['f_bank_acc'];
$salary = $rows2['f_salary'];

$sql5 = "SELECT * FROM bank WHERE f_id = '$bank_name'";
$result5 = mysqli_query($conn, $sql5);
$rows5 = mysqli_fetch_array($result5);
$bank_name2 = $rows5['f_bank_name'];
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Human Resource /</span> Employee Details</h4>

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
                        <a class="nav-link" href="emp_edu_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-book"></i> Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="emp_bank_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Bank & Payslips</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Bank & Payslip Information</h5>
                    <div class="card-body"><br>
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="divider divider-primary">
                                        <div class="divider-text">
                                            <h5>Bank Details</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="row mb-4">
                                    <div class="col-md-4 mb-0">
                                        <label for="emailExLarge" class="form-label">Bank Account</label>
                                        <input type="text" id="emailExLarge" class="form-control" value="<?php echo $bank_acc?>"/>
                                    </div>
                                    <div class="col-md-4 mb-0">
                                        <label for="emailExLarge" class="form-label">Bank Name</label>
                                        <input type="text" id="emailExLarge" class="form-control" value="<?php echo $bank_name2?>"/>
                                    </div>
                                    <div class="col-md-4 mb-0">
                                        <label for="emailExLarge" class="form-label">Bank Branch</label>
                                        <input type="text" id="emailExLarge" class="form-control" value="<?php echo $bank_branch?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="divider divider-primary">
                                        <div class="divider-text">
                                            <h5>Payslip Details</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4 mb-0">
                                        <label for="emailExLarge" class="form-label">Mobile Allowance</label>
                                        <input type="text" id="emailExLarge" class="form-control" value="<?php echo $mobile_all?>"/>
                                    </div>
                                    <div class="col-md-4 mb-0">
                                        <label for="emailExLarge" class="form-label">Parking Allowance</label>
                                        <input type="text" id="emailExLarge" class="form-control" value="<?php echo $park_all?>"/>
                                    </div>
                                    <div class="col-md-4 mb-0">
                                        <label for="emailExLarge" class="form-label">Salary</label>
                                        <input type="text" id="emailExLarge" class="form-control" value="<?php echo $salary?>"/>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>

<?php include_once("../menu/footer.php"); ?>