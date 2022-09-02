<div id="edit_claim" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Claims</h5>
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
                                        <input type="text" id="edit_claim_name" name="edit_claim_name" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <input type="text" id="edit_dep" name="edit_dep" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Designation <span class="text-danger">*</span></label>
                                        <input type="text" id="edit_desc" name="edit_desc" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Month Of Claim</label>
                                        <input type="text" id="edit_month" name="edit_month" class="form-control" placeholder="" value="" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped custom-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type Of claims</th>
                                                    <th>Amount</th>
                                                    <th>Remarks</th>
                                                    <!-- <th class="text-right">Add Claims</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="dynamic_field">
                                                <tr>
                                                    <td><input type="date" id="edit_claim_date" name="edit_claim_date" class="form-control" placeholder="" value="" readonly></td>
                                                    <td>
                                                        <select required name="edit_claim_type" id="edit_claim_type" class="form-control select">
                                                            <option>Select Claim Type</option>
                                                            <option value="1">Parking Fees</option>
                                                            <option value="2">Toll Fees</option>
                                                            <option value="3">Entertainment</option>
                                                            <option value="4">Public Transport</option>
                                                            <option value="5">Medical</option>
                                                            <option value="6">Others</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" id="edit_claim_amt" name="edit_claim_amt" class="form-control" placeholder="Total Amount" value=""></td>
                                                    <td><input type="text" id="edit_remark" name="edit_remark" class="form-control" placeholder="Please Specify Purpose" value=""></td>
                                                    <!-- <td><button type="button" name="add_claim_row" id="add_claim_row" class="btn btn-success" onclick="add_claims()">Add More</button></td> -->
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <input type="text" id="claim_id" name="claim_id" class="form-control" value="" hidden>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" onclick="update_claims()">Submit</button>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<script>
    function update_claims(){
        claim_id = $('#claim_id').val();
        claim_amt = $('#edit_claim_amt').val();
        claim_remark = $('#edit_remark').val();

        if(claim_id != ""){
            var url = '../controller/ajax/edit_function/edit_claims.php';
        }
        $.get(url, {
            claim_id: claim_id,
            claim_amt: claim_amt,
            claim_remark: claim_remark
        })
        .done(function(data) {
            if (data) {

                var len = JSON.parse(data);
                console.log(len);
                var success = len.success;

                if(success == '1'){
                    // alert("Yes");
                    window.location.href = 'http://localhost/D-board/claims/medical.php';
                }else{
                    alert("No");
                }
                // if(len.success =)
                // $('#claim_date').val(len);

            } else {
                console.log('no data');
            }
        })
    }
</script>