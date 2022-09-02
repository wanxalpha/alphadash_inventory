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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Human Resource /</span> Department & Designation</h4>
    <div class="row mb-4">
      <div class="col-md-12 mb-3">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Department Name</th>
                  <th style="text-align:right">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="dep_list">
              </tbody>
            </table>
          </div>
        </div>

        <div id="edit_department" class="modal custom-modal fade" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="../controller/ajax/edit_function/update_department.php">
                  <div class="form-group mb-3">
                    <label>Department Name <span class="text-danger">*</span></label>
                    <input class="form-control" id="edit_dep_name" name="edit_dep_name" value="" type="text">
                  </div>
                  <input class="form-control" id="edit_dep_id" name="edit_dep_id" value="" type="text" hidden>
                  <div class="submit-section">
                    <button class="btn btn-primary submit-btn" name="edit_dep">Save</button>
                  </div>
                </form>
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
                  <form method="post" action="../controller/ajax/del_function/del_department.php">
                    <div class="row">
                    <input class="form-control" id="del_dep_id" name="del_dep_id" value="" type="text" hidden>
                      <div class="col-6">
                        <!-- <a href="departments.php?delid=" class="btn btn-primary continue-btn">Delete</a> -->
                        <button class="btn btn-primary submit-btn" type="submit" name="del_dep">Delete</button>
                      </div>
                      <div class="col-6">
                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="col-md-12 mb-3">
        <div class="card">
          <h5 class="card-header2">Add Department</h5>
          <div class="card-body">
            <div class="row">
              <form method="post" action="../controller/ajax/add_function/add_department.php">
                <div class="form-group row mb-25">
                  <div class="col-sm-3">
                    <label for="bName" class=" col-form-label  color-dark fs-14 fw-500 align-center">Department Name</label>
                  </div>
                  <div class="col-sm-9">
                    <input class="form-control" id="dep_name" name="dep_name" value="" type="text">
                    <div class="layout-button mt-25">
                      <button name="add_department" type="submit" class="btn btn-primary btn-default btn-squared px-30">Add Department</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!--Designation Start-->
    <div class="row mb-3">
      <div class="col-md-12 mb-3">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Designation</th>
                  <th>Department</th>
                  <th>Position Code</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="designation">

              </tbody>
            </table>
          </div>
        </div>
      </div>


      <div class="col-md-12 mb-3">
        <div class="card">
          <h5 class="card-header2">Add Designation</h5>
          <div class="card-body">
            <div class="row">
              <form method="POST" action="../controller/ajax/add_function/add_designation.php">
                <div class="form-group row mb-4">
                  <div class="col-sm-3 d-flex aling-items-center">
                    <label class=" col-form-label color-dark fs-14 fw-500 align-center">Designation Name</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" required name="designation" id="pSKU">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <div class="col-sm-3 d-flex aling-items-center">
                    <label for="pName" class=" col-form-label color-dark fs-14 fw-500 align-center">Department</label>
                  </div>
                  <div class="col-sm-9">
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
                </div>
                <div class="form-group row mb-25">
                  <div class="col-sm-3">
                    <label for="bName" class=" col-form-label  color-dark fs-14 fw-500 align-center">Position Code</label>
                  </div>
                  <div class="col-sm-9">
                    <input class="form-control" name="post_code" type="text">
                    <div class="layout-button mt-25">
                      <button name="add_designation" type="POST" class="btn btn-primary btn-default btn-squared px-30">Add</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Add Designation Modal -->
        <?php include_once("../include/modals/designation/add_designation.php"); ?>
        <!-- /Add Designation Modal -->

        <!-- Edit Designation Modal -->
        <?php include_once("../include/modals/designation/edit_designation.php"); ?>
        <!-- /Edit Designation Modal -->

        <!-- Delete Designation Modal -->
        <?php include_once("../include/modals/designation/delete_designation.php"); ?>
        <!-- /Delete Designation Modal -->

      </div>

    </div>
    <!--Designation End-->

  </div>
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script type="text/javascript">
  var url = "../controller/ajax/check_emp/dep_list.php";

  $.get(url, {})
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#dep_list').html(data);

      } else {
        console.log('no data');
      }
    })

  var url = "../controller/ajax/check_dep/desc_list.php";

  $.get(url, {})
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#designation').html(data);

      } else {
        console.log('no data');
      }
    })
</script>