<?php
include 'header.php';
// include 'menu-dash-a.php';
include 'menu.php';
include 'connection/config.php';
?>
<script>
   var element1 = document.getElementById("test11");
  // var element2 = document.getElementById("test21");
  var element3 = document.getElementById("test31");
  // element2.classList.remove("active");
  element1.classList.remove("active");
  element3.classList.add("active");
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- Content Wrapper. Contains page content -->
 <style>
     
   .vl {
  border-left: 6px solid white;
  /* height: 500px; */
}
   .box{  
  /* background-color: rgb(139,0,139);  */
  position: left; 
  height:20px; 
  width: 20px; 
  left: 20%; 
  border-radius: 25px;
  /* top: 20%;
  right: 20px; */
} 
.hg{  
  /* background-color: rgb(139,0,139);  */
  position: absolute; 
  /* height:30px; 
  width: 30px;  */
  left: 40%; 
  /* top: 20%; */
  /* right: 20px; */
}
 </style>
 <body>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
              <h6 style="font-weight: bold;">PROJECT COMPLETED</h6>
          <!-- <h6>SHOW <input type="number" value="6" style="width:40px"> ENTREIS </h6> -->
          </div><div class="col-sm-3">
            
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
                <label for="" style="color:red;font-size:20px;">Alphacore</label>&nbsp;
                <label for="" style="color:black;font-size:20px;">Technology</label>
              <!-- <li class="breadcrumb-item"><a style="color:red;" href="#">Alphacore</a></li> -->
              <!-- <li class="breadcrumb-item active">Technology</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
         
        <!-- SELECT2 EXAMPLE -->
            <div class="row">
                <div class="col-lg-12"> <!-- 1st block -->
                    <div class="card card-primary">
                        <div class="card-header">
                          <div class="row">
                            <div class="col-lg-1">
                              <h6>FILTER  <i class="fa fa-filter"></i></h6>
                            </div>
                            <div class="col-lg-3">
                              <input class="form-control select2" type="date" placeholder="PROJECT DATE" style="font-size: 15px;width:100%;height:38px">
                            </div>
                            <div class="col-lg-2">
                            <!-- <input type="text" placeholder="PRIORITY" style="font-size: 15px;width:fit-content;height:38px"> -->
                            <select class="form-control select2" style="width: 100%;font-size:13px;" aria-placeholder="8 PILLAR">
                              <option selected="selected">--PRIORITY--</option>
                              <option>HIGH</option>
                              <option>MEDIUM</option>
                              <option>LOW</option>
                            </select>
                            </div>
                            <div class="col-lg-4">
                            <select class="form-control select2" style="width: 100%;font-size:13px;" aria-placeholder="8 PILLAR">
                              <option selected="selected">--CHOOSE PROJECT--</option>
                                 <!-- <option selected="selected">WEB DEVELOPMENT</option> -->
                                <?php
                                    $sqlThePillar = "SELECT * FROM `project_pillar`";
                                    $resultPillar = mysqli_query($connect, $sqlThePillar);
                                    // $resultPillar = $connect->query($sqlThePillar);
                                    $numPillar = mysqli_num_rows($resultPillar);

                                    if ($numPillar > 0){
                                        while($rowPillar = mysqli_fetch_assoc($resultPillar)){
                                ?>
                                    <option><?php echo $rowPillar['project_pillar'];?></option>
                                <?php
                                        }
                                    }
                                            // $connect -> close();
                                ?>
                              <!-- <option>SOFTWARE CUSTOMIZATION</option>
                              <option>WEB BUILDER</option>
                              <option>MOBILE APPS DEV</option>
                              <option>BIG DATA</option>
                              <option>ARTIFICIAL INTELIGENCE</option>
                              <option>ENGINEERING OUTSOURCING</option>
                              <option>VALUE ADD SERVICE</option> -->
                            </select>
                            </div>
                            <div class="col-lg-2">
                              <div class="card-tools">
                                <input type="button" class="btn btn-success" value="SEARCH">
                                <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button> -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <?php
                          $sqlProject = "SELECT * FROM `project_assign` WHERE project_assign='$theName' AND project_status='COMPLETE'";
                          $resultProject = mysqli_query($connect, $sqlProject);
                           // $resultPillar = $connect->query($sqlThePillar);
                            $numProject = mysqli_num_rows($resultProject);

                            if ($numProject > 0){
                              while($rowProject = mysqli_fetch_assoc($resultProject)){

                                $projectBil = $rowProject['BIL'];
                                $projectName = $rowProject['project_name'];
                                $projectStart = $rowProject['project_start'];
                                $projectDuration = $rowProject['project_duration'];
                                $projectStatus = $rowProject['project_status'];
                                ?>
                          <div class="row"> <!-- First -->
                          <div class="col-md-3 col-sm-6 col-12">
                              <div class="info-box shadow">
                                <div class="info-box-content">
                                  <span class="info-box-text" style="color: #0000FF;font-size:14px">PROJECT</span>
                                  <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectName?></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                              <div class="info-box shadow">
                                <div class="info-box-content">
                                  <span class="info-box-text" style="color: #0000FF;font-size:14px">DATE STARTED</span>
                                  <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectStart?></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-12">
                              <div class="info-box shadow">
                                <div class="info-box-content">
                                  <span class="info-box-text" style="color: #0000FF;font-size:14px">DURATION</span>
                                  <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectDuration?></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                              <div class="info-box shadow">
                                <div class="info-box-content">
                                  <span class="info-box-text" style="color: #0000FF;font-size:14px">STATUS</span>
                                  <span class="info-box-text" style="color: #000000;font-size:14px"><?php echo $projectStatus?></span>
                                </div>
                              </div>
                            </div>



                            <div class="col-lg-1">
                            <p3 style="color:blue;font-weight:bold;">ACTION</p3><br>
                              <div class="dropdown">
                              <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									          	<!-- <i class="dw dw-more"></i> -->
                                <i class='fas fa-braille' style='font-size:30px;color:#696969'></i>
                              </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                  <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit"><i class="dw dw-edit2"></i> EDIT</a> -->
                                  <a class="dropdown-item" href="tprodet.php?pr=<?php echo $projectBil;?>&ty=tcom"><i class="fas fa-server"></i> PROJECT DETAILS</a>
                                </div>
                              </div>
                            </div>
                                            <!-- </div> -->
                                <!-- </div>&nbsp;&nbsp; -->
                          </div><hr>
                          <?php
                              }
                            }
                            ?>
                            <div class="row">
                            <div class="col-lg-12">
                              <div id="chart">
                              <script>
                                var options = {
                                series: [
                                {
                                  data: [
                                  
                                    {
                                      x: 'Project Start',
                                      y: [
                                        new Date('2022-05-04').getTime(),
                                        new Date('2022-05-08').getTime()
                                      ],
                                      fillColor: '#8b008b'
                                    },
                                  
                                    {
                                      x: 'In Progress',
                                      y: [
                                        new Date('2022-05-04').getTime(),
                                        new Date('2022-05-08').getTime()
                                      ],
                                      fillColor: '#483d8b'
                                    },
                                    {
                                      x: 'Troubleshooting | Testing',
                                      y: [
                                        new Date('2022-05-07').getTime(),
                                        new Date('2022-05-10').getTime()
                                      ],
                                      fillColor: '#008000'
                                    },
                                    {
                                      x: '"UAT | Training',
                                      y: [
                                        new Date('2022-05-08').getTime(),
                                        new Date('2022-05-12').getTime()
                                      ],
                                      fillColor: '#0000ff'
                                    },
                                    {
                                      x: 'Completed | Golive',
                                      y: [
                                        new Date('2022-05-12').getTime(),
                                        new Date('2022-05-17').getTime()
                                      ],
                                      fillColor: '#9400d3'
                                    },
                                    {
                                      x: 'Pending',
                                      y: [
                                        new Date('2022-05-12').getTime(),
                                        new Date('2022-05-17').getTime()
                                      ],
                                      fillColor: '#dc143c'
                                    },
                                    {
                                      x: 'Support | Maintenance',
                                      y: [
                                        new Date('2022-05-12').getTime(),
                                        new Date('2022-05-17').getTime()
                                      ],
                                      fillColor: '#faa460'
                                    }
                                  ]
                                }
                              ],
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

                              var chart = new ApexCharts(document.querySelector("#chart"), options);
                              chart.render();

                              
                              </script>
                              </div>
                            </div>
                          </div>
                          <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>

  
</body>
<?php
include 'footer.php';
?>

<script>
var xValues = ["Project Started", "In Progress", "SpaTroubleshooting | Testingin", "UAT | Training", "Completed | Golive", "Pending", "Support | Maintenance"];
var yValues = [55, 49, 44, 24, 15,34,67];
var barColors = [
  "#8b008b",
  "#483d8b",
  "#008000",
  "#0000ff",
  "#9400d3",
  "#dc143c",
  "#faa460",
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    //   text: "World Wide Wine Production 2018"
    },
    plugins: {
      legend: {
        position: 'right',
        display: false,
        // labels:{
        //   boxWidth:0,
        // }
      },
      title: {
        display: true,
      },
    },
  }
});

