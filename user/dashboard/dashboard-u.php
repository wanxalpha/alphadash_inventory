<?php include_once("../menu/menu-dash-u.php"); ?>

<!-- / Navbar -->

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Welcome <?php echo $emp_name; ?>! 🎉</h5>
                                <p class="mb-4">
                                    Your clock in time for <span class="fw-bold"><?php echo $today; ?></span> is at <span class="fw-bold"><?php echo $clock_in; ?></span>.
                                    Don't forget to wear mask and here is your payslip for <?php echo $month; ?> &#x1F601;
                                </p>

                                <a href="../test_page/index2.php?pay_id=<?php echo $emp_id?>" target="_blank" class="btn btn-sm btn-outline-success">Download</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-4 order-1">
                <div class="card overflow-hidden" style="height: 180px">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0">
                            <span class="fw-semibold d-block mb-1">Booked Facility</span>
                        </div>
                        <div class="dropdown">
                            <span class="fw-semibold d-block mb-1"><?php echo $today ?></span>
                        </div>
                    </div>
                    <div class="card-body" id="vertical-example">
                        <!-- <div class="alert alert-warning" role="alert" style="text-align: center;"><b>12:00pm - 1:00pm</b><br>HRMS Meeting</div>
                      <div class="alert alert-warning" role="alert" style="text-align: center;"><b>3:00pm - 4:00pm</b><br>HRMS Meeting</div> -->
                        <?php
                        $sql = "SELECT a.f_from_time, a.f_to_time, b.f_room, a.f_description FROM facility a LEFT JOIN facility_room b ON a.f_room = b.f_id WHERE a.f_delete='N' AND a.f_date='$curdate'";
                        // echo $sql;
                        $result = mysqli_query($conn, $sql);
                        $nums = mysqli_num_rows($result);

                        if ($nums > 0) {
                            while ($rows = mysqli_fetch_array($result)) {
                                $from_time =  $rows['f_from_time'];
                                $to_time = $rows['f_to_time'];
                                $room_name = $rows['f_room'];
                                $description = $rows['f_description'];

                                $from = date("h:i A", strtotime($from_time));
                                $to = date("h:i A", strtotime($to_time));


                                echo '
                                <div class="alert alert-warning" role="alert" style="text-align: center;"><b>' . $from . ' - ' . $to . '</b><br>' . $description . ' (' . $room_name . ')</div>
                                ';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card overflow-hidden" style="height: 380px">
                    <div class="card-body">
                        <h5 class="card-title text-secondary">Memo / Notice</h5>
                        <div class="demo-inline-spacing">
                            <?php
                            $sql = "SELECT * FROM memo WHERE f_delete='N' ORDER BY f_id DESC LIMIT 3";
                            $result = mysqli_query($conn, $sql);
                            $nums = mysqli_num_rows($result);
                            // echo $nums; exit;

                            $cnt = 1;
                            if ($nums > 0) {
                                while ($rows = mysqli_fetch_array($result)) {

                                    $memo_id = $rows['f_id'];
                                    $emp_code = $rows['f_emp_id'];
                                    $title = $rows['f_title'];
                                    $content = $rows['f_description'];
                                    $created = $rows['f_created_date'];
                                    $uploaded = $rows['f_uploaded_file'];

                                    $created_date = date('Y-m-d', strtotime($created));

                                    echo '
                                    <div class="card bg-dark text-white text-center p-3" data-bs-toggle="modal" data-bs-target="#largeModal' . $cnt . '">
                                        <figure class="mb-0">
                                            <blockquote class="blockquote">
                                                <p style="font-size: small;">' . $title . '</p>
                                            </blockquote>
                                            <figcaption class="blockquote-footer mb-0 text-white">
                                                HR | <cite title="Source Title">Alphacore Technology</cite>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="modal fade" id="largeModal' . $cnt . '" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="largeModalTitle">' . $title . '</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                ' ?>
                                                <?php
                                                if ($uploaded == "No") {
                                                    echo '
                                                  <div class="modal-body">
                                                    <p>' . $description . '</p>
                                                  </div>
                                                  ';
                                                } else {
                                                    echo '
                                                  <div class="modal-body">
                                                  <div class="card" style="height: 500px">
                                                    <div class="card-body">
                                                    <embed  src="../upload/memo/' . $uploaded . '" type="application/pdf" width="100%" height="100%" border="none"></embed >
                                                    </div>
                                                  </div>
                                                  </div>
                                                  ';
                                                }
                                                ?>
                                            <?php echo '
                                            </div>
                                        </div>
                                    </div>
                                    ';

                                    $cnt++;
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card overflow-hidden" style="height: 380px">
                    <div class="card-body" id="vertical-example3">
                        <h5 class="card-title text-dark">Staffs on Leave</h5>
                            <?php
                            $sql = "SELECT b.f_full_name, c.f_leave_name, a.f_total, a.f_start_date, a.f_end_date, a.f_start_time, a.f_end_time, b.f_picture FROM leaves a 
                                    LEFT JOIN employees b 
                                    ON a.f_emp_id=b.f_emp_id 
                                    LEFT JOIN leave_type c 
                                    ON a.f_leave_type=c.f_id
                                    WHERE f_status='Approved' AND f_start_date='$curdate';";
                            // echo $sql;
                            $result = mysqli_query($conn, $sql);
                            $nums = mysqli_num_rows($result);
                            
                            if($nums > 0){
                                while($rows = mysqli_fetch_array($result)){
                                    $full_name = $rows['f_full_name'];
                                    $leave_name = $rows['f_leave_name'];
                                    $total = $rows['f_total'];
                                    $start_date = $rows['f_start_date'];
                                    $end_date = $rows['f_end_date'];
                                    $start_time = $rows['f_start_time'];
                                    $end_time = $rows['f_end_time'];
                                    $picture = $rows['f_picture'];

                                    if($total > 1){
                                        $total_days = $total." days";
                                    }elseif($total < 1){
                                        if($end_time <= "13:00:00"){
                                            $total_days = "half day (AM)";
                                        }else{
                                            $total_days = "half day (PM)";
                                        }
                                        
                                    }else{
                                        $total_days = $total." day";
                                    }

                                    $start = date("d/m/Y", strtotime($start_date));
                                    $end = date("d/m/Y", strtotime($end_date));

                                    echo '
                                    <div class="card" style="background-image: linear-gradient(to right top, #d5e3f8, #dae1fa, #e0defa, #e8dbf9, #f0d8f5);">
                                        <div class="card-body" style="text-align: center;" id="vertical-example">
                                            <img src="../upload/profile/'.$picture.'" class="iconDetails">
                                            <p class="text-dark" style="font-size: 0.9em; margin-top: 1rem;">'.$full_name.' is on <b>'.$leave_name.'</b>&nbsp;<br>
                                                <span class="badge bg-label-primary">'.$total_days.'</span>
                                                <br>
                                                '?>
                                                <?php
                                                if($total >= 1){
                                                    echo '
                                                    <span class="badge bg-label-primary">'.$start.'-'.$end.'</span>
                                                    ';
                                                }else{
                                                    echo '
                                                    <span class="badge bg-label-primary">'.$start.'</span>
                                                    ';
                                                }
                                                ?>
                                                <?php echo'
                                            </p>
                                        </div>
                                    </div>
                                    
                                    ';

                                }
                            }

                            ?>
                        
                    </div>
                </div>
            </div>



            <div class="col-md-5 mb-4">
                <div class="card overflow-hidden" style="height: 380px">
                    <div class="card-body" id="vertical-example4">
                        <h5 class="card-title text-info">2022 Holidays 🎉</h5>
                        <?php
                        $sql = "SELECT * FROM holidays";
                        // echo $sql;
                        $result = mysqli_query($conn, $sql);
                        $nums = mysqli_num_rows($result);

                        if($nums > 0){
                            while($rows = mysqli_fetch_array($result)){
                                $holiday_name = $rows['f_holiday_name'];
                                $start_date = $rows['f_start_date'];
                                $end_date = $rows['f_end_date'];

                                if($start_date != $end_date){
                                    $date = date("jS F Y", strtotime($start_date))."-<br>".date("jS F Y", strtotime($end_date));
                                }else{
                                    $date = date("jS F Y", strtotime($start_date));
                                }

                                echo '
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="col-lg-6">
                                        <span class="fw-semibold d-block mb-1" style="font-size: 0.9em;">'.$holiday_name.'</span>
                                    </div>
                                    <div class="col-lg-4" style="text-align:right; font-size: 0.9em;">
                                        <span class="fw-semibold d-block mb-1">'.$date.'</span>
                                    </div>
                                </div>
                                <hr>
                                ';
                            }
                        }
                        
                        ?>
                        
<!-- 
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="flex-shrink-0">
                                <span class="fw-semibold d-block mb-1">Hari Raya Puasa</span>
                            </div>
                            <div class="dropdown">
                                <span class="fw-semibold d-block mb-1">3rd May 2022</span>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-7 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header" style="text-align: center;">Sales & Marketing</h5>
                    <div class="card-body">
                        <div id="totalRevenueChart" class="px-2"></div>
                    </div>

                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header" style="text-align: center;">Project Management</h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Project Status</th>
                                        <th>Project Quantity</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td><span class="badge bg-label-primary me-1">Design</span></td>

                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>20</strong></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-label-info me-1">In - Development</span></td>

                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>14</strong></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-label-warning me-1">UAT</span></td>

                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>4</strong></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-label-dark me-1">Training</span></td>

                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-label-success me-1">Handover</span></td>

                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-label-danger me-1">On Hold</span></td>

                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>3</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card overflow-hidden mb-4" style="height: 200px">
                    <h5 class="card-header">Job Vacancy</h5>
                    <div class="card-body" id="vertical-example5">
                    <?php
                    $mysql = "SELECT * FROM vacancy";
                    $myquery = $dbh->prepare($mysql);
                    $myquery->execute();
                    while($myresult = $myquery->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="alert alert-dark" role="alert" style="text-align: center;"><b><?php echo $myresult["position"];?></b><br>This position has <?php echo $myresult["availibility"];?> places left!</div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-2">
                <div class="card overflow-hidden mb-4" style="height: 200px">
                    <h5 class="card-header text-warning">Motivation Quote</h5>
                    <div class="card-body" id="vertical-example2">
                        <?php 
                        $qSql = "SELECT * FROM quotes a LEFT JOIN employees b ON a.f_emp_id=b.f_emp_id WHERE a.f_delete='N' ORDER BY a.f_id DESC LIMIT 1";
                        $qQuery = $dbh->prepare($qSql);
                        $qQuery->execute();

                        $qResult = $qQuery->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p><?php echo $qResult["f_quotes"];?></p>
                        <p style="float: right;"><b><i><?php echo $qResult["f_full_name"];?></i></b></p>
                      
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <?php include_once("../menu/footer.php"); ?>