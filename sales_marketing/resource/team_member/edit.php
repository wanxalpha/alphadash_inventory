<?php
    include_once('../../controller/team_member.php');
    include_once("../../layouts/menu.php");
    $sales_person = getSalesPersonDetails();

?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Sales Grouping</h4>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header2">Add Sales Grouping</h5>
                    <div class="card-body">

                        <form class="repeater" method="POST" action="../../controller/team_member.php" enctype="multipart/form-data">
                        <?php  while($row = $result->fetch_assoc()) { ?>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                            <div class="row">
                                
                                <div class="mb-3 col-md-3">
                                    <label for="Name" class="form-label">Team Name</label>
                                    <input class="form-control" type="text" name="Name" value="<?php echo $row['Name'] ?>"
                                        id="Name" required />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="Leader_id" class="form-label">Leader Team</label>
                                    <select name="Leader_id" id="Leader_id" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Leader ----</option>
                                        <?php foreach($sales_person as $data) { ?>
                                        <option value="<?php echo $data['f_id'] ?>" <?php if($data['f_id'] ==  $row['Leader_id']) echo 'selected' ?>> <?php echo $data['name']?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                               
                            </div>
                            <div class="row mb-4">
                                <div class="mb-12 col-md-12">
                                    <label for="remarks" class="form-label">Details</label>
                                    <textarea type="text" class="form-control" id="Details" name="Details">
                                    <?php echo $row['Details'] ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-9 col-md-9">
                                    <div data-repeater-list="team_member">
                                    
                                        <?php  while($row_member = $result_member->fetch_assoc()) { ?>

                                        <div data-repeater-item class="row">
                                            <div class="mb-3 col-lg-6">
                                                <select name="f_id" id="f_id" class="select2 form-select" required>
                                                    <option hidden value=""> ---- Select Team Member ----</option>
                                                    <?php foreach($sales_person as $data) { ?>
                                                    <option value="<?php echo $data['f_id'] ?>" <?php if($data['f_id'] == $row_member['f_id'])  echo 'selected' ?>> <?php echo $data['name'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                    <input data-repeater-delete type="button" class="btn btn-primary"
                                                        value="Delete" />
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="index.php" type="submit"
                                    class="btn btn-info btn-default btn-squared px-30 float-left">Back</a>
                                <button type="submit" name="action" value="update"
                                    class="btn btn-primary me-2 float-right">Submit</button>
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

       
    });
</script>