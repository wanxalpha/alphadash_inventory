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
                            <input value="<?php echo $row['f_id']?>" name="id" type="hidden">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label for="name" class="form-label">First Name</label>
                                    <input class="form-control" type="text" id="f_first_name"
                                        name="f_first_name" autofocus required value="<?php echo $row['f_first_name'] ?>"/>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="name" class="form-label">Last Name</label>
                                    <input class="form-control" type="text" id="f_last_name"
                                        name="f_last_name" autofocus required value="<?php echo $row['f_last_name'] ?>"/>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="name" class="form-label">Contact Number</label>
                                    <input class="form-control" type="text" id="f_contact"
                                        name="f_contact" autofocus required value="<?php echo $row['f_contact'] ?>"/>
                                </div>
                            </div>
                            <div class="row">
                            <div class="mb-3 col-md-4">
                                    <label for="email" class="form-label">Employee Id</label>
                                    <input class="form-control" type="text" name="f_emp_id" value="<?php echo $row['f_emp_id'] ?>"
                                        id="f_emp_id" required />
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" type="email" name="f_com_email" value="<?php echo $row['f_com_email'] ?>"
                                        id="f_com_email" required />
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="email" class="form-label">Password</label>
                                    <input class="form-control" type="text" name="f_password" value="<?php echo $row['f_password'] ?>"
                                        id="f_password" required />
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="mb-3 col-md-4">
                                    <label for="f_user_level" class="form-label">User Level<span class="text-danger">*</span></label>
                                    <select required name="f_user_level" id="f_user_level" class="form-control select">
                                        <option value="" hidden>Select User Level</option>
                                        <option value="Admin" <?php if($row['f_user_level'] == 'Admin') echo 'selected' ?> >Admin</option>
                                        <option value="Master" <?php if($row['f_user_level'] == 'Master') echo 'selected' ?>>Master Admin</option>
                                        <option value="User" <?php if($row['f_user_level'] == 'User') echo 'selected' ?>>Normal User</option>
                                    </select>
                                </div> -->

                                <div class="mb-3 col-md-4">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Stakeholder Category ----</option>
                                        <?php while ($cat = mysqli_fetch_array($stakeholder_category)) { ?>
                                            <option value="<?php echo $cat['id'] ?>" 
                                            <?php echo ($row['f_designation'] ==  $cat['id']) ? ' selected="selected"' : '';?>> 
                                                <?php echo $cat['name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
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
