<?php
// include 'header.php';
//include 'layouts/menu.php';
include_once("../menu/menu-dash-a.php");
include 'connection/config.php';
?>
<script>
  // var element1 = document.getElementById("test1");
  // var element2 = document.getElementById("test2");
  // var element3 = document.getElementById("test3");
  // var element4 = document.getElementById("test4");
  // element1.classList.remove("active");
  // element3.classList.remove("active");
  // element4.classList.remove("active");
  // element2.classList.add("active");
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Content Wrapper. Contains page content -->
<style>
  .vl {
    border-left: 6px solid white;
  }

  .box {
    position: left;
    height: 20px;
    width: 20px;
    left: 20%;
    border-radius: 25px;
  }

  .hg {
    position: absolute;
    left: 40%;
  }
</style>

<body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
          </div>
          <!-- <div class="col-sm-5">
              <ol class="breadcrumb float-sm-right">
                <label for="" style="color:red;font-size:20px;">Alphacore</label>&nbsp;
                <label for="" style="color:black;font-size:20px;">Technology</label>
              </ol>
            </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <!-- <h5 class="card-header2">ON GOING PROJECT</h5> -->
                <div class="row">
                  <div class="col-lg-1">
                    <h6>FILTER</h6>
                  </div>
                  <div class="col-lg-3">
                    <input type="text" class="form-control select2" placeholder="PROJECT NAME" style="font-size: 12px;width:fit-content;height:38px">
                  </div>
                  <div class="col-lg-3">
                    <input type="text" class="form-control select2" placeholder="PROJECT LEADER" style="font-size: 12px;width:fit-content;height:38px">
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control select2" style="width: 100%;font-size:12px;" aria-placeholder="8 PILLAR">
                      <option selected="selected">--SELECT PROJECT--</option>
                      <?php
                      include 'connection/config.php'; 

                      $sqlPillar = "SELECT * FROM project_pillar WHERE f_id_com='$idCom'";
                      $resultPillar = mysqli_query($connect, $sqlPillar);
                      $numPillar = mysqli_num_rows($resultPillar);
                      if ($numPillar > 0) {
                        while ($rowPillar = mysqli_fetch_assoc($resultPillar)) {
                          $pillar = $rowPillar['project_pillar'];
                      ?>
                          <option value=""><?php echo $pillar ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <div class="card-tools">
                      <input style="font-size: 14px;" type="button" class="btn btn-success btn-sm" value="SEARCH">
                    </div>
                  </div>
                </div>
                <hr>
                <div class="card-body">
                  <?php
                  include 'connection/config.php';
                  
                  $sqlProject = "SELECT * FROM sales_funnel WHERE status='ON-GOING'";
                  $resultProject = mysqli_query($connect, $sqlProject);
                  // $resultProject = $connect->query($sqlProject);
                  $numProject = mysqli_num_rows($resultProject);
                  if ($numProject > 0) {
                    while ($rowProject = mysqli_fetch_assoc($resultProject)) {
                      $projectManager = $rowProject['project_manager'];
                      $id = $rowProject['id'];
                      $projectStart = $rowProject['project_start'];
                      $projectDue = $rowProject['project_due_date'];
                      $projectName = $rowProject['project_name'];
                      $picTeam = $rowProject['pic_name'];
                      $projectTeam = $rowProject['project_team'];
                  ?>
                      <div class="row">
                        <!-- First -->
                        <!-- <div class="row"> -->
                        <div class="col-lg-1">
                          <img src="vendors/profile/Profile.png" alt="profile" class="brand-image elevation-3" style="border-radius: 8px;width: 55px;height: 55px; border: 1px solid #ddd;">
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box shadow">
                            <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                            <div class="info-box-content">
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">PROJECT MANAGER: <?php echo $projectManager ?></span>
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">PROJECT: <?php echo $projectName ?></span>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box shadow">
                            <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                            <div class="info-box-content">
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">RECEIVE: <?php echo $projectStart ?></span>
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">DATE LINE: <?php echo $projectDue ?></span>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box shadow">
                            <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                            <div class="info-box-content">
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">PIC: <?php echo $picTeam ?></span>
                              <span class="info-box-text" style="color: #0000FF;font-size:14px">TEAM: <?php echo $projectTeam ?></span>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-1">
                          <!-- <p3 style="color:blue;font-weight:bold;">ACTION</p3><br> -->
                          <a class="btn btn-warning" href="detail.php?pn=<?php echo $id; ?>">Project Details</a>
                          <!-- <input type="button" class="btn btn-warning" value="Project Details" href="detail.php?pn=<?php echo $id; ?>"> -->
                          <!-- <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                  <i class='fas fa-braille' style='font-size:30px;color:#696969'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                  <a class="dropdown-item" href="detail.php?pn=<?php echo $id; ?>"><i class="fas fa-server"></i> PROJECT DETAILS</a>
                                </div>
                              </div> -->
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div id="chart<?php echo $id ?>">
                            <?php
                            $sqlGantt = "SELECT * FROM gant_chart WHERE project_id='$id' AND f_id_com='$idCom'";
                            $resultGantt = mysqli_query($connect, $sqlGantt);
                            $numGantt = mysqli_num_rows($resultGantt);
                            if ($numGantt > 0) {
                              while ($rowGantt = mysqli_fetch_assoc($resultGantt)) {
                                $proCat = $rowGantt['project_category'];
                                $proSta = $rowGantt['start_date'];
                                $proEnd = $rowGantt['end_date'];

                                $proStartStart = $rowGantt['pro_start_1'];
                                $proStartEnd = $rowGantt['pro_start_2'];

                                $proipStart = $rowGantt['pro_ip_1'];
                                $proiptEnd = $rowGantt['pro_ip_2'];

                                $proTrotStart = $rowGantt['pro_tro_1'];
                                $proTroEnd = $rowGantt['pro_tro_2'];

                                $proUatStart = $rowGantt['pro_uat_1'];
                                $proUatEnd = $rowGantt['pro_uat_2'];

                                $proComStart = $rowGantt['pro_com_1'];
                                $proComEnd = $rowGantt['pro_com_2'];

                                $proPenStart = $rowGantt['pro_pen_1'];
                                $proPenEnd = $rowGantt['pro_pen_2'];

                                $proSupStart = $rowGantt['pro_sup_1'];
                                $proSupEnd = $rowGantt['pro_sup_2'];

                                if ($proCat == "" || $proCat == null) {
                                  $proCat = "";
                                }
                                if ($proStartStart == "" || $proStartStart == null) {
                                  $proStartStart = 0;
                                }
                                if ($proStartEnd == "" || $proStartEnd == null) {
                                  $proStartEnd = 0;
                                }

                                if ($proipStart == "" || $proipStart == null) {
                                  $proipStart = 0;
                                }
                                if ($proiptEnd == "" || $proiptEnd == null) {
                                  $proiptEnd = 0;
                                }

                                if ($proTrotStart == "" || $proTrotStart == null) {
                                  $proTrotStart = 0;
                                }
                                if ($proTroEnd == "" || $proTroEnd == null) {
                                  $proTroEnd = 0;
                                }

                                if ($proUatStart == "" || $proUatStart == null) {
                                  $proUatStart = 0;
                                }
                                if ($proUatEnd == "" || $proUatEnd == null) {
                                  $proUatEnd = 0;
                                }

                                if ($proComStart == "" || $proComStart == null) {
                                  $proComStart = 0;
                                }
                                if ($proComEnd == "" || $proComEnd == null) {
                                  $proComEnd = 0;
                                }

                                if ($proPenStart == "" || $proPenStart == null) {
                                  $proPenStart = 0;
                                }
                                if ($proPenEnd == "" || $proPenEnd == null) {
                                  $proPenEnd = 0;
                                }

                                if ($proSupStart == "" || $proSupStart == null) {
                                  $proSupStart = 0;
                                }
                                if ($proSupEnd == "" || $proSupEnd == null) {
                                  $proSupEnd = 0;
                                }
                            ?>
                                <script>
                                  var options = {
                                    series: [{
                                      data: [

                                        {
                                          x: 'Project Start',
                                          y: [
                                            new Date('<?php echo $proStartStart ?>').getTime(),
                                            new Date('<?php echo $proStartEnd ?>').getTime(),
                                          ],
                                          fillColor: '#8b008b'
                                        },

                                        {
                                          x: 'Development',
                                          y: [
                                            new Date('<?php echo $proipStart ?>').getTime(),
                                            new Date('<?php echo $proiptEnd ?>').getTime()
                                          ],
                                          fillColor: '#483d8b'
                                        },
                                        {
                                          x: 'Troubleshooting | Testing',
                                          y: [
                                            new Date('<?php echo $proTrotStart ?>').getTime(),
                                            new Date('<?php echo $proTroEnd ?>').getTime()
                                          ],
                                          fillColor: '#008000'
                                        },
                                        {
                                          x: '"UAT | Training',
                                          y: [
                                            new Date('<?php echo $proUatStart ?>').getTime(),
                                            new Date('<?php echo $proUatEnd ?>').getTime()
                                          ],
                                          fillColor: '#0000ff'
                                        },
                                        {
                                          x: 'Completed | Golive',
                                          y: [
                                            new Date('<?php echo $proComStart ?>').getTime(),
                                            new Date('<?php echo $proComEnd ?>').getTime()
                                          ],
                                          fillColor: '#9400d3'
                                        },
                                        {
                                          x: 'Pending',
                                          y: [
                                            new Date('<?php echo $proPenStart ?>').getTime(),
                                            new Date('<?php echo $proPenEnd ?>').getTime()
                                          ],
                                          fillColor: '#dc143c'
                                        },
                                        {
                                          x: 'Support | Maintenance',
                                          y: [
                                            new Date('<?php echo $proSupStart ?>').getTime(),
                                            new Date('<?php echo $proSupEnd ?>').getTime()
                                          ],
                                          fillColor: '#faa460'
                                        }
                                      ]
                                    }],
                                    chart: {
                                      height: 350,
                                      type: 'rangeBar'
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

                                  var chart = new ApexCharts(document.querySelector("#chart<?php echo $id ?>"), options);
                                  chart.render();
                                </script>
                          </div>
                          <!-- <label for="">dddd <?php echo $proSta ?></label> -->
                        </div>
                      </div>
                      <hr>
              <?php
                              }
                            } else {
                              $proCat = "";
                              $proSta = 0;
                              $proEnd = 0;
                            }
                          }
                        }
              ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
<?php
include_once("footer.php");
?>