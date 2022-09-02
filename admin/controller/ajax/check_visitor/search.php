<?php

include_once '../../../include/config.php';

$sql = "SELECT * FROM visitor WHERE f_delete='N'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
// $cnt = 1;
if ($nums > 0) {
    $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $visit_id = $rows['f_id'];
        $visit_name = $rows['f_visitor_name'];
        $visit_company = $rows['f_comp_name'];
        $visit_contact = $rows['f_phone_no'];
        $visit_email = $rows['f_email'];
        $visit_purpose = $rows['f_purpose'];
        $visit_date = $rows['f_date'];

        echo '
        <tr>
            <td>' . $x . '</td>
            <td>' . $visit_name . '</td>
            <td>' . $visit_company . '</td>
            <td>' . $visit_contact . '</td>
            <td>' . $visit_email . '</td>
            <td>' . $visit_date . '</td>
            <td>' . $visit_purpose . '</td>
            <td>
                <a class="btn btn-sm btn-warning" href="#" id="v_edit'.$visit_id.'" name="v_edit"  data-bs-toggle="modal" data-bs-target="#edit_visitor" data-value='.$visit_id.'>Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="v_delete'.$visit_id.'" name="v_delete" data-bs-toggle="modal" data-bs-target="#delete_visitor" data-value="'.$visit_id.'">Delete</a>
            </td>
        </tr>
        <script>
        
        $("#v_edit' . $visit_id . '").click(function() {
            var visitor_edit = $(this).attr("data-value");
            console.log(visitor_edit);


            $("#edit_vid").val("'.$visit_id.'");
            $("#edit_vdate").val("' . $visit_date . '");
            $("#edit_visitor_name").val("' . $visit_name . '");
            $("#edit_cname").val("' . $visit_company . '");
            $("#edit_vphone").val("' . $visit_contact . '");
            $("#edit_vemail").val("' . $visit_email . '");
            $("#edit_vpurpose").val("' . $visit_purpose . '");

        });

        $("#v_delete' . $visit_id . '").click(function() {

            $("#del_visitor_id").val("'.$visit_id.'");
							
        });
        </script>
        ';

        $x ++;
    }
}
?>