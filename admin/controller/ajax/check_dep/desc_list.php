<?php

include_once '../../../include/config.php';

$sql = "SELECT a.f_id, a.f_position, b.f_department, a.f_post_code FROM designations a LEFT JOIN departments b ON a.f_department = b.f_id WHERE a.f_delete='N'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

$cnt = 1;
if ($num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['f_id'];
        $position = $row['f_position'];
        $department = $row['f_department'];
        $post_code = $row['f_post_code'];
        // $lastname = $row[''];

        // $total = $salary * 12;

        echo '
        <tr>
            <td>'.$id.'</td>
            <td>'.$position.'</td>
            <td>'.$department.'</td>
            <td>'.$post_code.'</td>
            <td class="text-right">
                <a class="btn btn-sm btn-warning" id="desc_edit'.$id.'" href="#" data-bs-toggle="modal" data-bs-target="#edit_designation" data-value="'.$id.'">Edit</a>
                <a class="btn btn-sm btn-danger" id="desc_delete'.$id.'" href="#" data-bs-toggle="modal" data-bs-target="#delete_designation" data-value="'.$id.'">Delete</a>
            </td>
        </tr>

        <script>
            $("#desc_edit'.$id.'").click(function() {
                var desc_edit = $(this).attr("data-value");
                console.log(desc_edit);

                if (desc_edit) {
                    var url = "../controller/ajax/edit_emp/desc_edit.php";
                }

                $.get(url, {
                    desc_edit: desc_edit
                })
                .done(function(data) {
                    if (data) {
                        console.log(data);
                        var json = JSON.parse(data);
                        $("#desc_name").val(json.desc_name);
                        $("#desc_code").val(json.desc_code);
                        $("#desc_id").val(desc_edit);

                        var dep_list = json.dep_list;

                        console.log(dep_list);

                        var url = "../controller/ajax/edit_emp/dep_edit.php";
                        $.get(url, {
                        })
                        .done(function(data) {
                            if (data) {

                                var len = JSON.parse(data);
                                console.log(len);
                                for (var i = 0; i < len.length; i++) {
                                    var id = len[i]["dep_id"];
                                    var name = len[i]["dep_name"];

                                    if (dep_list == id) {
                                        $("#department_listing").append("<option value=" + id + " selected>" + name + "</option>");
                                    } else {
                                        $("#department_listing").append("<option value=" + id + ">" + name + "</option>");
                                    }
    
                                }

                            } else {
                                console.log("no data");
                            }
                        })


                    } else {
                        console.log("no data");
                    }
                })
            });

            $("#desc_delete'.$id.'").click(function() {
                var del_desc = $(this).attr("data-value");
                $("#del_desc_id").val(del_desc);

            });

        </script>
        ';
        $cnt += 1;
    }
}


$dbh = null;

?>
