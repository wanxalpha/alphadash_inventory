<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['userlogin']) == 0) {
    header('location:login.php');
}

?>
<?php include_once("../menu/menu-dash-u.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Application Form /</span>Claims</h4>
        <div class="row mb-3">
            <div class="col-md-12">
                <button style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medical_claim" onclick="check_dep()">Add Claims</button>
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
                                    <th>Claim Type</th>
                                    <th>Claim Date</th>
                                    <th>Claim Amount</th>
                                    <th>Status</th>
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

<script>
    function check_dep() {
        var emp_id = $('#emp_id').val();

        if (emp_id != "") {
            var url = "../controller/ajax/check_emp/check_post2.php";
        }

        $.get(url, {
                emp_id: emp_id
            })
            .done(function(data) {
                if (data) {
                    console.log(data);

                    var len = JSON.parse(data);
                    var dep_name = len.dep_name;
                    console.log(dep_name);
                    if (dep_name != "" || dep_name != NULL) {
                        var post_name = len.post_name;
                        $('#department').val(dep_name);
                        $('#designation').val(post_name);

                        const month_name = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                        const date = new Date();
                        let date_no = date.getDate();

                        if (date_no > 15) {
                            let month = month_name[date.getMonth()];
                            $('#claim_month').val(month);
                        } else {
                            let month = month_name[date.getMonth() - 1];
                            $('#claim_month').val(month);
                        }

                    } else {
                        alert("failed");
                    }

                } else {
                    console.log('no data');
                }
            })
    }
</script>
<script type="text/javascript">

    var emp_code = "<?php echo $emp_code?>";
    var url = "../controller/ajax/emp_salary/check_medical.php";

    $.get(url, {
            emp_code: emp_code
            // ,
            // created_date: created_date,
            // status: status
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