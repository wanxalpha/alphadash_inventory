<?php

include_once '../../../include/config.php';

$sql = "SELECT * FROM leave_type WHERE f_delete='N'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
$cnt = 1;
if ($nums > 0) {
    // $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $leave_id = $rows['f_id'];
        $leave_name = $rows['f_leave_name'];
        $leave_max = $rows['f_leave_max'];
        $leave_gender = $rows['f_leave_gender'];

        echo '
        <tr>
            <td>' . $cnt . '</td>
            <td>' . $leave_name . '</td>
            <td>' . $leave_max . '</td>
            <td>' . $leave_gender . '</td>
            <td class="text-right">
                <a class="btn btn-sm btn-warning" href="#" id="edit_leave'.$leave_id.'" name="edit_leave" data-bs-toggle="modal" data-bs-target="#edit_leave" data-value="'.$leave_id.'">Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="del_leave'.$leave_id.'" name="del_leave" data-bs-toggle="modal" data-bs-target="#delete_leave" data-value="'.$leave_id.'">Delete</a>
            </td>
        </tr>
        <script>
        
        $("#edit_leave' . $leave_id . '").click(function() {
            $("#leave_id").val("'.$leave_id.'");
            $("#leave_name").val("'.$leave_name.'");
            $("#leave_day").val("'.$leave_max.'");
            $("#leave_gender").val("'.$leave_gender.'");
        });

        $("#del_leave' . $leave_id . '").click(function() {
            $("#del_leave_id").val("'.$leave_id.'");				
        });
        </script>
        ';

        $cnt += 1;
    }
}
?>