<?php
    include_once('../../controller/stock_out_by_customer.php');
    include_once("../../layouts/menu.php"); 

    $stakeholder = getCustomer();
?>

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Stock Out By Customer</h4>
    <div class="row mb-12">
      <div class="col-md-2">
        <label class="form-label">Month</label>
        <select name="filter_month" id="filter_month" class="select2 form-select" required>
          <option hidden value=""> ---- Select Month ----</option>
          <?php  
              $get_status_month = isset($_GET['month']) ? $_GET['month'] : null ;
          ?>
          <?php foreach(listMonth() as $idx => $month) { ?>
          <option value="<?php echo $idx?>" <?php if($get_status_month == $idx) echo 'selected'; ?>>
            <?php echo $month ?> </option>
          <?php } ?>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Year</label>
        <?php $status_year = isset($_GET['year']) ? $_GET['year'] : date('Y') ; ?>
        <select name="filter_year" id="filter_year" class="select2 form-select" required>
          <option hidden value=""> ---- Select Year ----</option>
          <?php foreach(listYear() as $year) { ?>
          <option value="<?php echo $year?>" <?php if($year == $status_year) echo 'selected'; ?>> <?php echo $year ?>
          </option>
          <?php } ?>
        </select>
      </div>

      <!-- <div class="col-md-2">
        <label class="form-label">Stakeholder</label>
        <select name="filter_stakeholder" id="filter_stakeholder" class="select2 form-select" required>
          <option hidden value="">Select Stakeholder</option>
          <?php  
              $get_status_stakeholder = isset($_GET['stakeholder']) ? $_GET['stakeholder'] : null ;
          ?>
          <?php foreach($stakeholder as $idx => $sh) { ?>
          <option value="<?php echo $sh['id']?>" <?php if($get_status_stakeholder == $sh['id']) echo 'selected'; ?>>
            <?php echo $sh['name'] ?> </option>
          <?php } ?>
        </select>
      </div> -->

      <div class="col-md-2">
        <label class="form-label"> </label>
        <button id="search" style="float:bottom;" class="btn btn-primary form-control">Search</button>
      </div>
      <div class="col-md-6" align='right'>
      <button class="btn btn-primary" id="btn_export_excel" >Export Excel</button>
        <!-- &nbsp; -->
        <!-- <a href="../stock_out_by_customer/create.php" class="btn btn-primary">Add Stock In</a>   -->
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Stakeholder</th>
                  <th>Reference Number</th>
                  <th>Status</th>
                  <th>Date Created</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_stock_out_by_customer">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>

<script type="text/javascript" src="../../assets/js/resource/stock_out_by_customer.js"> </script>