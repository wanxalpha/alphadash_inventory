<?php

include_once('../../controller/retailer_customer.php');

// $sales_person = getSalesPerson();
$project_pillar = getPillar();
$stakeholder_category = getStakeholderCategory();

?>
<?php include_once("../../layouts/menu.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Customers</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Edit Customer</h5>

                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/retailer_customer.php" enctype="multipart/form-data">

                            <?php  while($row = $result->fetch_assoc()) { ?>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                <div class="row" >
                                    <div class="mb-3 col-md-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input class="form-control" type="text" id="name"
                                            name="name" autofocus required value="<?php echo $row['name'] ?>"/>
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="mobile_number" class="form-label">Mobile Number</label>
                                        <input class="form-control" type="text" id="mobile_number"
                                            name="mobile_number" autofocus required value="<?php echo $row['mobile_number'] ?>"/>
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input class="form-control" type="text" id="phone_number"
                                            name="phone_number" autofocus required value="<?php echo $row['phone_number'] ?>"/>
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email"
                                            id="email" required value="<?php echo $row['email'] ?>"/>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="f_user_level" class="form-label">Address</label>
                                        <textarea type="text" class="form-control" id="address" name="address"><?php echo $row['address'] ?></textarea>
                                    </div>    

                                </div>  
                            <?php } ?>
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
        $('#company').hide();


        $('input[type="radio"]').on('change', function() {
            var category = $(this).val();
            var closed = <?php echo FunnelStatus::CLOSED ?>;
            var potential = <?php echo FunnelStatus::POTENTIAL ?>;

            if(category == 1){
                $('#individual').show();
                $('#company').hide();
            }
            else{
                $('#individual').hide();
                $('#company').show();
            }
        });

        $('#status').on('change', function() {
            var value = $(this).val();
            var closed = <?php echo FunnelStatus::CLOSED ?>;
            var potential = <?php echo FunnelStatus::POTENTIAL ?>;


            if(closed == value){
                $('.div_closed').show();
                $('.div_not_closed').hide();
                $('.div_remarks').show();

                $('#why_closed').prop('required',true);
                $('#opportunity').prop('required',true);
                $('#causing_issue').prop('required',false);
                $('#improvement_step').prop('required',false);
            }
            else if(potential == value){
                $('.div_closed').hide();
                $('.div_not_closed').hide();
                $('.div_remarks').hide();

                $('#why_closed').prop('required',false);
                $('#opportunity').prop('required',false);
                $('#causing_issue').prop('required',false);
                $('#improvement_step').prop('required',false);
            }
            else{
                $('.div_closed').hide();
                $('.div_not_closed').show();
                $('.div_remarks').show();

                $('#why_closed').prop('required',false);
                $('#opportunity').prop('required',true);
                $('#causing_issue').prop('required',true);
                $('#improvement_step').prop('required',true);

            }
        });

        $('#Category').on('change',function(){
            var value = $(this).val();
            var url = "../../controller/sales_funnel.php";

            $.get(url, {
                action: 'dropdown-sector',
                Category:value,
            })
            .done(function (data) {
                if (data) {
                    $('#ProjectSectorId').html(data);

                }
            })



        });
    });
</script>