<?php
  include_once('../../controller/sales_person.php');

  include_once("../../layouts/menu.php");
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Sales Person - <?php  while($row_employee = $result_employee->fetch_assoc()) {  echo $row_employee['f_first_name'].' '.$row_employee['f_last_name']; }?> </h4>
        <div class="row mb-3">
            <div class="col-md-2">
                <select name="year_selected"  id="year_selected" class="select2 form-select" required>
                    <option hidden value=""> ---- Select Year ----</option>
                    <?php foreach(range(2020,2025) as $year) { ?>
                    <option value="<?php echo $year?>" <?php if($year == date('Y')) echo 'selected'; ?> > <?php echo $year ?>  </option>    
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2">
                <button style="float:right;" class="btn btn-info" id="btn_search">Search</button>
            </div>
            <div class="col-md-2">
                <button style="float:left;" class="btn btn-success" id="btn_export_excel" >Export Excel</button>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">KPI COMPARISON</h5>
                   
                    <form method="POST" action="../../controller/sales_person.php">
                    <input type="hidden" name="employee_id"  id="employee_id" value="<?php echo $_GET['emp_id'] ?>">
                    <input type="hidden" name="year" value="<?php echo '2022' ?>">

                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <div class="table-responsive">
                               
                                    <table id="sales_kpi" class="table table-striped table-nowrap custom-table mb-0">
                                  
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <div class="table-responsive col-md-4">
                               
                                    <table id="summary_kpi" class="table table-striped table-nowrap custom-table mb-0">
                                       
                                    </table>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="index.php" type="submit" class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                <button type="submit" name="action" value="update"  class="btn btn-primary me-2 float-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>

<script type="text/javascript" src="../../assets/js/resource/sales_person.js"> </script>

<script>
    getYearKPI();
</script>