new Chart("myChart2", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    //   text: "World Wide Wine Production 2018"
    },
    plugins: {
      legend: {
        position: 'right',
        display: false,
        // labels:{
        //   boxWidth:0,
        // }
      },
      title: {
        display: true,
      },
    },
  }
});

new Chart("myChart3", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    //   text: "World Wide Wine Production 2018"
    },
    plugins: {
      legend: {
        position: 'right',
        display: false,
        // labels:{
        //   boxWidth:0,
        // }
      },
      title: {
        display: true,
      },
    },
  }
});

new Chart("myChart4", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    //   text: "World Wide Wine Production 2018"
    },
    plugins: {
      legend: {
        position: 'right',
        display: false,
        // labels:{
        //   boxWidth:0,
        // }
      },
      title: {
        display: true,
      },
    },
  }
});

new Chart("myChart5", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    //   text: "World Wide Wine Production 2018"
    },
    plugins: {
      legend: {
        position: 'right',
        display: false,
        // labels:{
        //   boxWidth:0,
        // }
      },
      title: {
        display: true,
      },
    },
  }
});

new Chart("myChart6", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    //   text: "World Wide Wine Production 2018"
    },
    plugins: {
      legend: {
        position: 'right',
        display: false,
        // labels:{
        //   boxWidth:0,
        // }
      },
      title: {
        display: true,
      },
    },
  }
});
</script>
<script> 
// $("#textarea1").load("u-template-app.php", {
//     templateIdList: strUser1,
//     therkey: therkey,
// });
</script>