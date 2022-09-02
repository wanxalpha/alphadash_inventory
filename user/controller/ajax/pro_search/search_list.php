<?php

include_once '../../../includes/config.php';

$pro_name = trim($_GET["pro_name"]);
$emp_name = trim($_GET["emp_name"]);
$emp_desc = trim($_GET["emp_desc"]);

if($emp_desc == 0){
    $emp_desc = "";
}

// echo $emp_desc;

if (strlen($emp_id) > 0 && strlen($emp_name) > 0 && strlen($emp_desc) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_first_name, a.f_last_name, b.f_position as emp_design, a.f_emp_id as employ_id, f_picture, f_email, f_contact, f_join_date FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_emp_id='$emp_id' AND f_username='$emp_name' AND f_designation='$emp_desc'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_id) > 0 && strlen($emp_name) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_first_name, a.f_last_name, b.f_position as emp_design, a.f_emp_id as employ_id, f_picture, f_email, f_contact, f_join_date FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_emp_id='$emp_id' AND f_username='$emp_name'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_id) > 0 && strlen($emp_desc) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_first_name, a.f_last_name, b.f_position as emp_design, a.f_emp_id as employ_id, f_picture, f_email, f_contact, f_join_date FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_emp_id='$emp_id' AND f_designation='$emp_desc'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_name) > 0 && strlen($emp_desc) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_first_name, a.f_last_name, b.f_position as emp_design, a.f_emp_id as employ_id, f_picture, f_email, f_contact, f_join_date FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_username='$emp_name' AND f_designation='$emp_desc'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_id) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_first_name, a.f_last_name, b.f_position as emp_design, a.f_emp_id as employ_id, f_picture, f_email, f_contact, f_join_date FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_emp_id='$emp_id'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_name) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_first_name, a.f_last_name, b.f_position as emp_design, a.f_emp_id as employ_id, f_picture, f_email, f_contact, f_join_date FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_username='$emp_name'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_desc) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_first_name, a.f_last_name, b.f_position as emp_design, a.f_emp_id as employ_id, f_picture, f_email, f_contact, f_join_date FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_designation='$emp_desc'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}else{
    // echo 'ok8';
    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_first_name, a.f_last_name, b.f_position as emp_design, a.f_emp_id as employ_id, f_picture, f_email, f_contact, f_join_date FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}

    $cnt = 1;
    if ($num_rows>0) {
        while ($row = mysqli_fetch_array($result)) {

            $id = $row['main_id'];
            $emp_id = $row['employ_id'];
            $firstname = $row['f_first_name'];
            $lastname = $row['f_last_name'];
            $Designation = $row['emp_design'];
            $Picture = $row['f_picture'];
            $Email = $row['f_email'];
            $Phone = $row['f_contact'];
            $Join_Date = $row['f_join_date'];
            
            echo '
            <tr>
                <td>
                    <a href="project-view.php">Office Management</a>
                </td>
                <td>PRO-0001</td>
                <td>
                    <ul class="team-members">
                        <li>
                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="../assets/img/profiles/avatar-16.jpg"></a>
                        </li>
                    </ul>
                </td>
                <td>
                    <ul class="team-members text-nowrap">
                        <li>
                            <a href="#" title="John Doe" data-toggle="tooltip"><img alt="" src="../assets/img/profiles/avatar-02.jpg"></a>
                        </li>
                        <li>
                            <a href="#" title="Richard Miles" data-toggle="tooltip"><img alt="" src="../assets/img/profiles/avatar-09.jpg"></a>
                        </li>
                        <li>
                            <a href="#" title="John Smith" data-toggle="tooltip"><img alt="" src="../assets/img/profiles/avatar-10.jpg"></a>
                        </li>
                        <li>
                            <a href="#" title="Mike Litorus" data-toggle="tooltip"><img alt="" src="../assets/img/profiles/avatar-05.jpg"></a>
                        </li>
                    </ul>
                </td>
                <td>17 Apr 2019 </td>
                <td>
                    <div class="dropdown action-label">
                        <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> High </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> High</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Medium</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low</a>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="dropdown action-label">
                        <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                        </div>
                    </div>
                </td>
                <td class="text-right">
                    <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>

            <script>
                $("#emp_edit2' . $id . '").click(function() {
                    var emp_edit = $(this).attr("data-value");
                    console.log(emp_edit);

                    if (emp_edit) {
                        var url = "../controller/ajax/edit_emp/index.php";
                    }

                    $.get(url, {
                            emp_edit: emp_edit
                        })
                        .done(function(data) {
                            if (data) {
                                console.log(data);

                                var json = JSON.parse(data);
                                $("#Firstname").val(json.f_first_name);
                                $("#Lastname").val(json.f_last_name);
                                $("#Username").val(json.f_username);
                                $("#Emp_id").val(json.f_emp_id);
                                $("#Contact").val(json.f_contact);
                                $("#Email").val(json.f_email);

                            } else {
                                console.log("no data");
                            }
                        })
                });
            </script>
            ';
        $cnt += 1;
        }
    }


$dbh = null;
