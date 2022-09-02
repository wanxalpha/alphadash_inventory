<?php
  include_once('../../controller/sales_account.php');

  include_once("../../layouts/menu.php");
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Sales Person</h4>
    <div class="row mb-3">
      <div class="col-md-6"> <button id="btn_download_excel" style="float:left;" class="btn btn-primary">Download Format
          CSV</button>
      </div>
      <div class="col-md-6">
        <a href="create.php" style="float:right;" class="btn btn-primary">Add Sales Person</a>
      </div>
    </div>
    <form method="POST" action="../../controller/sales_account.php" enctype="multipart/form-data">

    <div class="row mb-3">
      <div class="col-md-4">
        <input class="form-control" type="file" name="upload_excel" id="upload_excel" required />
      </div>
      <div class="col-md-2">
        <button id="btn_download_excel" style="float:left;" class="btn btn-primary" type="submit" name="action" value="upload_excel" >Upload Sales Person</button>
      </div>
    </div>
    </form>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Sales Person</th>
                  <th>Email</th>
                  <th>Created Date</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_sales_account">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>

<script type="text/javascript" src="../../assets/js/resource/sales_account.js"> </script>
<script>
  getList();
</script>