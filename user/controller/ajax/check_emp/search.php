<?php

include_once '../../../include/config.php';

$emp_id = trim($_GET["emp_id"]);
$emp_name = trim($_GET["emp_name"]);
$emp_desc = trim($_GET["emp_desc"]);

if($emp_desc == 0){
    $emp_desc = "";
}

// echo $emp_desc;

if (strlen($emp_id) > 0 && strlen($emp_name) > 0 && strlen($emp_desc) > 0) {

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_position as emp_design, a.f_emp_id as employ_id, a.f_country FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_emp_id='$emp_id' AND f_username='$emp_name' AND f_designation='$emp_desc'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_id) > 0 && strlen($emp_name) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_position as emp_design, a.f_emp_id as employ_id, a.f_country FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_emp_id='$emp_id' AND f_username='$emp_name'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_id) > 0 && strlen($emp_desc) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_position as emp_design, a.f_emp_id as employ_id, a.f_country FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_emp_id='$emp_id' AND f_designation='$emp_desc'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_name) > 0 && strlen($emp_desc) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_position as emp_design, a.f_emp_id as employ_id, a.f_country FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_username='$emp_name' AND f_designation='$emp_desc'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_id) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_position as emp_design, a.f_emp_id as employ_id, a.f_country FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_emp_id='$emp_id'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_name) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_position as emp_design, a.f_emp_id as employ_id, a.f_country FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_username='$emp_name'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_desc) > 0){

    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_position as emp_design, a.f_emp_id as employ_id, a.f_country FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N' AND f_designation='$emp_desc'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}else{
    // echo 'ok8';
    $sql = "SELECT a.f_id as main_id, a.f_picture, a.f_full_name, b.f_position as emp_design, a.f_emp_id as employ_id, a.f_country FROM employees a LEFT JOIN designations b ON a.f_designation = b.f_id WHERE a.f_delete='N'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}

    $cnt = 1;
    if ($num_rows>0) {
        while ($row = mysqli_fetch_array($result)) {

            $id = $row['main_id'];
            $emp_id = $row['employ_id'];
            $fullname = $row['f_full_name'];
            $Designation = $row['emp_design'];
            $Picture = $row['f_picture'];
            $country = $row['f_country'];
            
            echo '
            <div class="col-md-6 col-lg-4">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h5 class="card-title"> 
                        <div>
                            <img src="../upload/profile/'.$Picture.'" class="iconDetails">
                        </div></h5>
                        <p class="card-text"><b>'.$fullname.'</b><br>'.$Designation.'<br> <span class="badge bg-label-success me-1">Active</span></p>
                    '?>
                    <?php
                    if($country == "Malaysia"){
                        echo '
                        <a href="emp_pers_detail.php?emp_id='.$id.'" class="btn btn-primary">Profile</a>
                        ';
                    }else{
                        echo '
                        <a href="emp_pers_detail_int.php?emp_id='.$id.'" class="btn btn-primary">Profile</a>
                        ';
                    }
                    ?>
                    <?php echo ' 
                    </div>
                </div>
            </div>
            <script>
                $("#emp_edit'.$id.'").click(function() {
                    var emp_edit = $(this).attr("data-value");
                    console.log(emp_edit);

                    if (emp_edit) {
                        var url = "../employee/emp_pers_detail";
                    }

                    $.get(url, {
                            emp_edit: emp_edit
                        })
                        .done(function(data) {
                            if (data) {
                                console.log(data);

                                var json = JSON.parse(data);
                                $("#Fullname").val(json.f_full_name);;
                                $("#Username").val(json.f_username);
                                $("#Emp_id").val(json.f_emp_id);
                                $("#Contact").val(json.f_contact);
                                $("#Email").val(json.f_email);

                            } else {
                                console.log("no data");
                            }
                        })
                });

                $("#emp_delete'.$id.'").click(function() {
                    var emp_delete = $(this).attr("data-value");
                    console.log(emp_delete);
                    $("#del_emp").val(emp_delete);
                });

            </script>
            ';
        $cnt += 1;
        }
    }


$dbh = null;

?>
