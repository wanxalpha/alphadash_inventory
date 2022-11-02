<?php

include_once('../../controller/inventory_account.php');
$stakeholder_category = getStakeholderCategory();

?>
<?php include_once("../../layouts/menu.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Stakeholders</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Edit Stakeholders</h5>
                    <div class="card-body">
                        <form class="repeater" method="POST" action="../../controller/inventory_account.php" enctype="multipart/form-data">
                        <?php  while($row = $result->fetch_assoc()) { ?>
                            <input value="<?php echo $row['EMPLOYEE_ID']?>" name="id" type="hidden">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label for="name" class="form-label">First Name</label>
                                    <input class="form-control" type="text" id="fullname"
                                        name="fullname" autofocus required value="<?php echo $row['FULLNAME'] ?>"/>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="name" class="form-label">Contact Number</label>
                                    <input class="form-control" type="text" id="f_contact"
                                        name="f_contact" autofocus required value="<?php echo $row['CONTACT_NO'] ?>"/>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Stakeholder Category ----</option>
                                        <option value="2" <?php echo ($row['DESIGNATION'] ==  2) ? ' selected="selected"' : '';?>>Retailer</option>
                                        <option value="3" <?php echo ($row['DESIGNATION'] ==  3) ? ' selected="selected"' : '';?>>Supplier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="mb-3 col-md-4">
                                    <label for="email" class="form-label">Employee Id</label>
                                    <input class="form-control" type="text" name="f_emp_id" value="<?php echo $row['f_emp_id'] ?>"
                                        id="f_emp_id" required />
                                </div> -->
                                <div class="mb-3 col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" type="email" name="f_com_email" value="<?php echo $row['COMPANY_EMAIL'] ?>"
                                        id="f_com_email" required />
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="email" class="form-label">Password</label>
                                    <input class="form-control" type="text" name="f_password" value="<?php echo $row['PASSWORD'] ?>"
                                        id="f_password" required />
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="f_user_level" class="form-label">Address</label>
                                    <textarea type="text" class="form-control" id="address" name="address"><?php echo $row['HOME_ADDRESS']?></textarea>
                                </div>  
                            </div>
                            
                            <div class="mt-4">
                                <a href="index.php" type="submit"
                                    class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                <button type="submit" name="action" value="update"
                                    class="btn btn-primary me-2 float-right">Submit</button>
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
