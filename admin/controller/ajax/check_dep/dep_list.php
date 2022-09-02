<?php

include_once '../../../include/config.php';

$sql = "SELECT * FROM departments";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

$cnt = 1;
if ($num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['f_id'];
        $department = $row['f_department'];
        $dep_code = $row['f_dep_code'];
        // $lastname = $row[''];

        // $total = $salary * 12;

        echo '
        <tr>
            <td>'.$id.'</td>
            <td>'.$department.'</td>
            <td>'.$dep_code.'</td>
            <td class="text-right">
            <a class="btn btn-sm btn-warning" href="#" id="dep_edit'.$id.'"  name="dep_edit" data-toggle="modal" data-target="#edit_department" data-value="'.$id.'">Edit</a>
            <a class="btn btn-sm btn-danger" href="#" id="dep_delete'.$id.'" name="dep_delete" data-toggle="modal" data-target="#delete_department" data-value="'.$id.'">Delete</a>
            </td>
        </tr>

        <script>
            $("#dep_edit'.$id.'").click(function() {
                var dep_edit = $(this).attr("data-value");
                console.log(dep_edit);

                if (dep_edit) {
                    var url = "../controller/ajax/edit_emp/dep_edit.php";
                }

                $.get(url, {
                    dep_edit: dep_edit
                })
                .done(function(data) {
                    if (data) {
                        console.log(data);
                        var json = JSON.parse(data);
                        $("#dep_name").val(json.f_department);
                        $("#dep_code").val(json.f_dep_code);

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
