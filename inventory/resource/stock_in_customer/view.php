<?php
    include_once('../../controller/stock_in_customer.php');
    include_once("../../layouts/menu.php");

    $product = getProductRetailer();
    $stakeholder = getCustomer();
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Stock In</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">View Stock In</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/stock_in_customer.php" enctype="multipart/form-data">
                            <?php  while($row = $result->fetch_assoc()) { ?>

                                <input class="form-control" type="hidden" name="current_attachment" id="current_attachment" required value="<?php echo $row['attachment']?>"/>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                <div class="row">                                
                                    <div class="mb-3 col-md-3">
                                        <label for="reference_number" class="form-label">Referance Number</label>
                                        <input class="form-control" type="text" name="reference_number" id="reference_number" readonly=true value="<?php echo $row['reference_number']?>"/>
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input class="form-control" type="date" id="date"
                                        name="date" value="<?php echo $row['date'] ?>"
                                        autofocus readonly=true disabled=true />
                                    </div>

                                    <div class="mb-2 col-md-2">
                                        <label for="low_quantity_alert" class="form-label">Attachment</label>
                                        <input class="form-control" style="display:inline;" type="text" name="attachment" id="attachment" value="<?php echo $row['attachment']?>" readonly=true disabled=true/>
                                    </div>

                                    <div class="mb-1 col-md-1">
                                        <br>
                                        <a href="<?php echo '../../'. $row['attachment'] ?>" target="_blank">
                                            <i class="fa fa-download" style="font-size:36px"></i>
                                        </a>
                                    </div>
                                
                                    <div class="mb-3 col-md-3">
                                        <label for="remark" class="form-label">Remark</label>
                                        <textarea type="text" class="form-control" id="remark" name="remark" readonly=true disabled=true><?php echo $row['remark']?></textarea>
                                    </div>
                                </div>
                                
                                <div class="divider divider-info text-start">
                                    <div class="divider-text">
                                        <h6>Product</h6>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:5%">No</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <!-- <th style="width:5%">Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $idx = 0; while($product = $resultProduct->fetch_assoc()) {  $idx += 1;?>
                                                        <tr>
                                                            <td><?php echo $idx ?> .</td>
                                                            <td><?php echo ($product['product_name']) ?></td>
                                                            <td><?php echo ($product['quantity']) ?></td>
                                                            <!-- <td>
                                                                <a href="../../controller/stock_in.php?deleteProduct=<?php echo $product['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td> -->
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                
                                    <a href="index.php" type="submit"
                                        class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
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