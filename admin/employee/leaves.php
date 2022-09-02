<?php
session_start();
error_reporting(0);
include_once('../include/config.php');
// include_once("../include/functions.php");
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
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Application Form /</span> Leaves</h4>
		<div class="col-md-12">
			<button class="btn btn-primary" style="float:right" data-bs-toggle="modal" data-bs-target="#add_leave"><i class="bx bx-plus"></i>Apply Leave</button>
		</div>
		<form method="POST" enctype="multipart/form-data">
			<div class="row mb-4">
				<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2">
					<div class="form-group form-focus">
						<input type="text" id="emp_id" name="emp_id" class="form-control floating" placeholder="employee ID">
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2">
					<div class="form-group form-focus">
						<input type="text" id="emp_name" name="emp_name" class="form-control floating" placeholder="employee name">
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2">
					<div class="form-group form-focus select-focus">
						<select id="status" name="status" class="form-select">
							<option value="0"> Select Status </option>
							<option value="1">Approve</option>
							<option value="2">Pending</option>
							<option value="3">Rejected</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2">
					<a href="#" id="leave_search" name="leave_search" class="btn btn-primary"> Search </a>
				</div>
			</div>
		</form>

		<div class="row mb-4" >
			<div class="col-md-12">
				<div class="card">
					<div class="table-responsive text-nowrap">
						<table class="table table-striped datatables" id="leave_list">
							<!-- <thead>
								<tr>
									<th>Employee</th>
									<th>Request Date</th>
									<th>Leave Type</th>
									<th>Date (From)</th>
									<th>Date (To)</th>
									<th>Balance</th>
									<th>Total</th>
									<th>Reason</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody class="table-border-bottom-0" id="leave_list">
							</tbody> -->
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
		
		<?php include_once '../include/modals/leave/add_leave.php'; ?>
		<!-- /Add Leave Modal -->

		<!-- Edit Leave Modal -->
		<?php include_once '../include/modals/leave/approve_leave.php'; ?>
		<!-- /Edit Leave Modal -->

		<!-- Edit Leave Modal -->
		<?php include_once '..//include/modals/leave/edit_leave.php'; ?>
		<!-- /Edit Leave Modal -->

		<!-- Delete Leave Modal -->
		<?php include_once '../include/modals/leave/delete_leave.php'; ?>
		<!-- /Delete Leave Modal -->

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
			events: "../controller/ajax/calendar_search/leaves.php"
		});
		calendar.render();
	});
</script>

<script type="text/javascript">
	emp_id = $('#emp_id').val();
	emp_name = $('#emp_name').val();
	status = $('#status').val();

	console.log(emp_id);
	console.log(emp_name);
	console.log(status)

	var url = "../controller/ajax/check_leave/search.php";

	$.get(url, {
		emp_id: emp_id,
		emp_name: emp_name,
		status: status
	})
	.done(function(data) {
		if (data) {
			// console.log(data);
			$('#leave_list').html(data);

		} else {
			console.log('no data');
		}
	})

	// $('#leave_list').DataTable( {
    //     "processing": true,
    //     "serverSide": true,
    //     "ajax": {
    //         "url": "../controller/ajax/check_leave/search.php",
    //         "type": "GET"
    //     }
    // } );

	$(document).ready(function() {
		$('#leave_search').click(function() {

			emp_id = $('#emp_id').val();
			emp_name = $('#emp_name').val();
			status = $('#status').val();

			console.log(emp_id);
			console.log(emp_name);
			console.log(status)

			var url = "../controller/ajax/check_leave/search.php";

			$.get(url, {
					emp_id: emp_id,
					emp_name: emp_name,
					status: status
				})
				.done(function(data) {
					if (data) {
						// console.log(data);
						$('#leave_list').html(data);

					} else {
						console.log('no data');
					}
				})

		})
	});
</script>
<script>
	<?php
	$sql = "SELECT * FROM leaves";
	$query = $dbh->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $row) {

	?>

			$('#approve<?php echo htmlentities($row->f_id) ?>').click(function() {
				var appr_delete = $(this).attr("data-value");
				console.log(appr_delete);
				$('#appr_delete').val(appr_delete);
			})
	<?php
			$cnt += 1;
		}
	}
	?>
</script>