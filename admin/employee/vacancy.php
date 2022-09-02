<?php
session_start();
error_reporting(0);
include_once('../include/config.php');
include_once('../include/functions.php');

if (strlen($_SESSION['userlogin']) == 0) {
    header('location:login.php');
  }

?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Job Vacancy</h4>
    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
            <h5 class="card-header2">Add Vacancy Details</h5>
            <div class="card-body">
                <form method="post" action="">
                <div class="form-group row mb-3">
                  <div class="col-sm-3">
                    <label for="job" class=" col-form-label  color-dark fs-14 fw-500 align-center">Job Position</label>
                  </div>
                  <div class="col-sm-9">
                    <input class="form-control" id="job" name="job" type="text" required>
                  </div>
                </div>
                <div class="form-group row mb-25">
                  <div class="col-sm-3">
                    <label for="avail" class=" col-form-label  color-dark fs-14 fw-500 align-center">Availability</label>
                  </div>
                  <div class="col-sm-9">
                    <input class="form-control" id="avail" name="avail" type="text" placeholder="e.g 1,2,3,..." required>
                    <div class="layout-button mt-25">
                      <button name="add_vacancy" type="submit" class="btn btn-primary btn-default btn-squared px-30">Add Vacancy</button>
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
                  <th>Job Position</th>
                  <th>Availability</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  <?php
                    $xx = 1;
                    $get_details = "SELECT * FROM vacancy";
                    $get_detail = $dbh->prepare($get_details);
                    $get_detail->execute();
                    while($v_results = $get_detail->fetch(PDO::FETCH_ASSOC)){
                      $id = $v_results['id'];
                      $position = $v_results['position'];
                      $avail = $v_results['availibility'];
                    ?>
                  <tr>
                    <td><?php echo $xx;?></td>
                    <td><?php echo $position;?></td>
                    <td><?php echo $avail;?></td>
                    <td><a class="btn btn-sm btn-warning" href="#" id="j_edit<?php echo $id;?>" name="j_edit"  data-bs-toggle="modal" data-bs-target="#edit_vacancy" data-value='<?php echo $id;?>'>Edit</a>
                        <a class="btn btn-sm btn-danger" href="#" id="j_delete<?php echo $id;?>" name="j_delete" data-bs-toggle="modal" data-bs-target="#delete_vacancy" data-value="<?php echo $id;?>">Delete</a>
                    </td>
                  </tr>
                  <script>
                      $("#j_edit<?php echo $id;?>").click(function() {
                          var j_edit = $(this).attr("data-value");
                          console.log(j_edit);
                          
                          $("#id").val("<?php echo $id;?>");
                          $("#job").val("<?php echo $job;?>");
                          $("#avail").val("<?php echo $avail;?>");
                      });

                      // $("#dep_delete'.$id.'").click(function() {
                      //     var dep_del = $(this).attr("data-value");
                      //     console.log(dep_del);
                      //     $("#del_dep_id").val(dep_del);
                      // });

                  </script>
                  <?php
                  $xx++;
                    }
                    ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal fade" id="edit_vacancy" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Job Vacancy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <form method="POST" action="../controller/ajax/edit_function/update_visitor.php">
                  <input type="hidden" id="id" name="id" class="form-control" >  
                    <div class="form-group mb-3">
                      <label>Job Position<span class="text-danger">*</span></label>
                      <input id="vdate" name="v_date" class="form-control" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label>Availibility<span class="text-danger">*</span></label>
                      <input id="visitor_name" name="v_name" required class="form-control" value="" type="text">
                    </div>
                    <div class="submit-section">
                      <button name="edit_vacancy" type="submit" class="btn btn-primary submit-btn">Edit</button>
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



