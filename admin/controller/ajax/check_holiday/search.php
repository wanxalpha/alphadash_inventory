<?php

include_once '../../../include/config.php';

$sql = "SELECT * FROM holidays WHERE f_delete='N'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
$cnt = 1;
if ($nums > 0) {
    // $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $holiday_id = $rows['f_id'];
        $holiday_name = $rows['f_holiday_name'];
        $start_date = $rows['f_start_date'];
        $end_date = $rows['f_end_date'];
        $restart_date = $rows['f_restart_date'];
        $reend_date = $rows['f_reend_date'];
        $start_day = $rows['f_start_day'];
        $end_day = $rows['f_end_day'];
        $restart_day = $rows['f_restart_day'];
        $reend_day = $rows['f_reend_day'];
    

        echo '
        <tr class="holiday-upcoming">
            <td>'.$holiday_id.'</td>
            <td>'.$holiday_name.'</td>
            <td>'.$start_date.' ('.$start_day.')</td>
            <td>'.$end_date.' ('.$end_day.')</td>
            <td>'.$restart_date.' ('.$restart_day.')</td>
            <td>'.$reend_date.' ('.$reend_day.')</td>
            <td class="text-right">
            <a class="btn btn-sm btn-warning" href="#" id="edit'.$holiday_id.'" name="pay_edit" data-bs-toggle="modal" data-bs-target="#edit_holiday" data-value='.$holiday_id.'>Edit</a>
            <a class="btn btn-sm btn-danger" href="#" id="delete'.$holiday_id.'" name="delete" data-bs-toggle="modal" data-bs-target="#delete_holiday" data-value="'.$holiday_id.'">Delete</a>
            </td>
        </tr>
        <script>
        $("#edit' . $holiday_id . '").click(function() {
            var holiday_edit = $(this).attr("data-value");
            console.log(holiday_edit);

            $("#edit_holiday_id").val("'.$holiday_id.'");
            $("#edit_holiday_name").val("'.$holiday_name.'");
            '?>
            <?php
            if($restart_date == "none"){
                echo '$("#edit_holiday_date1").val("'.$start_date.'");';
            }else{
                echo '$("#edit_holiday_date1").val("'.$restart_date.'");';
            }

            if($reend_date == "none"){
                echo '$("#edit_holiday_date2").val("'.$end_date.'");';
            }else{
                echo '$("#edit_holiday_date2").val("'.$reend_date.'");';
            }
            ?>
            <?php echo '								
        });

        $("#delete' . $holiday_id . '").click(function() {
            var delete_holiday = $(this).attr("data-value");
            console.log(delete_holiday);

            $("#del_holiday_id").val("'.$holiday_id.'");
							
        });
        </script>

        ';

        $cnt += 1;
    }
}
?>

<!-- class="holiday-upcoming" -->