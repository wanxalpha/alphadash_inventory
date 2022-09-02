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
                    <h5 class="card-header2">Sales Funnel</h5>
                    <div class="card-body">
                        <?php  while($row = $result->fetch_assoc()) { ?>
                        <div class="divider divider-info text-start">
                            <div class="divider-text">
                                <h6>Project Details</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="project_receive_date" class="form-label">Project Date Recieve</label>
                                <input class="form-control" type="date" id="project_receive_date"
                                    name="project_receive_date" value="<?php echo $row['project_receive_date'] ?>"
                                    autofocus disabled />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="project_dateline" class="form-label">Project Dateline</label>
                                <input class="form-control" type="date" name="project_dateline"
                                    id="project_dateline" value="<?php echo $row['project_dateline'] ?>" disabled />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="select2 form-select" disabled>
                                    <option hidden value=""> ---- Select Status ----</option>
                                    <?php foreach(FunnelStatus::getLists() as $idx => $status) { ?>
                                    <option value="<?php echo $idx ?>"
                                        <?php if($idx == $row['status']) echo 'selected' ?>> <?php echo $status ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php if($_SESSION['role'] == 'User'){ ?>
                                <input class="form-control" type="hidden" name="employee_id" id="employee_id" readonly  value="<?php echo  $_SESSION['emp_id']?>"/>
                            <?php } else { ?>
                            <div class="mb-3 col-md-3">
                                <label for="employee_id" class="form-label">Sales Person</label>
                                <select name="employee_id" id="employee_id" class="select2 form-select" disabled>
                                    <option hidden value=""> ---- Select Sales Person ----</option>
                                    <?php while ($row_sales_person = mysqli_fetch_array($sales_person)) { ?>
                                    <option value="<?php echo $row_sales_person['f_id'] ?>"
                                        <?php if($row_sales_person['f_id'] == $row['employee_id']) echo 'selected' ?>>
                                        <?php echo $row_sales_person['f_first_name'] . ' '. $row_sales_person['f_last_name'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php } ?>
                            <div class="mb-3 col-md-3">
                                <label for="project_name" class="form-label">Project Name</label>
                                <input class="form-control" type="text" id="project_name" name="project_name"
                                    value="<?php echo $row['project_name'] ?>" disabled />
                            </div>

                            <div class="mb-3 col-md-3">
                                <label for="actions" class="form-label">Action</label>
                                <input class="form-control" type="text" id="actions" name="actions"
                                    value="<?php echo $row['actions'] ?>" disabled />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="chance" class="form-label">Chances (%)</label>
                                <input class="form-control" type="number" id="chance" name="chance"
                                    value="<?php echo $row['chance'] ?>" disabled />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="chance" class="form-label">Project Code</label>
                                <input class="form-control" value="<?php echo $row['project_code'] ?>" disabled />
                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="value">Value (RM)</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="value" name="value" class="form-control"
                                        value="<?php echo $row['value'] ?>" disabled />
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="discount">Discount (RM)</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="discount" name="discount" class="form-control"
                                        value="<?php echo $row['value'] ?>" disabled />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="project_detail" class="form-label">Project Details</label>
                                <textarea type="text" class="form-control" id="project_detail"
                                    name="project_detail" disabled>
                                <?php echo $row['project_detail'] ?>"
                                </textarea>

                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="value">Category</label>
                                <div class="input-group input-group-merge">
                                    <select name="Category" id="Category" class="select2 form-select" disabled>
                                        <option hidden value=""> ---- Select Category ----</option>
                                        <?php foreach(ProjectSector::getLists() as $idx => $category) { ?>
                                        <option value="<?php echo $idx ?>" <?php if($idx == $row['Category']) echo 'selected' ?>> <?php echo $category ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="discount">Sector</label>
                                <div class="input-group input-group-merge">
                                    <select name="ProjectSectorId" id="ProjectSectorId" class="select2 form-select" disabled>
                                            <option hidden value=""> ---- Select Sector ----</option>
                                            <?php foreach(getProjectSector($row['Category'])  as $project_sector) {?>
                                            <option value="<?php echo $project_sector['id'] ?>" <?php if($project_sector['id'] == $row['ProjectSectorId']) echo 'selected' ?>> <?php echo $project_sector['Name'] ?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="divider divider-info text-start div_remarks" style="<?php if($row['status'] == FunnelStatus::POTENTIAL) echo 'display: none;' ?>">
                                <div class="divider-text">
                                    <h6>Remarks Details</h6>
                                </div>
                            </div>

                            <div class="row div_remarks" >
                                <div class="mb-3 col-md-4 div_not_closed" style="<?php if($row['status'] == FunnelStatus::CLOSED) echo 'display: none;' ?>">
                                    <label for="company_name" class="form-label">What Causing issue ? </label>
                                    <textarea type="text" class="form-control" id="causing_issue"
                                        name="causing_issue" rows="5" disabled>
                                        <?php echo $row['causing_issue'] ?>
                                    </textarea>
                                </div>
                                <div class="mb-3 col-md-4 div_not_closed" style="<?php if($row['status'] == FunnelStatus::CLOSED) echo 'display: none;' ?>">
                                    <label for="customer_name" class="form-label">Improvement Step Future</label>
                                    <textarea type="text" class="form-control" id="improvement_step"
                                        name="improvement_step" rows="5" disabled>
                                        <?php echo $row['improvement_step'] ?>

                                    </textarea>
                                </div>
                                <div class="mb-3 col-md-4 div_closed" style="<?php if($row['status'] != FunnelStatus::CLOSED) echo 'display: none;' ?>">
                                    <label for="company_name" class="form-label">Why Closed ? </label>
                                    <textarea type="text" class="form-control" id="why_closed"
                                        name="why_closed" rows="5" disabled>
                                        <?php echo $row['why_closed'] ?>

                                    </textarea>
                                </div>
                                <div class="mb-3 col-md-4 div_remarks">
                                    <label for="customer_contact" class="form-label">Others Opportunity?</label>
                                    <textarea type="text" class="form-control" id="opportunity"
                                        name="opportunity" rows="5"disabled>
                                        <?php echo $row['opportunity'] ?>

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
                                    value="<?php echo $row['company_name'] ?>" autofocus disabled />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="customer_name" class="form-label">Company PIC Name</label>
                                <input class="form-control" type="text" name="customer_name" id="customer_name"
                                    value="<?php echo $row['customer_name'] ?>" disabled />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="customer_contact" class="form-label">Company PIC Phone</label>
                                <input class="form-control" type="number" name="customer_contact"
                                    id="customer_contact" value="<?php echo $row['customer_contact'] ?>" disabled />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="company_address" class="form-label">Company Address</label>

                                <textarea type="text" class="form-control" id="company_address"
                                    name="company_address" rows="5" disabled>
                                <?php echo $row['company_address'] ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="customer_email" class="form-label">Company PIC Email</label>
                                <input class="form-control" type="email" id="customer_email" name="customer_email"
                                    value="<?php echo $row['customer_email'] ?>" autofocus disabled />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="customer_position" class="form-label">Company PIC Position</label>
                                <input class="form-control" type="text" id="customer_position"
                                    name="customer_position" value="<?php echo $row['customer_position'] ?>"
                                    autofocus disabled />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="project_po_date" class="form-label">Project PO Date</label>
                                <input class="form-control" type="date" name="project_po_date" id="project_po_date"
                                    value="<?php echo $row['project_po_date'] ?>" disabled />
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
                            <?php while ($row_pillar = mysqli_fetch_array($project_pillar)) { ?>
                                <?php if(in_array($row_pillar['project_code'],json_decode($row['project_pillar'])))  { ?>
                                <div class="form-check form-check-inline mt-2">
                                    <div class="form-check form-check-inline mt-2">
                                        <label class="form-check-label"
                                            for="inlineCheckbox<?php echo $row_pillar['project_code'] ?>"><?php echo ($row_pillar['project_pillar'])  ?></label>
                                    </div>
                                </div>
                                <?php } }?>
                            </div>
                        </div>
                        <div class="divider divider-info text-start">
                            <div class="divider-text">
                                <h6>Upload Document</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:5%">No</th>
                                                <th>Date Created</th>
                                                <th style="width:5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $idx = 0; while($row_document = $result_document->fetch_assoc()) {  $idx += 1;?>
                                            <tr>
                                                <td><?php echo $idx ?> .</td>
                                                <td><?php echo date('d-m-Y H:i', strtotime($row_document['created_at'])) ?></td>
                                                <td>
                                                    <a href="<?php echo '../../'. $row_document['document_path'] ?>" target="_blank">
                                                        <i class="fa fa-file-pdf-o" style="font-size:36px"></i>
                                                    </a>
                                                    <!-- <input  class="btn btn-primary" value="Delete" /> -->

                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                       
                        <div class="mt-4">
                            <a href="index.php" type="button"
                                class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("../../layouts/footer.php"); ?>

