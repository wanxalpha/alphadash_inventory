<?php
  include_once('../../controller/profile.php');
  include_once("../../layouts/menu.php");

?>
<?php  while($row = $result->fetch_assoc()) { ?>
<div class="content-wrapper">
    <!-- Content -->
    <form class="repeater" method="POST" action="../../controller/profile.php" enctype="multipart/form-data">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>My Details</h4>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body"><br>
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="../../../../admin/upload/profile/<?php echo $row['f_picture'] ?>" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4><?php echo $row['f_first_name'].' '.$row['f_last_name'] ?></h4>
                                <p class="text-secondary mb-1"><?php echo $row['f_position'] ?></p>
                                <p class="text-muted font-size-sm"><?php echo $row['f_emp_id'] ?></p>
                                <!-- <form method="post" action="" enctype='multipart/form-data'>
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type='file' name='picture_image' multiple class="account-file-input" />
                                        </label>
                                        <button type="submit" name="upload" class="btn btn-outline-secondary account-image-reset mb-4">Submit</button>
                                    </div>
                                </form> -->
                            </div>
                            <input type="hidden" name="f_picture" value="<?php echo $row['f_picture']?>" >
                            <input class="form-control" id="picture_image" name="picture_image" type="file"
                                        placeholder="e.g 1,2,3,...">
                        </div>
                    </div>
                </div>
            </div>


            <!--Personal Details-->
            <div class="col-md-8">
                <div class="card mb-3">
                    <h5 class="card-header2">Profile Details</h5>
                        <input type="hidden" name="id" value="<?php echo $row['f_id'] ?>" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="f_first_name" name="f_first_name" value="<?php echo $row['f_first_name'] ?>" />
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="f_last_name" name="f_last_name" value="<?php echo $row['f_last_name'] ?>"/>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="email" id="f_com_email" name="f_com_email" value="<?php echo $row['f_com_email'] ?>" />
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Employee Id</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="f_emp_id" name="f_emp_id" value="<?php echo $row['f_emp_id'] ?>" />
                                </div>

                                <div class="col-sm-2">
                                    <h6 class="mb-0">Contact No</h6>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <input class="form-control" type="text" id="f_contact" name="f_contact" value="<?php echo $row['f_contact'] ?>"  />
                                </div>
                            </div>
                            <hr>
                           
                            <input class="form-control" type="text" id="emp_code" name="emp_code" value="<?php echo $emp_code ?>" hidden />
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="demo class-inline">
                                        <button class="btn btn-info" id="profile_save" type="submit">Save</button>
                                       
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php include_once("../../layouts/footer.php"); ?>
