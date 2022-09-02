<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['userlogin']) == 0) {
  header('location:login.php');
}

$emp_id = $_SESSION['userlogin'];

?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Application Form /</span>Purchase Requisition</h4>
    <div class="row mb-3">
      <input type="text" name="emp_code" id="emp_code" value="<?php echo $emp_code?>" hidden>
      <div class="col-md-12">
        <button style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_expense">Add Purchase</button>
      </div>

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Request Date</th>
                  <th>Purchase By</th>
                  <th>Amount</th>
                  <th>Paid By</th>
                  <th>Review By</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="purchase_table">
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <!-- Add Expense Modal -->
			<?php include_once("../include/modals/expenses/add_expense.php"); ?>
			<!-- /Add Expense Modal -->

			<!-- Edit Expense Modal -->
			<?php include_once("../include/modals/expenses/edit_expense.php"); ?>
			<!-- /Edit Expense Modal -->

      <!-- Approve Expense Modal -->
			<?php include_once("../include/modals/expenses/approve_expense.php"); ?>
			<!-- /Approve Expense Modal -->

			<!-- Delete Expense Modal -->
			<?php include_once("../include/modals/expenses/delete_expense.php"); ?>
			<!-- Delete Expense Modal -->
  </div>
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script type="text/javascript">

    var user = $('#emp_code').val();
		var url = "../controller/ajax/emp_salary/check_purchase.php";

		$.get(url, {
      user: user
		})
		.done(function(data) {
			if (data) {
				// console.log(data);
				$('#purchase_table').html(data);

			} else {
				console.log('no data');
			}
		})

	</script>