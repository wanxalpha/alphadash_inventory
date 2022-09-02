<?php
include_once("../menu/menu-dash-a.php");

$main_email = $_SESSION['userlogin'];
// echo $main_email; exit;
$sql2 = "SELECT * FROM employees WHERE f_com_email='$main_email'";
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
$main_code = $rows2['f_emp_id'];
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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Human Resource / <a href="emp_detail.php" style="color:#6c747c!important">Employee Details</a> /</span> Claims </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="emp_pers_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-user me-1"></i> Personal Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_edu_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-book"></i> Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_bank_detail.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Bank & Payslips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_leave.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Leave Application</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="emp_claims.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i>Claims</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_purchase.php?emp_id=<?php echo $emp_id ?>"><i class="bx bx-credit-card"></i> Purchase Requisition</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Claims</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Claim Type</th>
                                <th>Receipt Date</th>
                                <th>Claim Amount</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="leave_list">
                        <?php
                        $sql = "SELECT a.f_id, a.f_claim_date, a.f_claim_amt, a.f_status, c.f_claim_type FROM claims a left join employees b ON a.f_emp_id = b.f_id  left join claim_type c ON a.f_claim_type = c.f_id WHERE a.f_emp_id='$emp_code'";
                        // echo $sql;
                        $result = mysqli_query($conn, $sql);
                        $num_rows = mysqli_num_rows($result);

                        if($num_rows > 0){
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['f_id'];
                                $claim_date = $row['f_claim_date'];
                                $claim_amt = $row['f_claim_amt'];
                                $claim_type = $row['f_claim_type'];
                                $status = $row['f_status'];

                                echo '
                                <tr>
                                    <td>'.$id.'</td>
                                    <td>'.$claim_type.'</td>
                                    <td>'.$claim_date.'</td>
                                    <td>RM '.$claim_amt.'</td>
                                    <td><p class="badge bg-label-primary">'.$status.'</p></td>
                                    <td class="text-right">
                                        <input type="text" id="code'.$id.'" name="code" value="'.$id.'" hidden>
                                        <input type="text" id="main'.$id.'" name="code" value="'.$main_code.'" hidden>
                                        '?>
                                        <?php
                                        if($status == "Approved" || $status == "Rejected"){

                                        }else{
                                            echo '
                                            <a class="btn btn-sm btn-warning" href="#" id="review'.$id.'" name="review" date-value="'.$id.'" onclick="review'.$id.'()">Check</a>
                                            <a class="btn btn-sm btn-danger" href="#" id="delete'.$id.'" name="delete" date-value="'.$id.'" onclick="reject'.$id.'()">Delete</a>
                                            ';
                                            
                                        }
                                        ?>
                                        <?php echo'
                                        
                                    </td>
                                </tr>

                                <script>
                                function review'.$id.'(){
                                    var review = $("#code'.$id.'").val();
                                    var code = $("#main'.$id.'").val();
                                    var status = "checked";
                                    console.log(review);
                    
                                    if (review) {
                                        var url = "../controller/ajax/edit_function/update_emp_claims.php";
                                    }
                    
                                    $.get(url, {
                                        review: review,
                                        status: status,
                                        code: code
                                    })
                                    .done(function(data) {
                                        if (data) {
                                            console.log(data);
                    
                                            if(data == "ok"){
                                                alert("ok");
                                            }else{
                                                alert("not ok");
                                            }
                                        } else {
                                            console.log("no data");
                                        }
                                    })
                                }

                                function reject'.$id.'(){
                                    var review = $("#code'.$id.'").val();
                                    var code = $("#main'.$id.'").val();
                                    var status = "rejected";
                                    console.log(review);
                    
                                    if (review) {
                                        var url = "../controller/ajax/edit_function/update_emp_claims.php";
                                    }
                    
                                    $.get(url, {
                                        review: review,
                                        status: status,
                                        code: code
                                    })
                                    .done(function(data) {
                                        if (data) {
                                            console.log(data);
                    
                                            if(data == "ok"){
                                                alert("ok");
                                            }else{
                                                alert("not ok");
                                            }
                                        } else {
                                            console.log("no data");
                                        }
                                    })
                                }
                                </script>
                                ';
                            }
                        }

                        
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


    <?php include_once("../menu/footer.php"); ?>