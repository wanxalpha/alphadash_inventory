<?php
include_once("../menu/menu-dash-a.php");
include 'connection/config.php';
?>
<script>
  //  var element1 = document.getElementById("test1");
  // var element2 = document.getElementById("test2");
  // var element3 = document.getElementById("test3");
  // element1.classList.remove("active");
  // element2.classList.remove("active");
  // element3.classList.add("active");
</script>


<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Content Wrapper. Contains page content -->
<style>
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
    <input type="hidden" value="<?php echo $idCom ?>" id="iddCom">
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Project Completed</h4>
      <div class="row mb-3">
        <?php
        $sqlGet = "SELECT * FROM sales_funnel WHERE f_id_com='$idCom'";
        $resultGet = mysqli_query($connect, $sqlGet);
        $numGet = mysqli_num_rows($resultGet);
        if ($numGet > 0) {
          while ($rowGet = mysqli_fetch_assoc($resultGet)) {
            $nameProject = $rowGet['project_name'];
            $nameCode = $rowGet['project_code'];
            $nameBil = $rowGet['id'];

            $proStart = $rowGet['project_sta'];
            $proIP = $rowGet['project_ip'];
            $proTro = $rowGet['project_trouble'];
            $proUAT = $rowGet['project_uat'];
            $proCom = $rowGet['project_com'];
            $proPen = $rowGet['project_pending'];
            $proSup = $rowGet['project_support'];

            $proMula = $rowGet['project_start'];
            $proEnd = $rowGet['project_due_date'];
        ?>
            <div class="col-md-6 col-sm-6 col-12">
              <div class="card">
                <h5 class="card-header2"><?php echo $nameProject ?></h5>
                <div class="card-body">
                  <div class="row">
                    <div style="width:100%;max-width:600px" id="chart<?php echo $nameBil ?>"></div>
                  </div>
                  <script>
                    var options = {
                      labels: ["Project Started", "Development", "Troubleshooting | Testing", "UAT | Training", "Completed | Golive", "Pending", "Support | Maintenance"],
                      colors: ["#8b008b", "#483d8b", "#008000", "#0000ff", "#9400d3", "#dc143c", "#faa460"],
                      series: [<?php echo $proStart ?>, <?php echo $proIP ?>, <?php echo $proTro ?>, <?php echo $proUAT ?>, <?php echo $proCom ?>, <?php echo $proCom ?>, <?php echo $proSup ?>],
                      chart: {
                        type: 'polarArea',
                      },
                      stroke: {
                        colors: ['#fff']
                      },
                      fill: {
                        opacity: 0.8
                      },
                      responsive: [{
                        breakpoint: 480,
                        options: {
                          chart: {
                            width: 200
                          },
                          legend: {
                            position: 'bottom'
                          }
                        }
                      }]
                    };
                    var chart = new ApexCharts(document.querySelector("#chart<?php echo $nameBil ?>"), options);
                    chart.render();
                  </script>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                      <div class="info-box shadow">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;">Project Start:</span>
                          <span class="info-box-number"><?php echo $proMula ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                      <div class="info-box shadow">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;">Project End:</span>
                          <span class="info-box-number"><?php echo $proEnd ?></span>
                        </div>
                      </div>
                    </div>
                  </div><br>
                </div>
              </div>
              <br />
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>
<?php
include_once("footer.php");
?>
<script>
  var options = {
    labels: ["Project Started", "Development", "Troubleshooting | Testing", "UAT | Training", "Completed | Golive", "Pending", "Support | Maintenance"],
    colors: ["#8b008b", "#483d8b", "#008000", "#0000ff", "#9400d3", "#dc143c", "#faa460"],
    series: [14, 23, 21, 17, 15, 10, 12],
    // series:{
    //   name: "try 1", "try 2"
    // },
    chart: {
      type: 'polarArea',
    },
    stroke: {
      colors: ['#fff']
    },
    fill: {
      opacity: 0.8
    },
    responsive: [{
      breakpoint: 480,
      options: {
        chart: {
          width: 200
        },
        legend: {
          position: 'bottom'
        }
      }
    }]
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>