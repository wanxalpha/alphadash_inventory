<?php
    include_once('../../controller/sales_sector.php');
    include_once("../../layouts/menu.php"); 
?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Product Sector</h4>
    <div class="row mb-3">
      <div class="col-md-3">
        <label class="form-label">Category</label>
        <select name="Category" id="Category" class="select2 form-select" required>
            <option hidden value=""> ---- Select Category ----</option>
            <?php foreach(getProjectCategory() as $sector) { ?>
            <option value="<?php echo $sector['id']?>"> <?php echo $sector['Name'] ?>
            </option>
            <?php } ?>
        </select>
      </div>
     
      <div class="col-md-2">
        <label class="form-label"> </label>

        <button id="btn_search" style="float:bottom;" class="btn btn-primary form-control">Search</button>
      </div>
      <div class="col-md-7">
        <a href="create.php" style="float:right;" class="btn btn-primary">Add Product Sector</a>
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
                  <th>Category</th>
                  <th>Name</th>
                  <th>Date Created</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_product_sector">
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
<script type="text/javascript" src="../../assets/js/resource/product_sector.js"> </script>