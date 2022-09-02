<?php

include_once '../../../include/config.php';

$emp_code = trim($_GET['emp_code']);

$sql = "SELECT a.f_id, b.f_full_name, a.f_claim_date, a.f_claim_amt, a.f_status, c.f_claim_type FROM claims a left join employees b ON a.f_emp_id = b.f_id  left join claim_type c ON a.f_claim_type = c.f_id WHERE a.f_emp_id='$emp_code'";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);


$cnt = 1;
if ($num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['f_id'];
        $fullname = $row['f_full_name'];
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
                <td>'.$status.'</td>
                <td class="text-right">
                <a class="dropdown-item" href="#" id="edit_claim'.$id.'" data-bs-toggle="modal" data-bs-target="#edit_claim" data-value="'.$id.'">Edit</a>
                <a class="dropdown-item" href="#" id="delete" name="delete" data-bs-toggle="modal" data-bs-target="#delete_approve" data-value="'.$id.'">Delete</a>
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
