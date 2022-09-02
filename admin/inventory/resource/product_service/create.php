<?php

include_once('../../controller/product_service.php');


?>
<?php include_once("../../layouts/menu.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Product Service</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Add Product Service</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/product_service.php" enctype="multipart/form-data">
                           
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label for="project_pillar" class="form-label">Product Name</label>
                                    <input class="form-control" type="text" id="project_pillar"
                                        name="project_pillar" autofocus required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="project_code" class="form-label">Product Code</label>
                                    <input class="form-control" type="text" name="project_code"
                                        id="project_code" required />
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="mb-12 col-md-12">
                                    <label for="remarks" class="form-label">Details Product</label>
                                    <textarea type="text" class="form-control" id="project_detail" name="project_detail">
                                    </textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="index.php" type="submit"
                                    class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                <button type="submit" name="action" value="create"
                                    class="btn btn-primary me-2 float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>
