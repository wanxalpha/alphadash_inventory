<?php
include 'header.php';
// include 'menu-dash-a.php';
include 'menu.php';

$bilPro = $_GET['pr'];
$type = $_GET['ty'];
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
          <!-- <h6>SHOW <input type="number" value="6" style="width:40px"> ENTRIES </h6> -->
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
                   
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <?php
                            include 'connection/config.php';

                            $sqlProject = "SELECT * FROM project_assign WHERE BIL='$bilPro'";
                            $resultProject = mysqli_query($connect, $sqlProject);
                            // $resultProject = $connect->query($sqlProject);
                            $numProject = mysqli_num_rows($resultProject);
                            if ($numProject > 0){
                              while ($rowProject = mysqli_fetch_assoc($resultProject)){
                                $projectManager = $rowProject['project_manager'];
                                $projectStart = $rowProject['project_start'];
                                $projectDetail = $rowProject['project_detail'];
                                $projectName = $rowProject['project_name'];
                                // $projectTeam = $rowProject['PROJECT_TEAM'];
                          ?>  
                          <div class="row"> <!-- First -->
                            <!-- <div class="row"> -->
                            <div class="col-lg-1">
                              <img src="vendors/profile/Profile.png" alt="alphadash Logo" class="brand-image elevation-3" style="border-radius: 8px;width: 55px;height: 55px; border: 1px solid #ddd;">
                            </div>
                            <div class="col-lg-3" style="background-color: #4682B4;">
                              <p3 style="color:white;font-size:14px;font-weight:bold;">PROJECT MANAGER <?php echo $projectManager;?></p3><br>
                              <p2 style="color:white;font-size:11px;font-weight:bold;">PROJECT DATE RECEIVE: <?php echo $projectStart;?></p2>
                            </div>
                            <div class="vl"></div>
                            <div class="col-lg-4" style="background-color: #4682B4;">
                              <p3 style="color:white;font-size:14px;font-weight:bold;">PROJECT: <?php echo $projectName;?></p3><br>
                              <p2 style="color:white;font-size:11px;font-weight:bold;">PROJECT DESCIPTION: <?php echo $projectDetail;?></p2>
                            </div>
                            <div class="vl"></div>
                            <div class="col-lg-3" style="background-color: #4682B4;">
                              <p3 style="color:white;font-size:14px;font-weight:bold;">PROJECT TEAM</p3><br>
                              <!-- <p2 style="color:white;font-size:11px;font-weight:bold;">PIC: <?php echo $projectTeam;?></p2> -->
                            </div>
                           
                                            <!-- </div> -->
                                <!-- </div>&nbsp;&nbsp; -->
                          </div>
                          <hr>
                         <?php
                              }
                            }
                            if ($type == "tcol"){
                                $url = "tcollection.php";
                            }else if ($type == "tcom"){
                                $url = "tcomplete.php";
                            }
                            ?>
                            <a type="button" class="btn btn-warning" href="<?php echo $url?>">Back</a>
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

