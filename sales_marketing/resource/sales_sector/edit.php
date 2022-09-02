<?php
    include_once('../../controller/sales_sector.php');
    include_once("../../layouts/menu.php"); 
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Product Sector</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Edit Product Sector</h5>
                    <div class="card-body">

                        <form method="POST" action="../../controller/sales_sector.php" enctype="multipart/form-data">
                            <?php  while($row = $result->fetch_assoc()) { ?>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label for="Category" class="form-label">Sector Category</label>
                                    <select name="Category" id="Category" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Category ----</option>
                                        <?php foreach(getProjectCategory() as $idx => $sector) { ?>
                                        <option value="<?php echo $sector['id']?>" <?php if($row['Category'] ==  $sector['id']) echo 'selected' ?>> <?php echo $sector['Name'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="Name" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="Name" value="<?php echo $row['Name']?>"
                                        id="Name" required />
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="mb-12 col-md-12">
                                    <label for="remarks" class="form-label">Details</label>
                                    <textarea type="text" class="form-control" id="Details" name="Details" ><?php echo $row['Details']?>
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <a href="index.php" type="submit"
                                    class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                <button type="submit" name="action" value="update"
                                    class="btn btn-primary me-2 float-right">Submit</button>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>
