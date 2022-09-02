<div class="modal custom-modal fade" id="add_holiday" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Holiday</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="../controller/ajax/add_function/add_holiday.php">
					<div class="form-group">
						<label>Holiday Name <span class="text-danger">*</span></label>
						<input name="holiday_name" id="holiday_name" class="form-control" required type="text">
					</div>
					<div class="row">
						<div class="col-sm-6 form_group">
							<label>From Date <span class="text-danger">*</span></label>
							<input class="form-control" name="holiday_date1" id="holiday_date1" required type="date" onchange="check_holiday1()">
						</div>
						<div class="col-sm-6 form_group">
							<label>To Date <span class="text-danger">*</span></label>
							<input class="form-control" name="holiday_date2" id="holiday_date2" required type="date" onchange="check_holiday2(); check_holiday3()">
						</div>
						<h6 class="text-danger" id="notice"></h6>
					</div>
					<input name="holiday_day1" id="holiday_day1" class="form-control" required type="text" hidden>
					<input name="holiday_day2" id="holiday_day2" class="form-control" required type="text" hidden>
					<div class="form-group"  id="replace_start_date" style="display:none;">
						<label>Replace Start Date <span class="text-danger">*</span></label>
						<input class="form-control" name="restart_date" id="restart_date" type="date" onchange="check_restart(); check_holiday4()">
					</div>
					<div class="form-group"  id="replace_end_date" style="display:none;">
						<label>Replace End Date <span class="text-danger">*</span></label>
						<input class="form-control" name="reend_date" id="reend_date" type="date" onchange="check_reend()">
					</div>
					<input name="restart_day" id="restart_day" class="form-control" type="text" hidden>
					<input name="reend_day" id="reend_day" class="form-control" type="text" hidden>
					<input name="duplicate" id="duplicate" class="form-control" value="" type="text" >
					<div class="submit-section">
						<button name="add_holiday" type="submit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	function check_holiday1(){
		
		holiday_date1 = $('#holiday_date1').val();
		console.log(holiday_date1);

		const d = new Date(holiday_date1);
		let day = d.getDay();
		console.log(day);

		if(day == 0){
			$('#holiday_day1').val("Sunday");
			$("#replace_start_date").css('display', 'block');
			$("#restart_date").prop('required', true);
			$("#restart_day").prop('required', true);
		}else{
			$('#replace_start_date').css('display', 'none');
			$("#restart_date").prop('required', false);
			$("#restart_day").prop('required', false);
			if(day == 1){
				$('#holiday_day1').val("Monday");
			}else if(day == 2){
				$('#holiday_day1').val("Tuesday");
			}else if(day == 3){
				$('#holiday_day1').val("Wednesday");
			}else if(day == 4){
				$('#holiday_day1').val("Thursday");
			}else if(day == 5){
				$('#holiday_day1').val("Friday");
			}else if(day == 6){
				$('#holiday_day1').val("Saturday");
			}
		}

	}

	function check_holiday2(){
		
		holiday_date2 = $('#holiday_date2').val();
		console.log(holiday_date2);

		const d = new Date(holiday_date2);
		let day = d.getDay();
		console.log(day);

		if(day == 0){
			$('#holiday_day2').val("Sunday");
			$("#replace_end_date").css('display', 'block');
			$("#reend_date").prop('required', true);
			$("#reend_day").prop('required', true);
		}else{
			$('#replace_end_date').css('display', 'none');
			$("#reend_date").prop('required', false);
			$("#reend_day").prop('required', false);
			if(day == 1){
				$('#holiday_day2').val("Monday");
			}else if(day == 2){
				$('#holiday_day2').val("Tuesday");
			}else if(day == 3){
				$('#holiday_day2').val("Wednesday");
			}else if(day == 4){
				$('#holiday_day2').val("Thursday");
			}else if(day == 5){
				$('#holiday_day2').val("Friday");
			}else if(day == 6){
				$('#holiday_day2').val("Saturday");
			}
		}

	}
</script>
<script>
	function check_holiday3(){

		date1 = $('#holiday_date1').val();
		date2 = $('#holiday_date2').val();

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
						$('#notice').text("Please select replacement day because there is holiday between these days");
						$("#replace_date").css('display', 'block');
						$("#duplicate").val("Y");
					}else{
						$("#duplicate").val("N");
					}
				})

			
		}
	}

	function check_holiday4(){
		date1 = $('#holiday_date2').val();
		date2 = $('#restart_date').val();

		console.log(date1);
		console.log(date2);

		if(date1 == date2){
			$("#replace_end_date").css('display', 'block');
			$("#reend_date").prop('required', true);
			$("#reend_day").prop('required', true);
		}else{
			$('#replace_end_date').css('display', 'none');
			$("#reend_date").prop('required', false);
			$("#reend_day").prop('required', false);
		}
	}
</script>
<script>
	function check_restart(){
		replace_date = $('#restart_date').val();
		console.log(replace_date);

		const d = new Date(replace_date);
		let day = d.getDay();
		console.log(day);

		if(day == 1){
			$('#restart_day').val("Monday");
		}else if(day == 2){
			$('#restart_day').val("Tuesday");
		}else if(day == 3){
			$('#restart_day').val("Wednesday");
		}else if(day == 4){
			$('#restart_day').val("Thursday");
		}else if(day == 5){
			$('#restart_day').val("Friday");
		}else if(day == 6){
			$('#restart_day').val("Saturday");
		}
	}

	function check_reend(){
		replace_date = $('#reend_date').val();
		console.log(replace_date);

		const d = new Date(replace_date);
		let day = d.getDay();
		console.log(day);

		if(day == 1){
			$('#reend_day').val("Monday");
		}else if(day == 2){
			$('#reend_day').val("Tuesday");
		}else if(day == 3){
			$('#reend_day').val("Wednesday");
		}else if(day == 4){
			$('#reend_day').val("Thursday");
		}else if(day == 5){
			$('#reend_day').val("Friday");
		}else if(day == 6){
			$('#reend_day').val("Saturday");
		}
	}
</script>

