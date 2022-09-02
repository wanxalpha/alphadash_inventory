<div class="modal custom-modal fade" id="add_memo" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Memo</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="POST" id="new_memo" enctype="multipart/form-data" action="../controller/ajax/add_function/add_memo.php">
					<div class="form-group">
						<label>Title <span class="text-danger">*</span></label>
						<input name="title_name" id="title_name" class="form-control" required type="text">
					</div>
					<div class="form_group">
						<label>Description <span class="text-danger">*</span></label>
						<textarea name="memo_description" id="memo_description" rows="4" class="form-control" required></textarea>
					</div>
					<div class="form_group">
						<label>Upload File <span class="text-danger">*</span></label>
						<input class="form-control" name="memo_file" id="memo_file" type="file">
					</div>
					<h6 class="text-danger" id="notice"></h6>
					<input name="emp_id" id="emp_id" class="form-control" type="text" value="<?php echo $emp_code ?>" hidden>
					<div class="submit-section">
						<button name="add_memo" id="memo_submit" type="submit" class="btn btn-primary submit-btn" onclick="loading()">Submit</button>
						<button type="button" id="memo_load" style="display:none;" class="btn btn-primary submit-btn">
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
	function loading() {

		$('#memo_submit').css("display", "none");
		$('#memo_load').css("display", "block");

	}
</script>