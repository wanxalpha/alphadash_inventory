<div class="modal custom-modal fade" id="edit_memo" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Memo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" id="update_memo_info">
					<div class="form-group">
						<label>Title Name <span class="text-danger">*</span></label>
						<input class="form-control" id="edit_title" name="edit_title" value="" type="text">
					</div>
					<div class="form-group">
						<label>Description <span class="text-danger">*</span></label>
						<textarea name="edit_memo_desc" id="edit_memo_desc" rows="4" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Upload File <span class="text-danger">*</span></label>
						<input class="form-control" name="edit_memo_file" id="edit_memo_file" type="file">
					</div>
					<input class="form-control" id="edit_memo_id" name="edit_memo_id" value="" type="text" hidden>
					<div class="submit-section">
						<button name="add_memo" id="edit_memo_btn" class="btn btn-primary submit-btn">Submit</button>
						<button type="button" id="edit_memo_load" style="display:none;" class="btn btn-primary submit-btn">
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
	document.getElementById("edit_memo_btn").addEventListener("click", function(e) {
		e.preventDefault();
		update_memo();
	});

	function update_memo() {

		$('#edit_memo_btn').css("display", "none");
		$('#edit_memo_load').css("display", "block");

		// let myForm = document.getElementById('edit_memo');
		let formData = new FormData(document.getElementById('update_memo_info'));
		console.log(formData);

		$.ajax({
			url: '../controller/ajax/edit_function/update_memo.php',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				console.log(response);
				if (response != 0) {
					alert('file uploaded');
					window.location.href="../employee/memo.php";
				} else {
					alert('file not uploaded');
					window.location.href="../employee/memo.php";
				}
			},
		});
	}
</script>