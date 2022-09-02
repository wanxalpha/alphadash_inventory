<?php
session_start();
error_reporting(0);
include_once('../include/config.php');
// include_once('../include/functions.php');

if (strlen($_SESSION['userlogin']) == 0) {
  header('location:login.php');
}

?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Visitor Details</h4>
    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header2">Add Visitor Details</h5>
          <div class="card-body">
            <form method="post" action="../controller/ajax/add_function/add_visitor.php">
              <div class="form-group row mb-3">
                <div class="col-sm-3">
                  <label for="v_date" class=" col-form-label  color-dark fs-14 fw-500 align-center">Date</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="v_date" name="v_date" type="date" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-sm-3">
                  <label for="v_name" class=" col-form-label  color-dark fs-14 fw-500 align-center">Visitor Name</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="v_name" name="v_name" type="text" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-sm-3">
                  <label for="c_name" class=" col-form-label  color-dark fs-14 fw-500 align-center">Company Name</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="c_name" name="c_name" type="text" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-sm-3">
                  <label for="v_phone" class=" col-form-label  color-dark fs-14 fw-500 align-center">Contact No</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="v_phone" name="v_phone" type="text" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-sm-3">
                  <label for="v_email" class=" col-form-label  color-dark fs-14 fw-500 align-center">Visitor Email</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="v_email" name="v_email" type="text" required>
                </div>
              </div>
              <div class="form-group row mb-25">
                <div class="col-sm-3">
                  <label for="v_purpose" class=" col-form-label  color-dark fs-14 fw-500 align-center">Purpose</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="v_purpose" name="v_purpose" type="text" required>
                  <div class="layout-button mt-25">
                    <button name="add_visitor" type="submit" class="btn btn-primary btn-default btn-squared px-30">Add Visitor</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
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
                  <th>Visitor Name</th>
                  <th>Company Name</th>
                  <th>Phone No</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Purpose</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="visitor_list">
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal fade" id="edit_visitor" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Visitor Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <form method="POST" action="../controller/ajax/edit_function/update_visitor.php">
                    <input type="text" id="edit_vid" name="edit_vid" class="form-control">
                    <div class="form-group mb-3">
                      <label>Date<span class="text-danger">*</span></label>
                      <input id="edit_vdate" name="edit_vdate" disabled class="form-control" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label>Visitor Name <span class="text-danger">*</span></label>
                      <input id="edit_visitor_name" name="edit_visitor_name" required class="form-control" value="" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label>Company Name <span class="text-danger">*</span></label>
                      <input id="edit_cname" name="edit_cname" required class="form-control" value="" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label>Contact No <span class="text-danger">*</span></label>
                      <input id="edit_vphone" name="edit_vphone" required class="form-control" value="" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label>Visitor Email <span class="text-danger">*</span></label>
                      <input id="edit_vemail" name="edit_vemail" required class="form-control" value="" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label>Purpose <span class="text-danger">*</span></label>
                      <input id="edit_vpurpose" name="edit_vpurpose" required class="form-control" value="" type="text">
                    </div>
                    <div class="submit-section">
                      <button name="edit_visitor" type="submit" class="btn btn-primary submit-btn">Edit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal custom-modal fade" id="delete_visitor" role="dialog">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body">
                <div class="form-header">
                  <h3>Delete Visitor</h3>
                  <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                  <form method="post" action="../controller/ajax/del_function/del_visitor.php">
                    <div class="row">
                      <input class="form-control" id="del_visitor_id" name="del_visitor_id" value="" type="text" >
                      <div class="col-6">
                        <button type="submit" class="btn btn-primary continue-btn" name="delete_visitor" id="delete_visitor">Delete</button>
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

    </div>

  </div>
</div>

<?php include_once("../menu/footer.php"); ?>

<script type="text/javascript">
  var url = "../controller/ajax/check_visitor/search.php";

  $.get(url, {

    })
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#visitor_list').html(data);

      } else {
        console.log('no data');
      }
    })
</script>