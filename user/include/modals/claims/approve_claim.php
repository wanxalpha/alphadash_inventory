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
							<a href="javascript:void(0);" onclick="declined_reason()" id="declined" class="btn btn-primary cancel-btn">Reject</a>
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
                // console.log(data);

                if (data == 1) {
                    // console.log('ok');
                    window.location.href = "medical.php";

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
		var claim = $('#appr_delete').val();
		var reason = $('#approval_remarks').val();
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
                    // console.log('ok');
                    window.location.href = "medical.php";

                } else {
                    alert("failed");
                }

            } else {
                console.log('no data');
            }
        })

	}
</script>