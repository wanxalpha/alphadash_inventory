<?php
  include_once('../../controller/sales_person.php');

  include_once("../../layouts/menu.php");
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Sales Person</h4>
   
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Sales Person</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0" id="index_sales_person">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 

include_once("../../layouts/footer.php");

?>

<script type="text/javascript" src="../../assets/js/resource/sales_person.js"> </script>
<script>
  getList();
</script>