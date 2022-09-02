<?php
  include_once('../../controller/setting.php');
  include_once("../../layouts/menu.php");
?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Setting</h4>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Company Logo</h5>
                    <div class="card-body">
                    <form class="repeater" method="POST" action="../../controller/setting.php" enctype="multipart/form-data">
                            <div class="form-group row mb-25">
                                <div class="col-sm-3">
                                    <label for="avail"
                                        class=" col-form-label  color-dark fs-14 fw-500 align-center">Edit Company
                                        Logo</label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control" id="picture_image" name="picture_image" type="file"
                                        placeholder="e.g 1,2,3,..." required>
                                    <div class="layout-button mt-25">
                                    <?php  while($row = $result->fetch_assoc()) { ?>

                                        <input type="text" value="<?php echo $row['f_company_id']?>" id="company_id"
                                            name="company_id" >
                                        <?php }?>
                                        <button name="add_logo" type="submit"
                                            class="btn btn-primary btn-default btn-squared px-30">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../layouts/footer.php"); ?>
