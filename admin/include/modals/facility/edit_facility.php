<div id="edit_facility" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Facility</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label>Room Type <span class="text-danger">*</span></label>
							<select class="form-select" id="room_type2" name="edit_room_type">
								<option>Select Room Type</option>

							</select>
						</div>
						<div class="col-md-6"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label>Date <span class="text-danger">*</span></label>
							<input class="form-control" id="book_date" name="edit_choose_date" value="" type="date">
						</div>
						<div class="col-md-3">
							<label>From <span class="text-danger">*</span></label>
							<input class="form-control" id="edit_time_one" name="edit_time_one" value="" type="time">
						</div>
						<div class="col-md-3">
							<label>To <span class="text-danger">*</span></label>
							<input class="form-control" id="edit_time_two" name="edit_time_two" value="" type="time">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<label>Description <span class="text-danger">*</span></label>
							<textarea rows="4" id="edit_description" name="edit_description" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<input type="text" id="edit_facility_id" name="edit_facility_id" class="form-control" value="" hidden>
				<div class="submit-section">
					<button type="submit" name="edit_facility" id="edit_facility_btn" class="btn btn-primary submit-btn" onclick="update_facility()">Submit</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function update_facility() {
		room_id = $('#edit_facility_id').val();
		room_type = $('#room_type2').val();
		book_date = $('#book_date').val();
		time_one = $('#edit_time_one').val();
		time_two = $('#edit_time_two').val();
		description = $('#edit_description').val();

		console.log(room_id);
		console.log(room_type);
		console.log(book_date);
		console.log(time_one);
		console.log(time_two);
		console.log(description);

		if (room_id != "") {

			var url = "../controller/ajax/edit_function/edit_facility.php";

			$.get(url, {
				room_id: room_id,
				room_type: room_type,
				book_date: book_date,
				time_one: time_one,
				time_two: time_two,
				description: description
			})
			.done(function(data) {
				if (data) {

					var len = JSON.parse(data);
					console.log(len);
					var status = len.success;

					if(status == 1){
						window.location = "facility.php";
					}else{
						alert("something went wrong!");
					}
					// $('#claim_date').val(len);

				} else {
					console.log('no data');
				}
			})
		}
	}
</script>
