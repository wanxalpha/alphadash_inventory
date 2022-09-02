<?php
include 'layouts/menu.php';
include 'connection/config.php';

?>
<script>
  //  var element1 = document.getElementById("test11");
  // var element2 = document.getElementById("test21");
  // var element3 = document.getElementById("test31");
  // element2.classList.remove("active");
  // element3.classList.remove("active");
  // element1.classList.add("active");
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script
      src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
      integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
></script>

 <body>
  <div class="content-wrapper">
    <section class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-header2">DASHBOARD</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-header2">My Project</h5><hr>
                <div class="row">
                  <div class="col-lg-12"> <!-- 1st block -->
                    <div class="card card-primary">
                    </div>
                    <div class="card-body">
                    <?php
                      $sqlProject = "SELECT * FROM `sales_funnel` WHERE f_id_com='$idCom' AND status='ON-GOING'";
                      $resultProject = mysqli_query($connect, $sqlProject);
                      $numProject = mysqli_num_rows($resultProject);
                      if ($numProject > 0){
                        while($rowProject = mysqli_fetch_assoc($resultProject)){
                          $projectBil = $rowProject['id'];
                          $projectName = $rowProject['project_name'];
                          $projectStart = $rowProject['project_start'];
                          $projectDuration = $rowProject['project_due_date'];
                          $projectStatus = $rowProject['status'];
                          $projectProgress = $rowProject['project_progress'];
                    ?>
                      <div class="row"> <!-- First -->
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box shadow" style="height: 50px;">
                            <div class="info-box-content">
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">PROJECT</span><br>
                              <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectName?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-12">
                          <div class="info-box shadow" style="height: 50px;">
                            <div class="info-box-content">
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">DATE STARTED</span><br>
                              <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectStart?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-12">
                          <div class="info-box shadow" style="height: 50px;">
                            <div class="info-box-content">
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">DATE END</span><br>
                              <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectDuration?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-12">
                          <div class="info-box shadow" style="height: 50px;">
                            <div class="info-box-content">
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">PROGRESS</span><br>
                              <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectProgress?>%</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-12">
                          <div class="info-box shadow" style="height: 50px;">
                            <div class="info-box-content">
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">STATUS</span><br>
                              <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectStatus?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-1">
                        <a class="btn btn-warning btn-block" href="update.php?pr=<?php echo $projectBil?>">Update</a>
                        </div>
                      </div>
                         
                      <div class="row">
                        <div class="col-lg-12">
                          <div id="chart<?php echo $projectBil?>">
                          <?php
                          // $today = date('d-m-y h:i:s');
                          $today = date('Y-m-d');
                            $sqlGantt = "SELECT * FROM `gant_chart` WHERE project_id='$projectBil' and f_id_com='$idCom'";
                            $reGantt = mysqli_query($connect, $sqlGantt);
                            $numGantt = mysqli_num_rows($reGantt);
                            if ($numGantt > 0){
                              $rowGantt = mysqli_fetch_assoc($reGantt);
                              $ps1 = $rowGantt['pro_start_1'];
                              $ps2 = $rowGantt['pro_start_2'];
                              $dev1 = $rowGantt['pro_ip_1'];
                              $dev2 = $rowGantt['pro_ip_2'];
                              $uat1 = $rowGantt['pro_tro_1'];
                              $uat2 = $rowGantt['pro_tro_2'];
                              $train1 = $rowGantt['pro_uat_1'];
                              $train2 = $rowGantt['pro_uat_2'];
                              $com1 = $rowGantt['pro_com_1'];
                              $com2 = $rowGantt['pro_com_2'];
                              $pen1 = $rowGantt['pro_pen_1'];
                              $pen2 = $rowGantt['pro_pen_2'];
                              $sup1 = $rowGantt['pro_sup_1'];
                              $sup2 = $rowGantt['pro_sup_2'];
                            }else{
                              $ps1 = $today;
                              $ps2 = $today;
                              $dev1 = $today;
                              $dev2 = $today;
                              $uat1 = $today;
                              $uat2 = $today;
                              $train1 = $today;
                              $train2 = $today;
                              $com1 = $today;
                              $com2 = $today;
                              $pen1 = $today;
                              $pen2 = $today;
                              $sup1 = $today;
                              $sup2 = $today;
                            }
                          ?>
                          <script>
                            var options = {
                              series: [
                              {
                                data: [
                                {
                                  x: 'Project Start',
                                  y: [
                                    // new Date('2022-05-04').getTime(),
                                    // new Date('2022-05-08').getTime()

                                    new Date('<?php echo $ps1?>').getTime(),
                                    new Date('<?php echo $ps2?>').getTime()
                                  ],
                                  fillColor: '#8b008b'
                                },
                                {
                                  x: 'Development',
                                  y: [
                                    new Date('<?php echo $dev1?>').getTime(),
                                    new Date('<?php echo $dev2?>').getTime()
                                  ],
                                  fillColor: '#483d8b'
                                },
                                {
                                  x: 'Troubleshooting | UAT',
                                  y: [
                                    new Date('<?php echo $uat1?>').getTime(),
                                    new Date('<?php echo $uat2?>').getTime()
                                  ],
                                  fillColor: '#008000'
                                },
                                {
                                  x: 'Training',
                                  y: [
                                    new Date('<?php echo $train1?>').getTime(),
                                    new Date('<?php echo $train2?>').getTime()
                                  ],
                                  fillColor: '#0000ff'
                                },
                                {
                                  x: 'Completed | Golive',
                                  y: [
                                    new Date('<?php echo $com1?>').getTime(),
                                    new Date('<?php echo $com2?>').getTime()
                                  ],
                                  fillColor: '#9400d3'
                                },
                                {
                                  x: 'Pending',
                                  y: [
                                    new Date('<?php echo $pen1?>').getTime(),
                                    new Date('<?php echo $pen2?>').getTime()
                                  ],
                                  fillColor: '#dc143c'
                                },
                                {
                                  x: 'Support | Maintenance',
                                  y: [
                                    new Date('<?php echo $sup1?>').getTime(),
                                    new Date('<?php echo $sup2?>').getTime()
                                  ],
                                  fillColor: '#faa460'
                                }
                              ]
                            }
                          ],
                          chart: {
                            height: 350,
                            type: 'rangeBar',
                            events: {
                              // dataPointSelection: function(event, chartContext, config){

                              //   // alert(config);
                                
                              // },
                    click: function(event, chartContext, config) {
                      const dp = config.dataPointIndex;
                      let trys = config.dataPointSelection;
                      let yy = chartContext.data.twoDSeriesX[dp];
              alert(yy)
          // alert(opts.w.config.series[opts.seriesIndex] + ' ' + opts.w.config.labels[opts.seriesIndex])

        // alert(config.config.series[config.seriesIndex].name)
        // alert(config.config.series[config.seriesIndex].data[config.dataPointIndex])
                    // alert(config.config.xaxis.categories[config.dataPointIndex])
                    //  alert(opts.w.config.xaxis.categories[opts.dataPointIndex])
                    // switch(opts.w.config.xaxis.categories[opts.dataPointIndex]) {
                    //       case 'Marco':
                    //         alert("marco")
                    //           // window.open("https://simpleisbestt.herokuapp.com/");
                    //       case 'Alphadash':
                    //         alert("Alphadash")
                    //           // window.open("https://google.com/");
                    //       case 'March':
                    //         alert("March")
                    //           // window.open("https://yahoo.com/");
                    //   }
                    // The last parameter config contains additional information like `seriesIndex` and `dataPointIndex` for cartesian charts
      },
    }
                          },
                          plotOptions: {
                            bar: {
                              horizontal: true,
                              distributed: true,
                              dataLabels: {
                                hideOverflowingLabels: false
                              }
                            }
                          },
                          dataLabels: {
                            enabled: true,
                            formatter: function(val, opts) {
                              var label = opts.w.globals.labels[opts.dataPointIndex]
                              var a = moment(val[0])
                              var b = moment(val[1])
                              var diff = b.diff(a, 'days')
                              return label + ': ' + diff + (diff > 1 ? ' days' : ' day')
                            },
                            style: {
                              colors: ['#f3f4f5', '#fff']
                            }
                          },
                          xaxis: {
                            type: 'datetime'
                          },
                          yaxis: {
                            show: false
                          },
                          grid: {
                            row: {
                              colors: ['#f3f4f5', '#fff'],
                              opacity: 1
                            }
                          }
                          };

                              var chart = new ApexCharts(document.querySelector("#chart<?php echo $projectBil?>"), options);
                              chart.render();

                              
                          </script>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div id="task<?php echo $projectBil?>">
                          <?php
                            $jobArr = array();
                            // array_push($jobArr, array("ahahaha", 123));
                            $sqlPro = "SELECT * FROM `job_task` WHERE PROJECT_ID='$projectBil' and f_id_com='$idCom'";
                            $rePro = mysqli_query($connect, $sqlPro);
                            $numPro = mysqli_num_rows($rePro);
                            if ($numPro > 0){
                              while ($rowPro = mysqli_fetch_assoc($rePro)){
                              $proStatus = $rowPro['PROJECT_STATUS'];
                              $jobTask = $rowPro['JOB_TASK'];

                              // array_push(array ($jobArr),)
                              array_push($jobArr,array("$jobTask", $proStatus));
                              }
                            }

                            $countArr = count($jobArr);
                          ?>
                          <script>
                            var options = {
                                    series: [{
                                    name: 'Completed',
                                    data: [44, 55, 41, 37, 22, 43, 21]
                                  }, {
                                    name: 'In Progress',
                                    data: [53, 32, 33, 52, 13, 43, 32]
                                  }, 
                             
                                ],
                                    chart: {
                                    type: 'bar',
                                    height: 350,
                                    stacked: true,
                                    stackType: '100%'
                                  },
                                  plotOptions: {
                                    bar: {
                                      horizontal: true,
                                    },
                                  },
                                  stroke: {
                                    width: 1,
                                    colors: ['#fff']
                                  },
                                  title: {
                                    text: 'Task Job Progress'
                                  },
                                  xaxis: {
                                    categories: ['task 1', 'task 2', 'task 3', 'task 4', 'task 5', 'task 6', 'task 7'],
                                  },
                                  tooltip: {
                                    y: {
                                      formatter: function (val) {
                                        return val + "K"
                                      }
                                    }
                                  },
                                  fill: {
                                    opacity: 1
                                  
                                  },
                                  legend: {
                                    position: 'top',
                                    horizontalAlign: 'left',
                                    offsetX: 40
                                  }
                                  };

                                  var chart = new ApexCharts(document.querySelector("#task<?php echo $projectBil?>"), options);
                                  chart.render();
                          </script>
                          </div>
                        </div>
                      </div><hr>
                    <?php
                        }
                      }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h1>tarikh <?php print_r($jobArr) ?></h1>
        <h1>count <?php print_r($countArr) ?></h1>
        $countArr
      </div>
    </section>
  </div>
