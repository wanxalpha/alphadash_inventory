<div id="medical_claim" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Claims</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <form> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Full Name</label>

                                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="" value="<?php echo $emp_name?>" readonly>
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
                                <input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="" value="<?php echo $emp_id?>" readonly hidden>
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
                                                    <td>
                                                        <button type="button" name="add_claim_row" id="add_claim_row" value="' + i + '" onclick="add_claims()" class="btn btn-icon btn-primary">
                                                            <span class="tf-icons bx bx-plus"></span>
                                                        </button>
                                                    </td>
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
                var url = "../controller/ajax/check_claim/insert_claim.php";

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
                            window.location = "../employee/claims.php";
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