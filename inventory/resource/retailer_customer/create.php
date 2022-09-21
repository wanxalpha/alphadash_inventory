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
                    <h5 class="card-header2">Add Customer</h5>

                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/retailer_customer.php" enctype="multipart/form-data">

                            <div class="row" >

                                <div class="mb-3 col-md-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="name"
                                        name="name" autofocus required />
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="mobile_number" class="form-label">Mobile Number</label>
                                    <input class="form-control" type="text" id="mobile_number"
                                        name="mobile_number" autofocus required />
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input class="form-control" type="text" id="phone_number"
                                        name="phone_number" autofocus required />
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" type="email" name="email"
                                        id="email" required />
                                </div>

                                <div class="mb-3 col-md-6">
                                        <label for="f_user_level" class="form-label">Address</label>
                                        <textarea type="text" class="form-control" id="address" name="address"></textarea>
                                </div>      

                                <div class="mt-4">
                                    <a href="index.php" type="submit"
                                        class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                    <button type="submit" name="action" value="create"
                                        class="btn btn-primary me-2 float-right">Submit</button>
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

<script type="text/javascript" src="../../assets/vendor/jquery.repeater/jquery.repeater.min.js"> </script>
