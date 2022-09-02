<?php
    include_once('../../controller/available_stock.php');
    include_once("../../layouts/menu.php"); 
?>
<style>
  .blink {
  animation: blink 1s steps(1, end) infinite;
}
@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
</style>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Available Stock</h4>
    <div class="row mb-3">
     
      <div class="col-md-2">
        <label class="form-label"> </label>

        <!-- <button id="btn_search" style="float:bottom;" class="btn btn-primary form-control">Search</button> -->
      </div>
      <div class="col-md-10" align='right'>
        <a href="../stock_in/create.php" class="btn btn-primary">Add Stock In</a>
        &nbsp;
        <a href="../stock_out/create.php" style="float:right;" class="btn btn-primary">Add Stock Out</a>
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
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Quantity</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_available_stock">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>

<script type="text/javascript" src="../../assets/js/resource/available_stock.js"> </script>