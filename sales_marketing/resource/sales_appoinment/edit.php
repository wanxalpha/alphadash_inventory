<?php

include_once('../../controller/sales_appoinment.php');

$sales_person = getSalesPerson();

include_once("../../layouts/menu.php");

?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Sales Appointment</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Add Sales Appointment</h5>
                    <div class="card-body">

                        <form method="POST" action="../../controller/sales_appoinment.php">
                        <?php  while($row = $result->fetch_assoc()) { ?>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input class="form-control" type="text" id="company_name" name="company_name" value="<?php echo $row['company_name'] ?>"
                                        autofocus required/>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="pic_name" class="form-label">PIC Name</label>
                                    <input class="form-control" type="text" name="pic_name" id="pic_name"  value="<?php echo $row['pic_name'] ?>" required/>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="pic_position" class="form-label">PIC Position</label>
                                    <input class="form-control" type="text" id="pic_position" name="pic_position" value="<?php echo $row['pic_position'] ?>"
                                        placeholder="Cheif Management" required/>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="pic_contact_number" class="form-label">PIC Contact Number</label>
                                    <input type="text" class="form-control" id="pic_contact_number" value="<?php echo $row['pic_mobile'] ?>"
                                        name="pic_contact_number" required />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="pic_email">PIC Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="email" id="pic_email" name="pic_email" class="form-control" value="<?php echo $row['pic_email'] ?>"
                                            placeholder="example@gmail.com"required />
                                    </div>
                                </div>
                                <?php if($_SESSION['role'] == 'User'){ ?>
                                <input class="form-control" type="hidden" name="sales_person" id="sales_person" readonly  value="<?php echo  $_SESSION['emp_id']?>"/>
                                <?php } else { ?>
                                <div class="mb-3 col-md-6">
                                    <label for="sales_person" class="form-label">Sales Person</label>
                                    <select id="sales_person" name="sales_person" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Sales Person ----</option>
                                        <?php while ($row_sales_person = mysqli_fetch_array($sales_person)) { ?>
                                        <option value="<?php echo $row_sales_person['f_id'] ?>" <?php if($row['employee_id'] == $row_sales_person['f_id'])  echo 'selected'?>> <?php echo $row_sales_person['f_first_name'] .' ' . $row_sales_person['f_last_name'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php } ?>
                                <div class="mb-3 col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input class="form-control" type="datetime-local" id="date" name="date" value="<?php echo date('Y-m-d\TH:i', strtotime($row['appointment_date'])) ?>"
                                        placeholder="California" required/>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <textarea type="text" class="form-control" id="remarks" name="remarks"><?php echo $row['remark'] ?>
                                    </textarea>
                                </div>

                            </div>
                            <div class="mt-2">
                                <a href="index.php"  type="submit"
                                    class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                <button type="submit" name="action" value="update" class="btn btn-primary me-2 float-right">Update</button>
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

<script type="text/javascript">
    var url = "../../controller/sales_appoinment.php";

    $.get(url, {
            action: 'list'
        })
        .done(function (data) {
            console.log(data);
            if (data) {
                $('#index_sales_appoinment').html(data);

            } else {
                $('#index_sales_appoinment').html('<tr><td rowspan="5">No Data</td></tr>')
            }
        })
</script>