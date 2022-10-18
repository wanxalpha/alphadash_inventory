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
                         <?php  while($row = $result->fetch_assoc()) { ?>

                            <div class="form-group row mb-25">
                                <div class="col-sm-3">
                                    <label for="avail"
                                        class=" col-form-label  color-dark fs-14 fw-500 align-center">Edit Company
                                        Logo</label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control" id="picture_image" name="picture_image" type="file"
                                        placeholder="e.g 1,2,3,..." >
                                    <div class="layout-button mt-25">

                                        <input type="hidden" value="<?php echo $row['f_id']?>" id="company_id"
                                            name="company_id" >
                                       
                                    </div>
                                </div>
                              
                                <div class="col-sm-3">
                                    <label for="avail"  class=" col-form-label  color-dark fs-14 fw-500 align-center">Company Name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="f_company_name" id="f_company_name"  value="<?php echo $row['f_company_name']?>" required />
                                    <div class="layout-button mt-25">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="avail"  class=" col-form-label  color-dark fs-14 fw-500 align-center">Address 1 </label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="f_address_1" id="f_address_1"  value="<?php echo $row['f_address_1']?>" required />
                                    <div class="layout-button mt-25">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="avail"  class=" col-form-label  color-dark fs-14 fw-500 align-center">Address 2 </label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="f_address_2" id="f_address_2" value="<?php echo $row['f_address_2']?>" />
                                    <div class="layout-button mt-25">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="avail"  class=" col-form-label  color-dark fs-14 fw-500 align-center">Address 3 </label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="f_address_3" id="f_address_3" value="<?php echo $row['f_address_3']?>" />
                                    <div class="layout-button mt-25">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="setting.php" type="submit"
                                    class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                <input type="hidden" name="action" value="create">
                                <button type="submit"  id="btn_submit"
                                    class="btn btn-primary me-2 float-right">Submit</button>
                                <!-- <button type="submit" name="action" value="preview"
                                    class="btn btn-primary me-2 float-right" id="preview_document">Preview Document</button> -->
                            </div>
                            <?php }?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../../layouts/footer.php"); ?>
