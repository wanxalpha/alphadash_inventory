<div class="modal custom-modal fade" id="delete_approve" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Leave</h3>
					<p>Are you sure want to delete this leave?</p>
				</div>
				<div class="modal-btn delete-action">
					<form method="post" action="../controller/ajax/del_function/del_leave.php">
						<div class="row">
							<div class="col-6">
								<input type="text" id="delete_leave" name="delete_leave" class="form-control" placeholder="" hidden>
								<button type="submit" class="btn btn-primary continue-btn" name="del_leave_btn" id="del_leave_btn">Delete</button>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>