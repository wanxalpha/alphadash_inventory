<div class="modal custom-modal fade" id="delete_holiday" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Holiday</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<form method="post" action="../controller/ajax/del_function/del_holiday.php">
						<div class="row">
							<input class="form-control" id="del_holiday_id" name="del_holiday_id" value="" type="text" hidden>
							<div class="col-6">
								<button type="submit" class="btn btn-primary continue-btn" name="delete_holiday" id="delete_holiday">Delete</button>
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