</body>
<?php
include_once("footer.php");
?>



<div class="card-header">
                          <!-- <div class="row">
                            <div class="col-lg-1">
                              <h6>FILTER  <i class="fa fa-filter"></i></h6>
                            </div>
                            <div class="col-lg-2.5">
                              <input class="form-control select2" type="date" placeholder="PROJECT DATE" style="font-size: 15px;width:fit-content;height:38px">
                            </div>&nbsp;&nbsp;
                            <div class="col-lg-2;5">
                            <select class="form-control select2" style="width: 100%;font-size:13px;" aria-placeholder="PRIORITY">
                                <option value="">HIGH</option>
                                <option value="">MODERATE</option>
                                <option value="">LOW</option>
                              </select>
                            </div>
                            <div class="col-lg-4">
                              <select class="form-control select2" style="width: 100%;font-size:13px;" aria-placeholder="8 PILLAR">
                              <option selected="selected">--SELECT PROJECT--</option>
                            <?php
                              //include "connection/config.php";

                              // $sqlPillar = "SELECT * FROM project_pillar";
                              // $resultPillar = mysqli_query($connect, $sqlPillar);
                              // $numPillar = mysqli_num_rows($resultPillar);
                              // if ($numPillar > 0){
                              //   while ($rowPillar = mysqli_fetch_assoc($resultPillar)){
                              //     $pillar = $rowPillar['project_pillar'];
                            ?>
                              <option value="<?php //echo $pillar?>"><?php //echo $pillar?></option>
                               <?php
                              //   }
                              // }
                                ?>

                            </select>
                            </div>
                            <div class="col-lg-2">
                              <div class="card-tools">
                                <input type="button" class="btn btn-success" value="SEARCH">
                              </div>
                            </div>
                          </div> -->