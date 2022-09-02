<div class="modal custom-modal fade" id="approve_claim" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Claim Approval</h3>
					<p>Are you sure want to approve for this claim?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<input type="text" id="appr_delete" style="display:none;">
						<div class="col-md-6">
							<a href="javascript:void(0);" onclick="approval()" id="approved" class="btn btn-primary continue-btn">Approve</a>
						</div>
						<div class="col-md-6">
							<a href="javascript:void(0);" onclick="declined()" id="declined" class="btn btn-primary cancel-btn">Reject</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function approval() {
		var claim = $('#appr_delete').val();
		claim_status = "Approved";
		var reason = "Approved";
		console.log(claim);

		if (claim) {

			var url = "../controller/ajax/check_claim/update_claim.php";
		}

		$.get(url, {
				claim: claim,
				claim_status: claim_status,
				reason: reason
			})
			.done(function(data) {
				if (data) {
					console.log(data);

					if (data == 1) {

						emp_code = $('#appr_delete').val();
						status = "Approved";

						var url = "../controller/phpmailer/claim_application.php";

						$.get(url, {
							emp_code: emp_code,
							status: status
						})
						.done(function(data) {
							if (data) {
								console.log(data);

								if(data == "sent"){
									alert("Approved. Email Has Been Sent");
									window.location.href = "claim.php";
								}

							} else {
								console.log('no data');
							}
						})

					} else {
						alert("failed");
					}

				} else {
					console.log('no data');
				}
			})

	}

	function declined() {
		var claim = $('#appr_delete').val();
		var reason = "Rejected";
		claim_status = "Rejected";
		console.log(claim);

		if (claim) {

			var url = "../controller/ajax/check_claim/update_claim.php";
		}

		$.get(url, {
				claim: claim,
				claim_status: claim_status,
				reason: reason
			})
			.done(function(data) {
				if (data) {
					// console.log(data);

					if (data == 1) {

						emp_code = $('#appr_delete').val();
						status = "Rejected";

						var url = "../controller/phpmailer/claim_application.php";

						$.get(url, {
							emp_code: emp_code,
							status: status
						})
						.done(function(data) {
							if (data) {
								console.log(data);

								if(data == "sent"){
									alert("Rejected. Email Has Been Sent");
									window.location.href = "claim.php";
								}

							} else {
								console.log('no data');
							}
						})

					} else {
						alert("failed");
					}

				} else {
					console.log('no data');
				}
			})

	}
</script>