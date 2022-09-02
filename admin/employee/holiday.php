<?php
session_start();
error_reporting(0);
include_once('../include/config.php');
// include_once("../../backend/includes/functions.php");
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
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Application Form /</span> Holiday</h4>
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary" style="float:right" data-bs-toggle="modal" data-bs-target="#add_holiday"><i class="bx bx-plus"></i>Add Holiday</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="table-responsive text-nowrap">
						<table class="table table-striped">
							<thead>
								<tr>
                                    <th>#</th>
                                    <th>Title </th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Replace Start Date</th>
									<th>Replace End Date</th>
								</tr>
							</thead>
                            <tbody id="holiday_list">
                            </tbody>
						</table>
					</div>
				</div>
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

		<!-- Add Holiday Modal -->
		<?php include_once("../include/modals/holidays/add_holiday.php"); ?>
		<!-- /Add Holiday Modal -->
		
		<!-- Edit Holiday Modal -->
		<?php include_once("../include/modals/holidays/edit_holiday.php"); ?>
		<!-- /Edit Holiday Modal -->

		<!-- Delete Holiday Modal -->
		<?php include_once("../include/modals/holidays/delete_holiday.php"); ?>
		<!-- /Delete Holiday Modal -->

	</div>
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay'
			},
			initialDate: '2020-09-12',
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
			events: [{
					title: 'All Day Event',
					start: '2020-09-01'
				},
				{
					title: 'Long Event',
					start: '2020-09-07',
					end: '2020-09-10'
				},
				{
					groupId: 999,
					title: 'Repeating Event',
					start: '2020-09-09T16:00:00'
				},
				{
					groupId: 999,
					title: 'Repeating Event',
					start: '2020-09-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2020-09-11',
					end: '2020-09-13'
				},
				{
					title: 'Meeting',
					start: '2020-09-12T10:30:00',
					end: '2020-09-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2020-09-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2020-09-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2020-09-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2020-09-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2020-09-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2020-09-28'
				}
			]
		});
		calendar.render();
	});
</script>

<script type="text/javascript">

	var url = "../controller/ajax/check_holiday/search.php";

	$.get(url, {
	})
	.done(function(data) {
		if (data) {
			// console.log(data);
			$('#holiday_list').html(data);

		} else {
			console.log('no data');
		}
	})
</script>
