<?php
    include_once('../../controller/product.php');
    include_once("../../layouts/menu.php"); 
?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Product</h4>
    <div class="row mb-3">
     
      <div class="col-md-2">
        <label class="form-label"> </label>

        <button id="btn_search" style="float:bottom;" class="btn btn-primary form-control">Search</button>
      </div>
      <div class="col-md-10">
        <a href="create.php" style="float:right;" class="btn btn-primary">Add Product</a>
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
                  <th>Name</th>
                  <th>Product Category</th>
                  <th>Date Created</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_product">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>

<script type="text/javascript" src="../../assets/js/resource/product.js"> </script>