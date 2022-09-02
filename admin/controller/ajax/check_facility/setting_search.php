<?php

include_once '../../../include/config.php';

$sql = "SELECT * FROM facility_room WHERE f_delete='N'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
$cnt = 1;
if ($nums > 0) {
    // $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $facility_id = $rows['f_id'];
        $facility_name = $rows['f_room'];
        $facility_location = $rows['f_location'];

        echo '
        <tr>
            <td>' . $cnt . '</td>
            <td>' . $facility_name . '</td>
            <td>' . $facility_location . '</td>
            <td class="text-right">
                <a class="btn btn-sm btn-warning" href="#" id="edit_quotes'.$facility_id.'" name="edit_facility" data-bs-toggle="modal" data-bs-target="#edit_facility" data-value="'.$facility_id.'">Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="del_quotes'.$facility_id.'" name="delete_facility" data-bs-toggle="modal" data-bs-target="#delete_facility" data-value="'.$facility_id.'">Delete</a>
            </td>
        </tr>
        <script>
        
        $("#edit_quotes' . $facility_id . '").click(function() {
            $("#facility_id").val("'.$facility_id.'");
            $("#facility_name").val("'.$facility_name.'");
            $("#facility_location").val("'.$facility_location.'");
        });

        $("#del_quotes' . $facility_id . '").click(function() {
            $("#del_faciltiy_id").val("'.$facility_id.'");				
        });
        </script>
        ';

        $cnt += 1;
    }
}
?>