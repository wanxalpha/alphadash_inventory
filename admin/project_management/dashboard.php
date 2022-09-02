<?php

use function GuzzleHttp\Promise\each;


// include 'layouts/menu.php';
include_once("../menu/menu-dash-a.php");
include 'connection/config.php';

// require_once(session_start());


?>

<body>

  <!-- <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> -->
  <!-- <script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
  <!-- <script src="./plugins/jszip/jszip.min.js"></script>
 <script src="./plugins/pdfmake/pdfmake.min.js"></script>
 <script src="./plugins/pdfmake/vfs_fonts.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <script src="./dist/js/adminlte.min.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h4 class="card-header2" style="text-align: left;">DASHBOARD</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <input type="hidden" value="<?php echo $idCom ?>" id="iddCom">

    <!-- Main content -->
    <section class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-header2">NEW PROJECT</h5>
                <table id="newProject" class="table table-bordered table-striped">
                  <thead>
                    <th>NO.</td>
                    <th>PROJECT NAME</th>
                    <th>PROJECT PILLAR</th>
                    <th>PROJECT DATE</th>
                    <th>PROJECT STATUS</th>
                    <th>VALUE (RM)</th>
                    <th>ACTION</th>
                  </thead>
                  <tbody>
                    <?php
                    $billa = 1;
                    $sqlProject = "SELECT * FROM sales_funnel WHERE status='2' AND assign_task IS NULL ORDER BY id DESC";
                    $resultProject = mysqli_query($connect, $sqlProject);
                    $numProject = mysqli_num_rows($resultProject);
                    if ($numProject > 0) {
                      while ($rowProject = mysqli_fetch_assoc($resultProject)) {
                        $theTotal = "";
                        $projectBil = $rowProject['id'];
                        $projectStatus = $rowProject['status'];
                        $projectDate = $rowProject['project_receive_date'];
                        $projectName = $rowProject['project_name'];
                        $projectPillar = $rowProject['project_pillar'];
                        $projectValue = $rowProject['value'];

                        if ($projectStatus == "2") {
                          $projectStatus = "Closed Deal";
                        }
                        $theTotal;
                        // $projectPillarz = array($projectPillar);
                        // $projectPillarz = explode(',', $projectPillar);
                        // $test = $projectPillarz['0'];
                        $str_arrzx = preg_split("/\,/", $projectPillar);
                        foreach ($str_arrzx as $sellsdzx) {

                          // $pilla = str_replace('A','ALPHADASH',$pilla);
                          $sellsdzx = str_replace('[', '', $sellsdzx);
                          $sellsdzx = str_replace(']', '', $sellsdzx);
                          $sellsdzx = str_replace('"', '', $sellsdzx);
                          $sellsdzx = str_replace('"', '', $sellsdzx);
                          $sellsdzx = str_replace(',', '', $sellsdzx);

                          $sqlCheckP = "SELECT * FROM project_pillar WHERE project_code='$sellsdzx'";
                          $resCheck = mysqli_query($connect, $sqlCheckP);
                          $numCheck = mysqli_num_rows($resCheck);
                          if ($numCheck > 0) {
                            $rowCheck = mysqli_fetch_assoc($resCheck);
                            $theTotal .= $rowCheck['project_pillar'] . ",";
                          }
                        }

                        // $projectPillar = str_replace('"A"','ALPHADASH',$projectPillar);
                        // $projectPillar = str_replace('"W"','WEB BUILDER',$projectPillar);
                        // $projectPillar = str_replace('"M"','MOBILE APPS DEVELOPMENT',$projectPillar);
                        // $projectPillar = str_replace('"SC"','SOFTWARE CUSTOMIZATION',$projectPillar);
                        // $projectPillar = str_replace('"BD"','BIG DATA ANALYTICS',$projectPillar);
                        // $projectPillar = str_replace('"AI"','ARTIFICIAL INTELLEGENCE',$projectPillar);
                        // $projectPillar = str_replace('"DM"','DIGITAL MARKETING AND BRANDING',$projectPillar);
                        // $projectPillar = str_replace('"TE"','TECHNICAL ENGINEERING OUTSOURCING',$projectPillar);
                        // $projectPillar = str_replace('"VAS"','VALUE ADDED SERVICES',$projectPillar);
                        // $projectPillar = str_replace('","',', ',$projectPillar);
                        // $theTotal = $projectPillar;
                    ?>
                        <tr>
                          <td><?php echo $billa ?></td>
                          <td><?php echo $projectName ?></td>
                          <td><?php echo $theTotal ?></td>
                          <td><?php echo $projectDate ?></td>
                          <td style="color: #98FB98;">Successful</td>
                          <td><?php echo $projectValue ?></td>
                          <td><a type="button" href="new.php?pr=<?php echo $projectBil ?>" id="projectAssign" name="projectAssign" class="btn btn-success btn-block">Assign Project</a></td>
                        </tr>
                    <?php
                        $billa++;
                      }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>NO.</th>
                      <th>PROJECT NAME</th>
                      <th>PROJECT PILLAR</th>
                      <th>PROJECT DATE</th>
                      <th>PROJECT STATUS</th>
                      <th>VALUE (RM)</th>
                      <th>ACTION</th>
                    </tr>
                  </tfoot>
                </table>
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
                <h5 class="card-header2">ON GOING PROJECT</h5>
                <table id="onGoing" class="table table-bordered table-striped">
                  <thead>
                    <th>NO.</td>
                    <th>PROJECT NAME</th>
                    <th>PROJECT PILLAR</th>
                    <th>PROJECT DATE</th>
                    <th>PROJECT STATUS</th>
                    <th>VALUE (RM)</th>
                    <th>ACTION</th>
                    <!-- </tr> -->
                  </thead>
                  <tbody>
                    <?php
                    $billaz = 1;

                    $sqlProjectz = "SELECT * FROM sales_funnel WHERE status='ON-GOING' ORDER BY id DESC";
                    $resultProjectz = mysqli_query($connect, $sqlProjectz);
                    $numProjectz = mysqli_num_rows($resultProjectz);
                    if ($numProjectz > 0) {
                      while ($rowProjectz = mysqli_fetch_assoc($resultProjectz)) {
                        $theTotalz = "";
                        $theTotalzz = "";
                        $projectBilz = $rowProjectz['id'];
                        $projectStatusz = $rowProjectz['status'];
                        $projectDatez = $rowProjectz['project_receive_date'];
                        $projectNamez = $rowProjectz['project_name'];
                        $projectPillarz = $rowProjectz['project_pillar'];
                        $projectValuez = $rowProjectz['value'];

                        $str_arrz = preg_split("/\,/", $projectPillarz);
                        foreach ($str_arrz as $sellsdz) {
                          // $theTotalzz .= $sellsdz;

                          $sellsdz = str_replace('[', '', $sellsdz);
                          $sellsdz = str_replace(']', '', $sellsdz);
                          $sellsdz = str_replace('"', '', $sellsdz);
                          $sellsdz = str_replace('"', '', $sellsdz);
                          $sellsdz = str_replace(',', '', $sellsdz);
                          // $theTotalzz .= $sellsdz;

                          $sqlCheckPz = "SELECT * FROM `project_pillar` WHERE project_code='$sellsdz'";
                          $resCheckz = mysqli_query($connect, $sqlCheckPz);
                          $numCheckz = mysqli_num_rows($resCheckz);
                          if ($numCheckz > 0) {
                            $rowCheckz = mysqli_fetch_assoc($resCheckz);
                            $theTotalz .= $rowCheckz['project_pillar'] . ",";
                          }
                        }
                    ?>
                        <tr>
                          <td><?php echo $billaz ?></td>
                          <td><?php echo $projectNamez ?></td>
                          <td><?php echo $theTotalz ?></td>
                          <td><?php echo $projectDatez ?></td>
                          <td><?php echo $projectStatusz ?></td>
                          <td><?php echo $projectValuez ?></td>
                          <td><a type="button" href="detail.php?pn=<?php echo $projectBilz ?>" id="projectAssign" name="projectAssign" class="btn btn-success btn-block">Detail Project</a></td>
                        </tr>
                    <?php
                        $billaz++;
                      }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>NO.</td>
                      <th>PROJECT NAME</th>
                      <th>PROJECT PILLAR</th>
                      <th>PROJECT DATE</th>
                      <th>PROJECT STATUS</th>
                      <th>VALUE (RM)</th>
                      <th>ACTION</th>
                    </tr>
                  </tfoot>
                </table>
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
                <h5 class="card-header2">PROJECT SUMMARY</h5>
                <hr>
                <div class="row">
                  <div class="col-lg-2">
                    <h6 class="card-header2">Project</h6>
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">-Choose Status-</option>
                      <option value="0">COMPLETED</option>
                      <option value="1">ON-GOING</option>
                      <option value="2">ALL</option>
                    </select>
                  </div>&nbsp;&nbsp;
                  <div class="col-lg-3">
                    <select class="form-control select2" style="width: 100%;">
                      <!-- <option selected="selected">-by-</option> -->
                      <option value="0">DAY</option>
                      <option value="1">WEEK</option>
                      <option value="2">MONTH</option>
                      <option selected="selected" value="3">YEAR</option>
                    </select>
                  </div>&nbsp;&nbsp;
                </div>
                <hr>
                <div class="card-body">
                  <?php
                  $sqlGet = "SELECT * FROM project_pillar WHERE f_id_com='$idCom'";
                  $resultGet = mysqli_query($connect, $sqlGet);
                  $numGet = mysqli_num_rows($resultGet);
                  if ($numGet > 0) {
                    while ($rowGet = mysqli_fetch_assoc($resultGet)) {
                      $namePillar = $rowGet['project_pillar'];
                      $nameCode = $rowGet['project_code'];
                      $nameBil = $rowGet['BIL'];

                      $sqlPro = "SELECT * FROM sales_funnel WHERE f_id_com='$idCom'";
                      $resultPro = mysqli_query($connect, $sqlPro);
                      $numPro = mysqli_num_rows($resultPro);
                      if ($numPro > 0) {
                        while ($rowPro = mysqli_fetch_assoc($resultPro)) {
                          $pillxx = $rowPro['project_pillar'];
                          $projectDetaolName = $rowPro['project_name'];
                          $projectDetaolId = $rowPro['id'];
                          // $pillid = $rowPro['id'];

                          $str_propil = preg_split("/\,/", $pillxx);
                          foreach ($str_propil as $propil) {

                            $propil = str_replace('[', '', $propil);
                            $propil = str_replace(']', '', $propil);
                            $propil = str_replace('"', '', $propil);
                            $propil = str_replace('"', '', $propil);
                            $propil = str_replace(',', '', $propil);
                            // $theTotalzz .= $sellsdz;
                            if ($propil == $nameCode) {
                              // $sqlProx = "SELECT * FROM sales_funnel WHERE f_id_com='$idCom' AND id='$pillid'";
                              // $resultProx = mysqli_query($connect, $sqlProx);
                              // $numProx= mysqli_num_rows($resultProx);
                              // if ($numProx > 0){

                              // }

                              $pillid = $rowPro['id'];
                              $harga = $rowPro['value'];
                              $pillid = $rowPro['id'];
                              $pillid = $rowPro['id'];
                            }
                          }
                        }
                      }
                  ?>
                      <div class="row">
                        <div class="col-lg-2"><br>
                          <label for="myChartb"><?php echo $namePillar ?></label>
                          <input type="hidden" value="<?php echo $nameCode ?>" id="code<?php echo $nameBil ?>">
                        </div>
                        <div class="col-lg-7">
                          <!-- <canvas id="myCharta" width="500" height="300"> -->
                          <div id="chart<?php echo $nameBil ?>">
                            <script>
                              var options = {
                                series: [{
                                  name: 'Date Line (day)',
                                  type: 'column',
                                  data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
                                }, {
                                  name: 'Value (RM)',
                                  type: 'area',
                                  data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
                                }, {
                                  name: 'Team',
                                  type: 'line',
                                  data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
                                }],
                                chart: {
                                  height: 350,
                                  type: 'line',
                                  stacked: false,
                                  events: {
                                    // dataPointSelection: function(event, chartContext, opts) {
                                    //     switch(opts.w.config.xaxis.categories[opts.dataPointIndex]) {
                                    //         case 'Marco':
                                    //           alert("marco")
                                    //             // window.open("https://simpleisbestt.herokuapp.com/");
                                    //         case 'Alphadash':
                                    //           alert("Alphadash")
                                    //             // window.open("https://google.com/");
                                    //         case 'March':
                                    //           alert("March")
                                    //             // window.open("https://yahoo.com/");
                                    //     }
                                    // },
                                    dataPointSelection: function(event, chartContext, config) {
                                      // console.log(config);
                                      // var ix = config.dataPointIndex;

                                      // alert(config.w.config.labels[config.dataPointIndex])

                                    },
                                    click: function(event, chartContext, config) {
                                      const dp = config.dataPointIndex;
                                      let trys = config.dataPointSelection;
                                      let yy = chartContext.data.twoDSeriesX[dp];


                                      // alert(trys)
                                      alert(config.config.series[config.seriesIndex].name)
                                      alert(config.config.series[config.seriesIndex].data[config.dataPointIndex])
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
                                stroke: {
                                  width: [0, 2, 5],
                                  curve: 'smooth'
                                },
                                plotOptions: {
                                  bar: {
                                    columnWidth: '50%'
                                  }
                                },

                                fill: {
                                  opacity: [0.85, 0.25, 1],
                                  gradient: {
                                    inverseColors: false,
                                    shade: 'light',
                                    type: "vertical",
                                    opacityFrom: 0.85,
                                    opacityTo: 0.55,
                                    stops: [0, 100, 100, 100]
                                  }
                                },
                                labels: ['Marco', 'Alphadash', 'project', 'project 1', 'project 2', 'project 3', 'project 4',
                                  'project 5', 'project 6', 'project 7', 'project 8', 'project 9'
                                ],
                                markers: {
                                  size: 0
                                },
                                xaxis: {

                                  // type: 'datetime'
                                  // type: 'labels'
                                  type: 'categories'
                                },
                                yaxis: {
                                  title: {
                                    text: 'Value',
                                  },
                                  min: 0
                                },
                                tooltip: {
                                  shared: true,
                                  intersect: false,
                                  y: {
                                    formatter: function(y) {
                                      if (typeof y !== "undefined") {
                                        // return y.toFixed(0) + " value";
                                        return y.toFixed(0) + "";
                                      }
                                      return y;

                                    }
                                  }
                                }
                              };

                              var chart = new ApexCharts(document.querySelector("#chart<?php echo $nameBil ?>"), options);
                              chart.render();
                            </script>

                          </div>
                        </div>
                        <div class="col-lg-3"><br>
                          <input type="button" class="btn btn-primary" onclick="location.href='pdetail.php?pn=<?php echo $projectDetaolId ?>'" value="<?php echo $projectDetaolName ?>">
                        </div>
                      </div>
                      <hr>
                      <!-- <button class="btn mt-3">Login</button> -->
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
    </section>
  </div>
</body>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php
include_once("footer.php");
?>

<script>
  $(function() {
    $("#newProject").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#newProject_wrapper .col-md-6:eq(0)');
    $("#onGoing").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#contact_wrapper .col-md-6:eq(0)');
    // $('#contact1').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>