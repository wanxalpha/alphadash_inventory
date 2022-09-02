<div class="modal custom-modal fade" id="edit_holiday" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Holiday</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="../controller/ajax/edit_function/update_holiday.php">
					<div class="form-group">
						<label>Holiday Name <span class="text-danger">*</span></label>
						<input name="edit_holiday_name" id="edit_holiday_name" class="form-control" required type="text">
					</div>
					<div class="row">
						<div class="col-sm-6 form_group">
							<label>From Date <span class="text-danger">*</span></label>
							<input class="form-control" name="edit_holiday_date1" id="edit_holiday_date1" required type="date" onchange="check_holiday1()">
						</div>
						<div class="col-sm-6 form_group">
							<label>To Date <span class="text-danger">*</span></label>
							<input class="form-control" name="edit_holiday_date2" id="edit_holiday_date2" required type="date" onchange="check_holiday2(); check_holiday3()">
						</div>
						<h6 class="text-danger" id="edit_notice"></h6>
					</div>
					<input name="edit_holiday_day1" id="edit_holiday_day1" class="form-control" required type="text" hidden>
					<input name="edit_holiday_day2" id="edit_holiday_day2" class="form-control" required type="text" hidden>
					<div class="form-group"  id="edit_replace_start_date" style="display:none;">
						<label>Replace Start Date <span class="text-danger">*</span></label>
						<input class="form-control" name="edit_restart_date" id="edit_restart_date" type="date" onchange="check_restart(); check_holiday4()">
					</div>
					<div class="form-group"  id="edit_replace_end_date" style="display:none;">
						<label>Replace End Date <span class="text-danger">*</span></label>
						<input class="form-control" name="edit_reend_date" id="edit_reend_date" type="date" onchange="check_reend()">
					</div>
					<input name="edit_restart_day" id="edit_restart_day" class="form-control" type="text" hidden>
					<input name="edit_reend_day" id="edit_reend_day" class="form-control" type="text" hidden>
					<input name="edit_duplicate" id="edit_duplicate" class="form-control" value="" type="text" hidden>
					<input name="edit_holiday_name" id="edit_holiday_id" class="form-control" value="" type="text" hidden>
					<div class="submit-section">
						<button name="edit_holiday" type="submit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	function check_holiday3(){

		date1 = $('#edit_holiday_date1').val();
		date2 = $('#edit_holiday_date2').val();

		console.log(date1);
		console.log(date2);

		if (date1 != "" && date2 != "") {
			
			var url = "../controller/ajax/check_leave/check_holiday.php";

			$.get(url, {
					date1: date1,
					date2: date2
				})
				.done(function(data) {
					if (data>0) {
						$('#edit_notice').text("Please select replacement day because there is holiday between these days");
						$("#edit_replace_date").css('display', 'block');
						$("#edit_duplicate").val("Y");
					}else{
						$("#edit_duplicate").val("N");
					}
				})

			
		}
	}

	function check_holiday4(){
		date1 = $('#edit_holiday_date2').val();
		date2 = $('#edit_restart_date').val();

		console.log(date1);
		console.log(date2);

		if(date1 == date2){
			$("#edit_replace_end_date").css('display', 'block');
			$("#edit_reend_date").prop('required', true);
			$("#edit_reend_day").prop('required', true);
		}else{
			$('#edit_replace_end_date').css('display', 'none');
			$("#edit_reend_date").prop('required', false);
			$("#edit_reend_day").prop('required', false);
		}
	}
</script>
<script>
	function check_restart(){
		replace_date = $('#edit_restart_date').val();
		console.log(replace_date);

		const d = new Date(replace_date);
		let day = d.getDay();
		console.log(day);

		if(day == 1){
			$('#edit_restart_day').val("Monday");
		}else if(day == 2){
			$('#edit_restart_day').val("Tuesday");
		}else if(day == 3){
			$('#edit_restart_day').val("Wednesday");
		}else if(day == 4){
			$('#edit_restart_day').val("Thursday");
		}else if(day == 5){
			$('#edit_restart_day').val("Friday");
		}else if(day == 6){
			$('#edit_restart_day').val("Saturday");
		}
	}

	function check_reend(){
		replace_date = $('#edit_reend_date').val();
		console.log(replace_date);

		const d = new Date(replace_date);
		let day = d.getDay();
		console.log(day);

		if(day == 1){
			$('#edit_reend_day').val("Monday");
		}else if(day == 2){
			$('#edit_reend_day').val("Tuesday");
		}else if(day == 3){
			$('#edit_reend_day').val("Wednesday");
		}else if(day == 4){
			$('#edit_reend_day').val("Thursday");
		}else if(day == 5){
			$('#edit_reend_day').val("Friday");
		}else if(day == 6){
			$('#edit_reend_day').val("Saturday");
		}
	}
</script>