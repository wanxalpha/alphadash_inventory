<div class="modal custom-modal fade" id="delete_designation" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Designation</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<form method="post" action="../controller/ajax/del_function/del_desc.php">
						<div class="row">
							<input class="form-control" id="del_desc_id" name="del_desc_id" value="" type="text" hidden>
							<div class="col-6">
								<!-- <a href="#" class="btn btn-primary continue-btn" id="delete_desc">Delete</a> -->
								<button type="submit" class="btn btn-primary continue-btn" name="delete_desc" id="delete_desc">Delete</button>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>