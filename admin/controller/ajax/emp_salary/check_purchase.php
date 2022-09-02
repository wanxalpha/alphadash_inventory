<?php

include_once '../../../include/config.php';

$user = trim($_GET["user"]);

$sql2 = "SELECT * FROM employees WHERE f_delete='N' AND f_emp_id='$user'";
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
$user_lvl = $rows2['f_user_level'];
// echo $user_lvl; exit;

$sql = "SELECT a.f_id as pur_id, a.f_created_date, a.f_emp_id as emp_code, b.f_id as emp_id, b.f_full_name, SUM(a.f_purchase_amt) AS total_amt, a.f_review1, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_emp_id WHERE b.f_delete='N' GROUP BY a.f_emp_id";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

$cnt = 1;
if ($num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['pur_id'];
        $emp_id = $row['emp_id'];
        $purchase_by = $row['f_full_name'];
        $purchase_amt = $row['total_amt'];
        $purchase_status = $row['f_status'];
        $paid_by = $row['f_paid_by'];
        $date = $row['f_created_date'];
        $review = $row['f_review1'];
        $emp_code = $row['emp_code'];

        if($review == "PBB1001"){
            $review_name = "HR";
        }

        $request_date = date('d M Y', strtotime($date));

        echo '
        <tr>
            <td>'.$cnt.'</td>
            <td>'.$request_date.'</td>
            <td>'.$purchase_by.'</td>
            <td>'.$purchase_amt.'</td>
            <td>'.$paid_by.'</td>
            <td> Reviewed By '.$review_name.'</td>
            <td class="text-center">'.$purchase_status.'</td>
            <td class="text-right">
            <a class="btn btn-sm btn-warning" href="../employee/emp_purchase.php?emp_id='.$emp_id.'" id="review_expense"  name="review_expense">Review</a>
            '?>
            <?php
            if($user_lvl == "Master"){
                echo '<a class="btn btn-sm btn-success" href="#" id="approve'.$id.'"  name="approve_expense" data-bs-toggle="modal" data-bs-target="#approve_expense" data-value="'.$emp_code.'">Approval</a>';
            }
            ?>
            <?php echo '
            <a class="btn btn-sm btn-danger" href="#" id="del_expense'.$id.'"  name="del_expense" data-bs-toggle="modal" data-bs-target="#delete_expense" data-value="'.$emp_code.'">Delete</a>
            </td>
        </tr>

        <script>
            $("#approve'.$id.'").click(function() {
                var appr_delete = $(this).attr("data-value");
                console.log(appr_delete);
                $("#appr_delete").val(appr_delete);
            });

            $("#del_expense'.$id.'").click(function() {
                var appr_delete = $(this).attr("data-value");
                console.log(appr_delete);
                $("#del_purchase_id").val(appr_delete);
            });
        </script>
            ';
        $cnt += 1;
    }
}


$dbh = null;

?>
