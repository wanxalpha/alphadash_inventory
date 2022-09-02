<div id="medical_claim" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Claims</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <select required name="full_name" id="full_name" class="form-control select" onchange="check_dep()">
                                            <option>Select Staff</option>
                                            <?php
                                            $staff = "SELECT * FROM employees WHERE f_delete='N'";
                                            $result_staff = mysqli_query($conn, $staff);
                                            $num_staff = mysqli_num_rows($result_staff);

                                            if ($num_staff > 0) {
                                                while ($row_staff = mysqli_fetch_array($result_staff)) {

                                                    $staff_id = $row_staff['f_emp_id'];
                                                    $staff_name = $row_staff['f_full_name'];

                                                    echo '
                                                    <option value="' . $staff_id . '">' . $staff_name . '</option>
                                                    
                                                    ';
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <input type="text" id="department" name="department" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Designation <span class="text-danger">*</span></label>
                                        <input type="text" id="designation" name="designation" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Month Of Claim</label>
                                        <input type="text" id="claim_month" name="claim_month" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Date</th>
                                                    <th>Type Of claims</th>
                                                    <th>Amount</th>
                                                    <th>Remarks</th>
                                                    <!-- <th class="text-right">Add Claims</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="dynamic_field">
                                                <tr>
                                                    <td><button type="button" name="add_claim_row" id="add_claim_row" value="' + i + '" onclick="add_claims()" style="border:none;"><i class="fa fa-plus-circle" style="color:green; text-align:center"></i></button></td>
                                                    <td><input type="date" id="claim_date1" name="claim_date1" class="form-control" placeholder="" value=""></td>
                                                    <td>
                                                        <select required name="claim_type1" id="claim_type1" class="form-control select">
                                                            <option>Select Claim Type</option>
                                                            <option value="1">Parking Fees</option>
                                                            <option value="2">Toll Fees</option>
                                                            <option value="3">Entertainment</option>
                                                            <option value="4">Public Transport</option>
                                                            <option value="5">Medical</option>
                                                            <option value="6">Others</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" id="claim_amt1" name="claim_amt1" class="form-control" placeholder="Total Amount" value=""></td>
                                                    <td><input type="text" id="claim_remarks1" name="claim_remarks1" class="form-control" placeholder="Please Specify Purpose" value=""></td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="text" id="emp_id" name="emp_id" class="form-control" value="" hidden> -->
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" onclick="submit_claims()">Submit</button>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<script>
    function check_dep() {
        var emp_id = $('#full_name').val();

        if (emp_id != "") {
            var url = "../controller/ajax/check_emp/check_post2.php";
        }

        $.get(url, {
                emp_id: emp_id
            })
            .done(function(data) {
                if (data) {
                    console.log(data);

                    var len = JSON.parse(data);
                    var dep_name = len.dep_name;
                    console.log(dep_name);
                    if (dep_name != "" || dep_name != NULL) {
                        var post_name = len.post_name;
                        $('#department').val(dep_name);
                        $('#designation').val(post_name);

                        const month_name = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                        const date = new Date();
                        let date_no = date.getDate();

                        if (date_no > 15) {
                            let month = month_name[date.getMonth()];
                            $('#claim_month').val(month);
                        } else {
                            let month = month_name[date.getMonth() - 1];
                            $('#claim_month').val(month);
                        }

                    } else {
                        alert("failed");
                    }

                } else {
                    console.log('no data');
                }
            })
    }
</script>
<script>
    function add_claims() {
        var rowCount = $('#dynamic_field tr').length;
        console.log(rowCount + " row count");
        var i = rowCount;
        console.log(i + "added row count");

        var html = '';
        html += '<tr id="row' + i + '">';
        html += '<td><button type="button" name="remove_claim_row" id="remove_claim_row" value="' + i + '" onclick="remove_claims(this)" style="border:none;"><i class="fa fa-minus-circle" style="color:red; text-align:center"></i></button></td>';
        html += '<td><input type="date" id="claim_date' + i + '" name="claim_date' + i + '" class="form-control claim_date" placeholder="" value=""></td>';
        html += '<td><select required name="claim_type" id="claim_type' + i + '" class="form-control select claim_type"><option>Select Claim Type</option><option value="1">Parking Fees</option><option value="2">Toll Fees</option><option value="3">Entertainment</option><option value="4">Public Transport</option><option value="5">Medical</option><option value="6">Others</option></select></td>';

        html += '<td><input type="text" id="claim_amt' + i + '" name="claim_amt' + i + '" class="form-control claim_amt" placeholder="Total Amount" value=""></td>';
        html += '<td><input type="text" id="claim_remarks' + i + '" name="claim_remarks' + i + '" class="form-control claim_remarks" placeholder="Please Specify Purpose" value=""></td>';
        html += '</tr>';

        $('#dynamic_field').append(html);

    }

    // function amt_validate(objcount) {
    //     var rowCount = $('#dynamic_field tr').length;
    // } waiting for idea!!!

    function remove_claims(objButton) {
        console.log(objButton.value);
        $('#row' + objButton.value + '').remove();
    }

    function submit_claims() {

        var rowCount = $('#dynamic_field tr').length;
        console.log(rowCount);

        var emp_id = $('#full_name').val();
        var claim_month = $('#claim_month').val();

        for (let i = 1; i <= rowCount; i++) {

            var claim_date = $('#claim_date' + i).val();
            var claim_type = $('#claim_type' + i).val();
            var claim_amt = $('#claim_amt' + i).val();
            var claim_remarks = $('#claim_remarks' + i).val();

            console.log(claim_date);
            console.log(claim_type);
            console.log(claim_amt);
            console.log(claim_remarks);

            if(claim_type == "" || claim_type == undefined){
                console.log("no entry");
            }else{
                var url = "../controller/ajax/add_function/add_claims.php";

                $.get(url, {
                    rowCount: rowCount,
                    emp_id: emp_id,
                    claim_month: claim_month,
                    claim_date: claim_date,
                    claim_type: claim_type,
                    claim_amt: claim_amt,
                    claim_remarks: claim_remarks
                })
                .done(function(data) {
                    if (data) {
                        console.log(data);

                        var len = JSON.parse(data);
                        var status = len.success;
                        console.log(status);
                        if (status == 1) {
                            var emp_id = len.emp_id;
                            console.log(emp_id);
                            window.location.href = "claim.php";
                            // window.location = "../employee/profile.php?emp_id=" + emp_id;
                            // alert("Success");

                        } else {
                            console.log("failed");
                        }

                    } else {
                        console.log('no data');
                    }
                })
            }
        }
                 
    }
</script>