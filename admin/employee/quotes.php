<?php
session_start();
error_reporting(0);
include_once('../include/config.php');


if (strlen($_SESSION['userlogin']) == 0) {
  header('location:login.php');
}

$email = $_SESSION['userlogin'];
$sql = "SELECT * FROM employees WHERE f_com_email='$email'";
$query = $dbh->prepare($sql);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$emp_code = $row['f_emp_id'];

include_once('../include/functions.php');

?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Quotes</h4>
    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header2">Add Quotes Details</h5>
          <div class="card-body">
            <form method="post" action="../controller/ajax/add_function/add_quotes.php">
              <input type="hidden" name="username" value="<?php echo $emp_code; ?>">
              <div class="form-group row mb-3">
                <div class="col-sm-3">
                  <label for="quotes" class=" col-form-label  color-dark fs-14 fw-500 align-center">Quotes</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="quotes" name="quotes" type="text" required>
                  <div class="layout-button mt-25">
                    <button name="add_quotes" type="submit" class="btn btn-primary btn-default btn-squared px-30">Add Quotes</button>
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
                  <th>Quotes</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="quotes_list">

              </tbody>
            </table>
          </div>
        </div>

        <div class="modal fade" id="edit_quotes" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Quotes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <form method="POST" enctype="multipart/form-data" action="../controller/ajax/edit_function/update_quotes.php">
                    <input type="hidden" id="edit_quote_id" name="edit_quote_id" class="form-control">
                    <div class="form-group mb-3">
                      <label>Quotes<span class="text-danger">*</span></label>
                      <input id="edit_quote" name="edit_quote" class="form-control" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label>Proposal<span class="text-danger">*</span></label>
                      <input id="edit_proposal" name="edit_proposal" class="form-control" value="" type="file">
                    </div>
                    <div class="submit-section">
                      <button name="edit_quote_btn" type="submit" class="btn btn-primary submit-btn">Edit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal custom-modal fade" id="delete_quotes" role="dialog">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body">
                <div class="form-header">
                  <h3>Delete Quotes</h3>
                  <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                  <form method="post" action="../controller/ajax/del_function/del_quotes.php">
                    <div class="row">
                      <input class="form-control" id="del_quote_id" name="del_quote_id" value="" type="text" hidden>
                      <div class="col-6">
                        <button type="submit" class="btn btn-primary continue-btn" name="delete_quotes" id="delete_quotes">Delete</button>
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

  <!--Proposal Start-->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Proposal</h4>
    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header2">Add Proposal Details</h5>
          <div class="card-body">
            <form method="post" action="../controller/ajax/add_function/add_proposal.php" enctype="multipart/form-data">
              <input type="hidden" name="username" value="<?php echo $emp_code; ?>">
              <div class="form-group row mb-3">
                <div class="col-sm-3">
                  <label for="quotes" class=" col-form-label  color-dark fs-14 fw-500 align-center">Title</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="title" name="title" type="text" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-sm-3">
                  <label for="proposal" class=" col-form-label  color-dark fs-14 fw-500 align-center">Proposal</label>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="upload_proposal" name="upload_proposal" type="file">
                  <div class="layout-button mt-25">
                    <button name="add_proposal" type="submit" class="btn btn-primary btn-default btn-squared px-30">Add Proposal</button>
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
                  <th>Title</th>
                  <th>Proposal</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="proposal_list">

              </tbody>
            </table>
          </div>
        </div>

        <div class="modal fade" id="edit_quotes" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Proposal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <form method="POST" enctype="multipart/form-data" action="../controller/ajax/edit_function/update_quotes.php">
                    <input type="hidden" id="edit_quote_id" name="edit_quote_id" class="form-control">
                    <div class="form-group mb-3">
                      <label>Quotes<span class="text-danger">*</span></label>
                      <input id="edit_quote" name="edit_quote" class="form-control" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label>Proposal<span class="text-danger">*</span></label>
                      <input id="edit_proposal" name="edit_proposal" class="form-control" value="" type="file">
                    </div>
                    <div class="submit-section">
                      <button name="edit_quote_btn" type="submit" class="btn btn-primary submit-btn">Edit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal custom-modal fade" id="delete_quotes" role="dialog">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body">
                <div class="form-header">
                  <h3>Delete Proposal</h3>
                  <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                  <form method="post" action="../controller/ajax/del_function/del_quotes.php">
                    <div class="row">
                      <input class="form-control" id="del_quote_id" name="del_quote_id" value="" type="text" hidden>
                      <div class="col-6">
                        <button type="submit" class="btn btn-primary continue-btn" name="delete_quotes" id="delete_quotes">Delete</button>
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
  <!--Proposal End-->
</div>

<?php include_once("../menu/footer.php"); ?>

<script type="text/javascript">
  var url = "../controller/ajax/check_quotes/search.php";

  $.get(url, {

    })
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#quotes_list').html(data);

      } else {
        console.log('no data');
      }
    })

    var url = "../controller/ajax/check_quotes/search.php";

    $.get(url, {

      })
      .done(function(data) {
        if (data) {
          // console.log(data);
          $('#quotes_list').html(data);

        } else {
          console.log('no data');
        }
      })
</script>