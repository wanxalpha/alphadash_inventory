<?php
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
    
    <!-- for retailer -->
    <?php if($_SESSION['designation'] == '2'){?>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header2" style="text-align: center;">Stock In Customer</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select name="stock_in_month_customer"  id="stock_in_month_customer" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Month ----</option>
                                    <?php  
                                    $get_stock_in_month_customer = isset($_GET['stock_in_month_customer']) ? $_GET['stock_in_month_customer'] : null ;
                                    ?>
                                    <?php foreach(listMonth() as $idx => $month) { ?>
                                    <option value="<?php echo $idx?>" <?php if($get_stock_in_month_customer == $idx) echo 'selected'; ?> > <?php echo $month ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $stock_in_year_customer = isset($_GET['stock_in_year_customer']) ? $_GET['stock_in_year_customer'] : date('Y') ; 
                                ?>
                                <select name="stock_in_year_customer"  id="stock_in_year_customer" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach(listYear() as $year) { ?>
                                    <option value="<?php echo $year?>" <?php if($year == $stock_in_year_customer) echo 'selected'; ?> > <?php echo $year ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div id="stock_in_customer" class="px-2"></div>
                    </div>

                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header2" style="text-align: center;">Stock Out Customer</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select name="stock_out_month_customer"  id="stock_out_month_customer" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Month ----</option>
                                    <?php  
                                    $get_stock_out_month_customer = isset($_GET['stock_out_month_customer']) ? $_GET['stock_out_month_customer'] : null ;
                                    ?>
                                    <?php foreach(listMonth() as $idx => $month) { ?>
                                    <option value="<?php echo $idx?>" <?php if($get_stock_out_month_customer == $idx) echo 'selected'; ?> > <?php echo $month ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $stock_out_year_customer = isset($_GET['stock_out_year_customer']) ? $_GET['stock_out_year_customer'] : date('Y') ; ?>
                                <select name="stock_out_year_customer"  id="stock_out_year_customer" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach(listYear() as $year) { ?>
                                    <option value="<?php echo $year?>" <?php if($year == $stock_out_year_customer) echo 'selected'; ?> > <?php echo $year ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    
                        <div id="stock_out_customer" class="px-2"></div>
                    </div>

                </div>
            </div>
        </div>
    <?php }else{ ?>
        <div class="row">
            <?php if($_SESSION['designation'] == '1'){?>
                <div class="col-md-6 mb-4">
                    <div class="card mb-3 overflow-hidden h-100">
                        <h5 class="card-header2" style="text-align: center;">Low Quantity Alert</h5>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Name</td>
                                        <td>Quantity</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $idx = 0; while($product = $low_quantity_alert->fetch_assoc()) {  $idx += 1;?>
                                        <?php if($product['quantity'] <= $product['low_quantity_alert']) {?>
                                            <tr>
                                                <td><?php echo $idx ?> .</td>
                                                <td><?php echo ($product['name']) ?></td>
                                                <td><?php echo ($product['quantity']) ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            <?php } ?>

            <div class="col-md-6 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <?php if($_SESSION['designation'] == '3'){ ?>
                        <h5 class="card-header2" style="text-align: center;">Stock Out</h5>
                    <?php }else{?>
                        <h5 class="card-header2" style="text-align: center;">Stock In</h5>
                    <?php } ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select name="stock_in_month"  id="stock_in_month" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Month ----</option>
                                    <?php  
                                    $get_stock_out_month = isset($_GET['stock_in_month']) ? $_GET['stock_in_month'] : null ;
                                    ?>
                                    <?php foreach(listMonth() as $idx => $month) { ?>
                                    <option value="<?php echo $idx?>" <?php if($get_stock_out_month == $idx) echo 'selected'; ?> > <?php echo $month ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $stock_in_year = isset($_GET['stock_in_year']) ? $_GET['stock_in_year'] : date('Y') ; 
                                ?>
                                <select name="stock_in_year"  id="stock_in_year" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach(listYear() as $year) { ?>
                                    <option value="<?php echo $year?>" <?php if($year == $stock_in_year) echo 'selected'; ?> > <?php echo $year ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div id="stock_in" class="px-2"></div>
                    </div>

                </div>
            </div>

            <?php if($_SESSION['designation'] == '1'){?>
                <div class="col-md-6 mb-4">
                    <div class="card mb-3 overflow-hidden h-100">
                        <h5 class="card-header2" style="text-align: center;">Stock Out</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Month</label>
                                    <select name="stock_out_month"  id="stock_out_month" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Month ----</option>
                                        <?php  
                                        $get_stock_out_month = isset($_GET['stock_out_month']) ? $_GET['stock_out_month'] : null ;
                                        ?>
                                        <?php foreach(listMonth() as $idx => $month) { ?>
                                        <option value="<?php echo $idx?>" <?php if($get_stock_out_month == $idx) echo 'selected'; ?> > <?php echo $month ?>  </option>    
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Year</label>
                                    <?php $status_year = isset($_GET['status_year']) ? $_GET['status_year'] : date('Y') ; ?>
                                    <select name="status_year"  id="status_year" class="select2 form-select" required>
                                        <option hidden value=""> ---- Select Year ----</option>
                                        <?php foreach(listYear() as $year) { ?>
                                        <option value="<?php echo $year?>" <?php if($year == $status_year) echo 'selected'; ?> > <?php echo $year ?>  </option>    
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        
                            <div id="sales_funnel" class="px-2"></div>
                        </div>

                    </div>
                </div>
            <?php } ?>
            <div class="col-md-6 mb-4">
                <div class="card mb-3 overflow-hidden h-100">
                    <h5 class="card-header2" style="text-align: center;">Stock Return</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Month</label>
                                <select name="stock_return_month"  id="stock_return_month" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Month ----</option>
                                    <?php  
                                    $get_stock_return_month = isset($_GET['stock_return_month']) ? $_GET['stock_return_month'] : null ;
                                    ?>
                                    <?php foreach(listMonth() as $idx => $month) { ?>
                                    <option value="<?php echo $idx?>" <?php if($get_stock_return_month == $idx) echo 'selected'; ?> > <?php echo $month ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year</label>
                                <?php $stock_return_year = isset($_GET['stock_return_year']) ? $_GET['stock_return_year'] : date('Y') ; ?>
                                <select name="stock_return_year"  id="stock_return_year" class="select2 form-select" required>
                                    <option hidden value=""> ---- Select Year ----</option>
                                    <?php foreach(listYear() as $year) { ?>
                                    <option value="<?php echo $year?>" <?php if($year == $stock_return_year) echo 'selected'; ?> > <?php echo $year ?>  </option>    
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div id="stock_return" class="px-2"></div>
                    </div>

                </div>
            </div>

        </div>

        <?php } ?>
    </div>
</div>
    <!-- / Content -->
    <!-- Footer -->
<script>
    var data_kpi = <?php echo json_encode($data_kpi); ?>;
    var data_team_kpi =  <?php echo json_encode($data_team_kpi); ?>;
    var data_stock_in = <?php echo json_encode($data_stock_in); ?>;
    var data_stock_out = <?php echo json_encode($data_stock_out); ?>;
    var data_stock_in_customer = <?php echo json_encode($data_stock_in_customer); ?>;
    var data_stock_out_customer = <?php echo json_encode($data_stock_out_customer); ?>;
    var data_stock_return = <?php echo json_encode($data_stock_return); ?>;
    var data_label_funnel_status = <?php echo json_encode(FunnelStatus::getListsName()); ?>;
    var data_label_stock_return = <?php echo json_encode(StockReturnStatus::getListsName()); ?>;
    var data_pillar = <?php echo json_encode($data_pillar); ?>;
    var data_pillar_increase = <?php echo json_encode($data_pillar_increase); ?>;
    var data_calendar = <?php echo json_encode($data_calendar) ; ?> ;
    var data_funnel_category = <?php echo json_encode($data_funnel_category); ?>;
    var data_label_funnel_category = <?php echo json_encode(ProjectSector::getListsName()); ?>;
    
</script>
<?php include_once("../../layouts/footer.php"); ?>
<script type="text/javascript" src="../../assets/js/resource/dashboard.js"> </script>

<script>

    document.addEventListener('DOMContentLoaded', function () {
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
            select: function (arg) {
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
            eventClick: function (info, jsEvent, view) {
                info.jsEvent.preventDefault(); // don't let the browser navigate
                if (info.event.url) {
                    $.post(info.event.url, {
                        _method: 'GET'
                    }, function (response) {
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
                .done(function (data) {
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