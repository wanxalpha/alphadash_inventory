<div class="modal custom-modal fade" id="add_handbook" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add handbook</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="POST" id="new_handbook" enctype="multipart/form-data" action="../controller/ajax/add_function/add_handbook.php">
					<div class="form-group">
						<label>Title <span class="text-danger">*</span></label>
						<input name="title_name" id="title_name" class="form-control" required type="text">
					</div>
					<div class="form_group">
						<label>Upload File <span class="text-danger">*</span></label>
						<input class="form-control" name="hand_file" id="memo_file" type="file">
					</div>
					<h6 class="text-danger" id="notice"></h6>
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