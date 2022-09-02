<div id="edit_designation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Designation</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="../controller/ajax/edit_function/update_designation.php">
					<div class="form-group mb-3">
						<label>Designation Name <span class="text-danger">*</span></label>
						<input class="form-control" id="desc_name" name="desc_name" value="" type="text">
					</div>
					<div class="form-group mb-3">
						<label>Department <span class="text-danger">*</span></label>
						<select class="form-select" id="department_listing" name="department_listing">
							
						</select>
					</div>
					<div class="form-group mb-3">
						<label>Designation Code <span class="text-danger">*</span></label>
						<input class="form-control" id="desc_code" name="desc_code" value="" type="text">
					</div>
					<input class="form-control" id="desc_id" name="desc_id" value="" type="text" hidden>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

