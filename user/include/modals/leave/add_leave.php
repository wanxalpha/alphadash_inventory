<div id="add_leave" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalCenterTitle">Apply Leave</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form method="POST" enctype="multipart/form-data" id="add_leave_form">
						<div class="form-group" id="leave_show" style="display:none">
							<div class="row">
								<div class="col-md-12">
									<div class="card-group m-b-5">
										<div class="card">
											<div class="card-body">
												<div class="d-flex justify-content-between mb-3">
													<div>
														<span class="d-block">Annual Leave</span>
													</div>
												</div>
												<h3 class="mb-3" id="annual_leave"></h3>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="d-flex justify-content-between mb-3">
													<div>
														<span class="d-block">Medical Leave</span>
													</div>
												</div>
												<h3 class="mb-3" id="medical_leave"></h3>
											</div>
										</div>
										<div class="card" id="maternity">
											<div class="card-body">
												<div class="d-flex justify-content-between mb-3">
													<div>
														<span class="d-block">Maternity Leave</span>
													</div>
												</div>
												<h3 class="mb-3" id="maternity_leave"></h3>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="d-flex justify-content-between mb-3">
													<div>
														<span class="d-block">Hospital Leave</span>
													</div>
												</div>
												<h3 class="mb-3" id="hospital_leave"></h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Leave Type <span class="text-danger">*</span></label>
									<select name="leave_type" id="leave_type" class="form-select" onchange="set_date(); set_file();">
										<option>Select Leave Type</option>
									</select>
								</div>
								<div class="col-md-3 m-t-30 m-l-100" id="day_checked" name="day_checked" style="display:none">
									<table>
										<tr>
											<td width="30px">
												<input name="half_day" id="half_day" class="form-control" style="height:30px" value="off" type="checkbox" onchange="handleChange(this);">
											</td>
											<td>
												&nbsp;&nbsp;&nbsp;Half Day
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="form-group" id="from_to_date" style="display:block">
							<div class="row">
								<div class="col-md-6">
									<label>From <span class="text-danger">*</span></label>
									<input name="starting_at" id="starting_at" class="form-control" type="date">
								</div>
								<div class="col-md-6">
									<label>To <span class="text-danger">*</span></label>
									<input name="ends_on" id="ends_on" class="form-control" type="date" onchange="check_date();">
								</div>
							</div>
						</div>
						<div class="form-group" id="choose_datetime" style="display:none">
							<div class="row">
								<div class="col-md-6">
									<label>Date <span class="text-danger">*</span></label>
									<input name="choose_date" id="choose_date" class="form-control" type="date">
								</div>
								<div class="col-md-3">
									<label>From <span class="text-danger">*</span></label>
									<input name="time_one" id="time_one" min="09:00" max="18:00" class="form-control" type="time">
								</div>
								<div class="col-md-3">
									<label>To <span class="text-danger">*</span></label>
									<input name="time_two" id="time_two" min="09:00" max="18:00" class="form-control" type="time">
								</div>
							</div>
						</div>
						<div class="form-group" id="num_of_days">
							<label>Number of days <span class="text-danger">*</span></label>
							<input name="days_count" id="days_count" class="form-control" type="number">
							<h6 class="text-danger" style="display:none" id="countdate"></h6>
						</div>

						<div class="form-group">
							<label>Leave Reason <span class="text-danger">*</span></label>
							<textarea name="reason" rows="4" class="form-control"></textarea>
						</div>
						<!-- <div class="col-sm-4" id="permit_div2"> -->
						<div class="form-group" id="leave_file" style="display:none">
							<label class="col-form-label">Supporting Document<span class="text-danger">*</span></label>
							<input class="form-control" id="picture_image" name="picture_image" type="file">
							<i></i>
							<h6 class="text-danger">max size not more than 2MB</h6>
						</div>
						<input name="emp_code" id="emp_code" value="<?php echo $emp_code?>" class="form-control" type="text" hidden>
						<!-- </div> -->
						<div class="submit-section">
							<button type="button" name="add_leave" id="leave_btn" class="btn btn-primary submit-btn" onclick="insert_leave()">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function handleChange(checkbox) {
		if (checkbox.checked == true) {
			console.log('ok');
			$('#half_day').val('on');
			$('#num_of_days').hide();
			$('#choose_datetime').css("display", "block");
			$('#from_to_date').css("display", "none");
		} else {
			$('#half_day').val('off');
			$('#num_of_days').show();
			$('#choose_datetime').css("display", "none");
			$('#from_to_date').css("display", "block");
		}
	}
</script>
<script>
	function set_date() {
		leave_type = $('#leave_type').val();

		console.log(leave_type);

		if (leave_type == '1' || leave_type == '6' || leave_type == '2' || leave_type == '4') {
			$('#day_checked').css("display", "block");
		} else {
			$('#day_checked').css("display", "none");
		}
	}

	function set_file() {
		leave_type = $('#leave_type').val();

		console.log(leave_type);

		if (leave_type == '1' || leave_type == '6' || leave_type == '2') {
			$('#leave_file').css("display", "none");
		} else {
			$('#leave_file').css("display", "block");
		}
	}
</script>
<script>
	function check_date() {
		date1 = $('#starting_at').val();
		date2 = $('#ends_on').val();
		balance = $('#claim_date').val();
		leave_type = $('#leave_type').val();

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

			var url = "../../backend/controller/ajax/check_leave/check_holiday.php";

			$.get(url, {
					date1: date1,
					date2: date2
				})
				.done(function(data) {
					if (data) {
						minus = data;
						final_count = sum + 1 - minus;
						console.log(final_count);
						$('#days_count').val(final_count);
						document.getElementById("days_count").readOnly = true;

						apply = $('#days_count').val();
						console.log(apply);

						if (leave_type == 1) {
							if (apply > balance) {
								console.log('error');
								$('#countdate').css('display', 'block');
								$('#countdate').text('Your Leave Balance Have Only ' + balance + ' Day, Please Select Again');
								$('#leave_btn').addClass('disabled');
							} else {
								$('#countdate').css('display', 'block');
								$('#leave_btn').removeClass('disabled');
							}
						}


					} else {
						minus = 0;
						final_count = sum + 1 - minus;
						console.log(final_count);
						$('#days_count').val(final_count);
						document.getElementById("days_count").readOnly = true;

						apply = $('#days_count').val();
						console.log(apply);

						if (leave_type == 1) {
							if (apply > balance) {
								console.log('error');
								$('#countdate').css('display', 'block');
								$('#countdate').text('Your Leave Balance Have Only ' + balance + ' Day, Please Select Again');
								$('#leave_btn').addClass('disabled');
							} else {
								$('#countdate').css('display', 'block');
								$('#leave_btn').removeClass('disabled');
							}
						}
					}
				})


		}
	}
</script>
<script>
	function insert_leave() {

		let myForm = document.getElementById('add_leave_form');
		let formData = new FormData(myForm);

		for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

		$.ajax({
			url: '../controller/ajax/add_function/add_leave.php',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				console.log(response);
				if (response != 0) {
					alert('add leave complete');
				} else {
					alert('add leave failed');
				}
			},
		});
	}
</script>