<?php

include_once '../../../include/config.php';

$sql = "SELECT * FROM handbook WHERE f_delete='N'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
$cnt = 1;
if ($nums > 0) {
    // $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $memo_id = $rows['f_id'];
        $title = $rows['f_title'];
        $created = $rows['f_created_date'];
        $uploaded = $rows['f_uploaded_file'];

        $created_date = date('Y-m-d', strtotime($created));     

        echo '
        <tr>
            <td>' . $cnt . '</td>
            <td>' . $title . '</td>
            <td>' . $uploaded . '</td>
            <td>' . $created_date . '</td>
            <td class="text-right">
                <a class="btn btn-sm btn-warning" href="#" id="edit_hand'.$memo_id.'"  name="edit_hand" data-bs-toggle="modal" data-bs-target="#edit_handbook" data-value="'.$memo_id.'">Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="del_hand'.$memo_id.'"  name="del_hand" data-bs-toggle="modal" data-bs-target="#delete_handbook" data-value="'.$memo_id.'">Delete</a>
            </td>
        </tr>
        <script>
        
        $("#edit_hand' . $memo_id . '").click(function() {
            var hand_edit = $(this).attr("data-value");
            console.log(hand_edit);

            $("#edit_title").val("'.$title.'");	
            $("#edit_hand_id").val("'.$memo_id.'");						
        });

        $("#del_hand' . $memo_id . '").click(function() {
            var hand_del = $(this).attr("data-value");
            console.log(hand_del);

            $("#del_hand_id").val(hand_del);
							
        });
        </script>
        ';

        $cnt += 1;
    }
}
?>

<!-- class="holiday-upcoming" -->