<?php
    include_once('../../controller/merchant_customer.php');
    include_once("../../layouts/menu.php"); 
?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Customer List</h4>
    <div class="row mb-3">
     
      <div class="col-md-2">
        <label class="form-label"> </label>

        <!-- <button id="btn_search" style="float:bottom;" class="btn btn-primary form-control">Search</button> -->
      </div>
      <!-- <div class="col-md-10">
        <a href="create.php" style="float:right;" class="btn btn-primary">Add Customer</a>
      </div> -->
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Retailer Name</th>
                  <th>Customer Name</th>
                  <th>Mobile Number</th>
                  <th>Email</th>
                  <th>Date Created</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_merchant_customer">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>
<script>
  var status = '<?php echo $_GET['status'] ?  $_GET['status'] + 1 : 1;  ?>';
</script>
<script type="text/javascript" src="../../assets/js/resource/merchant_customer.js"> </script>