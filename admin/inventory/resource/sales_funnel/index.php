<?php

// include_once('../../controller/config.php');
include_once('../../controller/sales_funnel.php');



?>
<?php include_once("../../layouts/menu.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Sales Funnel</h4>
    <div class="row mb-3">
      <div class="col-md-1">
        <label class="form-label">Month</label>
        <select name="status_month" id="status_month" class="select2 form-select" required>
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
      <div class="col-md-1">
        <label class="form-label">Year</label>
        <?php $status_year = isset($_GET['year']) ? $_GET['year'] : date('Y') ; ?>
        <select name="status_year" id="status_year" class="select2 form-select" required>
          <option hidden value=""> ---- Select Year ----</option>
          <?php foreach(listYear() as $year) { ?>
          <option value="<?php echo $year?>" <?php if($year == $status_year) echo 'selected'; ?>> <?php echo $year ?>
          </option>
          <?php } ?>
        </select>
      </div>
      <div class="col-md-2">
        <label class="form-label">Status</label>
        <select name="status" id="status" class="select2 form-select" required>
          <option hidden value=""> ---- Select Status ----</option>
          <?php  
              $get_status = isset($_GET['status']) ? $_GET['status'] + 1 : null ;
          ?>
          <?php foreach(FunnelStatus::getLists() as $idx => $status) { ?>
          <option value="<?php echo $idx?>" <?php if($get_status == $idx) echo 'selected'; ?>>
            <?php echo $status ?> </option>
          <?php } ?>
        </select>
      </div>
      <div class="col-md-2">
          <label class="form-label">Category</label>
          <?php $category = isset($_GET['category']) ? $_GET['category'] : null ; ?>
          <select name="category"  id="category" class="select2 form-select" required>
          <option value="">All</option>
              <?php foreach(ProjectSector::getLists() as $idx => $data) { ?>
              <option value="<?php echo $idx?>" <?php if($idx == $category) echo 'selected'; ?> > <?php echo $data ?>  </option>    
              <?php } ?>
          </select>
      </div>
      <div class="col-md-2">
        <label class="form-label"> </label>

        <button id="search" style="float:bottom;" class="btn btn-primary form-control">Search</button>
      </div>
      <div class="col-md-4">
        <a href="create.php" style="float:right;" class="btn btn-primary">Add Sales Funnel</a>
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
                  <th>Project Name</th>

                  <th>Category</th>
                  <th>Sector</th>
                  <th>Project Date Receive</th>
                  <!-- <th>Project Dateline</th> -->
                  <th>Project Code</th>
                  <!-- <th>PIC Name</th> -->
                  <th>Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_sales_funnel">
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
<script type="text/javascript" src="../../assets/js/resource/sales_funnel.js"> </script>