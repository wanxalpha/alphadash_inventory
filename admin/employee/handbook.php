<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['userlogin']) == 0) {
  header('location:login.php');
}

$emp_id = $_GET['emp_id'];


?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Application Form / </span>Employee Handbook</h4>
    <div class="row mb-3">
      <div class="col-md-12">
        <button style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_handbook">Add Handbook</button>
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
                  <th>Title</th>
                  <th>Uploaded File</th>
                  <th>Created Date</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="handbook_list">
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <!-- Add Holiday Modal -->
    <?php include_once("../include/modals/handbook/add_handbook.php"); ?>
    <!-- /Add Holiday Modal -->

    <!-- Edit Holiday Modal -->
    <?php include_once("../include/modals/handbook/edit_handbook.php"); ?>
    <!-- /Edit Holiday Modal -->

    <!-- Delete Holiday Modal -->
    <?php include_once("../include/modals/handbook/delete_handbook.php"); ?>
    <!-- /Delete Holiday Modal -->

  </div>
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script type="text/javascript">
  var url = "../controller/ajax/check_handbook/search.php";

  $.get(url, {

    })
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#handbook_list').html(data);

      } else {
        console.log('no data');
      }
    })
</script>