<div class="modal custom-modal fade" id="approve_leave" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Leave Approve</h3>
					<p>Are you sure want to approve for this leave?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<input type="text" id="appr_delete">
						<input type="text" id="my_mail" value="<?php echo $emp_id?>">
						<div class="col-6">
							<a href="javascript:void(0);" onclick="approval()" id="approved" class="btn btn-primary continue-btn">Approve</a>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" onclick="declined_reason()"id="declined" class="btn btn-primary cancel-btn">Decline</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" id="declined_title" style="display:none;">
							<h5>Please State Down Reject Reason</h5>
						</div>
						<div class="col-md-12" id="declined_reason" style="display:none;">
							<div class="input-group">
								<input name="approval_remarks" id="approval_remarks" class="form-control" type="text">
								<div class="input-group-prepend">
									<input type="button" class="input-group-text" id="declined_remarks" value="Send" onclick="declined()">
									<!-- <button class="input-group-text" id="same">Same Address? Click Here</button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function approval() {
		var leave = $('#appr_delete').val();
		leave_status = "Approved";
		leave_reason = "Approved";
		console.log(leave);

		if (leave) {

			var url = "../controller/ajax/check_leave/update_leave.php";
		}

		$.get(url, {
				leave: leave,
				leave_status: leave_status,
				leave_reason: leave_reason
			})
			.done(function(data) {
				if (data) {
					// console.log(data);

					if (data == 1) {
						// console.log('ok');
						window.location.href = "leaves.php";

					} else {
						alert("failed");
					}

				} else {
					console.log('no data');
				}
			})

	}

	function declined_reason(){
		$('#declined_reason').css("display", "block");
		$('#declined_title').css("display", "block");
	}

	function declined() {
		var leave = $('#appr_delete').val();
		leave_reason = $('#approval_remarks').val();
		leave_status = "Rejected";
		console.log(leave);

		if (leave) {

			var url = "../controller/ajax/check_leave/update_leave.php";
		}

		$.get(url, {
			leave: leave,
			leave_status: leave_status,
			leave_reason: leave_reason
		})
		.done(function(data) {
			if (data) {
				// console.log('ok');

				if (data == 1) {
					console.log('ok');

					var from_emp = $('#my_mail').val();
					var to_emp = $('#appr_delete').val();
					var subject = "Leave Approval";
					var reason = $('#approval_remarks').val();

					var url = "../phpmailer/index.php";

					$.get(url, {
						from_emp: from_emp,
						to_emp: to_emp,
						subject: subject,
						reason: reason
					})
					.done(function(data) {
						if (data) {
							console.log(data);
							window.location.href = "leaves.php";

						} else {
							console.log('email error');
						}
					})

					// window.location.href = "leaves.php";


				} else {
					alert("failed");
				}

			} else {
				console.log('no data');
			}
		})

	}
</script>