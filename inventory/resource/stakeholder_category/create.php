<?php
    include_once('../../controller/stakeholder_category.php');
    include_once("../../layouts/menu.php");
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Stakeholder Category</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Add Stakeholder Category</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/stakeholder_category.php" enctype="multipart/form-data">
                           
                            <div class="row">
                               
                                <div class="mb-3 col-md-3">
                                    <label for="name" class="form-label">Stakeholder Name</label>
                                    <input class="form-control" type="text" name="name"
                                        id="name" required />
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="mb-12 col-md-12">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea type="text" class="form-control" id="remark" name="remark">
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
