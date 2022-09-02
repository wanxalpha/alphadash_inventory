<?php

include_once '../../../include/config.php';

// $item_name = trim($_GET["item_name"]);
// $emp_id = trim($_GET["emp_id"]);
// $status = trim($_GET["purchase_status"]);
// $from_date = trim($_GET["purchase_from"]);
// $to_date = trim($_GET["purchase_to"]);

// if($status == 0){
//     $status = "";
// }

// if($emp_id == 0){
//     $emp_id = "";
// }

// if (strlen($item_name) > 0 && strlen($emp_id) > 0 && strlen($status) > 0 && strlen($from_date) > 0 && strlen($to_date) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND f_purchase_name='$item_name' AND b.f_id='$emp_id' AND a.f_status='$status' AND a.f_created_date BETWEEN $from_date AND $to_date";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($item_name) > 0 && strlen($emp_id) > 0 && strlen($status) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND f_purchase_name='$item_name' AND b.f_id='$emp_id' AND a.f_status='$status'";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($item_name) > 0 && strlen($emp_id) > 0 && strlen($from_date) > 0 && strlen($to_date) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND f_purchase_name='$item_name' AND b.f_id='$emp_id' AND a.f_created_date BETWEEN $from_date AND $to_date";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($item_name) > 0 && strlen($status) > 0 && strlen($from_date) > 0 && strlen($to_date) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND f_purchase_name='$item_name' AND a.f_status='$status' AND a.f_created_date BETWEEN $from_date AND $to_date";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($emp_id) > 0 && strlen($status) > 0 && strlen($from_date) > 0 && strlen($to_date) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND b.f_id='$emp_id' AND a.f_status='$status' AND a.f_created_date BETWEEN $from_date AND $to_date";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($item_name) > 0 && strlen($emp_id) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND f_purchase_name='$item_name' AND b.f_id='$emp_id'";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($item_name) > 0 && strlen($status) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND f_purchase_name='$item_name' AND a.f_status='$status'";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($item_name) > 0 && strlen($from_date) > 0 && strlen($to_date) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND f_purchase_name='$item_name' AND a.f_created_date BETWEEN $from_date AND $to_date";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($emp_id) > 0 && strlen($status) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND b.f_id='$emp_id' AND a.f_status='$status'";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif ( strlen($emp_id) > 0 && strlen($from_date) > 0 && strlen($to_date) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND b.f_id='$emp_id' AND a.f_created_date BETWEEN $from_date AND $to_date";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($status) > 0 && strlen($from_date) > 0 && strlen($to_date) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND a.f_status='$status' AND a.f_created_date BETWEEN $from_date AND $to_date";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($item_name) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND f_purchase_name='$item_name'";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($emp_id) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND b.f_id='$emp_id'";
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($status) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND a.f_status='$status'";
//     // echo $sql; exit;
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } elseif (strlen($from_date) > 0 && strlen($to_date) > 0) {

//     $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_id WHERE b.f_delete='N' AND a.f_created_date BETWEEN $from_date AND $to_date";
//     // echo $sql; exit;
//     $result = mysqli_query($conn, $sql);
//     $num_rows = mysqli_num_rows($result);

// } else {
    // echo 'ok8'; exit;
    $sql = "SELECT a.f_id as pur_id, a.f_purchase_name, a.f_purchase_from, a.f_purchase_date, b.f_id as emp_id, b.f_full_name, a.f_purchase_amt, a.f_status, a.f_paid_by FROM purchase a LEFT JOIN employees b ON a.f_emp_id=b.f_emp_id WHERE a.f_delete='N'";
    // echo $sql; exit;
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
// }

$cnt = 1;
if ($num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['pur_id'];
        $purchase_name = $row['f_purchase_name'];
        $purchase_from = $row['f_purchase_from'];
        $purchase_by = $row['f_full_name'];
        $emp_id = $row['emp_id'];
        $purchase_amt = $row['f_purchase_amt'];
        $purchase_date = $row['f_purchase_date'];
        $purchase_status = $row['f_status'];
        $paid_by = $row['f_paid_by'];

        echo '
        <tr>
            <td>
                <strong>'.$purchase_name.'</strong>
            </td>
            <td>'.$purchase_from.'</td>
            <td>'.$purchase_date.'</td>
            <td>'.$purchase_by.'</td>
            <td>RM '.$purchase_amt.'</td>
            <td>'.$paid_by.'</td>
            <td class="text-center">'.$purchase_status.'</td>
            <td class="text-right">
            <a class="dropdown-item" href="#" id="edit'.$id.'" data-bs-toggle="modal" data-bs-target="#edit_expense">Edit</a>
            <a class="dropdown-item" href="#" id="delete'.$id.'" data-bs-toggle="modal" data-bs-target="#delete_expense" data-value="'.$id.'">Delete</a>
            </td>
        </tr>

            <script>
                $("#edit_claim'.$id.'").click(function() {
                    var claim_edit = $(this).attr("data-value");
                    console.log(claim_edit);

                    if (claim_edit) {
                        var url = "../controller/ajax/check_claim/check_claim.php";
                    }

                    $.get(url, {
                        claim_edit: claim_edit
                    })
                    .done(function(data) {
                        if (data) {
                            // console.log(data);

                            var len = JSON.parse(data);
                            // console.log(len);

                            var claim_type = len.f_claim_type;

                            $("#edit_claim_name").val(len.f_full_name);
                            $("#edit_dep").val(len.f_department);
                            $("#edit_desc").val(len.f_position);
                            $("#edit_month").val(len.f_claim_month);
                            $("#edit_claim_date").val(len.f_claim_date);
                            $("#edit_claim_type option[value=claim_type]").attr("selected","selected");
                            $("#edit_claim_amt").val(len.f_claim_amt);
                            $("#edit_remark").val(len.f_claim_info);
                            $("#claim_id").val(len.f_id);

                        } else {
                            console.log("no data");
                        }
                    })
                });

                $("#delete'.$id.'").click(function() {
                    var appr_delete = $(this).attr("data-value");
                    console.log(appr_delete);
                    $("#del_purchase_id").val("'.$id.'");
                });

            </script>
            ';
        $cnt += 1;
    }
}


$dbh = null;

?>
