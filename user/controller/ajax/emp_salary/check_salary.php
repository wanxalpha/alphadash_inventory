<?php

include_once '../../../includes/config.php';

$emp_name = trim($_GET["emp_name"]);
$emp_dep = trim($_GET["emp_dep"]);
$emp_role = trim($_GET["emp_role"]);
$emp_start_date = trim($_GET["emp_start_date"]);
$emp_end_date = trim($_GET["emp_end_date"]);

if ($emp_dep == 0) {
    $emp_dep = "";
} 

if ($emp_role == 0) {
    $emp_role = "";
} 

// echo $emp_start_date; echo "<br>"; echo $emp_end_date; echo "<br>";

if (strlen($emp_name) > 0 && strlen($emp_dep) > 0 && strlen($emp_role) > 0 && strlen($emp_start_date) > 0 && strlen($emp_end_date) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_username='$emp_name' AND a.f_department='$emp_dep' AND a.f_designation='$emp_role' AND f_join_date BETWEEN '$emp_start_date' AND '$emp_end_date'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_name) > 0 && strlen($emp_dep) > 0 && strlen($emp_start_date) > 0 && strlen($emp_end_date) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_username='$emp_name' AND a.f_department='$emp_dep' AND f_join_date BETWEEN '$emp_start_date' AND '$emp_end_date'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_dep) > 0 && strlen($emp_role) > 0 && strlen($emp_start_date) > 0 && strlen($emp_end_date) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_department='$emp_dep' AND a.f_designation='$emp_role' AND f_join_date BETWEEN '$emp_start_date' AND '$emp_end_date'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_name) > 0 && strlen($emp_role) > 0 && strlen($emp_start_date) > 0 && strlen($emp_end_date) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_username='$emp_name' AND a.f_designation='$emp_role' AND f_join_date BETWEEN '$emp_start_date' AND '$emp_end_date'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_name) > 0 && strlen($emp_dep) > 0 && strlen($emp_role) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_username='$emp_name' AND a.f_department='$emp_dep' AND a.f_designation='$emp_role'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_name) > 0 && strlen($emp_start_date) > 0 && strlen($emp_end_date) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_username='$emp_name' AND f_join_date BETWEEN '$emp_start_date' AND '$emp_end_date'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_dep) > 0 && strlen($emp_start_date) > 0 && strlen($emp_end_date) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_department='$emp_dep' AND f_join_date BETWEEN '$emp_start_date' AND '$emp_end_date'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_role) > 0 && strlen($emp_start_date) > 0 && strlen($emp_end_date) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_designation='$emp_role' AND f_join_date BETWEEN '$emp_start_date' AND '$emp_end_date'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_name) > 0 && strlen($emp_dep) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_username='$emp_name' AND a.f_department='$emp_dep'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
   
} elseif (strlen($emp_dep) > 0 && strlen($emp_role) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_department='$emp_dep' AND a.f_designation='$emp_role'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    
} elseif (strlen($emp_name) > 0 && strlen($emp_role) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_username='$emp_name' AND a.f_designation='$emp_role'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_start_date) > 0 && strlen($emp_end_date) > 0) {

    // echo "ok"; echo "<br>";
    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND f_join_date BETWEEN '$emp_start_date' AND '$emp_end_date'";
    // echo $sql; exit;
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_name) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_username='$emp_name";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_dep) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_department='$emp_dep'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} elseif (strlen($emp_role) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_designation='$emp_role'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

} else {
    // echo 'ok8'; exit;
    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_salary, c.f_position as emp_design, a.f_emp_id as employ_id, f_email, f_contact, f_join_date FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
}

$cnt = 1;
if ($num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['main_id'];
        $emp_id = $row['employ_id'];
        $fullname = $row['f_full_name'];
        $Designation = $row['emp_design'];
        $Picture = $row['f_picture'];
        $Email = $row['f_email'];
        $Phone = $row['f_contact'];
        $Join_Date = $row['f_join_date'];
        $salary = $row['f_salary'];

        // $total = $salary * 12;

        echo '
            <tr>
                <td>
                    <h2 class="table-avatar">
                        <a href="../employee/profile.php?emp_id='.$id.'" class="avatar"><img alt="" src="../employees/'.$Picture.'"></a>
                        <a href="../employee/profile.php?emp_id='.$id.'">'.$fullname.'<span>'.$Designation.'</span></a>
                    </h2>
                </td>
                <td>'.$emp_id.'</td>
                <td>'.$Email.'</td>
                <td>RM '.$salary.'</td>
                <td><a class="btn btn-sm btn-primary" href="salary-view.php?pay_id='.$id.'">Generate Slip</a></td>
                <td class="text-right">
                    <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" id="pay_edit'.$id.'" name="pay_edit" data-toggle="modal" data-target="#edit_salary" data-value='.$id.'><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" id="pay_del'.$id.'" name="pay_del" data-toggle="modal" data-target="#delete_salary" data-value='.$id.'><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>

            <script>
                $("#pay_edit'.$id.'").click(function() {
                    var pay_edit = $(this).attr("data-value");
                    console.log(pay_edit);

                    if (pay_edit) {
                        var url = "../controller/ajax/edit_sal/index.php";
                    }

                    $.get(url, {
                        pay_edit: pay_edit
                    })
                    .done(function(data) {
                        if (data) {
                            console.log(data);

                            var json = JSON.parse(data);
                            $("#edit_sal_name").val(json.username);
                            $("#edit_basic").val("RM "+(Math.round(json.salary)));
                            $("#edit_epf").val(("RM "+Math.round(json.salary)*0.09));
                            $("#edit_socso").val("RM "+(Math.round(json.salary)*0.005));
                            $("#edit_eis").val("RM "+(Math.round(json.salary)*0.002));
                            
                            var eis_edit = $("#edit_eis").val();
                            var socso_edit = $("#edit_socso").val();
                            var epf_edit = $("#edit_epf").val();
                            var basic_edit = $("#edit_basic").val();

                            eis_edit2 = eis_edit.substring(3);
                            socso_edit2 = socso_edit.substring(3);
                            epf_edit2 = epf_edit.substring(3);
                            basic_edit2 = basic_edit.substring(3);

                            $("#edit_net_sal").val("RM "+(basic_edit2-epf_edit2-socso_edit2-eis_edit2));

                        } else {
                            console.log("no data");
                        }
                    })
                });

                $("#pay_del'.$id.'").click(function() {
                    var pay_del = $(this).attr("data-value");
                    console.log(pay_del);
                    $("#del_emp").val(pay_del);
                });

            </script>
            ';
        $cnt += 1;
    }
}


$dbh = null;

?>
