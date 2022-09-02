<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['userlogin']) == 0) {
  header('location:login.php');
}

$emp_id = $_GET['emp_id'];
$company_id = $_SESSION['company'];

?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Setting</h4>

    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header2">Company Logo</h5>
          <div class="card-body">
            <form method="post" action="../controller/ajax/edit_function/edit_logo.php" enctype="multipart/form-data">
              <div class="form-group row mb-25">
                <div class="col-sm-3">
                  <label for="avail" class=" col-form-label  color-dark fs-14 fw-500 align-center">Edit Company Logo</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="picture_image" name="picture_image" type="file" placeholder="e.g 1,2,3,..." required>
                  <div class="layout-button mt-25">
                    <input type="text" value="<?php echo $company_id?>" id="company_id" name="company_id" hidden>
                    <button name="add_logo" type="submit" class="btn btn-primary btn-default btn-squared px-30">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Leave Name</th>
                  <th>Leave (Total Days)</th>
                  <th>Leave (Gender)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="leave_list">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header2">Leave</h5>
          <div class="card-body">
            <form method="post" action="../controller/ajax/add_function/add_leave_setting.php">
              <div class="form-group row mb-25">
                <div class="col-sm-3">
                  <label for="avail" class=" col-form-label  color-dark fs-14 fw-500 align-center">Add Leave Type</label>
                </div>
                <div class="col-sm-9">
                  <label>Leave Name <span class="text-danger">*</span></label>
                  <input name="leave_name" required class="form-control" type="text">
                </div>
              </div>
              <div class="form-group row mb-25">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                  <label>Leave (Days) <span class="text-danger">*</span></label>
                  <input name="leave_day" required class="form-control" type="number">
                </div>
              </div>
              <div class="form-group row mb-25">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                  <label>Leave (Gender) <span class="text-danger">*</span></label>
                  <select required id="gender" name="leave_gender" class="form-control select">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="A">All</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-25">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                  <div class="layout-button mt-25">
                    <button name="add_leave" type="submit" class="btn btn-primary btn-default btn-squared px-30">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Facility Name</th>
                  <th>Location</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="facility_list">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header2">Facility</h5>
          <div class="card-body">
            <form method="post" action="../controller/ajax/add_function/add_facility_setting.php">
              <div class="form-group row mb-25">
                <div class="col-sm-3">
                  <label for="avail" class=" col-form-label  color-dark fs-14 fw-500 align-center">Add Faciltiy</label>
                </div>
                <div class="col-sm-9">
                  <label>Facility Name <span class="text-danger">*</span></label>
                  <input name="facility_name" required class="form-control" type="text">
                  <label>Facility Location <span class="text-danger">*</span></label>
                  <input name="facility_location" required class="form-control" type="text">
                  <div class="layout-button mt-25">
                    <button name="add_vacancy" type="submit" class="btn btn-primary btn-default btn-squared px-30">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit_leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Edit Leave</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../controller/ajax/edit_function/update_leave_setting.php">
            <div class="row">
              <div class="form-group">
                <label>Leave Name <span class="text-danger">*</span></label>
                <input class="form-control" id="leave_name" name="leave_name" value="" type="text">
              </div><br>
              <div class="form-group">
                <label>Leave Days <span class="text-danger">*</span></label>
                <input class="form-control" id="leave_day" name="leave_day" value="" type="text">
              </div><br>
              <div class="form-group">
                <label>Leave Gender <span class="text-danger">*</span></label>
                <select required name="leave_gender" id="leave_gender" class="form-control select">
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="A">All</option>
                    </select>
              </div><br>
              <div class="form-group" style="display:none;">
                <label>Leave id <span class="text-danger">*</span></label>
                <input class="form-control" id="leave_id" name="leave_id" value="" type="text">
              </div><br>
              <div class="submit-section">
                <button class="btn btn-primary submit-btn" name="edit_leave">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="delete_leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Delete Leave <br>
            <p>Are you sure want to delete?</p>
          </h3>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-btn delete-action">
            <form method="post" action="../controller/ajax/del_function/del_leave_setting.php">
              <div class="row">
                <input class="form-control" id="del_leave_id" name="del_leave_id" value="" type="text" hidden>
                <div class="col-6">
                  <!-- <a href="#" class="btn btn-primary continue-btn">Delete</a> -->
                  <button type="submit" class="btn btn-primary continue-btn" name="delete_leave" id="delete_leave">Delete</button>
                </div>
                <div class="col-6">
                  <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit_facility" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Edit Facility</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../controller/ajax/edit_function/update_facility_setting.php">
            <div class="row">
              <div class="form-group">
                <label>Facility Name <span class="text-danger">*</span></label>
                <input class="form-control" id="facility_name" name="facility_name" value="" type="text">
              </div><br>
              <div class="form-group">
                <label>Facility Location <span class="text-danger">*</span></label>
                <input class="form-control" id="facility_location" name="facility_location" value="" type="text">
              </div><br>

              <div class="submit-section">
                <button class="btn btn-primary submit-btn" name="edit_facility">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="delete_facility" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Delete Facility <br>
            <p>Are you sure want to delete?</p>
          </h3>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-btn delete-action">
            <form method="post" action="../controller/ajax/del_function/del_facility_setting.php">
              <div class="row">
                <input class="form-control" id="del_facility_id" name="del_facility_id" value="" type="text" hidden>
                <div class="col-6">
                  <!-- <a href="#" class="btn btn-primary continue-btn">Delete</a> -->
                  <button type="submit" class="btn btn-primary continue-btn" name="delete_facility" id="delete_facility">Delete</button>
                </div>
                <div class="col-6">
                  <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script type="text/javascript">
  var url = "../controller/ajax/check_leave/setting_search.php";

  $.get(url, {

    })
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#leave_list').html(data);

      } else {
        console.log('no data');
      }
    })

  var url = "../controller/ajax/check_facility/setting_search.php";

  $.get(url, {

    })
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#facility_list').html(data);

      } else {
        console.log('no data');
      }
    })
</script>