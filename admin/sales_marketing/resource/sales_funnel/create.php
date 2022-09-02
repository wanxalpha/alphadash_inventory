<?php

include_once('../../controller/sales_funnel.php');

$sales_person = getSalesPerson();
$project_pillar = getPillar();




?>
<?php include_once("../../layouts/menu.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Sales Funnel</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Add Sales Funnel</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/sales_funnel.php" enctype="multipart/form-data">
                            <div class="divider divider-info text-start">
                                <div class="divider-text">
                                    <h6>Project Details</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label for="project_receive_date" class="form-label">Project Date Recieve</label>
                                    <input class="form-control" type="date" id="project_receive_date"
                                        name="project_receive_date" autofocus required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="project_dateline" class="form-label">Project Dateline</label>
                                    <input class="form-control" type="date" name="project_dateline"
                                        id="project_dateline" required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Status ----</option>
                                        <?php foreach(FunnelStatus::getLists() as $idx => $status) { ?>
                                        <option value="<?php echo $idx ?>"> <?php echo $status ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php if($_SESSION['role'] == 'User'){ ?>
                                    <input class="form-control" type="hidden" name="employee_id" id="employee_id" readonly  value="<?php echo  $_SESSION['emp_id']?>"/>
                                <?php } else { ?>
                                <div class="mb-3 col-md-3">
                                    <label for="employee_id" class="form-label">Sales Person</label>
                                    <select name="employee_id" id="employee_id" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Sales Person ----</option>
                                        <?php while ($row = mysqli_fetch_array($sales_person)) { ?>
                                        <option value="<?php echo $row['f_id'] ?>">
                                            <?php echo $row['f_first_name'] . ' ' . $row['f_last_name']?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php } ?>

                                <div class="mb-3 col-md-3">
                                    <label for="project_name" class="form-label">Project Name</label>
                                    <input class="form-control" type="text" id="project_name" name="project_name"
                                        required />
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="actions" class="form-label">Action</label>
                                    <input class="form-control" type="text" id="actions" name="actions" required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="chance" class="form-label">Chances (%)</label>
                                    <input class="form-control" type="number" id="chance" name="chance" required />
                                </div>
                            </div>
                            <div class="row">

                                <div class="mb-3 col-md-3">
                                    <label class="form-label" for="value">Value (RM)</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="value" name="value" class="form-control" required />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label" for="discount">Discount (RM)</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="discount" name="discount" class="form-control"
                                            required />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="project_detail" class="form-label">Project Details</label>
                                    <textarea type="text" class="form-control" id="project_detail"
                                        name="project_detail" />
                                    </textarea>

                                </div>
                            </div>

                            <div class="row">

                                <div class="mb-3 col-md-3">
                                    <label class="form-label" for="value">Category</label>
                                    <div class="input-group input-group-merge">
                                        <select name="Category" id="Category" class="select2 form-select" required>
                                            <option hidden value=""> ---- Select Category ----</option>
                                            <?php foreach(getProjectCategory() as $idx => $category) { ?>
                                            <option value="<?php echo $category['id'] ?>"> <?php echo $category['Name'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label" for="discount">Sector</label>
                                    <div class="input-group input-group-merge">
                                        <select name="ProjectSectorId" id="ProjectSectorId" class="select2 form-select" required>
                                          
                                        </select>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="divider divider-info text-start div_remarks" style="display: none;">
                                <div class="divider-text">
                                    <h6>Remarks Details</h6>
                                </div>
                            </div>

                            <div class="row div_remarks" style="display: none;">
                                <div class="mb-3 col-md-4 div_not_closed">
                                    <label for="company_name" class="form-label">What Causing issue ? </label>
                                    <textarea type="text" class="form-control" id="causing_issue"
                                        name="causing_issue" rows="5" />
                                    </textarea>
                                </div>
                                <div class="mb-3 col-md-4 div_not_closed">
                                    <label for="customer_name" class="form-label">Improvement Step Future</label>
                                    <textarea type="text" class="form-control" id="improvement_step"
                                        name="improvement_step" rows="5" />
                                    </textarea>
                                </div>
                                <div class="mb-3 col-md-4 div_closed">
                                    <label for="company_name" class="form-label">Why Closed ? </label>
                                    <textarea type="text" class="form-control" id="why_closed"
                                        name="why_closed" rows="5" />
                                    </textarea>
                                </div>
                                <div class="mb-3 col-md-4 div_remarks">
                                    <label for="customer_contact" class="form-label">Others Opportunity?</label>
                                    <textarea type="text" class="form-control" id="opportunity"
                                        name="opportunity" rows="5" />
                                    </textarea>
                                </div>
                            </div>
                            

                            <div class="divider divider-info text-start">
                                <div class="divider-text">
                                    <h6>Customer Details</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input class="form-control" type="text" id="company_name" name="company_name"
                                        autofocus required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="customer_name" class="form-label">Company PIC Name</label>
                                    <input class="form-control" type="text" name="customer_name" id="customer_name"
                                        required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="customer_contact" class="form-label">Company PIC Phone</label>
                                    <input class="form-control" type="number" name="customer_contact"
                                        id="customer_contact" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="company_address" class="form-label">Company Address</label>

                                    <textarea type="text" class="form-control" id="company_address"
                                        name="company_address" rows="5" />
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label for="customer_email" class="form-label">Company PIC Email</label>
                                    <input class="form-control" type="email" id="customer_email" name="customer_email"
                                        autofocus required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="customer_position" class="form-label">Company PIC Position</label>
                                    <input class="form-control" type="text" id="customer_position"
                                        name="customer_position" autofocus required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="project_po_date" class="form-label">Project PO Date</label>
                                    <input class="form-control" type="date" name="project_po_date" id="project_po_date"
                                        required />
                                </div>

                            </div>

                            <div class="divider divider-info text-start">
                                <div class="divider-text">
                                    <h6>Pillar Of Choices
                                    </h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">

                                <?php while ($row = mysqli_fetch_array($project_pillar)) { ?>
                                    <div class="form-check form-check-inline mt-2">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="checkbox" name="project_pillar[]"
                                                id="inlineCheckbox<?php echo $row['project_code'] ?>" value="<?php echo $row['project_code'] ?>" />
                                            <label class="form-check-label"
                                                for="inlineCheckbox<?php echo $row['project_code'] ?>"><?php echo $row['project_pillar']  ?></label>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="divider divider-info text-start">
                                <div class="divider-text">
                                    <h6>Upload Document</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-9">
                                    <div data-repeater-list="document_list">
                                        <div data-repeater-item class="row">
                                            <div class="mb-3 col-lg-6">
                                                <input class="form-control" type="file" name="upload_document"
                                                    id="upload_document" required />
                                            </div>
                                            <div class="col-lg-2">
                                                    <input data-repeater-delete type="button" class="btn btn-primary"
                                                        value="Delete" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
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

<script type="text/javascript" src="../../assets/vendor/jquery.repeater/jquery.repeater.min.js"> </script>

<script>
    $(document).ready(function () {
        "use strict";
        $(".repeater").repeater({
            defaultValues: {
                "textarea-input": "foo",
                "text-input": "bar",
                "select-input": "B",
                "checkbox-input": ["A", "B"],
                "radio-input": "B"
            },
            show: function () {
                $(this).slideDown()
            },
            hide: function (e) {
                confirm("Are you sure you want to delete this record?") && $(this).slideUp(e)
            },
            ready: function (e) {}
        }), window.outerRepeater = $(".outer-repeater").repeater({
            defaultValues: {
                "text-input": "outer-default"
            },
            show: function () {
                console.log("outer show"), $(this).slideDown()
            },
            hide: function (e) {
                console.log("outer delete"), $(this).slideUp(e)
            },
            repeaters: [{
                selector: ".inner-repeater",
                defaultValues: {
                    "inner-text-input": "inner-default"
                },
                show: function () {
                    console.log("inner show"), $(this).slideDown()
                },
                hide: function (e) {
                    console.log("inner delete"), $(this).slideUp(e)
                }
            }]
        })

        $('#status').on('change', function() {
            var value = $(this).val();
            var closed = <?php echo FunnelStatus::CLOSED ?>;
            var potential = <?php echo FunnelStatus::POTENTIAL ?>;


            if(closed == value){
                $('.div_closed').show();
                $('.div_not_closed').hide();
                $('.div_remarks').show();

                $('#why_closed').prop('required',true);
                $('#opportunity').prop('required',true);
                $('#causing_issue').prop('required',false);
                $('#improvement_step').prop('required',false);
            }
            else if(potential == value){
                $('.div_closed').hide();
                $('.div_not_closed').hide();
                $('.div_remarks').hide();

                $('#why_closed').prop('required',false);
                $('#opportunity').prop('required',false);
                $('#causing_issue').prop('required',false);
                $('#improvement_step').prop('required',false);
            }
            else{
                $('.div_closed').hide();
                $('.div_not_closed').show();
                $('.div_remarks').show();

                $('#why_closed').prop('required',false);
                $('#opportunity').prop('required',true);
                $('#causing_issue').prop('required',true);
                $('#improvement_step').prop('required',true);

            }
        });

        $('#Category').on('change',function(){
            var value = $(this).val();
            var url = "../../controller/sales_funnel.php";

            $.get(url, {
                action: 'dropdown-sector',
                Category:value,
            })
            .done(function (data) {
                if (data) {
                    $('#ProjectSectorId').html(data);

                }
            })



        });
    });
</script>