<?php
session_start();
error_reporting(0);
include_once('../include/config.php');
include_once('../include/functions.php');
if (strlen($_SESSION['userlogin']) == 0) {
  header('location:login.php');
} elseif (isset($_GET['delid'])) {
  $rid = intval($_GET['delid']);
  $sql = "DELETE from departments where id=:rid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':rid', $rid, PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Department deleted Successfully');</script>";
}
?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Human Resource /</span>Departments</h4>
    <div class="row mb-3">
      <div class="col-md-12">
        <button style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_department">Add Department</button>
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
                  <th>Department Name</th>
                  <th>Department Code</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="dep_list">
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal fade" id="add_department" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <form method="POST">
                    <div class="form-group">
                      <label>Department Name <span class="text-danger">*</span></label>
                      <input name="department_name" required class="form-control" type="text">
                    </div><br>
                    <div class="form-group">
                      <label>Department Code <span class="text-danger">*</span></label>
                      <input name="department_code" required class="form-control" type="text">
                    </div><br>
                    <div class="submit-section">
                      <button name="add_department" type="POST" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="edit_department" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Edit department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="form-group">
                    <label>Department Name <span class="text-danger">*</span></label>
                    <input class="form-control" id="dep_name" name="dep_name" value="" type="text">
                  </div><br>
                  <div class="form-group">
                    <label>Department Code <span class="text-danger">*</span></label>
                    <input class="form-control" id="dep_code" name="dep_code" value="" type="text">
                  </div><br>
                  <div class="submit-section">
                    <button class="btn btn-primary submit-btn" name="edit_dep">Save</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="delete_department" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Delete Department <br>
                  <p>Are you sure want to delete?</p>
                </h3>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="modal-btn delete-action">
                  <div class="row">
                    <div class="col-6">
                      <a href="departments.php?delid=" class="btn btn-primary continue-btn">Delete</a>
                    </div>
                    <div class="col-6">
                      <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script type="text/javascript">
  var url = "../controller/ajax/check_emp/dep_list.php";

  $.get(url, {

    })
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#dep_list').html(data);

      } else {
        console.log('no data');
      }
    })
</script>