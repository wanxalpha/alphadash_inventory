<?php include_once("../menu/menu-dash-a.php");
include_once("../controller/ajax/sales/graph_demanding.php");
?>

<!-- / Navbar -->

<!-- Content wrapper -->

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Welcome <?php echo $emp_name; ?>! 🎉</h5>
                <p class="mb-4">
                  Your clock in time for <span class="fw-bold"><?php echo $today; ?></span> is at <span class="fw-bold"><?php echo $clock_in; ?></span>.
                  Don't forget to wear mask and here is your payslip for <?php echo $month; ?> &#x1F601;
                </p>

                <a href="../test_page/index2.php?pay_id=<?php echo $emp_id ?>" target="_blank" class="btn btn-sm btn-outline-success">Download</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="../upload/profile/roger.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 mb-4 order-1">
        <div class="card overflow-hidden" style="height: 180px">
          <div class="card-header2 d-flex align-items-start justify-content-between">
            <div class="flex-shrink-0">
              <span class="fw-semibold d-block mb-1">Booked Facility</span>
            </div>
            <div class="dropdown">
              <span class="fw-semibold d-block mb-1"><?php echo $todate ?></span>
            </div>
          </div>
          <div class="card-body" id="vertical-example">
            <?php
            $sql = "SELECT a.f_from_time, a.f_to_time, b.f_room, a.f_description FROM facility a LEFT JOIN facility_room b ON a.f_room = b.f_id WHERE a.f_delete='N' AND a.f_date='$curdate'";
            // echo $sql;
            $result = mysqli_query($conn, $sql);
            $nums = mysqli_num_rows($result);

            if ($nums > 0) {
              while ($rows = mysqli_fetch_array($result)) {
                $from_time =  $rows['f_from_time'];
                $to_time = $rows['f_to_time'];
                $room_name = $rows['f_room'];
                $description = $rows['f_description'];

                $from = date("h:i A", strtotime($from_time));
                $to = date("h:i A", strtotime($to_time));


                echo '
                                <div class="alert alert-warning" role="alert" style="text-align: center;"><b>' . $from . ' - ' . $to . '</b><br>' . $description . ' (' . $room_name . ')</div>
                                ';
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 mb-4">
        <div class="card overflow-hidden" style="height: 380px">
          <div class="card-body">
            <h5 class="card-title text-secondary">Memo / Notice</h5>
            <div class="demo-inline-spacing">
              <?php
              $sql = "SELECT * FROM memo WHERE f_delete='N' ORDER BY f_id DESC LIMIT 3";
              $result = mysqli_query($conn, $sql);
              $nums = mysqli_num_rows($result);
              // echo $nums; exit;

              $cnt = 1;
              if ($nums > 0) {
                while ($rows = mysqli_fetch_array($result)) {

                  $memo_id = $rows['f_id'];
                  $emp_code = $rows['f_emp_id'];
                  $title = $rows['f_title'];
                  $content = $rows['f_description'];
                  $created = $rows['f_created_date'];
                  $uploaded = $rows['f_uploaded_file'];

                  $created_date = date('Y-m-d', strtotime($created));

                  echo '
                                    <div class="card bg-dark text-white text-center p-3" data-bs-toggle="modal" data-bs-target="#largeModal' . $cnt . '">
                                        <figure class="mb-0">
                                            <blockquote class="blockquote">
                                                <p style="font-size: small;">' . $title . '</p>
                                            </blockquote>
                                            <figcaption class="blockquote-footer mb-0 text-white">
                                                HR | <cite title="Source Title">Alphacore Technology</cite>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="modal fade" id="largeModal' . $cnt . '" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="largeModalTitle">' . $title . '</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                ' ?>
                  <?php
                  if ($uploaded == "No") {
                    echo '
                                                  <div class="modal-body">
                                                    <p>' . $description . '</p>
                                                  </div>
                                                  ';
                  } else {
                    echo '
                                                  <div class="modal-body">
                                                  <div class="card" style="height: 500px">
                                                    <div class="card-body">
                                                    <embed  src="../upload/memo/' . $uploaded . '" type="application/pdf" width="100%" height="100%" border="none"></embed >
                                                    </div>
                                                  </div>
                                                  </div>
                                                  ';
                  }
                  ?>
              <?php echo '
                                            </div>
                                        </div>
                                    </div>
                                    ';

                  $cnt++;
                }
              }

              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card overflow-hidden" style="height: 380px">
          <div class="card-body" id="vertical-example3">
            <h5 class="card-title text-dark">Staffs on Leave</h5>
            <?php
            $sql = "SELECT b.f_first_name,b.f_last_name, c.f_leave_name, a.f_total, a.f_start_date, a.f_end_date, a.f_start_time, a.f_end_time, b.f_picture FROM leaves a 
                                    LEFT JOIN employees b 
                                    ON a.f_emp_id=b.f_emp_id 
                                    LEFT JOIN leave_type c 
                                    ON a.f_leave_type=c.f_id
                                    WHERE f_status='Approved' AND f_start_date='$curdate';";
            // echo $sql;
            $result = mysqli_query($conn, $sql);
            $nums = mysqli_num_rows($result);

            if ($nums > 0) {
              while ($rows = mysqli_fetch_array($result)) {
                $full_name = $rows['f_first_name'] . ' ' . $rows["f_last_name"];
                $leave_name = $rows['f_leave_name'];
                $total = $rows['f_total'];
                $start_date = $rows['f_start_date'];
                $end_date = $rows['f_end_date'];
                $start_time = $rows['f_start_time'];
                $end_time = $rows['f_end_time'];
                $picture = $rows['f_picture'];

                if ($total > 1) {
                  $total_days = $total . " days";
                } elseif ($total < 1) {
                  if ($end_time <= "13:00:00") {
                    $total_days = "half day (AM)";
                  } else {
                    $total_days = "half day (PM)";
                  }
                } else {
                  $total_days = $total . " day";
                }

                $start = date("d/m/Y", strtotime($start_date));
                $end = date("d/m/Y", strtotime($end_date));

                echo '
                                    <div class="card" style="background-image: linear-gradient(to right top, #d5e3f8, #dae1fa, #e0defa, #e8dbf9, #f0d8f5);">
                                        <div class="card-body" style="text-align: center;" id="vertical-example">
                                            <img src="../upload/profile/' . $picture . '" class="iconDetails">
                                            <p class="text-dark" style="font-size: 0.9em; margin-top: 1rem;">' . $full_name . ' is on <b>' . $leave_name . '</b>&nbsp;<br>
                                                <span class="badge bg-label-primary">' . $total_days . '</span>
                                                <br>
                                                ' ?>
                <?php
                if ($total >= 1) {
                  echo '
                                                    <span class="badge bg-label-primary">' . $start . '-' . $end . '</span>
                                                    ';
                } else {
                  echo '
                                                    <span class="badge bg-label-primary">' . $start . '</span>
                                                    ';
                }
                ?>
            <?php echo '
                                            </p>
                                        </div>
                                    </div>
                                    
                                    ';
              }
            }

            ?>

          </div>
        </div>
      </div>
      <div class="col-md-5 mb-4">
        <div class="card overflow-hidden" style="height: 380px">
          <div class="card-body" id="vertical-example4">
            <h5 class="card-title text-info">2022 Holidays 🎉</h5>
            <?php
            $sql = "SELECT * FROM holidays";
            // echo $sql;
            $result = mysqli_query($conn, $sql);
            $nums = mysqli_num_rows($result);

            if ($nums > 0) {
              while ($rows = mysqli_fetch_array($result)) {
                $holiday_name = $rows['f_holiday_name'];
                $start_date = $rows['f_start_date'];
                $end_date = $rows['f_end_date'];

                if ($start_date != $end_date) {
                  $date = date("jS F Y", strtotime($start_date)) . "-<br>" . date("jS F Y", strtotime($end_date));
                } else {
                  $date = date("jS F Y", strtotime($start_date));
                }

                echo '
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="col-lg-6">
                                        <span class="fw-semibold d-block mb-1" style="font-size: 0.9em;">' . $holiday_name . '</span>
                                    </div>
                                    <div class="col-lg-4" style="text-align:right; font-size: 0.9em;">
                                        <span class="fw-semibold d-block mb-1">' . $date . '</span>
                                    </div>
                                </div>
                                <hr>
                                ';
              }
            }

            ?>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-md-7 mb-4">
        <div class="card mb-3 overflow-hidden h-100">
          <h5 class="card-header2" style="text-align: center;">Sales & Marketing - Product Demand</h5>
          <div class="card-body">
            <div id="sales_marketing_demand" class="px-2"></div>
          </div>

        </div>
      </div>
      <div class="col-md-5 mb-4">
        <div class="card mb-3 overflow-hidden h-100">
          <h5 class="card-header2" style="text-align: center;">Project Management</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Project Status</th>
                    <th>Project Quantity</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td><span class="badge bg-label-primary me-1">Design</span></td>

                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>20</strong></td>
                  </tr>
                  <tr>
                    <td><span class="badge bg-label-info me-1">In - Development</span></td>

                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>14</strong></td>
                  </tr>
                  <tr>
                    <td><span class="badge bg-label-warning me-1">UAT</span></td>

                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>4</strong></td>
                  </tr>
                  <tr>
                    <td><span class="badge bg-label-dark me-1">Training</span></td>

                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                  </tr>
                  <tr>
                    <td><span class="badge bg-label-success me-1">Handover</span></td>

                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
                  </tr>
                  <tr>
                    <td><span class="badge bg-label-danger me-1">On Hold</span></td>

                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>3</strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-4">
        <div class="card">
          <h4 class="card-header2">Leaves</h4>
          <div class="card-body">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card overflow-hidden mb-4" style="height: 200px">
          <h5 class="card-header2">Job Vacancy</h5>
          <div class="card-body" id="vertical-example5">
            <?php
            $mysql = "SELECT * FROM vacancy";
            $myquery = $dbh->prepare($mysql);
            $myquery->execute();
            while ($myresult = $myquery->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <div class="alert alert-dark" role="alert" style="text-align: center;"><b><?php echo $myresult["position"]; ?></b><br>This position has <?php echo $myresult["availibility"]; ?> places left!</div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>

      <div class="col-md-8 mb-2">
        <div class="card overflow-hidden mb-4" style="height: 200px">
          <h5 class="card-header2 text-warning">Motivation Quote</h5>
          <div class="card-body" id="vertical-example2">
            <?php
            $qSql = "SELECT * FROM quotes a LEFT JOIN employees b ON a.f_emp_id=b.f_emp_id WHERE a.f_delete='N' ORDER BY a.f_id DESC LIMIT 1";
            $qQuery = $dbh->prepare($qSql);
            $qQuery->execute();

            $qResult = $qQuery->fetch(PDO::FETCH_ASSOC);
            ?>
            <p><?php echo $qResult["f_quotes"]; ?></p>
            <p style="float: right;"><b><i><?php echo $qResult["f_first_name"] . ' ' . $qResult["f_last_name"]; ?></i></b></p>

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
              <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">CLOSE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <!-- / Content -->
  <!-- Footer -->
  <?php include_once("../menu/footer.php"); ?>

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
        events: "../controller/ajax/calendar_search/leaves.php"
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

        msg = "<div class='d-flex align-items-center  justify-content-center'>Hi, welcome to alphadash</div>";

        Swal.fire({
          html: msg,
          type: "success"
        })
      } else {
        console.log("ready!");
      }
      // })
    });

    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    const totalRevenueChartEl = document.querySelector('#sales_marketing_demand'),
      totalRevenueChartOptions = {
        series: <?php echo json_encode($sales_marketing); ?>,
        chart: {
          height: 300,
          stacked: true,
          type: 'bar',
          toolbar: {
            show: false
          }
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '33%',
            borderRadius: 12,
            startingShape: 'rounded',
            endingShape: 'rounded'
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
          width: 6,
          lineCap: 'round',
          colors: [cardColor]
        },
        legend: {
          show: true,
          horizontalAlign: 'left',
          position: 'top',
          markers: {
            height: 8,
            width: 8,
            radius: 12,
            offsetX: -3
          },
          labels: {
            colors: axisColor
          },
          itemMargin: {
            horizontal: 10
          }
        },
        grid: {
          borderColor: borderColor,
          padding: {
            top: 0,
            bottom: -8,
            left: 20,
            right: 20
          }
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          labels: {
            style: {
              fontSize: '13px',
              colors: axisColor
            }
          },
          axisTicks: {
            show: false
          },
          axisBorder: {
            show: false
          }
        },
        yaxis: {
          labels: {
            style: {
              fontSize: '13px',
              colors: axisColor
            }
          }
        },
        responsive: [{
            breakpoint: 1700,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '32%'
                }
              }
            }
          },
          {
            breakpoint: 1580,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '35%'
                }
              }
            }
          },
          {
            breakpoint: 1440,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '42%'
                }
              }
            }
          },
          {
            breakpoint: 1300,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '48%'
                }
              }
            }
          },
          {
            breakpoint: 1200,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '40%'
                }
              }
            }
          },
          {
            breakpoint: 1040,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 11,
                  columnWidth: '48%'
                }
              }
            }
          },
          {
            breakpoint: 991,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '30%'
                }
              }
            }
          },
          {
            breakpoint: 840,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '35%'
                }
              }
            }
          },
          {
            breakpoint: 768,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '28%'
                }
              }
            }
          },
          {
            breakpoint: 640,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '32%'
                }
              }
            }
          },
          {
            breakpoint: 576,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '37%'
                }
              }
            }
          },
          {
            breakpoint: 480,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '45%'
                }
              }
            }
          },
          {
            breakpoint: 420,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '52%'
                }
              }
            }
          },
          {
            breakpoint: 380,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: '60%'
                }
              }
            }
          }
        ],
        states: {
          hover: {
            filter: {
              type: 'none'
            }
          },
          active: {
            filter: {
              type: 'none'
            }
          }
        }
      };

    if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
      const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
      totalRevenueChart.render();
    }
  </script>