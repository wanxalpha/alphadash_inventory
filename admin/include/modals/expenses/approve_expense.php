<div class="modal custom-modal fade" id="approve_expense" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Purchase Approval</h3>
					<p>Are you sure want to approve for this purchase requisition?</p>
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
		expense = $('#appr_delete').val();
		expense_status = "Approved";
		console.log(expense);

		if (expense) {

			var url = "../controller/ajax/edit_function/update_purchase.php";
		}

		$.get(url, {
			expense: expense,
			expense_status: expense_status
		})
		.done(function(data) {
			if (data) {
				console.log(data);

				if (data == 1) {

					emp_code = $('#appr_delete').val();
					status = "Approved";

					var url = "../controller/phpmailer/purchase_application.php";

					$.get(url, {
						emp_code: emp_code,
						status: status
					})
					.done(function(data) {
						if (data) {
							console.log(data);

							if(data == "sent"){
								alert("Approved. Email Has Been Sent");
								window.location.href = "purchase.php";
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
		var expense = $('#appr_delete').val();
		expense_status = "Rejected";
		console.log(expense);

		if (expense) {

			var url = "../controller/ajax/edit_function/update_purchase.php";
		}

		$.get(url, {
				expense: expense,
				expense_status: expense_status
			})
			.done(function(data) {
				if (data) {
					console.log(data);

					if (data == 1) {
						emp_code = $('#appr_delete').val();
						status = "Rejected";

						var url = "../controller/phpmailer/purchase_application.php";

						$.get(url, {
							emp_code: emp_code,
							status: status
						})
						.done(function(data) {
							if (data) {
								console.log(data);

								if(data == "sent"){
									alert("Rejected. Email Has Been Sent");
									window.location.href = "purchase.php";
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