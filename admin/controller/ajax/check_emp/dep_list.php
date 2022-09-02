<?php

include_once '../../../include/config.php';

$sql = "SELECT * FROM departments WHERE f_delete='N'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

$cnt = 1;
if ($num_rows > 0) {
    $x=1;
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['f_id'];
        $department = $row['f_department'];
        // $lastname = $row[''];

        // $total = $salary * 12;

        echo '
        <tr>
            <td>'.$x.'</td>
            <td>'.$department.'</td>
            <td style="text-align:right">
                <a class="btn btn-sm btn-warning" href="#" id="dep_edit'.$id.'" name="dep_edit"  data-bs-toggle="modal" data-bs-target="#edit_department" data-value='.$id.'>Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="dep_delete'.$id.'" name="dep_delete" data-bs-toggle="modal" data-bs-target="#delete_department" data-value="'.$id.'">Delete</a>
            </td>
        </tr>

        <script>
            $("#dep_edit'.$id.'").click(function() {
                var dep_edit = $(this).attr("data-value");
                console.log(dep_edit);

                
                $("#edit_dep_id").val("'.$id.'");
                $("#edit_dep_name").val("'.$department.'");
            });

            $("#dep_delete'.$id.'").click(function() {
                var dep_del = $(this).attr("data-value");
                console.log(dep_del);
                $("#del_dep_id").val(dep_del);
            });

        </script>
        ';
        $cnt += 1;
        $x++;
    }
    
}


$dbh = null;

?>
