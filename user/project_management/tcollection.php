<?php
include 'header.php';
// include 'menu-dash-a.php';
include 'menu.php';
include 'connection/config.php';
?>
<script>
   var element1 = document.getElementById("test11");
  var element2 = document.getElementById("test21");
  var element3 = document.getElementById("test31");
  element3.classList.remove("active");
  element1.classList.remove("active");
  element2.classList.add("active");
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
              <h6 style="font-weight: bold;">PROJECT COLLECTION</h6>
          <!-- <h6>SHOW <input type="number" value="6" style="width:40px"> ENTREIS </h6> -->
          </div><div class="col-sm-3">
            
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
                <label for="" style="color:red;font-size:20px;">Alphacore</label>&nbsp;
                <label for="" style="color:black;font-size:20px;">Technology</label>
                <input type="hidden" value="<?php echo $theName;?>" id="names">
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
                              <input id="tarikh" class="form-control select2" type="date" placeholder="PROJECT DATE" style="font-size: 15px;width:100%;height:38px">
                            </div>
                            <div class="col-lg-2">
                            <!-- <input type="text" placeholder="PRIORITY" style="font-size: 15px;width:fit-content;height:38px"> -->
                            <select id="penting" class="form-control select2" style="width: 100%;font-size:13px;" aria-placeholder="8 PILLAR">
                              <option selected="selected">--PRIORITY--</option>
                              <option>HIGH</option>
                              <option>MEDIUM</option>
                              <option>LOW</option>
                            </select>
                            </div>
                            <div class="col-lg-4">
                            <select id="projek" class="form-control select2" style="width: 100%;font-size:13px;" aria-placeholder="8 PILLAR">
                              <option  selected="selected">--CHOOSE PROJECT--</option>
                                 <!-- <option selected="selected">WEB DEVELOPMENT</option> -->
                                <?php
                                $bill = 1;
                                $bill++;
                                    $sqlThePillar = "SELECT * FROM `project_pillar`";
                                    $resultPillar = mysqli_query($connect, $sqlThePillar);
                                    // $resultPillar = $connect->query($sqlThePillar);
                                    $numPillar = mysqli_num_rows($resultPillar);

                                    if ($numPillar > 0){
                                        while($rowPillar = mysqli_fetch_assoc($resultPillar)){
                                ?>
                                    <option value="<?php echo $bill?>"><?php echo $rowPillar['project_pillar'];?></option>
                                <?php
                                        }
                                    }
                                            // $connect -> close();
                                ?>
                            </select>
                            </div>
                            <div class="col-lg-2">
                              <div class="card-tools">
                                <input type="button" onclick="cari()" class="btn btn-success" value="SEARCH">
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
                          $sqlProject = "SELECT * FROM `project_assign` WHERE project_assign='$theName'";
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
                            <!-- <div class="row"> -->
                            <!-- <div class="col-lg-1">
                              <img src="vendors/profile/Profile.png" alt="alphadash Logo" class="brand-image elevation-3" style="border-radius: 8px;width: 55px;height: 55px; border: 1px solid #ddd;">
                            </div> -->
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12" style="background-color:#00008B;border-top-right-radius: 5px;border-top-left-radius: 5px;">
                                        <p3 style="color:white;font-size:14px;font-weight:bold;">PROJECT</p3><br>
                                    </div>
                                    <div class="col-lg-12" style="background-color: #4682B4;height: 50px;;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;">
                                        <p3 style="color:white;font-size:14px;font-weight:bold;"><?php echo $projectName;?></p3><br>
                                        <!-- <p2 style="color:white;font-size:11px;font-weight:bold;">PROJECT DATE RECEIVE: 10/10/2020</p2> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 vl">
                            <!-- <div class="vl"></div> -->
                            <div class="row">
                                <div class="col-lg-12" style="background-color:#00008B;border-top-right-radius: 5px;border-top-left-radius: 5px;">
                                    <p3 style="color:white;font-size:14px;font-weight:bold;">PROJECT DATE START</p3><br>
                                </div>
                                <div class="col-lg-12" style="background-color: #4682B4;height: 50px;;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;">
                                    <p3 style="color:white;font-size:14px;font-weight:bold;"><?php echo $projectStart;?></p3><br>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-2 vl">
                            <div class="row">
                                    <div class="col-lg-12" style="background-color:#00008B;border-top-right-radius: 5px;border-top-left-radius: 5px;">
                                        <p3 style="color:white;font-size:14px;font-weight:bold;">PROJECT DURATION</p3><br>
                                    </div>
                                    <div class="col-lg-12" style="background-color: #4682B4;height: 50px;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;">
                                        <p3 style="color:white;font-size:14px;font-weight:bold;"><?php echo $projectDuration;?></p3><br>
                                        <!-- <p2 style="color:white;font-size:11px;font-weight:bold;">PROJECT DATE RECEIVE: 10/10/2020</p2> -->
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-2 vl">
                            <div class="row">
                                    <div class="col-lg-12" style="background-color:#00008B;border-top-right-radius: 5px;border-top-left-radius: 5px;">
                                        <p3 style="color:white;font-size:14px;font-weight:bold;">STATUS</p3><br>
                                    </div>
                                    <div class="col-lg-12" style="background-color: #4682B4;height: 50px;;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;">
                                        <p3 style="color:white;font-size:14px;font-weight:bold;"><?php echo $projectStatus;?></p3><br>
                                        <!-- <p2 style="color:white;font-size:11px;font-weight:bold;">PROJECT DATE RECEIVE: 10/10/2020</p2> -->
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
                                  <a class="dropdown-item" href="tprodet.php?pr=<?php echo $projectBil;?>&ty=tcol"><i class="fas fa-server"></i> PROJECT DETAILS</a>
                                </div>
                              </div>
                            </div>
                          </div><hr>

                          <?php
                              }
                            }
                            ?>
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
function cari() {
  var tarikh = document.getElementById('tarikh').value;
  let tahun = tarikh.substring(0, 4);
	let bulan = tarikh.substring(5, 7);
  let hari = tarikh.substring(8, 10);
  let fullTarikh = hari + "/" + bulan + "/" + tahun;
  var penting = document.getElementById('penting').value;
  var a = document.getElementById('projek');
  var projek = a.options[a.selectedIndex].text;
  var names = document.getElementById('theName').value;
// alert(fullTarikh)
// $("#textarea1").load("u-template-app.php", {
//     fullTarikh: fullTarikh,
//     projek: projek,
//     penting: penting,
//     names: names,
// });

}
</script>
<script> 
// $("#textarea1").load("u-template-app.php", {
//     templateIdList: strUser1,
//     therkey: therkey,
// });
</script>