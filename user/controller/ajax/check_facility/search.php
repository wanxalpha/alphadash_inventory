<?php

include_once '../../../include/config.php';

$emp_id = trim($_GET["emp_id"]);
$facility = trim($_GET["facility"]);

if($emp_id == "0"){
    $emp_id = "";
}

if($facility == "0"){
    $facility = "";
}

// echo $emp_id; echo "<br>"; echo $facility; 

if (strlen($emp_id) > 0 && strlen($facility) > 0){
    // echo 'ok1';
    $sql = "SELECT b.f_id, a.f_full_name, b.f_date, b.f_from_time, b.f_to_time, b.f_description, c.f_room FROM employees a LEFT JOIN facility b ON a.f_emp_id = b.f_emp_id LEFT JOIN facility_room c ON b.f_room = c.f_id WHERE b.f_delete='N' AND a.f_emp_id = '$emp_id' AND b.f_id = '$facility'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($emp_id) > 0){
    // echo 'ok2';
    $sql = "SELECT b.f_id, a.f_full_name, b.f_date, b.f_from_time, b.f_to_time, b.f_description, c.f_room FROM employees a LEFT JOIN facility b ON a.f_emp_id = b.f_emp_id LEFT JOIN facility_room c ON b.f_room = c.f_id WHERE b.f_delete='N' AND a.f_emp_id = '$emp_id'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}elseif (strlen($facility) > 0){
    // echo 'ok3';
    $sql = "SELECT b.f_id, a.f_full_name, b.f_date, b.f_from_time, b.f_to_time, b.f_description, c.f_room FROM employees a LEFT JOIN facility b ON a.f_emp_id = b.f_emp_id LEFT JOIN facility_room c ON b.f_room = c.f_id WHERE b.f_delete='N' AND b.f_id = '$faciltiy'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}else{
    // echo 'ok4';
    $sql = "SELECT b.f_id, a.f_full_name, b.f_date, b.f_from_time, b.f_to_time, b.f_description, c.f_room FROM employees a LEFT JOIN facility b ON a.f_emp_id = b.f_emp_id LEFT JOIN facility_room c ON b.f_room = c.f_id WHERE b.f_delete='N'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

}

    $cnt = 1;
    if ($num_rows>0) {
        while ($row = mysqli_fetch_array($result)) {

            $facility_id = $row['f_id'];
            $emp_name = $row['f_full_name'];
            $date = $row['f_date'];
            $start_time = $row['f_from_time'];
            $end_time = $row['f_to_time'];
            $room = $row['f_room'];
            $description = $row['f_description'];
            
            echo '
            <tr>
                <td>'.$emp_name.'</td>
                <td>'.$room.'</td>
                <td>'.$date.'</td>
                <td>'.$start_time.'</td>
                <td>'.$end_time.'</td>
                <td class="text-right">
                <a class="btn btn-sm btn-warning" href="#" id="edit'.$facility_id.'" name="edit_facility" data-bs-toggle="modal" data-bs-target="#edit_facility" data-value="'.$facility_id.'">Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="delete'.$facility_id.'" name="delete_facility" data-bs-toggle="modal" data-bs-target="#declined_facility" data-value="'.$facility_id.'">Delete</a>
                </td>
            </tr>
            <script>
            $("#edit'.$facility_id.'").click(function() {
                var facility_edit = $(this).attr("data-value");
                console.log(facility_edit);

                if (facility_edit) {
                    var url = "../controller/ajax/check_facility/check_details.php";
                }

                $.get(url, {
                    facility_edit: facility_edit
                })
                .done(function(data) {
                    if (data) {
                        console.log(data);

                        var len = JSON.parse(data);
                        console.log(len);

                        for (var i = 0; i < len.length; i++) {
                            var room_id = len[i]["room_id"];
                            var room_name = len[i]["room_name"];
                            var start_time = len[i]["start_time"];
                            var end_time = len[i]["end_time"];
                            var book_date = len[i]["book_date"];
                            var description = len[i]["description"];

                            $("#book_date").val(book_date);
                            $("#edit_time_one").val(start_time);
                            $("#edit_time_two").val(end_time);
                            $("#edit_description").val(description);
                            $("#edit_facility_id").val(room_id);
                        }
                        
                    } else {
                        console.log("no data");
                    }
                })

                if (facility_edit != "") {
                    var url = "../controller/ajax/check_facility/check_facility.php";
                }

                $.get(url, {
                    facility_edit: facility_edit
                })
                .done(function(data) {
                    if (data) {
                        console.log(data);

                        var len = JSON.parse(data);
                        console.log(len);
                        for (var i = 0; i < len.length; i++) {
                            var id = len[i]["id"];
                            var room = len[i]["name"];

                            if (facility_edit == id) {
                                $("#room_type2").append("<option value=" + id + " selected>" + room + "</option>");
                            } else {
                                $("#room_type2").append("<option value=" + id + ">" + room + "</option>");
                            }

                        }

                    } else {
                        console.log("no data");
                    }
                })

            });

            $("#delete'.$facility_id.'").click(function() {
                var facility = $(this).attr("data-value");

                console.log(facility);

                $("#facility_declined").val(facility);
            });
            </script>
            ';
        $cnt += 1;
        }
    }


$dbh = null;

?>
