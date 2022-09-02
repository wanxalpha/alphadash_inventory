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
            <a class="btn btn-sm btn-warning" href="no-script.html" target="_blank" id="download'.$memo_id.'" name="download">Download</a>
            </td>
        </tr>
        <script>
                $("#download'.$memo_id.'").click(function(e) {
                    e.preventDefault();
                    window.location.href="../../admin/upload/memo/'.$uploaded.'";
                });
            </script>
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