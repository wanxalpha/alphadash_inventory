<div class="modal custom-modal fade" id="declined_facility" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Leave</h3>
                    <p>Are you sure want to delete booking period?</p>
                </div>
                <div class="modal-btn delete-action">
					<form method="post" action="../controller/ajax/del_function/del_facility.php">
						<div class="row">
							<input class="form-control" id="del_facility_id" name="del_facility_id" value="" type="text" hidden>
							<div class="col-6">
								<!-- <a href="#" class="btn btn-primary continue-btn">Delete</a> -->
								<button type="submit" class="btn btn-primary continue-btn" name="delete_facility" id="delete_facility">Delete</button>
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
