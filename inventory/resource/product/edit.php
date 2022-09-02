<?php
    include_once('../../controller/product.php');
    include_once("../../layouts/menu.php");

    $product_category = getProductCategory();
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Product</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Edit Product</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/product.php" enctype="multipart/form-data">
                           
                            <?php  while($row = $result->fetch_assoc()) { ?>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                
                                <div class="row">
                                
                                    <div class="mb-3 col-md-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input class="form-control" type="text" name="name" id="name"  value="<?php echo $row['name'] ?>" required />
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="name" class="form-label">Product Category</label>
                                        <select name="product_category_id" id="product_category_id" class="select2 form-select" required>
                                            <option hidden value=""> ---- Select Product Category ----</option>
                                            <?php while ($cat = mysqli_fetch_array($product_category)) { ?>
                                                <option value="<?php echo $cat['id'] ?>" 
                                                <?php echo ($row['product_category_id'] ==  $cat['id']) ? ' selected="selected"' : '';?>> 
                                                    <?php echo $cat['name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                
                                    <div class="mb-3 col-md-3">
                                        <label for="product_code" class="form-label">Product Code</label>
                                        <input class="form-control" type="text" name="product_code"  value="<?php echo $row['product_code'] ?>"
                                            id="product_code" required />
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="sales_price" class="form-label">Sales Price (RM)</label>
                                        <input class="form-control" type="text" name="sales_price"  value="<?php echo $row['sales_price'] ?>"
                                            id="sales_price" required />
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="buy_price" class="form-label">Buy Price (RM)</label>
                                        <input class="form-control" type="text" name="buy_price"  value="<?php echo $row['buy_price'] ?>"
                                            id="buy_price" required />
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="low_quantity_alert" class="form-label">Low Quantity Alert</label>
                                        <input class="form-control" type="number" name="low_quantity_alert"  value="<?php echo $row['low_quantity_alert'] ?>"
                                            id="low_quantity_alert" required />
                                    </div>
                                
                                    <div class="mb-6 col-md-6">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea type="text" class="form-control" id="description" name="description" style="text-align:left"><?php echo $row['description'] ?></textarea>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="divider divider-info text-start">
                                <div class="divider-text">
                                    <h6>Attachment</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">No</th>
                                                    <th>Updated_date</th>
                                                    <th style="width:5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $idx = 0; while($att = $resultAttachment->fetch_assoc()) {  $idx += 1;?>
                                                    <tr>
                                                        <td><?php echo $idx ?> .</td>
                                                        <td><?php echo ($att['created_at']) ?></td>
                                                        <td>
                                                            <a href="<?php echo '../../'. $att['attachment_path'] ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            &nbsp;
                                                            <a href="../../controller/product.php?deleteAttachment=<?php echo $att['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0  float-right" value="Add" />
                                </div>
                            <div class="row">
                            
                            <div class="mb-3 col-md-12">
                                <div data-repeater-list="document_list">
                                    <div data-repeater-item class="row">
                                        <div class="mb-3 col-lg-3">
                                            <label for="name" class="form-label">Attachment</label>
                                            <input class="form-control" type="file" name="attachment" value="" id="attachment" />
                                        </div>

                                        <div class="mb-2 col-lg-2">
                                            <label for="name" class="form-label">&nbsp;</label>
                                                <input data-repeater-delete type="button" class="btn btn-primary form-control" 
                                                    value="Delete" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="index.php" type="submit"
                                    class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                <button type="submit" name="action" value="update"
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
<script type="text/javascript" src="../../assets/vendor/jquery.repeater/jquery.repeater.min.js"> </script>


<script>
    $(document).ready(function () {
        "use strict";
        $(".repeater").repeater({
            defaultValues: {
                "textarea-input": "foo",
                "text-input": "bar",
                "select-input": "B",
                "checkbox-input": ["A", "B"],
                "radio-input": "B"
            },
            show: function () {
                $(this).slideDown()
            },
            hide: function (e) {
                confirm("Are you sure you want to delete this record?") && $(this).slideUp(e)
            },
            ready: function (e) {}
        }), window.outerRepeater = $(".outer-repeater").repeater({
            defaultValues: {
                "text-input": "outer-default"
            },
            show: function () {
                console.log("outer show"), $(this).slideDown()
            },
            hide: function (e) {
                console.log("outer delete"), $(this).slideUp(e)
            },
            repeaters: [{
                selector: ".inner-repeater",
                defaultValues: {
                    "inner-text-input": "inner-default"
                },
                show: function () {
                    console.log("inner show"), $(this).slideDown()
                },
                hide: function (e) {
                    console.log("inner delete"), $(this).slideUp(e)
                }
            }]
        })
    });
</script>