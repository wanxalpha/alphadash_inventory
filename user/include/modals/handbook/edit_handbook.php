<div class="modal custom-modal fade" id="edit_handbook" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit handbook</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="POST" id="update_hand_info">
					<div class="form-group">
						<label>Title Name <span class="text-danger">*</span></label>
						<input class="form-control" id="edit_title" name="edit_title" value="" type="text">
					</div>
					<div class="form-group">
						<label>Upload File <span class="text-danger">*</span></label>
						<input class="form-control" name="edit_hand_file" id="edit_hand_file" type="file">
					</div>
					<input class="form-control" id="edit_hand_id" name="edit_hand_id" value="" type="text" hidden>
					<div class="submit-section">
						<button name="add_memo" id="edit_hand_btn" class="btn btn-primary submit-btn">Submit</button>
						<button type="button" id="edit_hand_load" style="display:none;" class="btn btn-primary submit-btn">
							<div class="spinner-border spinner-border-sm text-dark" role="status">
								<span class="visually-hidden">Loading...</span>
							</div>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	document.getElementById("edit_hand_btn").addEventListener("click", function(e) {
		e.preventDefault();
		update_memo();
	});

	function update_memo() {

		$('#edit_hand_btn').css("display", "none");
		$('#edit_hand_load').css("display", "block");

		// let myForm = document.getElementById('edit_memo');
		let formData = new FormData(document.getElementById('update_hand_info'));
		console.log(formData);

		$.ajax({
			url: '../controller/ajax/edit_function/update_handbook.php',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				console.log(response);
				if (response != 0) {
					alert('file uploaded');
					window.location.href="../employee/handbook.php";
				} else {
					alert('file not uploaded');
					window.location.href="../employee/handbook.php";
				}
			},
		});
	}
</script>