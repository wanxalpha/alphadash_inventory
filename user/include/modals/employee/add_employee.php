<div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel4">Add Employee Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="divider divider-primary">
                            <div class="divider-text">
                                <h5>Personal Details</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <img id="previewImg" src="blank_profile.png" alt="Placeholder" style="height:200px; width:200px; text-align:right; margin-left:72%; z-index:1000; position:absolute;">
                <form method="POST" enctype="multipart/form-data" id="add_emp_form">
                    <div class="row mb-4">
                        <div class="col-4 mb-0">
                            <label for="nameExLarge" class="form-label">Full Name (As Per IC)</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter Name" required />
                        </div>
                        <div class="col-4 mb-0">
                            <label for="formFile" class="form-label">Upload Profile Photo</label>
                            <input class="form-control" required id="picture_image" name="picture_image" type="file" onchange="loadFile(event)" />
                        </div>
                        <div class="col-4 mb-0"></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4 mb-0">
                            <label for="nameExLarge" class="form-label">Birthday</label>
                            <input name="Birthday" id="birthday" required class="form-control" type="date">
                        </div>
                        <div class="col-4 mb-0">
                            <label for="formFile" class="form-label">Upload Resume</label>
                            <input class="form-control" required id="resume_file" name="resume_file" type="file" accept="application/pdf" />
                        </div>
                        <div class="col-4 mb-0"></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-4 mb-0">
                            <label for="dobExLarge" class="form-label">Mobile No</label>
                            <div class="input-group">
                                <span class="input-group-text">+60</span>
                                <input name="phone" id="phone" required class="form-control" type="number" maxlength="12">
                            </div>
                        </div>
                        <div class="col-8">
                            <label for="dobExLarge" class="form-label">Permanent Address</label>
                            <input name="per_address" id="per_address" required class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col mb-0">
                            <label for="dobExLarge" class="form-label">House No</label>
                            <div class="input-group">
                                <span class="input-group-text">+60</span>
                                <input name="phone" id="home_tel" required class="form-control" type="number" maxlength="12">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="dobExLarge" class="form-label">Correspondence Address</label>
                            <div class="input-group">
                                <input name="cor_address" id="cor_address" required class="form-control" type="text">
                                <input type="button" class="input-group-text" id="same_address" value="Same As Permanent Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-4">
                            <label for="emailExLarge" class="form-label">Race</label>
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
                            <label for="emailExLarge" class="form-label">Religion</label>
                            <select required name="religion" id="religion" class="form-control select">
                                <option>Select Religion</option>
                                <option value="Atheist">Atheist</option>
                                <option value="Buddhist">Buddhist</option>
                                <option value="Christian">Christian</option>
                                <option value="Hinduism">Hinduism</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Sikh">Sikh</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-4 mb-4" id="religion_div">
                            <label for="emailExLarge" class="form-label">Please Specify</label>
                            <input name="religion2" id="religion2" class="form-control" type="text" placeholder="please specify your religion">
                        </div>
                        <div class="col-4 mb-4">
                            <label for="emailExLarge" class="form-label">Email</label>
                            <input name="email" required class="form-control" type="email" placeholder="xxxx@xx.xx">
                        </div>
                        <div class="col-4 mb-4">
                            <label for="emailExLarge" class="form-label">Gender</label>
                            <select required name="Gender" class="form-control select">
                                <option>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-4 mb-4">
                            <label for="dobExLarge" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country" aria-label="Default select example">
                                <option selected>Open this select menu</option>

                            </select>
                        </div>
                        <div class="col-4 mb-4" id="local_div">
                            <label for="emailExLarge" class="form-label">IC no.</label>
                            <input name="card" id="card" class="form-control" type="number">
                        </div>
                        <div class="col-4 mb-4" id="international_div">
                            <label for="emailExLarge" class="form-label">Passport no.</label>
                            <input name="passport" id="passport" class="form-control" type="text">
                        </div>
                        <div class="col-4 mb-4">
                            <label for="formFile" class="form-label" id="card_file">Upload Ic Photo</label>
                            <label for="formFile" class="form-label" id="passport_file">Upload Passport Photo</label>
                            <input class="form-control" id="identity_image" name="identity_file" type="file" accept="application/pdf">
                        </div>
                        <div class="col-4 mb-4" id="permit_div2">
                            <label for="formFile" class="form-label">Work Permit</label>
                            <input class="form-control" id="permit_image" name="permit_file" type="file" accept="application/pdf">
                        </div>
                        <div class="col-4 mb-4" id="permit_from_div">
                            <label for="nameExLarge" class="form-label">Permit From</label>
                            <input name="permit_from" id="permit_from" class="form-control" type="date">
                        </div>
                        <div class="col-4 mb-4" id="permit_to_div">
                            <label for="nameExLarge" class="form-label">Permit To</label>
                            <input name="permit_to" id="permit_to" class="form-control" type="date">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">Bank Account</label>
                            <input name="bank_acc" id="bank_acc" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">Bank Name</label>
                            <select required name="bank" id="bank" class="form-control select" required>
                                <option>Select Bank</option>
                                <!-- <option value="Male">Male</option>
                            <option value="Female">Female</option> -->
                                <?php
                                $bank = "SELECT * FROM bank WHERE f_delete='N'";
                                $result_bank = mysqli_query($conn, $bank);
                                $num_bank = mysqli_num_rows($result_bank);

                                if ($num_bank > 0) {
                                    while ($row_bank = mysqli_fetch_array($result_bank)) {

                                        $bank_id = $row_bank['f_id'];
                                        $bank_name = $row_bank['f_bank_name'];

                                        echo '
                                    <option value="' . $bank_id . '">' . $bank_name . '</option>
                                    
                                    ';
                                    }
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">Bank Branch</label>
                            <input type="text" name="bank_branch" id="bank_branch" class="form-control" required />
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">EPF No</label>
                            <input name="epf_no" required class="form-control" type="number">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">SOCSO No</label>
                            <input name="socso_no" required class="form-control" type="number">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">LHDN No</label>
                            <input name="lhdn_no" required class="form-control" type="text">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">EIS No</label>
                            <input name="eis" required class="form-control" type="number">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">Marital Status</label>
                            <select required name="marital" id="marital" class="form-control select">
                                <option>Select Marital Status</option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                                <option value="3">Divorced</option>
                                <option value="4">Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-4" id="Spouse_div">
                            <label for="emailExLarge" class="form-label">Spouse Name</label>
                            <input name="spouse" id="spouse" class="form-control" type="text">
                        </div>
                        <div class="col-md-4 mb-4" id="Children_div">
                            <label for="emailExLarge" class="form-label">No. of Dependant</label>
                            <input name="children" id="children" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="emailExLarge" class="form-label"><b>Emergency Contact 1</b></label>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Name</label>
                            <input name="ec1_name" id="ec1_name" required class="form-control" type="text">
                        </div>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Relationship</label>
                            <input name="ec1_relationship" id="ec1_relationship" required class="form-control" type="text">
                        </div>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Contact No</label>
                            <input name="ec1_contact" id="ec1_contact" required class="form-control" type="number">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="emailExLarge" class="form-label"><b>Emergency Contact 2</b></label>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Name</label>
                            <input name="ec2_name" id="ec2_name" required class="form-control" type="text">
                        </div>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Relationship</label>
                            <input name="ec2_relationship" id="ec2_relationship" required class="form-control" type="text">
                        </div>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Contact No</label>
                            <input name="ec2_contact" id="ec2_contact" required class="form-control" type="number">
                        </div>
                    </div><br>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="divider divider-warning">
                                <div class="divider-text">
                                    <h5>Education & Working Experience</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-4">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Company Names</th>
                                        <th>Position</th>
                                        <th>Years of Experience</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="company_table">
                                    <tr>
                                        <td style="width: 10%;">
                                            <button type="button" value="' + i + '" onclick="add_company()" class="btn btn-icon btn-primary">
                                                <span class="tf-icons bx bx-plus"></span>
                                            </button>
                                        </td>
                                        <td><input type="text" id="company_name1" name="company_name1" class="form-control" placeholder="" value=""></td>
                                        <td><input type="text" id="position1" name="position1" class="form-control" placeholder="" value=""></td>
                                        <td><input type="text" id="year_exp1" name="year_exp1" class="form-control" placeholder="" value=""></td>
                                        <td><input type="text" id="old_salary1" name="old_salary1" class="form-control" placeholder="Total Amount" value=""></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Study Type</th>
                                        <th>School/University/Professional Name</th>
                                        <th>Field of Study</th>
                                        <th>Year of Graduate</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="education_table">
                                    <tr>
                                        <td style="width: 10%;">
                                            <button type="button" value="' + i + '" onclick="add_education()" class="btn btn-icon btn-primary">
                                                <span class="tf-icons bx bx-plus"></span>
                                            </button>
                                        </td>
                                        <td>
                                            <select required name="study_type1" id="study_type1" class="form-control select">
                                                <option>Select Study Type</option>
                                                <option value="1">High School</option>
                                                <option value="2">Professional</option>
                                                <option value="3">University</option>
                                            </select>
                                        </td>
                                        <td><input type="text" id="school_name1" name="school_name1" class="form-control" placeholder="" value=""></td>
                                        <td><input type="text" id="course1" name="course1" class="form-control" placeholder="" value=""></td>
                                        <td><input type="text" id="grauduate1" name="grauduate1" class="form-control" placeholder="" value=""></td>
                                        <td><input type="text" id="result1" name="result1" class="form-control" placeholder="" value=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Skillset</th>
                                        <th>Year of Experience</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="skill_table">
                                    <tr>
                                        <td style="width: 10%;">
                                            <button type="button" value="' + i + '" onclick="add_skill()" class="btn btn-icon btn-primary">
                                                <span class="tf-icons bx bx-plus"></span>
                                            </button>
                                        </td>
                                        <td><input type="text" id="skill_type1" name="skill_type1" class="form-control" placeholder="" value=""></td>
                                        <td><input type="text" id="skill_exp1" name="skill_exp1" class="form-control" placeholder="" value=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="divider divider-dark">
                                <div class="divider-text">
                                    <h5>Company Details</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Employee ID</label>
                            <input name="emp_id" id="add_emp_id" required class="form-control" type="text">
                        </div>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Company Email</label>
                            <input name="com_email" required class="form-control" type="email">
                        </div>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Salary</label>
                            <input name="salary" required class="form-control" type="number">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Mobile Allowance</label>
                            <input name="mobile_all" id="mobile_all" required class="form-control" type="number">
                        </div>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Parking Allowance</label>
                            <input name="park_all" id="park_all" required class="form-control" type="number">
                        </div>
                        <div class="col-md-4 mb-0">
                            <label for="emailExLarge" class="form-label">Employment Status</label>
                            <select class="form-select" id="emp_status" name="emp_status" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Permanent</option>
                                <option value="2">Contract</option>
                                <option value="3">Internship</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">Department</label>
                            <select required name="department" id="department" class="form-control select">
                                <option>Select Department</option>
                                <?php
                                $sql2 = "SELECT * from departments";
                                $query2 = $dbh->prepare($sql2);
                                $query2->execute();
                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                foreach ($result2 as $row) {
                                ?>
                                    <option value="<?php echo htmlentities($row->f_id); ?>">
                                        <?php echo htmlentities($row->f_department); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">Designation</label>
                            <select required name="designation" id="designation" class="form-control select"></select>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">Password</label>
                            <input name="password" id="password" required class="form-control" type="text">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="emailExLarge" class="form-label">Date of Joining</label>
                            <input name="join_date" id="join_date" required class="form-control" type="date">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary submit-btn" onclick="check_background()">Save</button>
                <button type="submit" name="add_employee" id="add_emp_form" class="btn btn-primary submit-btn" style="display:none;">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    function add_company() {
        var rowCount = $('#company_table tr').length;
        // console.log(rowCount + " row count");
        var i = rowCount + 1;
        // console.log(i + " added row count");

        if (i <= 3) {
            var html = '';
            html += '<tr id="company_row' + i + '">';
            html += '<td style="width: 10%;"><button type="button" value="' + i + '" onclick="remove_company(this)" class="btn btn-icon btn-danger"><span class="tf-icons bx bx-minus"></span></button></td>';
            html += '';
            html += '<td><input type="text" id="company_name' + i + '" name="company_name' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="position' + i + '" name="position' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="year_exp' + i + '" name="year_exp' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="old_salary' + i + '" name="old_salary' + i + '" class="form-control" placeholder="Total Amount" value=""></td>';
            html += '</tr>';

            $('#company_table').append(html);
        } else {
            alert("Maximum 3 company needed only");
        }
    }

    function remove_company(objButton) {
        console.log(objButton.value);
        $('#company_row' + objButton.value + '').remove();
    }

    function add_education() {
        var rowCount = $('#education_table tr').length;
        // console.log(rowCount + " row count");
        var i = rowCount + 1;
        // console.log(i + " added row count");

        if (i <= 3) {
            var html = '';
            html += '<tr id="education_row' + i + '">';
            html += '<td style="width: 10%;"><button type="button" value="' + i + '" onclick="remove_education(this)" class="btn btn-icon btn-danger"><span class="tf-icons bx bx-minus"></span></button></td>';
            html += '<td><select required name="study_type' + i + '" id="study_type' + i + '" class="form-control select"><option>Select Study Type</option><option value="1">High School</option><option value="2">Professional</option><option value="3">University</option></select></td>';
            html += '<td><input type="text" id="school_name' + i + '" name="school_name' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="course' + i + '" name="course' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="grauduate' + i + '" name="grauduate' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="result' + i + '" name="result' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '</tr>';

            $('#education_table').append(html);
        }
    }

    function remove_education(objButton) {
        console.log(objButton.value);
        $('#education_row' + objButton.value + '').remove();
    }

    function add_skill() {
        var rowCount = $('#skill_table tr').length;
        // console.log(rowCount + " row count");
        var i = rowCount + 1;
        // console.log(i + " added row count");

        if (i <= 5) {
            var html = '';
            html += '<tr id="skill_row' + i + '">';
            html += '<td style="width: 10%;"><button type="button" value="' + i + '" onclick="remove_skill(this)" class="btn btn-icon btn-danger"><span class="tf-icons bx bx-minus"></span></button></td>';
            html += '<td><input type="text" id="skill_type' + i + '" name="skill_type' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '<td><input type="text" id="skill_exp' + i + '" name="skill_exp' + i + '" class="form-control" placeholder="" value=""></td>';
            html += '</tr>';

            $('#skill_table').append(html);
        }
    }

    function remove_skill(objButton) {
        console.log(objButton.value);
        $('#skill_row' + objButton.value + '').remove();
    }

    function check_background() {

        var emp_id = $('#add_emp_id').val();

        var url = "../controller/ajax/employee/check_edu.php";

        $.get(url, {
            emp_id: emp_id,
        })
        .done(function(data) {
            if (data) {
                console.log(data);

                var len = JSON.parse(data);
                var status = len.success;

                if (status == 1) {

                    var num_rows = len.num_rows;

                    if (num_rows == 0) {
                        insert_company();
                    } else if (num_rows > 0) {
                        update_company();
                    }
                }
            }
        })
    }

    function insert_company() {

        var emp_id = $('#add_emp_id').val();
        var i = "1";
        var company_name = $('#company_name' + i).val();
        var position = $('#position' + i).val();
        var year_exp = $('#year_exp' + i).val();
        var old_salary = $('#old_salary' + i).val();

        var url = "../controller/ajax/employee/insert_company.php";

        $.get(url, {
            emp_id: emp_id,
            i: i,
            company_name: company_name,
            position: position,
            year_exp: year_exp,
            old_salary: old_salary
        })
        .done(function(data) {
            if (data) {
                console.log(data);

                var len = JSON.parse(data);
                var status = len.success;

                if (status == 1) {
                    console.log("add company success");

                    var company = $('#company_table tr').length;

                    if (company > 1) {
                        check_background();
                    } else if (company == 1) {
                        update_education();
                    }

                } else {
                    alert("failed");
                }
            }
        })
    }

    function update_company() {

        var emp_id = $('#add_emp_id').val();
        var company = $('#company_table tr').length;

        for (let i = 2; i <= company; i++) {

            var company_name = $('#company_name' + i).val();
            var position = $('#position' + i).val();
            var year_exp = $('#year_exp' + i).val();
            var old_salary = $('#old_salary' + i).val();

            var url = '../controller/ajax/employee/update_company.php';

            $.get(url, {
                emp_id: emp_id,
                i: i,
                company_name: company_name,
                position: position,
                year_exp: year_exp,
                old_salary: old_salary
            })
            .done(function(data) {
                if (data) {
                    console.log(data);

                    var len = JSON.parse(data);
                    var status = len.success;

                    if (status == 1) {
                        var num = len.i;
                        console.log("update company" + num + " success");
                        // check_background();

                        if (num == company) {
                            update_education();
                        }
                    } else {
                        alert("failed");
                    }
                }
            })
        }
    }

    function update_education() {

        var emp_id = $('#add_emp_id').val();
        var education = $('#education_table tr').length;

        for (let i = 1; i <= education; i++) {

            var study_type = $('#study_type' + i).val();
            var school_name = $('#school_name' + i).val();
            var course = $('#course' + i).val();
            var graduate = $('#grauduate' + i).val();
            var result = $('#result' + i).val();

            var url = "../controller/ajax/employee/update_education.php";

            $.get(url, {
                emp_id: emp_id,
                i: i,
                study_type: study_type,
                school_name: school_name,
                course: course,
                graduate: graduate,
                result: result
            })
            .done(function(data) {
                if (data) {

                    var len = JSON.parse(data);
                    var status = len.success;
                    console.log(status);
                    if (status == 1) {
                        var num = len.i;
                        console.log("update education" + num + " success");

                        if (num == education) {
                            update_skill();
                        }
                    }
                }
            })
        }
    }

    function update_skill() {

        var emp_id = $('#add_emp_id').val();
        var skill = $('#skill_table tr').length;

        for (let i = 1; i <= skill; i++) {

            var skill_type = $('#skill_type' + i).val();
            var skill_exp = $('#skill_exp' + i).val();

            var url = "../controller/ajax/employee/update_skill.php";

            $.get(url, {
                emp_id: emp_id,
                i: i,
                skill_type: skill_type,
                skill_exp: skill_exp
            })
            .done(function(data) {
                if (data) {

                    var len = JSON.parse(data);
                    var status = len.success;
                    console.log(status);
                    if (status == 1) {
                        var num = len.i;
                        console.log("update skill" + num + " success");

                        if (num == skill) {
                            console.log("complete all");
                            // $("#add_emp_table").submit();
                            // $('#add_emp_form').click();
                            insert_employee();
                        }
                    }
                }
            })
        }
    }

    function insert_employee() {

        let myForm = document.getElementById('add_emp_form');
        let formData = new FormData(myForm);

        $.ajax({
            url: '../controller/ajax/add_function/add_employee.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response != 0) {
                    alert('file uploaded');
                } else {
                    alert('file not uploaded');
                }
            },
        });
    }
