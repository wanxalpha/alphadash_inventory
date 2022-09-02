<?php

include_once '../../../include/config.php';

// echo 'ok8';
$sql = "SELECT a.f_id, b.f_full_name, a.f_created_date, b.f_emp_id, a.f_leave_type, a.f_image, a.f_leave_type, a.f_start_date, a.f_end_date, a.f_total, a.f_reason, a.f_status, c.f_leave_name FROM leaves a LEFT JOIN employees b ON a.f_emp_id = b.f_emp_id LEFT JOIN leave_type c ON a.f_leave_type = c.f_id WHERE a.f_delete='N'";
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
            $date = $row['f_created_date'];
            $image = $row['f_image'];

            $request_date = date('d M Y', strtotime($date));

            if($total <= 1){
                $day = 'Day';
            }elseif($total > 1){
                $day = 'Days';
            }
            
            echo '
            <tr>
            
            <td>'.$emp_name.'</td>
            <td>'.$request_date.'</td>
            <td>'.$leave_type.'</td>
            <td>'.$start_date.'</td>
            <td>'.$end_date.'</td>
            <td id="leave_balance'.$leave_id.'"></td>
            <td>'.$total.' '.$day.'</td>
            <td>'.$reason.'</td>
            <td><p class="badge bg-label-primary">'.$status.'</td>
            <td class="text-right">
            <a class="btn btn-sm btn-warning" href="no-script.html" target="_blank" id="download'.$leave_id.'" name="download">Download</a>
            <a class="btn btn-sm btn-success" href="#" id="approve'.$leave_id.'" name="approve" data-bs-toggle="modal" data-bs-target="#approve_leave" data-value='.$leave_id.'>Approve</a>
            <a class="btn btn-sm btn-danger" href="#" id="delete'.$leave_id.'" name="delete" data-bs-toggle="modal" data-bs-target="#delete_approve" data-value='.$leave_id.'>Delete</a>
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
                $("#download'.$leave_id.'").click(function(e) {
                    e.preventDefault();
                    window.location.href="../upload/leaves/'.$image.'";
                });
            </script>
            <script>
                $("#approve'.$leave_id.'").click(function() {
                    var appr_delete = $(this).attr("data-value");
                    console.log(appr_delete);
                    $("#appr_delete").val(appr_delete);
                });
            </script>
            <script>
                $("#delete'.$leave_id.'").click(function() {
                    var delete_leave = $(this).attr("data-value");
                    console.log(delete_leave);
                    $("#delete_leave").val(delete_leave);
                });
            </script>

            ';
        $cnt += 1;
        }
    }


$dbh = null;
