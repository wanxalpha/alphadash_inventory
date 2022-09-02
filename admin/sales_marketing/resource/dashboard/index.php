<?php
//include_once("../../../menu/menu-dash-a.php");

include_once('../../controller/dashboard.php');
include_once("../../layouts/menu.php");
$project_pillar  = getPillar();
$project_pillar_more = getPillar();
$project_pillar_status = getPillar();
$sales_person = getSalesPerson();

$test = date('F', strtotime('01'));
$test1 = date('M', strtotime('01'));

?>

<!-- / Navbar -->

<!-- Content wrapper -->

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <h5 class="card-header2" style="text-align: center;">Sales Person KPI</h5>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select name="kpi_month" id="kpi_month" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Month ----</option>
                                    <?php
                                    $get_kpi_month = isset($_GET['kpi_month']) ? $_GET['kpi_month'] : null;
                                    ?>
                                    <?php foreach (listMonth() as $idx => $month) { ?>
                                        <option value="<?php echo $idx ?>" <?php if ($get_kpi_month == $idx) echo 'selected'; ?>> <?php echo $month ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $kpi_year = isset($_GET['kpi_year']) ? $_GET['kpi_year'] : date('Y'); ?>
                                <select name="kpi_year" id="kpi_year" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach (listYear() as $year) { ?>
                                        <option value="<?php echo $year ?>" <?php if ($year == $kpi_year) echo 'selected'; ?>> <?php echo $year ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php if ($_SESSION['role'] != 'User') { ?>
                                <div class="col-md-4">
                                    <label class="form-label">Sales Person</label>
                                    <?php $kpi_sales_person = isset($_GET['kpi_sales_person']) ? $_GET['kpi_sales_person'] : null; ?>
                                    <select name="kpi_sales_person" id="kpi_sales_person" class="select2 form-select" required>
                                        <option value="">All</option>

                                        <?php while ($row = mysqli_fetch_array($sales_person)) { ?>
                                            <option value="<?php echo $row['f_id'] ?>" <?php if ($row['f_id'] == $kpi_sales_person) echo 'selected'; ?>> <?php echo $row['f_first_name'] . ' ' . $row['f_last_name'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>
                        <div id="sales_kpi" class="px-2"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <h5 class="card-header2" style="text-align: center;">Sales Team KPI</h5>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select name="kpi_team_month" id="kpi_team_month" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Month ----</option>
                                    <?php
                                    $get_kpi_team_month = isset($_GET['kpi_team_month']) ? $_GET['kpi_team_month'] : null;
                                    ?>
                                    <?php foreach (listMonth() as $idx => $month) { ?>
                                        <option value="<?php echo $idx ?>" <?php if ($get_kpi_team_month == $idx) echo 'selected'; ?>> <?php echo $month ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $kpi_team_year = isset($_GET['kpi_team_year']) ? $_GET['kpi_team_year'] : date('Y'); ?>
                                <select name="kpi_team_year" id="kpi_team_year" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach (listYear() as $year) { ?>
                                        <option value="<?php echo $year ?>" <?php if ($year == $kpi_team_year) echo 'selected'; ?>> <?php echo $year ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <div id="sales_team_kpi" class="px-2"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <h4 class="card-header2">Calendar</h4>
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header2" style="text-align: center;">Sales & Marketing - Product Demand up to RM 99 999</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $demand_less_year = isset($_GET['demand_less_year']) ? $_GET['demand_less_year'] : date('Y'); ?>
                                <select name="demand_less_year" id="demand_less_year" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach (listYear() as $year) { ?>
                                        <option value="<?php echo $year ?>" <?php if ($year == $demand_less_year) echo 'selected'; ?>> <?php echo $year ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Product Service</label>
                                <?php $demand_less_product = isset($_GET['demand_less_product']) ? $_GET['demand_less_product'] : null; ?>
                                <select name="demand_less_product" id="demand_less_product" class="select2 form-select" required>
                                    <option value="">All</option>

                                    <?php while ($row = mysqli_fetch_array($project_pillar)) { ?>
                                        <option value="<?php echo $row['project_code'] ?>" <?php if ($row['project_code'] == $demand_less_product) echo 'selected'; ?>> <?php echo $row['project_pillar'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div id="sales_marketing_demand" class="px-2"></div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header2" style="text-align: center;">Sales & Marketing - Product Demand RM 100 000 and above</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $demand_more_year = isset($_GET['demand_more_year']) ? $_GET['demand_more_year'] : date('Y'); ?>
                                <select name="demand_more_year" id="demand_more_year" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach (listYear() as $year) { ?>
                                        <option value="<?php echo $year ?>" <?php if ($year == $demand_more_year) echo 'selected'; ?>> <?php echo $year ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Product Service</label>
                                <?php $demand_more_product = isset($_GET['demand_more_product']) ? $_GET['demand_more_product'] : null; ?>
                                <select name="demand_more_product" id="demand_more_product" class="select2 form-select" required>
                                    <option value="">All</option>
                                    <?php while ($row = mysqli_fetch_array($project_pillar_more)) { ?>
                                        <option value="<?php echo $row['project_code'] ?>" <?php if ($row['project_code'] == $demand_more_product) echo 'selected'; ?>> <?php echo $row['project_pillar'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div id="sales_funnel_increase" class="px-2"></div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header2" style="text-align: center;">Lead By Status</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select name="status_month" id="status_month" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Month ----</option>
                                    <?php
                                    $get_status_month = isset($_GET['status_month']) ? $_GET['status_month'] : null;
                                    ?>
                                    <?php foreach (listMonth() as $idx => $month) { ?>
                                        <option value="<?php echo $idx ?>" <?php if ($get_status_month == $idx) echo 'selected'; ?>> <?php echo $month ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $status_year = isset($_GET['status_year']) ? $_GET['status_year'] : date('Y'); ?>
                                <select name="status_year" id="status_year" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach (listYear() as $year) { ?>
                                        <option value="<?php echo $year ?>" <?php if ($year == $status_year) echo 'selected'; ?>> <?php echo $year ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Product Service</label>
                                <?php $status_product = isset($_GET['status_product']) ? $_GET['status_product'] : null; ?>
                                <select name="status_product" id="status_product" class="select2 form-select" required>
                                    <option value="">All</option>
                                    <?php while ($row = mysqli_fetch_array($project_pillar_status)) { ?>
                                        <option value="<?php echo $row['project_code'] ?>" <?php if ($row['project_code'] == $status_product) echo 'selected'; ?>> <?php echo $row['project_pillar'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div id="sales_funnel" class="px-2"></div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header2" style="text-align: center;">Lead By Category</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select name="category_month" id="category_month" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Month ----</option>
                                    <?php
                                    $get_category_month = isset($_GET['category_month']) ? $_GET['category_month'] : null;
                                    ?>
                                    <?php foreach (listMonth() as $idx => $month) { ?>
                                        <option value="<?php echo $idx ?>" <?php if ($get_category_month == $idx) echo 'selected'; ?>> <?php echo $month ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $category_year = isset($_GET['category_year']) ? $_GET['category_year'] : date('Y'); ?>
                                <select name="category_year" id="category_year" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach (listYear() as $year) { ?>
                                        <option value="<?php echo $year ?>" <?php if ($year == $category_year) echo 'selected'; ?>> <?php echo $year ?> </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- <div class="col-md-4">
                                <label class="form-label">Category</label>
                                <?php $category_category = isset($_GET['category_category']) ? $_GET['category_category'] : null; ?>
                                <select name="category_category"  id="category_category" class="select2 form-select" required>
                                <option value="">All</option>
                                    <?php foreach (ProjectSector::getLists() as $idx => $data) { ?>
                                    <option value="<?php echo $idx ?>" <?php if ($idx == $category_category) echo 'selected'; ?> > <?php echo $data ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div> -->

                        </div>

                        <div id="sales_funnel_category" class="px-2"></div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>


<div class="modal fade" id="view_details" tabindex="-1" role="dialog" aria-labelledby="view_detailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body reset_form_btn">
                <form name="PesertaLuarForm" id="PesertaLuarForm" action="{{route('pk.permohonan.kursus.create')}}" method="GET">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-white text-center" style="background:#646C9A;font-size:15px;">
                                    APPOINMENT DETAILS
                                </div>
                                <div class="card-body" style="background: #FFF8EA;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="PendaftaranSiriKursusId" id="PendaftaranSiriKursusId" value="">
                                            <table class="table table-borderless" width="80%" id="table_details_kursus">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Company Name</strong></td>
                                                        <td colspan="2"><span id="company_name"> </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>PIC Name</strong></td>
                                                        <td colspan="2"><span id="pic_name"> </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>PIC Position</strong></td>
                                                        <td colspan="2"><span id="pic_position"> </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>PIC Contact Number</strong></td>
                                                        <td colspan="2"><span id="pic_contact_no"> </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>PIC Email</strong></td>
                                                        <td colspan="2"><span id="pic_email"> </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Sales Person</strong></td>
                                                        <td colspan="2"><span id="sales_person"> </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date</strong></td>
                                                        <td colspan="2"><span id="date"> </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Remark</strong></td>
                                                        <td colspan="2"><span id="remark"> </span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mr-auto" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<!-- Footer -->
<script>
    var data_kpi = <?php echo json_encode($data_kpi); ?>;
    var data_team_kpi = <?php echo json_encode($data_team_kpi); ?>;
    var data_funnel_status = <?php echo json_encode($data_funnel_status); ?>;
    var data_label_funnel_status = <?php echo json_encode(FunnelStatus::getListsName()); ?>;
    var data_pillar = <?php echo json_encode($data_pillar); ?>;
    var data_pillar_increase = <?php echo json_encode($data_pillar_increase); ?>;
    var data_calendar = <?php echo json_encode($data_calendar); ?>;
    var data_funnel_category = <?php echo json_encode($data_funnel_category); ?>;
    var data_label_funnel_category = <?php echo json_encode(ProjectSector::getListsName()); ?>;

    console.log(data_kpi);
</script>
<?php include_once("../../layouts/footer.php"); ?>
<script type="text/javascript" src="../../assets/js/resource/dashboard.js"> </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var d = new Date();

        var month = d.getMonth() + 1;
        var day = d.getDate();

        var output = d.getFullYear() + '-' +
            (month < 10 ? '0' : '') + month + '-' +
            (day < 10 ? '0' : '') + day;

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialDate: output,
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.addEvent({
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    })
                }
                calendar.unselect()
            },
            // eventClick: function(arg) {
            // 	if (confirm('Are you sure you want to delete this event?')) {
            // 		arg.event.remove()
            // 	}
            // },
            eventClick: function(info, jsEvent, view) {
                info.jsEvent.preventDefault(); // don't let the browser navigate
                if (info.event.url) {
                    $.post(info.event.url, {
                        _method: 'GET'
                    }, function(response) {
                        var data = JSON.parse(response);

                        $('#company_name').text(data.company_name);
                        $('#pic_name').text(data.pic_name);
                        $('#pic_position').text(data.pic_position);
                        $('#pic_contact_no').text(data.pic_mobile);
                        $('#pic_email').text(data.pic_name);
                        $('#sales_person').text(data.pic_email);
                        $('#date').text(data.appointment_date);
                        $('#remark').text(data.remark);
                        $('#view_details').modal("toggle");
                    });

                }
            },
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: data_calendar
        });
        calendar.render();

        // document.ready(function(){
        var load = $('#load_session').val();

        if (load == "") {
            var alert = "1";

            var url = "../controller/ajax/alert/alert_session.php";

            $.get(url, {
                    alert: alert

                })
                .done(function(data) {
                    if (data) {
                        console.log(data)
                        if (data == 1) {
                            $('#load_session').val(data);
                        }
                    }
                })

            msg =
                "<div class='d-flex align-items-center  justify-content-center'>Hi, welcome to alphadash</div>";

            Swal.fire({
                html: msg,
                type: "success"
            })
        } else {
            console.log("ready!");
        }
        // })
    });
</script>