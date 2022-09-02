<?php
session_start();
error_reporting(0);
include_once('../include/config.php');
include_once("../include/functions.php");
if (strlen($_SESSION['userlogin']) == 0) {
    header('location:login.php');
}

$com_email = $_SESSION['userlogin'];

$sql = "SELECT * FROM employees WHERE f_com_email='$com_email'";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
$emp_id = $row['f_id'];
$emp_name = $row['f_full_name'];
$emp_code = $row['f_emp_id'];
$emp_gender = $row['f_gender'];

$sql2 = "SELECT * FROM leaves WHERE f_emp_id='$emp_code'";
$results2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($results2);
$leave_id = $row2['f_id'];
$leave_type = $row2['f_leave_type'];
$from_date = $row2['f_start_date'];
$to_date = $row2['f_end_date'];
$total_date = $row2['f_total'];
$leave_reason = $row2['f_reason'];
$leave_image = $row2['f_image'];
$leave_status = $row2['f_status'];

// echo $leave_status; exit;

?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Facility Booking</span> </h4>
        <div class="row mb-3">
            <div class="col-md-12">
                <button style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_facility">Book Facility</button>
            </div>

        </div>
        <div class="row mb-4">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2">
                <div class="form-group form-focus">
                    <input type="text" id="emp_name" name="emp_name" class="form-control floating" placeholder="employee name">
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2">
                <div class="form-group form-focus select-focus">
                    <select name="employee" id="employee" class="form-select">
                        <option value="0">Select Employee Name</option>
                        <?php
                        $sql = "SELECT * FROM employees WHERE f_delete='N'";
                        $result = mysqli_query($conn, $sql);
                        $nums = mysqli_num_rows($result);

                        if ($nums > 0) {
                            while ($rows = mysqli_fetch_array($result)) {

                                $emp_id = $rows['f_emp_id'];
                                $emp_name = $rows['f_full_name'];

                                echo '
                                <option value="' . $emp_id . '">' . $emp_name . '</option>
                                ';
                            }
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2">
                <div class="form-group form-focus select-focus">
                    <select name="facility" id="facility" class="form-select">
                        <option value="0">Select Room</option>
                        <?php
                        $sql = "SELECT * FROM facility_room WHERE f_delete='N'";
                        $result = mysqli_query($conn, $sql);
                        $nums = mysqli_num_rows($result);

                        if ($nums > 0) {
                            while ($rows = mysqli_fetch_array($result)) {

                                $room_id = $rows['f_id'];
                                $room_name = $rows['f_room'];

                                echo '
                                <option value="' . $room_id . '">' . $room_name . '</option>
                                ';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2">
                <a href="#" id="leave_search" name="leave_search" class="btn btn-primary"> Search </a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Room</th>
                                    <th>Date</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="facility_list">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Add Leave Modal -->
                <?php include_once '../include/modals/facility/add_facility.php'; ?>
                <!-- /Add Leave Modal -->

                <!-- Edit Leave Modal -->
                <!-- '../includes/modals/leave/approve_leave.php'; -->
                <!-- /Edit Leave Modal -->

                <!-- Edit Leave Modal -->
                <?php include_once '../include/modals/facility/edit_facility.php';?>
                <!-- /Edit Leave Modal -->

                <!-- Delete Leave Modal -->
                <?php include_once '../include/modals/facility/delete_facility.php';?>
                <!-- /Delete Leave Modal -->


            </div>

        </div>

        
        <div class="row mb-4">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id='calendar'></div>

					</div>
				</div>
			</div>
		</div>

    </div>
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var d = new Date();

		var month = d.getMonth() + 1;
		var day = d.getDate();

		var output = d.getFullYear() + '-' +
			(month < 10 ? '0' : '') + month + '-' +
			(day < 10 ? '0' : '') + day;

		var calendarEl = document.getElementById('calendar');

		var calendar = new FullCalendar.Calendar(calendarEl, {
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay'
			},
			initialDate: output,
			navLinks: true, // can click day/week names to navigate views
			selectable: true,
			selectMirror: true,
			select: function(arg) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.addEvent({
						title: title,
						start: arg.start,
						end: arg.end,
						allDay: arg.allDay
					})
				}
				calendar.unselect()
			},
			eventClick: function(arg) {
				if (confirm('Are you sure you want to delete this event?')) {
					arg.event.remove()
				}
			},
			editable: true,
			dayMaxEvents: true, // allow "more" link when too many events
			events: "../controller/ajax/calendar_search/facility.php"
		});
		calendar.render();
	});
</script>

<script type="text/javascript">
    emp_id = $('#employee').val();
    facility = $('#facility').val();

    console.log(emp_id);
    console.log(facility);

    var url = "../controller/ajax/check_facility/search.php";

    $.get(url, {
            emp_id: emp_id,
            facility: facility
        })
        .done(function(data) {
            if (data) {
                // console.log(data);
                $('#facility_list').html(data);

            } else {
                console.log('no data');
            }
        })


    $(document).ready(function() {
        $('#leave_search').click(function() {

            emp_id = $('#employee').val();
            facility = $('#facility').val();

            console.log(emp_id);
            console.log(facility);

            var url = "../controller/ajax/check_facility/search.php";

            $.get(url, {
                    emp_id: emp_id,
                    facility: facility
                })
                .done(function(data) {
                    if (data) {
                        // console.log(data);
                        $('#facility_list').html(data);

                    } else {
                        console.log('no data');
                    }
                })

        })
    });
</script>