</script>
<script>
    $(document).ready(function() {
        // $("#birth_error").hide();

        $("#birthday").change(function() {
            var birthdate = new Date($(this).val());
            var today = new Date();

            var day1 = birthdate.getDate();
            var month1 = birthdate.getMonth() + 1;
            var year1 = birthdate.getFullYear();

            var date1 = [day1, month1, year1].join('/');
            console.log(date1);

            var day2 = today.getDate();
            var month2 = today.getMonth() + 1;
            var year2 = today.getFullYear();

            var date2 = [day2, month2, year2].join('/');
            console.log(date2);

            var diff_year = year2 - 18;
            console.log(diff_year);

            var year_set = [day2, month2, diff_year].join('/');

            if (year1 >= diff_year) {
                // $("#birth_error").show();
                // $("#birth_error").text("Your Age is Not Applicable To Work");
                alert("Your Age is Not Applicable To Work");
                $('#birthday').css('border-color', 'red');
            } else {
                $('#birthday').css('border-color', '');
            }
        })
    });

    $(document).ready(function() {

        console.log("ready!");
        $("#Spouse_div").hide();
        $("#Children_div").hide();

        $('#marital').change(function() {
            var marital = $(this).val();
            console.log(marital);
            if (marital == '2') {
                $("#Spouse_div").show();
                $("#Children_div").show();
            } else if (marital == '3' || marital == '4') {
                $("#Spouse_div").hide();
                $("#Children_div").show();
            } else {
                $("#Spouse_div").hide();
                $("#Children_div").hide();
            }
        });

        $('#same_address').on('click', function() {
            var per_add = $('#per_address').val();
            console.log(per_add);

            if (per_add != "") {
                $('#cor_address').val(per_add);
            }
        });

    });

    $(document).ready(function() {
        var select = document.getElementById("country");

        var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");

        //console.log(countries);
        //console.log(select);

        for (var i = 0; i < countries.length; i++) {


            var option = document.createElement("option");
            var txt = document.createTextNode(countries[i]);
            option.appendChild(txt);
            option.setAttribute("value", countries[i]);
            select.insertBefore(option, select.lastChild);

        }
    })

    $(document).ready(function() {
        $("#country option[value='Malaysia']").attr('selected', 'selected');
        $("#international_div").hide();
        $("#permit_from_div").hide();
        $("#permit_to_div").hide();
        $("#permit_div2").hide();
        $("#permit").val("Malaysia");
        $("#empty_div").show();
        $("#permit_image_two").val("0");
        $("#passport_file").hide();

        $("#passport").prop('required', false);
        $("#permit_from").prop('required', false);
        $("#permit_to").prop('required', false);
        $("#card").prop('required', true);

        $('#country').change(function() {
            var national = $(this).val();
            console.log(national);
            if (national != 'Malaysia') {
                $("#permit_from_div").show();
                $("#permit_to_div").show();
                $("#permit_div2").show();
                $("#international_div").show();
                $("#local_div").hide();
                $("#empty_div").hide();
                // $("#country").val("");
                $("permit_image").prop('required', true);
                $("#permit_image_two").val("");
                $("#passport_file").show();
                $("#card_file").hide();

                $("#passport").prop('required', true);
                $("#permit_from").prop('required', true);
                $("#permit_to").prop('required', true);
                $("#card").prop('required', false);
            } else {
                $("#permit_from_div").hide();
                $("#permit_to_div").hide();
                $("#permit_div2").hide();
                $("#local_div").show();
                $("#international_div").hide();
                $("#permit").val("Malaysia");
                $("#empty_div").show();
                $("#permit_image").prop('required', false);
                $("#permit_image_two").val("0");
                $("#passport_file").hide();
                $("#card_file").show();

                $("#passport").prop('required', false);
                $("#permit_from").prop('required', false);
                $("#permit_to").prop('required', false);
                $("#card").prop('required', true);
            }
        });
    });

    $(document).ready(function() {
        $("#race_div").hide();

        $('#race').change(function() {
            var race = $(this).val();
            console.log(race);
            if (race == 'Others') {
                $("#race_div").show();
            } else {
                $("#race_div").hide();
            }
        });
    });

    $(document).ready(function() {
        $("#religion_div").hide();

        $('#religion').change(function() {
            var religion = $(this).val();
            console.log(religion);
            if (religion == 'Others') {
                $("#religion_div").show();
            } else {
                $("#religion_div").hide();
            }
        });
    });

    $(document).ready(function() {

        $('#card').change(function() {
            var card = $(this).val();
            console.log(card);
            if (card != '') {
                $("#passport").val('0');
            }
        });
    });

    $(document).ready(function() {

        $('#passport').change(function() {
            var passport = $(this).val();
            console.log(passport);
            if (passport != '') {
                $("#card").val('0');
            }
        });
    });
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('previewImg');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<script>
    $(document).ready(function() {
        $("#department").change(function() {
            // department = $('#department').val();
            var department = $(this).val();

            console.log(department);
            if (department != "") {

                var url = "../controller/ajax/check_emp/sel_post.php";

                $.get(url, {
                        department: department
                    })
                    .done(function(data) {
                        if (data) {
                            console.log(data);
                            $("#designation").empty();
                            var len = JSON.parse(data);
                            for (var i = 0; i < len.length; i++) {
                                var id = len[i]['id'];
                                var post = len[i]['name'];

                                $("#designation").append("<option value='" + id + "'>" + post + "</option>");
                            }

                        } else {
                            console.log('no data');
                        }
                    })
            }
        })
    });
</script>