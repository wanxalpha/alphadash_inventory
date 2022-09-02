<div id="add_facility" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Book Facility</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Employee Name <span class="text-danger">*</span></label>
						<select name="employee" id="employees" class="form-select">
							<option>Select Employee</option>
							<?php
							$sql2 = "SELECT * from employees";
							$query2 = $dbh->prepare($sql2);
							$query2->execute();
							$result2 = $query2->fetchAll(PDO::FETCH_OBJ);
							foreach ($result2 as $row) {
							?>
								<option value="<?php echo htmlentities($row->f_emp_id); ?>">
									<?php echo htmlentities($row->f_full_name); ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
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
					<div class="form-group">
						<label>Room Available <span class="text-danger">*</span></label>
						<select name="room" id="room" class="form-select">
							<option>Select Room</option>
							<?php
							$sql = "SELECT * FROM facility_room WHERE f_delete='N'";
							$result = mysqli_query($conn, $sql);
							$nums = mysqli_num_rows($result);

							if($nums > 0){
								while($rows = mysqli_fetch_array($result)){

									$room_id = $rows['f_id'];
									$room_name = $rows['f_room'];

									echo '
									<option value="'.$room_id.'">'.$room_name.'</option>;
									';
								}
							}
							
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Description <span class="text-danger">*</span></label>
						<textarea name="description" rows="4" class="form-control"></textarea>
					</div>
					<div class="submit-section">
						<button type="submit" name="add_facility" id="leave_btn" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	function set_date() {
		booking_date = $('#choose_date').val();
		start_time = $('#time_one').val();
		end_time = $('#time_two').val();

		console.log(booking_date);
		console.log(start_time);
		console.log(end_time);

		if(booking_date != ""){

			var url = "../controller/ajax/check_facility/check_facility.php";

			$.get(url, {
				booking_date: booking_date,
				start_time: start_time,
				end_time: end_time
			})


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