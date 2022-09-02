<div id="add_designation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Designation</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="POST" action="../controller/ajax/add_function/add_designation.php">
					<div class="form-group">
						<label>Designation Name <span class="text-danger">*</span></label>
						<input name="designation" required class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Department <span class="text-danger">*</span></label>
						<select required name="department" class="form-select">
							<option>Select Department</option>
							<?php
							$sql2 = "SELECT * from departments";
							$query2 = $dbh->prepare($sql2);
							$query2->execute();
							$result2 = $query2->fetchAll(PDO::FETCH_OBJ);
							foreach ($result2 as $row) {
							?>
								<option value="<?php echo htmlentities($row->f_id); ?>">
									<?php echo htmlentities($row->f_department); ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Position Code <span class="text-danger">*</span></label>
						<input name="post_code" required class="form-control" type="text">
					</div>
					<div class="submit-section">
						<button name="add_designation" type="submit" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>