<?php
    include_once('../../controller/stock_out_customer.php');
    include_once("../../layouts/menu.php");

    $product = getProduct();
    $stakeholder = getCustomer();
?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Stock Out Customer</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Add Stock Out</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/stock_out_customer.php" enctype="multipart/form-data">
                           
                            <div class="row">   
                                <div class="mb-3 col-md-3">
                                    <label for="name" class="form-label">Customer</label>
                                    <select name="stakeholder_id" id="stakeholder_id" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Customer ----</option>
                                        <?php while ($row = mysqli_fetch_array($stakeholder)) { ?>
                                        <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

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
                            
                                <div class="mb-3 col-md-3">
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
                                                <select name="product_id" id="product_id" class="select2 form-select checkProduct">
                                                    <option hidden value=""> ---- Select Product ----</option>
                                                    <?php while ($prod = mysqli_fetch_array($product)) { ?>
                                                    <option value="<?php echo $prod['id'] ?>"> <?php echo $prod['name'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="mb-3 col-lg-3">
                                                <label for="name" class="form-label">Quantity</label>
                                                <input class="form-control quantity" type="number" name="quantity" id="quantity" />
                                                <label for="name" class="form-label">Available Stock: </label>
                                                <label for="name" class="form-label available_stock" id='available_stock'></label>
                                            </div>

                                            <div class="mb-2 col-lg-2">
                                                <label for="name" class="form-label">&nbsp;</label>
                                                    <input data-repeater-delete type="button" class="btn btn-primary form-control" 
                                                        value="Delete" />
                                            </div>

                                            <input class="form-control temp_quantity" type="hidden" name="temp_quantity" id="temp_quantity" />

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
        $( ".quantity" ).prop( "disabled", true );
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
                $(this).slideDown();
                console.log('new');
                $('.checkProduct').on('change',function(){
                    console.log('asf');
                    var value = $(this).val();
                    var url = "../../controller/stock_out_customer.php";

                    $.get(url, {
                        action: 'stock-available',
                        product_id:value,
                    })
                    .done(function (data) {
                        if (data) {
                            $('.available_stock').html(data);
                            $('.temp_quantity').val(data);

                        }
                        if(data == '0'){
                            $('.quantity').val("");
                            $( ".quantity" ).prop( "disabled", true );
                        }else{
                            $( ".quantity" ).prop( "disabled", false );
                        }
                    })



                });

                $(".quantity").change(function() { 
                    console.log($(this).val());
                    console.log('masuk sini ha');
                    var current_quantity = $('.temp_quantity').val();

                    if($(this).val() > current_quantity){
                        $('.quantity').val("");
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ops...',
                            text: 'Exceeded available stock',
                            timer: 20000,
                        })
                    }
                });
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

        $('.checkProduct').on('change',function(){
       
            var value = $(this).val();
            var url = "../../controller/stock_out_customer.php";

            $.get(url, {
                action: 'stock-available',
                product_id:value,
            })
            .done(function (data) {
                if (data) {
                    $('.available_stock').html(data);
                    $('.temp_quantity').val(data);

                }
                if(data == '0'){
                    $('.quantity').val("");
                    $( ".quantity" ).prop( "disabled", true );
                }else{
                    $( ".quantity" ).prop( "disabled", false );
                }
            })



        });

        $(".quantity").change(function() { 
            
            
            var request_quantity = parseInt($(this).val());
            var current_quantity = parseInt($('.temp_quantity').val());
            console.log(request_quantity);
            console.log(current_quantity);

            if(request_quantity > current_quantity){
            console.log('lebihhh');

                $('.quantity').val("");
                Swal.fire({
                    icon: 'warning',
                    title: 'Ops...',
                    text: 'Exceeded available stock',
                    timer: 20000,
                })
            }else{
            console.log('kuranggg');

            }
        });
    });
</script>