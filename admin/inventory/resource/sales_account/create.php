<?php

include_once('../../controller/sales_account.php');


?>
<?php include_once("../../layouts/menu.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Sales Person</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Add Sales Person</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/sales_account.php" enctype="multipart/form-data">
                           
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="name" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="f_first_name"
                                    name="f_first_name" autofocus required />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="name" class="form-label">Last Name</label>
                                <input class="form-control" type="text" id="f_last_name"
                                    name="f_last_name" autofocus required />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="name" class="form-label">Contact Number</label>
                                <input class="form-control" type="text" id="f_contact"
                                    name="f_contact" autofocus required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="email" class="form-label">Employee Id</label>
                                <input class="form-control" type="text" name="f_emp_id"
                                    id="f_emp_id" required />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="email" name="f_com_email"
                                    id="f_com_email" required />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="email" class="form-label">Password</label>
                                <input class="form-control" type="text" name="f_password"
                                    id="f_password" required />
                            </div>
                        </div>

                        <div class="row">
                           
                            <div class="mb-3 col-md-4">
                                <label for="f_user_level" class="form-label">User Level<span class="text-danger">*</span></label>
                                <select required name="f_user_level" id="f_user_level" class="form-control select">
                                    <option value="" hidden>Select User Level</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Master">Master Admin</option>
                                    <option value="User">Normal User</option>
                                </select>
                            </div>
                        </div>
                       
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

<!-- <div class="row mb-4">
    <div class="col-4 mb-0">
        <label for="nameExLarge" class="form-label">Full Name (As Per IC)<span class="text-danger">*</span></label>
        <input type="text" id="fullname" name="fullname" class="form-control" required />
    </div>
    <div class="col-4 mb-0">
        <label for="formFile" class="form-label">Upload Profile Photo<span class="text-danger">*</span></label>
        <input class="form-control" required id="picture_image" name="picture_image" type="file" onchange="loadFile(event)" />
    </div>
</div>
<div class="row mb-4">
    <div class="col-4 mb-0">
        <label for="nameExLarge" class="form-label">Birthday<span class="text-danger">*</span></label>
        <input name="Birthday" id="birthday" required class="form-control" type="date">
    </div>
    <div class="col-4 mb-0">
        <label for="formFile" class="form-label">Upload Resume<span class="text-danger">*</span></label>
        <input class="form-control" required id="resume_file" name="resume_file" type="file" accept="application/pdf" />
    </div>
    <div class="col-4 mb-0"></div>
</div>
<div class="row mb-4">
    <div class="col-4 mb-0">
        <label for="dobExLarge" class="form-label">Mobile No<span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text">+60</span>
            <input name="phone" id="phone" required class="form-control" type="number" maxlength="12">
        </div>
    </div>
    <div class="col-8">
        <label for="dobExLarge" class="form-label">Permanent Address<span class="text-danger">*</span></label>
        <input name="per_address" id="per_address" required class="form-control" type="text">
    </div>
</div>
<div class="row mb-4">
    <div class="col mb-0">
        <label for="dobExLarge" class="form-label">House No<span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text">+60</span>
            <input id="home_tel" name="home_tel" required class="form-control" type="number" maxlength="12">
        </div>
    </div>
    <div class="col-md-8">
        <label for="dobExLarge" class="form-label">Correspondence Address<span class="text-danger">*</span></label>
        <div class="input-group">
            <input name="cor_address" id="cor_address" required class="form-control" type="text">
            <input type="button" class="input-group-text" id="same_address" value="Same As Permanent Address">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4 mb-4">
        <label for="emailExLarge" class="form-label">Race<span class="text-danger">*</span></label>
        <select required name="race" id="race" class="form-control select">
            <option>Select Race</option>
            <option value="Malay">Malay</option>
            <option value="Chinese">Chinese</option>
            <option value="Indian">Indian</option>
            <option value="Others">Others</option>
        </select>
    </div>
    <div class="col-4 mb-4" id="race_div">
        <label for="emailExLarge" class="form-label">Please Specify</label>
        <input name="race2" id="race2" class="form-control" type="text" placeholder="please specify your race">
    </div>
    <div class="col-4 mb-4">
        <label for="emailExLarge" class="form-label">Religion<span class="text-danger">*</span></label>
        <select required name="religion" id="religion" class="form-control select">
            <option>Select Religion</option>
            <option value="Atheist">Atheist</option>
            <option value="Buddhist">Buddhist</option>
            <option value="Christian">Christian</option>
            <option value="Hinduism">Hinduism</option>
            <option value="Muslim">Islam</option>
            <option value="Sikh">Sikh</option>
            <option value="Others">Others</option>
        </select>
    </div>
    <div class="col-4 mb-4" id="religion_div">
        <label for="emailExLarge" class="form-label">Please Specify</label>
        <input name="religion2" id="religion2" class="form-control" type="text" placeholder="please specify your religion">
    </div>
    <div class="col-4 mb-4">
        <label for="emailExLarge" class="form-label">Personal Email<span class="text-danger">*</span></label>
        <input name="email" required class="form-control" type="email">
    </div>
    <div class="col-4 mb-4">
        <label for="emailExLarge" class="form-label">Gender<span class="text-danger">*</span></label>
        <select required name="Gender" class="form-control select">
            <option>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="col-4 mb-4">
        <label for="dobExLarge" class="form-label">Country<span class="text-danger">*</span></label>
        <select class="form-select" id="country" name="country" aria-label="Default select example">
            <option selected>Open this select menu</option>

        </select>
    </div>
    <div class="col-4 mb-4" id="local_div">
        <label for="emailExLarge" class="form-label">IC no.<span class="text-danger">*</span></label>
        <input name="card" id="card" class="form-control" type="number">
    </div>
    <div class="col-4 mb-4" id="international_div">
        <label for="emailExLarge" class="form-label">Passport no.</label>
        <input name="passport" id="passport" class="form-control" type="text">
    </div>
    <div class="col-4 mb-4">
        <label for="formFile" class="form-label" id="card_file">Upload Ic Photo<span class="text-danger">*</span></label>
        <label for="formFile" class="form-label" id="passport_file">Upload Passport Photo<span class="text-danger">*</span></label>
        <input class="form-control" id="identity_image" name="identity_file" type="file" accept="application/pdf">
    </div>
    <div class="col-4 mb-4" id="permit_div2">
        <label for="formFile" class="form-label">Work Permit<span class="text-danger">*</span></label>
        <input class="form-control" id="permit_image" name="permit_file" type="file" accept="application/pdf">
    </div>
    <div class="col-4 mb-4" id="permit_from_div">
        <label for="nameExLarge" class="form-label">Permit From<span class="text-danger">*</span></label>
        <input name="permit_from" id="permit_from" class="form-control" type="date">
    </div>
    <div class="col-4 mb-4" id="permit_to_div">
        <label for="nameExLarge" class="form-label">Permit To<span class="text-danger">*</span></label>
        <input name="permit_to" id="permit_to" class="form-control" type="date">
    </div>


    <div class="col-md-4 mb-4">
        <label for="emailExLarge" class="form-label">Bank Branch<span class="text-danger">*</span></label>
        <input type="text" name="bank_branch" id="bank_branch" class="form-control" required />
    </div>
    <div class="col-md-4 mb-4">
        <label for="emailExLarge" class="form-label">EPF No<span class="text-danger">*</span></label>
        <input name="epf_no" required class="form-control" type="number">
    </div>
    <div class="col-md-4 mb-4">
        <label for="emailExLarge" class="form-label">SOCSO No<span class="text-danger">*</span></label>
        <input name="socso_no" required class="form-control" type="number">
    </div>
    <div class="col-md-4 mb-4">
        <label for="emailExLarge" class="form-label">LHDN No<span class="text-danger">*</span></label>
        <input name="lhdn_no" required class="form-control" type="text">
    </div>
    <div class="col-md-4 mb-4">
        <label for="emailExLarge" class="form-label">EIS No<span class="text-danger">*</span></label>
        <input name="eis" required class="form-control" type="number">
    </div>
    <div class="col-md-4 mb-4">
        <label for="emailExLarge" class="form-label">Marital Status<span class="text-danger">*</span></label>
        <select required name="marital" id="marital" class="form-control select">
            <option>Select Marital Status</option>
            <option value="1">Single</option>
            <option value="2">Married</option>
            <option value="3">Divorced</option>
            <option value="4">Widowed</option>
        </select>
    </div>
    <div class="col-md-4 mb-4" id="Spouse_div">
        <label for="emailExLarge" class="form-label">Spouse Name<span class="text-danger">*</span></label>
        <input name="spouse" id="spouse" class="form-control" type="text">
    </div>
    <div class="col-md-4 mb-4" id="Children_div">
        <label for="emailExLarge" class="form-label">No. of Dependant<span class="text-danger">*</span></label>
        <input name="children" id="children" class="form-control" type="text">
    </div>
</div>
<div class="row mb-4">
    <label for="emailExLarge" class="form-label"><b>Emergency Contact 1</b></label>
    <div class="col-md-4 mb-0">
        <label for="emailExLarge" class="form-label">Name<span class="text-danger">*</span></label>
        <input name="ec1_name" id="ec1_name" required class="form-control" type="text">
    </div>
    <div class="col-md-4 mb-0">
        <label for="emailExLarge" class="form-label">Relationship<span class="text-danger">*</span></label>
        <input name="ec1_relationship" id="ec1_relationship" required class="form-control" type="text">
    </div>
    <div class="col-md-4 mb-0">
        <label for="emailExLarge" class="form-label">Contact No<span class="text-danger">*</span></label>
        <input name="ec1_contact" id="ec1_contact" required class="form-control" type="number">
    </div>
</div>
<div class="row mb-4">
    <label for="emailExLarge" class="form-label"><b>Emergency Contact 2</b></label>
    <div class="col-md-4 mb-0">
        <label for="emailExLarge" class="form-label">Name<span class="text-danger">*</span></label>
        <input name="ec2_name" id="ec2_name" required class="form-control" type="text">
    </div>
    <div class="col-md-4 mb-0">
        <label for="emailExLarge" class="form-label">Relationship<span class="text-danger">*</span></label>
        <input name="ec2_relationship" id="ec2_relationship" required class="form-control" type="text">
    </div>
    <div class="col-md-4 mb-0">
        <label for="emailExLarge" class="form-label">Contact No<span class="text-danger">*</span></label>
        <input name="ec2_contact" id="ec2_contact" required class="form-control" type="number">
    </div>
</div>
<br>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="divider divider-dark">
            <div class="divider-text">
                <h5>Staff Details</h5>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4 mb-0">
        <label for="emailExLarge" class="form-label">Employee ID<span class="text-danger">*</span></label>
        <input name="emp_id" id="add_emp_id" required class="form-control" type="text" onchange="check_id()">
    </div>
    <div class="col-md-4 mb-0">
        <label for="emailExLarge" class="form-label">Company Email<span class="text-danger">*</span></label>
        <input name="com_email" required class="form-control" type="email">
    </div>
</div>


<div class="row">
    <div class="col-md-4 mb-4">
        <label for="emailExLarge" class="form-label">Date of Joining<span class="text-danger">*</span></label>
        <input name="join_date" id="join_date" required class="form-control" type="date">
    </div>
    <div class="col-md-4 mb-4">
        <label for="emailExLarge" class="form-label">User Level<span class="text-danger">*</span></label>
        <select required name="user_level" id="user_level" class="form-control select">
            <option>Select User Level</option>
            <option value="Admin">Admin</option>
            <option value="Master">Master Admin</option>
            <option value="User">Normal User</option>
        </select>
    </div>
</div> -->
