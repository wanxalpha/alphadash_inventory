<div id="add_expense" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Purchase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Purchased By</label>
                                    <select required name="purchase_name" id="purchase_name" class="form-control select">
                                        <option>Select Staff</option>
                                        <?php
                                        $staff = "SELECT * FROM employees WHERE f_delete='N'";
                                        $result_staff = mysqli_query($conn, $staff);
                                        $num_staff = mysqli_num_rows($result_staff);

                                        if ($num_staff > 0) {
                                            while ($row_staff = mysqli_fetch_array($result_staff)) {

                                                $staff_id = $row_staff['f_id'];
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Payment Type <span class="text-danger">*</span></label>
                                    <select required name="purchase_type" id="purchase_type" class="form-control select">
                                        <option>Select Purchase Type</option>
                                        <option value="1">Purchase Request</option>
                                        <option value="2">Petty Cash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Payment Method <span class="text-danger">*</span></label>
                                    <input type="text" id="purchase_paid" name="purchase_paid" class="form-control" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- <div class="form-group">
                                        <label>Purchase Date <span class="text-danger">*</span></label>
                                        <input type="text" id="purchase_date" name="purchase_date" class="form-control" placeholder="" value="" readonly>
                                    </div> -->
                            </div>

                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Purchase Date</th>
                                                <th>Purchase Item</th>
                                                <th>Purchase From</th>
                                                <th>Purchase Amount</th>
                                                <!-- <th class="text-right">Add Purchase</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="purchase_data">
                                            <tr>
                                                <td><button type="button" name="add_purchase_row" id="add_purchase_row" value="' + i + '" onclick="add_purchase()" style="border:none;"><i class="fa fa-plus-circle" style="color:green; text-align:center"></i></button></td>
                                                <td><input type="date" id="purchase_date1" name="purchase_date1" class="form-control" placeholder="" value=""></td>
                                                <td><input type="text" id="purchase_item1" name="purchase_item1" class="form-control" placeholder="" value=""></td>
                                                <td><input type="text" id="purchase_from1" name="purchase_from1" class="form-control" placeholder="" value=""></td>
                                                <td><input type="text" id="purchase_amt1" name="purchase_amt1" class="form-control amount" placeholder="Total Amount" value=""></td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="text" id="emp_id" name="emp_id" class="form-control" value="" hidden> -->
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" onclick="submit_purchase()">Submit</button>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<script>
    function add_purchase() {
        var rowCount = $('#purchase_data tr').length;
        var i = rowCount + 1;

        var html = '';
        html += '<tr id="row' + i + '">';
        html += '<td><button type="button" name="remove_purchase_row" id="remove_purchase_row" value="' + i + '" onclick="remove_purchase(this)" style="border:none;"><i class="fa fa-minus-circle" style="color:red; text-align:center"></i></button></td>';
        html += '<td><input type="date" id="purchase_date' + i + '" name="purchase_date' + i + '" class="form-control" placeholder="" value=""></td>';
        html += '<td><input type="text" id="purchase_item' + i + '" name="purchase_item' + i + '" class="form-control" placeholder="" value=""></td>';
        html += '<td><input type="text" id="purchase_from' + i + '" name="purchase_from' + i + '" class="form-control" placeholder="" value=""></td>';
        html += '<td><input type="text" id="purchase_amt' + i + '" name="purchase_amt' + i + '" class="form-control amount" placeholder="Total Amount" value=""></td>';
        html += '</tr>';

        $('#purchase_data').append(html);

    }

    function remove_purchase(objButton) {
        console.log(objButton.value);
        $('#row' + objButton.value + '').remove();
    }

    function submit_purchase() {

        var rowCount = $('#purchase_data tr').length;
        console.log(rowCount);

        var emp_id = $('#purchase_name').val();
        var purchase_type = $('#purchase_type').val();
        var purchase_paid = $('#purchase_paid').val();

        var total = 0;

        $('.amount').each(function() {
            var num = $(this).val();

            if (num != 0) {
                total += parseFloat(num);
            }
        });

        console.log(total);

        if (purchase_type == 2 && total > 500) {
            alert("Please Choose Purchase Request From Type");
        } else if (purchase_type == 1 && total <= 500) {
            alert("Please Choose Petty Cash From Type");
        } else {
            for (let i = 1; i <= rowCount; i++) {

                var purchase_date = $('#purchase_date' + i).val();
                var purchase_item = $('#purchase_item' + i).val();
                var purchase_from = $('#purchase_from' + i).val();
                var purchase_amt = $('#purchase_amt' + i).val();

                console.log(purchase_date);
                console.log(purchase_item);
                console.log(purchase_from);
                console.log(purchase_amt);

                if (purchase_item == "" || purchase_item == undefined) {
                    console.log("no entry")
                } else {

                    var url = "../controller/ajax/add_function/add_purchase.php";

                    $.get(url, {
                            rowCount: rowCount,
                            emp_id: emp_id,
                            purchase_paid: purchase_paid,
                            purchase_date: purchase_date,
                            purchase_item: purchase_item,
                            purchase_from: purchase_from,
                            purchase_amt: purchase_amt
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
                                    window.location = "purchase.php";
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
    }
</script>