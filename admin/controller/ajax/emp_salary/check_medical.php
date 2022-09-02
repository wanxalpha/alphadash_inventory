<?php

include_once '../../../include/config.php';

$user = trim($_GET["user"]);

$sql2 = "SELECT * FROM employees WHERE f_delete='N' AND f_emp_id='$user'";
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
$user_lvl = $rows2['f_user_level'];
// echo $user_lvl; exit;

$sql = "SELECT a.f_id, a.f_status, a.f_emp_id, a.f_created_date, a.f_emp_id as emp_code, a.f_review1, SUM(a.f_claim_amt) AS total_amt, b.f_full_name, b.f_id AS emp_id FROM claims a LEFT JOIN employees b ON a.f_emp_id = b.f_emp_id GROUP BY a.f_emp_id ";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

$cnt = 1;
if ($num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['f_id'];
        $fullname = $row['f_full_name'];
        $claim_amt = $row['total_amt'];
        $status = $row['f_status'];
        $emp_id = $row['emp_id'];
        $date = $row['f_created_date'];
        $review = $row['f_review1'];
        $emp_code = $row['emp_code'];

        if($review == "PBB1001"){
            $review_name = "HR";
        }

        $request_date = date('d M Y', strtotime($date));
        
        if($status == "Approved"){
            $color = "success";
        }
        if($status == "Pending"){
            $color = "warning";
        }
        if($status == "Rejected"){
            $color = "danger";
        }

        echo '
            <tr>
                <td>'.$cnt.'</td>
                <td>'.$request_date.'</td>
                <td>'.$fullname.'</td>
                <td>RM '.$claim_amt.'</td>
                <td> Reviewed By '.$review_name.'</td>
                <td><p class="alert alert-primary" role="alert">'.$status.'</p></td>
                <td class="text-right">
                '?>
                <?php
                if($user_lvl == "Master"){
                    echo '
                    <a class="btn btn-sm btn-success" href="#" id="approve'.$id.'"  name="approve" data-bs-toggle="modal" data-bs-target="#approve_claim" data-value="'.$emp_code.'">Approval</a>
                    ';
                }
                ?>
                <?php echo '
                    <a class="btn btn-sm btn-warning" href="emp_claims.php?emp_id='.$emp_id.'" id="claim_review'.$id.'"  name="claim_review">Review</a>
                    <a class="btn btn-sm btn-danger" href="#" id="delete'.$id.'" name="delete" data-bs-toggle="modal" data-bs-target="#delete_approve" data-value="'.$emp_code.'">Delete</a>
                </td>
            </tr>

            <script>

                $("#approve'.$id.'").click(function() {
                    var appr_delete = $(this).attr("data-value");
                    console.log(appr_delete);
                    $("#appr_delete").val(appr_delete);
                });

            </script>
            ';
        $cnt += 1;
    }
}


$dbh = null;

?>
