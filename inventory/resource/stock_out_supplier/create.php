<?php
    include_once('../../controller/stock_in.php');
    include_once("../../layouts/menu.php");

    $product = getProduct();
    $stakeholder = getSupplier();
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Stock In</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Add Stock In</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/stock_out_supplier.php" enctype="multipart/form-data">
                           
                            <div class="row">
                               
                                <div class="mb-3 col-md-3">
                                    <label for="reference_number" class="form-label">Referance Number</label>
                                    <input class="form-control" type="text" name="reference_number" id="reference_number" required />
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input class="form-control" type="date" id="date" name="date" autofocus required />
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="low_quantity_alert" class="form-label">Attachment</label>
                                    <input class="form-control" type="file" name="attachment" id="attachment" required />
                                </div>
                            
                                <div class="mb-6 col-md-3">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea type="text" class="form-control" id="remark" name="remark">
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="divider divider-info text-start">
                                <div class="divider-text">
                                    <h6>Product</h6>
                                </div>
                            </div>

                            <!-- <div class="repeater"> -->
                                <div class="mt-4">
                                        <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0  float-right" value="Add" />
                                    </div>
                                <div class="row">
                                
                                <div class="mb-3 col-md-12">
                                    <div data-repeater-list="product_list">
                                        <div data-repeater-item class="row">
                                            <div class="mb-3 col-lg-3">
                                                <label for="name" class="form-label">Product</label>
                                                <select name="product_id" id="product_id" class="select2 form-select">
                                                    <option hidden value=""> ---- Select Product ----</option>
                                                    <?php while ($row = mysqli_fetch_array($product)) { ?>
                                                    <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="mb-3 col-lg-3">
                                                <label for="name" class="form-label">Quantity</label>
                                                <input class="form-control" type="number" name="quantity" id="quantity" />
                                            </div>

                                            <div class="mb-3 col-lg-3">
                                                <label for="name" class="form-label">Expired Date</label>
                                                <input class="form-control" type="date" name="expired_date" id="expired_date" />
                                            </div>

                                            <div class="mb-2 col-lg-2">
                                                <label for="name" class="form-label">&nbsp;</label>
                                                    <input data-repeater-delete type="button" class="btn btn-primary form-control" 
                                                        value="Delete" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
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