<?php

include_once '../../../include/config.php';

$emp_id = trim($_GET["emp_id"]);
// $emp_name = trim($_GET["emp_name"]);
$status = trim($_GET["status"]);

if($status == 0){
    $status = "";
}

$sql = "SELECT a.f_id, b.f_full_name,  b.f_emp_id, a.f_leave_type, a.f_leave_type, a.f_start_date, a.f_end_date, a.f_total, a.f_reason, a.f_status, c.f_leave_name FROM leaves a LEFT JOIN employees b ON a.f_emp_id = b.f_emp_id LEFT JOIN leave_type c ON a.f_leave_type = c.f_id WHERE a.f_delete='N' AND a.f_emp_id='$emp_id'";
// echo $sql;
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

    $cnt = 1;
    if ($num_rows>0) {
        while ($row = mysqli_fetch_array($result)) {

            $leave_id = $row['f_id'];
            $leave_type = $row['f_leave_name'];
            $emp_name = $row['f_full_name'];
            $start_date = $row['f_start_date'];
            $end_date = $row['f_end_date'];
            $total = $row['f_total'];
            $reason = $row['f_reason'];
            $status = $row['f_status'];
            $emp_id = $row['f_emp_id'];
            $leave_tyid = $row['f_leave_type'];

            if($total <= 1){
                $day = 'Day';
            }elseif($total > 1){
                $day = 'Days';
            }
            
            echo '
            <tr>
            
            <td>'.$leave_type.'</td>
            <td>'.$start_date.'</td>
            <td>'.$end_date.'</td>
            <td id="leave_balance'.$leave_id.'"></td>
            <td>'.$total.' '.$day.'</td>
            <td>'.$reason.'</td>
            <td>'.$status.'</td>
            <td class="text-right">
            <a class="btn btn-sm btn-warning" href="#" id="edit'.$leave_id.'" name="edit" data-bs-toggle="modal" data-bs-target="#edit_leave" data-value='.$leave_id.'>Edit</a>
            <a class="btn btn-sm btn-danger" href="#" id="delete'.$leave_id.'" name="delete" data-bs-toggle="modal" data-bs-target="#delete_leave" data-value="'.$leave_id.'">Delete</a>
            </td>
            </tr>

            <script>
            $(document).ready(function() {
                var employees = "'.$emp_id.'";
                var leave_type = "'.$leave_tyid.'";

                if(employees !=""){
                    var url = "../controller/ajax/check_leave/check_leave.php";
                }
                $.get(url, {
                    employees: employees
                }) 
                .done(function(data) {
                    if (data) {
                        
                        var len = JSON.parse(data);
                        console.log(len);
                        for (var i = 0; i < len.length; i++) {
                            var annual = len[i]["annual"];
                            var medical = len[i]["medical"];
                            var maternity = len[i]["maternity"];
                            var Hospital = len[i]["hospital"];

                            console.log(annual);
    
                            if(leave_type == 1){
                                if(annual > 1){
                                    $("#leave_balance'.$leave_id.'").text(annual + " Days");
                                }else{
                                    $("#leave_balance'.$leave_id.'").text(annual + " Day");
                                }
                            }else if(leave_type == 4){
                                if(annual > 1){
                                    $("#leave_balance'.$leave_id.'").text(medical + " Days");
                                }else{
                                    $("#leave_balance'.$leave_id.'").text(medical + " Day");
                                }
                            }else if(leave_type == 5){
                                if(annual > 1){
                                    $("#leave_balance'.$leave_id.'").text(maternity + " Days");
                                }else{
                                    $("#leave_balance'.$leave_id.'").text(maternity + " Day");
                                }
                            }else if(leave_type == 7){
                                if(annual > 1){
                                    $("#leave_balance'.$leave_id.'").text(hospital + " Days");
                                }else{
                                    $("#leave_balance'.$leave_id.'").text(hospital + " Day");
                                }
                            }else{
                                $("#leave_balance'.$leave_id.'").text("none");
                            }

                        }
                    }
                })

            });
            </script>
            <script>
            $("#edit'.$leave_id.'").click(function() {
                var leave_edit = $(this).attr("data-value");
                console.log(leave_edit);

                if (leave_edit) {
                    var url = "../controller/ajax/check_leave/index.php";
                }

                $.get(url, {
                    leave_edit: leave_edit
                })
                .done(function(data) {
                    if (data) {
                        // console.log(data);

                        var json = JSON.parse(data);
                        $("#total_date").val(json.f_total);
                        $("#leave_reason").val(json.f_reason);

                        var total = json.f_total;

                        if(total == 0.5){
                            $("#half_day2").prop("checked", true);
                            $("#half_day2").val("on");
                            $("#full_day_group").hide();
                            $("#half_day_group").show();

                            $("#d_date").val(json.f_start_date);
                            $("#edit_time_one").val(json.f_start_time);
                            $("#edit_time_two").val(json.f_end_time);
                        }else{
                            $("#half_day2").val("off");
                            $("#half_day2").prop("checked", false);
                            $("#full_day_group").show();
                            $("#half_day_group").hide();

                            $("#start_date").val(json.f_start_date);
                            $("#end_date").val(json.f_end_date);
                        }
                        
                        var employees = json.f_emp_id;
                        var leave_type = json.f_leave_type;

                        $("#edit_leave_id").val(json.f_id);

                        console.log(employees);
                        console.log(leave_type);

                        if (employees != "") {

                            var url = "../controller/ajax/check_leave/check_leave.php";
                
                            $.get(url, {
                                employees: employees
                            })
                            .done(function(data) {
                                if (data) {
                
                                    var len = JSON.parse(data);
                                    console.log(len);
                                    for (var i = 0; i < len.length; i++) {
                                        var annual = len[i]["annual"];
                                        var medical = len[i]["medical"];
                                        var maternity = len[i]["maternity"];
                                        var Hospital = len[i]["hospital"];

                                        console.log(annual);
                
                                        if(leave_type == 1){
                                            $("#leave_balance").val(annual);
                                        }else if(leave_type == 4){
                                            $("#leave_balance").val(medical);
                                        }else if(leave_type == 5){
                                            $("#leave_balance").val(maternity);
                                        }else if(leave_type == 7){
                                            $("#leave_balance").val(hospital);
                                        }else{
                                            $("#leave_balance").val("none");
                                        }

                                    }
                
                                    var url = "../controller/ajax/check_emp/gender.php";
                
                                    $.get(url, {
                                        employees: employees
                                    })
                                    .done(function(data) {
                                        if (data) {
                
                                            $("#leave_type").empty();
                                            var len = JSON.parse(data);
                                            console.log(len);
                                            for (var i = 0; i < len.length; i++) {
                                                var id = len[i]["id"];
                                                var leave = len[i]["name"];
                                                var gender = len[i]["gender"];
                
                                                if (leave_type == id) {
                                                    $("#leave_type2").append("<option value=" + id + " selected>" + leave + "</option>");
                                                } else {
                                                    $("#leave_type2").append("<option value=" + id + ">" + leave + "</option>");
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


$dbh = null;

?>
