<div id="edit_leave" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Leave</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label>Leave Type <span class="text-danger">*</span></label>
							<select class="form-select" id="leave_type2" name="edit_leave_type" disabled="disabled">
								<option>Select Leave Type</option>

							</select>
						</div>
						<div class="col-md-3">
							<label>Remaining Leaves <span class="text-danger">*</span></label>
							<input class="form-control" readonly="" id="leave_balance" value="" type="text">
						</div>
						<div class="col-md-3 m-t-30 m-l-100">
							<table>
								<tr>
									<td width="30px">
										<input name="edit_half_day" id="half_day2" class="form-control" style="height:30px; margin-top:25px;" value="off" type="checkbox" onclick="return false">
									</td>
									<td>
										&nbsp;&nbsp;&nbsp;<span style="margin-top:25px">Half Day</span>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="form-group" id="full_day_group">
					<div class="row">
						<div class="col-md-6">
							<label>From Date <span class="text-danger">*</span></label>
							<input class="form-control" id="start_date" name="edit_start_date" value="" type="date" readonly>
						</div>
						<div class="col-md-6">
							<label>To Date <span class="text-danger">*</span></label>
							<input class="form-control" id="end_date" name="edit_end_date" value="" type="date" readonly>
						</div>
					</div>
				</div>
				<div class="form-group" id="half_day_group">
					<div class="row">
						<div class="col-md-6">
							<label>Date <span class="text-danger">*</span></label>
							<input class="form-control" id="d_date" name="edit_choose_date" value="" type="date" readonly>
						</div>
						<div class="col-md-3">
							<label>From <span class="text-danger">*</span></label>
							<input class="form-control" id="edit_time_one" name="edit_time_one" value="" type="time" readonly>
						</div>
						<div class="col-md-3">
							<label>To <span class="text-danger">*</span></label>
							<input class="form-control" id="edit_time_two" name="edit_time_two" value="" type="time" readonly>
						</div>
					</div>
				</div>
				<form method="POST" enctype="multipart/form-data" action="../controller/ajax/edit_function/update_leaves.php">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Number of days <span class="text-danger">*</span></label>
								<input class="form-control" readonly="" id="total_date" name="edit_day_count" type="text" value="">
							</div>
							<div class="col-md-6">
								<label>Update Image <span class="text-danger">*</span></label>
								<input class="form-control upload" id="update_leave_image" name="edit_picture_image" type="file">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Leave Reason <span class="text-danger">*</span></label>
								<textarea rows="4" id="leave_reason" name="edit_reason" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<input type="text" id="edit_leave_id" name="edit_leave_id" class="form-control" value="" hidden>
					<div class="submit-section">
						<button type="submit" name="edit_leave" id="edit_leave_btn" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	function check_claim_date2() {
		employees = $('#employees').val();

		console.log(employees);
		if (employees != "") {

			var url = "../controller/ajax/check_leave/check_leave.php";

			$.get(url, {
					employees: employees
				})
				.done(function(data) {
					if (data) {

						var len = JSON.parse(data);
						console.log(len);
						$('#claim_date').val(len);

					} else {
						console.log('no data');
					}
				})
		}
	}
</script>
<script>
	function check_date2() {
		date1 = $('#start_date').val();
		date2 = $('#end_date').val();

		if (date1 != "" && date2 != "") {
			dt1 = new Date(date1);
			dt2 = new Date(date2);
			time_count = dt2.getTime() - dt1.getTime();
			day_count = (time_count / (1000 * 60 * 60 * 24));
			var week = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
			sum = 0;

			for (let i = 0; i < day_count; i++) {
				days = week[(dt1.getDay() + 1 + i) % 7]

				if (days == "Sunday" || days == "Saturday") {

				} else {

					sum += 1;
				}
			}

			var url = "../controller/ajax/check_leave/check_holiday.php";

			$.get(url, {
					date1: date1,
					date2: date2
				})
				.done(function(data) {
					if (data) {
						minus = data;
						final_count = sum + 1 - minus;
						console.log(final_count);
						$('#total_date').val(final_count);
						document.getElementById("total_date").readOnly = true;

					} else {
						minus = 0;
						final_count = sum + 1 - minus;
						console.log(final_count);
						$('#total_date').val(final_count);
						document.getElementById("total_date").readOnly = true;
					}
				})


		}
	}
</script>