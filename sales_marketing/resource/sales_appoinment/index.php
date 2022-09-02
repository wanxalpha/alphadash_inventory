<?php
  include_once('../../controller/sales_appoinment.php');
  include_once("../../layouts/menu.php");
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Sales Appointment</h4>
    <div class="row mb-3">
      <div class="col-md-12">
        <a href="create.php" style="float:right;" class="btn btn-primary" >Add Sales Appoinment</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Sales Person Name</th>
                  <th>Company Name</th>
                  <th>Appoinment Date</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_sales_appoinment">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>

<script type="text/javascript" src="../../assets/js/resource/sales_appoinment.js"> </script>