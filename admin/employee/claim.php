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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Application Form /</span>Claims</h4>
        <div class="row mb-3">
        <input type="text" name="emp_code" id="emp_code" value="<?php echo $emp_code?>" hidden>
            <div class="col-md-12">
                <button style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medical_claim">Add Claims</button>
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
                                    <th>Employee Name</th>
                                    <th>Claim Amount</th>
                                    <th>Review By</th>
                                    <th>Status</th>
									<th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="medical_list">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Add Claim Modal -->
    <?php include_once("../include/modals/claims/add_claim.php"); ?>
    <!-- Add Claim Modal -->

    <!-- Edit Claim Modal -->
    <?php include_once("../include/modals/claims/edit_claim.php"); ?>
    <!-- Edit Claim Modal -->

    <!-- Approval Claim Modal -->
    <?php include_once("../include/modals/claims/approve_claim.php"); ?>
    <!-- Approval Claim Modal -->

    <!-- Delete Claim Modal -->
    <?php include_once '../include/modals/leave/delete_leave.php'; ?>
    <!-- /Delete Claim Modal -->
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script type="text/javascript">

    var user = $('#emp_code').val();
    var url = "../controller/ajax/emp_salary/check_medical.php";

    $.get(url, {
    user: user
    })
    .done(function(data) {
        if (data) {
            // console.log(data);
            $('#medical_list').html(data);

        } else {
            console.log('no data');
        }
    })

</script>