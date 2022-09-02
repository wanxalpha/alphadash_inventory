<?php

include_once '../../../includes/config.php';

$sql = "SELECT * FROM memo WHERE f_delete='N'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
$cnt = 1;
if ($nums > 0) {
    // $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $memo_id = $rows['f_id'];
        $emp_code = $rows['f_emp_id'];
        $title = $rows['f_title'];
        $content = $rows['f_description'];
        $created = $rows['f_created_date'];
        $uploaded = $rows['f_uploaded_file'];

        // echo $memo_id; echo '<br>';

        $created_date = date('Y-m-d', strtotime($created));

        $sql2 = "SELECT * FROM employees WHERE f_delete='N' AND f_emp_id='$emp_code'";
        $result2 = mysqli_query($conn, $sql2);
        $rows2 = mysqli_fetch_array($result2);

        $emp_name = $rows2['f_full_name'];

        echo '
        <tr class="holiday-upcoming">
            <td>' . $cnt . '</td>
            <td>' . $emp_name . '</td>
            <td>' . $title . '</td>
            <td>' . $content . '</td>
            <td>' . $uploaded . '</td>
            <td>' . $created_date . '</td>
            <td class="text-right">
                <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" data-toggle="modal" id="edit_memo' . $memo_id . '" data-target="#edit_memo" data-value="' . $memo_id . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" id="del_memo' . $memo_id . '" data-target="#delete_memo" data-value="' . $memo_id . '"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        <script>
        
        $("#edit_memo' . $memo_id . '").click(function() {
            var memo_edit = $(this).attr("data-value");
            console.log(memo_edit);

            if (memo_edit) {
                var url = "../controller/ajax/check_memo/check_memo.php";
            }

            $.get(url, {
                memo_edit: memo_edit
            })
            .done(function(data) {
                if (data) {
                    console.log(data);

                    var len = JSON.parse(data);
                    console.log(len);

                    for (var i = 0; i < len.length; i++) {
                        var memo_id = len[i]["id"];
                        var title = len[i]["title"];
                        var memo_desc = len[i]["memo_desc"];

                        $("#edit_memo_desc").val(memo_desc);
                        $("#edit_title").val(title);
                        $("#edit_memo_id").val(memo_id);
                    }
                    
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
?>
