<?php
include 'layouts/menu.php';
include 'connection/config.php';
$iddd = $_GET['pn'];

// $projectDetail = "SELECT * FROM `sales_funnel` WHERE project_name='$gname'";
$projectDetailz = "SELECT * FROM `sales_funnel` WHERE id='$iddd'";
$result = $connect->query($projectDetailz);
$rowd = mysqli_fetch_assoc($result);
$id = $rowd['id'];
$projectName = $rowd['project_name'];
$projectPillarz = $rowd['project_pillar'];
$projectDetail = $rowd['project_detail'];
$projectStart = $rowd['project_start'];
$projectDue = $rowd['project_due_date'];
$projectProgress = $rowd['project_progress'];
$projectStatus = $rowd['status'];
$projectManager = $rowd['project_manager'];
$projectTeam = $rowd['project_team'];
$projectPIC = $rowd['pic_name'];
$projectCost = $rowd['value'];
$totalHours = $rowd['total_hours'];
$projectPriority = $rowd['project_priority'];
$createdBy = $rowd['created_by'];
$createdDate = $rowd['created_at'];
$proDur = $rowd['project_duration'];
$demClass = "bo1";

if ($projectProgress == "" || $projectProgress == null){
    $projectProgress = "0";
}

$theLength = strlen($projectCost);
if ($theLength == 4 || $theLength == "4"){
  $theCost1= substr($projectCost,0,1);
  $theCost2= substr($projectCost,1,3);
  $theCust = $theCost1 . "," . $theCost2 . ".00";
}else if ($theLength == 5 || $theLength == "5"){
  $theCost1= substr($projectCost,0,2);
  $theCost2= substr($projectCost,2,3);
  $theCust = $theCost1 . "," . $theCost2 . ".00";
}else if ($theLength == 6 || $theLength == "6"){
  $theCost1= substr($projectCost,0,3);
  $theCost2= substr($projectCost,3,3);
  $theCust = $theCost1 . "," . $theCost2 . ".00";
}else if ($theLength == 7 || $theLength == "7"){
  $theCost1= substr($projectCost,0,1);
  $theCost2= substr($projectCost,1,3);
  $theCost3= substr($projectCost,4,3);
  $theCust = $theCost1 . "," . $theCost2 . "," . $theCost3 . ".00";
}else if ($theLength == 8 || $theLength == "8"){
  $theCost1= substr($projectCost,0,2);
  $theCost2= substr($projectCost,2,3);
  $theCost3= substr($projectCost,5,3);
  $theCust = $theCost1 . "," . $theCost2 . "," . $theCost3 . ".00";
}else if ($theLength == 9 || $theLength == "9"){
  $theCost1= substr($projectCost,0,3);
  $theCost2= substr($projectCost,3,3);
  $theCost3= substr($projectCost,6,3);
  $theCust = $theCost1 . "," . $theCost2 . "," . $theCost3 . ".00";
}else {
  $theCust = $projectCost . ".00";
}


$sqlGant = "SELECT * FROM `gant_chart` WHERE project_id='$iddd' AND f_id_com='$idCom'";
$resGant = $connect->query($sqlGant);
$numGant = mysqli_num_rows($resGant);
if ($numGant > 0){
  $rowGant = mysqli_fetch_assoc($resGant);
  $proStart1 = $rowGant['pro_start_1'];
  $proStart2 = $rowGant['pro_start_2'];
  $ipStart1 = $rowGant['pro_ip_1'];
  $ipStart2 = $rowGant['pro_ip_2'];
  $troStart1 = $rowGant['pro_tro_1'];
  $troStart2 = $rowGant['pro_tro_2'];
  $uatStart1 = $rowGant['pro_uat_1'];
  $uatStart2 = $rowGant['pro_uat_2'];
  $comStart1 = $rowGant['pro_com_1'];
  $comStart2 = $rowGant['pro_com_2'];
  $penStart1 = $rowGant['pro_pen_1'];
  $penStart2 = $rowGant['pro_pen_2'];
  $supStart1 = $rowGant['pro_sup_1'];
  $supStart2 = $rowGant['pro_sup_2'];
}else{
  $proStart1 = "";
  $proStart2 = "";
  $ipStart1 = "";
  $ipStart2 = "";
  $troStart1 = "";
  $troStart2 = "";
  $uatStart1 = "";
  $uatStart2 = "";
  $comStart1 = "";
  $comStart2 = "";
  $penStart1 = "";
  $penStart2 = "";
  $supStart1 = "";
  $supStart2 = "";
}

// $projectTeamzz =  explode(",",$projectTeam);
$projectTeamzz = preg_split ("/\,/", $projectTeam); 
// echo "<script> alert(" .$projectTeamzz['0'] . ") </script>";
?>

<script>
  //  var element1 = document.getElementById("test1");
  // var element2 = document.getElementById("test2");
  // var element3 = document.getElementById("test3");
  // element1.classList.remove("active");
  // element3.classList.remove("active");
  // element2.classList.add("active");
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

 <!-- Content Wrapper. Contains page content -->

 <body>
<!-- data -->
  <input type="hidden" id="nameProject" value="<?php echo $projectName?>">
  <input type="hidden" id="idd" value="<?php echo $iddd?>">
  <input type="hidden" id="idcomp" value="<?php echo $idCom?>">
  <input type="hidden" id="protin" value="<?php echo $projectTeam?>">
  <input type="hidden" id="proMan" value="<?php echo $projectManager?>">
  <input type="hidden" id="proDet" value="<?php echo $projectDetail?>">
  <input type="hidden" id="proPill" value="<?php echo $projectPillarz?>">
  <input type="hidden" id="proProri" value="<?php echo $projectPriority?>">

  <section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-header2">PROJECT DETAILS</h5>
              <br>

              <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow"  style="height: 100px;">
                    <div class="card-body">
                    <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">PROJECT NAME:</span>
                        <span class="info-box-number"><?php echo $projectName?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow"  style="height: 100px;">
                    <div class="card-body">
                    <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">PROJECT COST:</span>
                        <span class="info-box-number">RM<?php echo $theCust?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow"  style="height: 100px;">
                    <div class="card-body">
                    <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">PRIORITY:</span>
                        <span class="info-box-number"><?php echo $projectPriority?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow"  style="height: 100px;">
                    <div class="card-body">
                    <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">STATUS:</span>
                        <span class="info-box-number"><?php echo $projectStatus?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow"  style="height: 100px;">
                    <div class="card-body">
                    <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">TOTAL HOURS:</span>
                        <span class="info-box-number"><?php echo $totalHours?> Hours</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow"  style="height: 100px;">
                    <div class="card-body">
                    <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">CREATED:</span>
                        <span class="info-box-number"><?php echo $createdDate?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow"  style="height: 100px;">
                    <div class="card-body">
                    <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">DEADLINE:</span>
                        <span class="info-box-number"><?php echo $projectDue?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow"  style="height: 100px;">
                    <div class="card-body">
                    <!-- <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span> -->
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">CREATED BY:</span>
                        <span class="info-box-number"><?php echo $createdBy?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

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
              <h5 class="card-header2">PROJECT PROGRESS</h5>
              <br>
              <div class="col-md-12 col-sm-6 col-12">
                <div class="info-box bg-gradient-info shadow">
                  <!-- <span class="info-box-icon"><i class="far fa-star"></i></span> -->
                  <div class="info-box-content">
                    <!-- <span class="info-box-text">Project Progress</span> -->
                    <div class="progress">
                      <div class="progress-bar" style="width: <?php echo $projectProgress?>%;height:50px"></div>
                    </div>
                    <span class="progress-description" style="color: #FFD700;">
                      <?php echo $projectProgress?>%
                    </span>
                  </div>
                </div>
              </div>
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
              <!-- <h5 class="card-header2">PROJECT PROGRESS</h5>
              <br> -->
              <div class="row">
              <?php 
                $projectM = "SELECT * FROM `project_member` WHERE f_name='$projectManager'";
                $resultM = $connect->query($projectM);
                $numbM = mysqli_num_rows($resultM);

                if ($numbM > 0){
                  $countProPm = "SELECT COUNT(project_name) AS proPm FROM sales_funnel WHERE project_manager='$projectManager';";
                  $resCount = mysqli_query($connect, $countProPm);
                  $rowcountProPm = mysqli_fetch_assoc($resCount);
                  $toCoPm = $rowcountProPm['proPm'];
                  $rowM = mysqli_fetch_assoc($resultM);

                  $mName = $rowM['f_name'];
                  $mDesignation = $rowM['f_designation'];
                  $mImage = $rowM['f_picture'];
                  $mPosition = $rowM['f_position'];
                  $mEmel = $rowM['f_emel'];
                  if ($mImage == "" || $mImage == null){
                    $mImage = "vendors/profile/Profile.png";
                  }
                  if ($mEmel == "" || $mEmel == null){
                    $mEmel = "example@gmail.com";
                  }
              ?>
                <div class="col-lg-4">
                  <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-primary">
                      <div class="form-group">
                        <div class="widget-user-image">
                          <img class="profile-image" src="<?php echo $mImage?>" alt="Project Manager" style="border-radius:100%; height:100px; width:100px;">
                        </div>
                        <h3 class="widget-user-username" style="font-weight: bold;font-size: 16px;"><?php echo $mName?></h3>
                        <h5 class="widget-user-desc" style="font-size: 14px;"><?php echo $mDesignation?></h5>
                      </div>
                    </div>
                    
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <?php echo $toCoPm?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <?php echo $mEmel?>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Projects <span class="float-right badge bg-success"><?php echo $toCoPm?></span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- PIC Manager -->
                <div class="modal fade customscroll" id="proMan" name="proMan" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form>
                        <div class="modal-body pd-0">
                          <div class="task-list-form">
                            <ul>
                              <li>
                                <div class="form-group row"></div>
                                <div class="form-group row">
                                  <label class="col-md-4">Team Member</label>
                                  <div class="col-md-8">
                                    <select name="transMem" id="transMem"  class="custom-select2 form-control" style="width: 100%; height: 38px;">
                                      <option>--Team member--</option>
                                      <?php
                                        $sqlAssignds = "SELECT * FROM `sales_funnel` WHERE id='$id'";
                                        $resultAssignds = $connect->query($sqlAssignds);
                                        while ( $rowAssignds = mysqli_fetch_assoc($resultAssignds)){
                                          $temerds = $rowAssignds['project_team'];
                                          $str_arrds = preg_split ("/\,/", $temerds); 
                                          foreach ($str_arrds as $sellsdds) {
                                            if ($sellsdds == "" || $sellsdds == null){

                                            }else{
                                        ?>
                                        <option value="<?php echo $sellsdds?>"><?php echo $sellsdds?></option>
                                        <?php
                                            }
                                          }
                                        }
                                        ?>
                                    </select>	
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-md-4">To Team Member</label>
                                  <div class="col-md-8">
                                    <select name="toTransMem" id="toTransMem"  class="custom-select2 form-control" style="width: 100%; height: 38px;">
                                    <!-- <optgroup label="Please choose team member"> -->
                                      <option>--Team member--</option>
                                      <?php
                                      $sqlAssignq = "SELECT * FROM `sales_funnel` WHERE id='$id'";
                                      $resultAssignq = $connect->query($sqlAssignq);
                                      while ( $rowAssignq = mysqli_fetch_assoc($resultAssignq)){
                                      $temerq = $rowAssignq['project_team'];
                                      $str_arrq = preg_split ("/\,/", $temerq); 
                                      foreach ($str_arrq as $selq) {
                                        if ($selq == "" || $selq == null){

                                        }else{
                                    ?>
                                    <option value="<?php echo $selq?>"><?php echo $selq?></option>
                                    <?php
                                        }
                                      }
                                    }
                                    ?>
                                    <!-- </optgroup> -->
                                    </select>	
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-12">
                                    <table style="font-size: 14px;;" id="myTablexx" class="table table-bordered table-striped">
                                      <tr>
                                        <th>NO.</th>
                                        <th>TASK JOB</th>
                                        <th>PROGRESS</th>
                                        <th>REMARKS</th>
                                        <th></th>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="transferPro" class="btn btn-warning">Transfer</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </form>
                      <script>
                      $("#transMem").change(function(){
                      // alert("ahade")
                        let id = document.getElementById('idd').value
                        let names = document.getElementById('transMem')
                        let nameb = names.options[names.selectedIndex].text;
                        $.ajax({
                          url:'theFunction/tasking.php',
                          type:'POST',
                          data: {
                            id: id,
                            nameb: nameb,
                          },
                          success:function(result){
                            var datas = result;
                            $("#myTablexx").html(result);
                          },
                          error:function(status){
                            alert('error');
                          }
                        });
                      });

                      $("#transferPro").click(function(){
                        let id = document.getElementById('idd').value;
                        let a = document.getElementById('transMem')
                        let nameFrom = a.options[a.selectedIndex].text;
                        let b = document.getElementById('toTransMem')
                        let nameTo = b.options[b.selectedIndex].text;
                        $.ajax({
                          url: "theFunction/transferTask.php",
                          type: "POST",
                          data: {
                            id: id,
                            namef: nameFrom,
                            namet: nameTo,
                          },
                          success: function (data, status, xhr) {
                            var datas = data;
                            datas = datas.replace('"','');
                            if (datas.includes("100")){
                              Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Successful',
                                timer: 2000,
                              })
                              setTimeout(function() {
                                window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                              }, 2000);
                                          
                            }else{
                              Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Not successful',
                                timer: 2000,
                              })
                              setTimeout(function() {
                                window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                              }, 2000);
                            }
                          }
                        });
                      })
                      </script>
                    </div>
                  </div>
                </div>

                <?php
                }
       
                $projectP = "SELECT * FROM `project_member` WHERE f_name='$projectPIC'";
                $resultP = $connect->query($projectP);
                $numbP = mysqli_num_rows($resultP);
                
                if ($numbP > 0){
                    $rowP = mysqli_fetch_assoc($resultP);
                    
                    $mNameP = $rowP['f_name'];
                    $mDesignationP = $rowP['f_designation'];
                    $mImageP = $rowP['f_picture'];
                    $mPositionP = $rowP['f_position'];
                    $mEmelP = $rowP['f_emel'];
                    if ($mImageP == "" || $mImageP == null){
                        $mImageP = "vendors/profile/Profile.png";
                    }
                    if ($mEmelP == "" || $mEmelP == null){
                        $mEmelP = "example@gmail.com";
                    }
                ?>
                <div class="col-lg-4">
                  <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-success">
                      <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?php echo $mImageP?>" alt="User Avatar" style="border-radius:100%; height:100px; width:100px;">
                      </div>
                      <h3 class="widget-user-username" style="font-weight: bold;font-size: 16px;"><?php echo $mNameP?></h3>
                      <h5 class="widget-user-desc" style="font-size: 14px;">PIC</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Projects <span class="float-right badge bg-primary">31</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Tasks <span class="float-right badge bg-info">5</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Completed Task <span class="float-right badge bg-success">12</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php
                }
           
                $str_arrz = preg_split ("/\,/", $projectTeam); 
                foreach ($str_arrz as $sellsdz) {
                  if ($sellsdz == $projectPIC){

                  }else{
                    $projectT = "SELECT * FROM `project_member` WHERE f_name='$sellsdz'";
                    $resultT = $connect->query($projectT);
                    $numbT = mysqli_num_rows($resultT);
                    
                    if ($numbT > 0){
                      $rowT = mysqli_fetch_assoc($resultT);
                        $mNameT = $rowT['f_name'];
                        $mDesignationT = $rowT['f_designation'];
                        $mImageT = $rowT['f_picture'];
                        $mPositionT = $rowT['f_position'];
                        $mEmelT = $rowT['f_emel'];
                        if ($mImageT == "" || $mImageT == null){
                            $mImageT = "vendors/profile/Profile.png";
                        }
                        if ($mEmelT == "" || $mEmelT == null){
                            $mEmelT = "example@gmail.com";
                        }
                ?>
                <div class="col-lg-4">
                  <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-warning">
                      <div class="row">
                      <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?php echo $mImageT?>" alt="User Avatar" style="border-radius:100%; height:100px; width:100px;">
                      </div>
                      <h3 class="widget-user-username" style="font-weight: bold;font-size: 16px;"><?php echo $mNameT?></h3>
                      <h5 class="widget-user-desc" style="font-size: 14px;"><?php echo $mDesignationT?></h5>
                      </div>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Projects <span class="float-right badge bg-primary">31</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Tasks <span class="float-right badge bg-info">5</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Completed Task <span class="float-right badge bg-success">12</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php
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

  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="row">
            <div class="col-md-4">
              <div class="card-body">
                <div class="card card-widget">
                  <div class="card-header">
                    <div class="user-block">
                      <span class="username"><a href="#">PROJECT DETAIL</a></span>
                    </div>
                  </div><br>
                  <div class="card-body">
                    <p><?php echo $projectDetail?></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card-body">
                <div class="card card-widget">
                  <div class="card-header">
                    <div class="user-block">
                      <span class="username"><a href="#">APPENDIX DOCUMENT</a></span>
                    </div>
                  </div><br>
                  <div class="card-body">
                    <div class="attachment-block clearfix">
                      <?php 
                        $sqlPath = "SELECT * FROM `sales_funnel_document` WHERE sales_funnel_id='104'";
                        $resultPath = mysqli_query($connect, $sqlPath);
                        $numPath = mysqli_num_rows($resultPath);
                        if ($numPath > 0){
                          while($rowPath = mysqli_fetch_assoc($resultPath)){
                      ?>
                      <a href="<?php echo $rowPath['document_path'];?>"><?php echo $rowPath['document_name'];?>.<?php echo $rowPath['document_format'];?></a><br>
                      <?php
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card-body">
                <div class="card card-widget">
                  <div class="card-header">
                    <div class="user-block">
                      <span class="username"><a href="#">ACTION</a></span>
                    </div>
                  </div><br>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <button data-bs-toggle="modal" style="font-size: 11px;"  data-bs-target="#add" class="btn btn-primary btn-block">ADD TEAM</button>
                      </div>
                      <div class="col-md-6">
                        <button data-bs-toggle="modal" style="font-size: 11px;" data-bs-target="#dele" class="btn btn-danger btn-block">REMOVE TEAM</button>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-6">
                        <button data-bs-toggle="modal" style="font-size: 11px;" data-bs-target="#newTask" class="btn btn-success btn-block">ADD TASK</button>
                      </div>
                      <div class="col-md-6">
                        <button data-bs-toggle="modal" style="font-size: 10px;" data-bs-target="#trans" class="btn btn-warning btn-block">TRANSFER TASK</button>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-6">
                        <button data-bs-toggle="modal" style="font-size: 12px;" data-bs-target="#edit" class="btn btn-info btn-block">EDIT PROJECT</button>
                      </div>
                      <div class="col-md-6">
                        <button data-bs-toggle="modal" style="font-size: 12px;" data-bs-target="#upl" class="btn btn-secondary btn-block">UPLOAD FILE</button>
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="col-md-6">
                        <button data-bs-toggle="modal" style="font-size: 12px;" data-bs-target="#gant" class="btn btn-warning btn-block">GANTT CHART</button>
                      </div>
                      <div class="col-md-6">
                        <button data-bs-toggle="modal" style="font-size: 12px;" data-bs-target="#delTask" class="btn btn-danger btn-block">DELETE TASK</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>                          
  <?php
    $teamPunya = array();
    $teamMate = explode(",",$projectTeam);
    foreach($teamMate as $valueTeam){ 
      array_push($teamPunya,$valueTeam);
    }
  ?>

  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

  <!-- Add Team -->
  <div class="modal fade customscroll" id="add" name="add" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document" id="add">
			<div class="modal-content">
			  <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
            <span aria-hidden="true">&times;</span>
          </button>
			  </div>
        <form>
          <div class="modal-body pd-0">
            <div class="task-list-form">
              <ul>
                <li>
                  <div class="form-group row">
                    <label class="col-md-4">Assign Team</label>
                    <div class="col-md-6">
                      <select name="prolistzz" id="prolistzz"  class="custom-select2 form-control" style="width: 100%; height: 38px;">
                        <option value="0">--Team member--</option>
                        <?php
                          $kiraTemer = 1;
                          $sqlAssign = "SELECT * FROM `project_member` WHERE f_designation='TEAM'";
                          $resultAssign = $connect->query($sqlAssign);
                          while ( $rowAssign = mysqli_fetch_assoc($resultAssign)){
                            $temer = $rowAssign['f_name'];
                            if (in_array($temer, $teamPunya)){

                            }else{
                        ?>
                        <option value="<?php echo $kiraTemer?>"><?php echo $temer?></option>
                        <?php
                          $kiraTemer++;
                            }
                          }
                        ?>
							        </select>	
                    </div>
                    <div class="col-md-2">
                      <input type="button" id="addTeamates" class="btn btn-primary btn-block" value="Add Member">
                    </div>
                    
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-lg-12">
                      <table id="myTablezz" class="table table-bordered table-striped">
                        <tr>
                          <th></th>
                          <th>SCOPE OF WORK</th>
                          <th>PERIOD</th>
                          <th>HANDOVER DATE</th>
                          <th>ROLE</th>
                          <th>ACTION</th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="tesss()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
          <script>
            let kirrzzx = 1;
            $("#addTeamates").click(function(){
              if ($("#myTablezz tbody").length == 0) {
                $("#myTablezz").append("<tbody></tbody>");
              }
              let teamindex = document.getElementById('prolistzz').value;
              let asse = document.getElementById('prolistzz');
              let teamNamez = asse.options[asse.selectedIndex].text
              if (teamNamez == "--Team member--"){
                Swal.fire({
                  icon: 'warning',
                  title: 'Ops...',
                  text: 'Please select your team member...',
                  timer: 2000,
                })
              }else{
                   
                document.getElementById("prolistzz").options[teamindex].disabled = true;
                let gambar = '<img src="vendors/profile/Profile.png" alt="alphadash Logo" class="brand-image elevation-3" style="border-radius: 8px;width: 55px;height: 55px; border: 1px solid #ddd;"><h5 style="font-size:14px;" id="name' + kirrzzx + '">' + teamNamez + '</h5> <input type="hidden" id="nama' + kirrzzx + '" value="' + teamNamez + '">';
                       
                        let scoper = '<select id="scopezx' + kirrzzx + '" class="form-control select2" style="font-size:12px">' +
                                    '<option value="0">--SCOPE OF WORK--</option>' +
                                    '<option value="1">UI/UX DESIGN</option>' +
                                    '<option value="2">FRONT END DEVELOPER</option>' +
                                    '<option value="3">BACK END DEVELOPER</option>' +
                                    '<option value="4">FULL STACK DEVELOPER</option>';
                                   
                                    let roler = '<select id="rolz' + kirrzzx + '" class="form-control select2" style="font-size:12px">' +
                                    '<option value="0">--ROLE--</option>' +
                                    '<option value="1">PIC</option>' +
                                    '<option value="2">TEAM</option>' +
                                    '<option value="3">MANAGEMENT</option>' +
                                    '<option value="4">SALES</option>';
                                   
                                    let pero = '<select id="perioz' + kirrzzx + '" class="form-control select2" style="font-size:12px">' +
                                  '<option value="0" selected="selected">1 WEEK</option>' +
                                  '<option value="1">2 WEEK</option>' +
                                  '<option value="2">3 WEEK</option>' +
                                  '<option value="3">3 WEEK</option>' +
                                  '<option value="4">4 WEEK</option>' +
                                  '<option value="5">1 MONTH</option>' +
                                  '<option value="6">2 MONTH</option>' +
                                  '<option value="7">3 MONTH</option>' +
                                  '<option value="8">4 MONTH</option>' +
                                  '<option value="9">5 MONTH</option>' +
                                  '<option value="10">6 MONTH</option>' +
                                  '<option value="11">7 MONTH</option>' +
                                  '<option value="12">8 MONTH</option>' +
                                  '<option value="13">9 MONTH</option>' +
                                  '<option value="14">10 MONTH</option>' +
                                  '<option value="15">11 MONTH</option>' +
                                  '<option value="16">12 MONTH</option>' +
                                  '</select>';
                                  // Append product to the table
                        $("#myTablezz tbody").append(
                            "<tr>" +
                            "<td>" + gambar + "</td>" +
                            "<td>" + scoper + "</td>" +
                            "<td>" + pero + "</td>" +
                            "<td>" + '<input id="tariz' + kirrzzx + '" type="date" class="form-control select2" style="font-size:12px">' + "</td>" +
                            "<td>" + roler + "</td>" +
                            "<td>" +
                            "<button  type='button' onclick='productDeleter(this);' name='simpan' id='simpan(this)' value='" + teamindex + "' class='btn btn-danger btn-block'>Delete</button>" +
                            // "<button type='button' onclick='productDelete(this);'                                  class='btn btn-default'>" +
                            // "<span class='glyphicon glyphicon-remove' />" +
                            // "</button>" +
                            "</td>" +
                            "</tr>");

                            
                            kirrzzx++;

                        }
                    document.getElementById('prolistzz').value = "0";
                  })
                  function tesss(){
                    let kiraTeam = 0;

                    let proManager = document.getElementById("proMan").value;
                    let proDetail = document.getElementById("proDet").value;
                    let proPillar = document.getElementById("proPill").value;
                    let proPro = document.getElementById("proProri").value;
                    let protin = document.getElementById("protin").value;

                    var id = document.getElementById("idd").value;
                    var namepro = document.getElementById("nameProject").value;
                    var tableTeam = document.getElementById("myTablezz");
                    let kiratableTeam = tableTeam.rows.length - 1;
                    for (var rs = 1, ns = tableTeam.rows.length; rs < ns; rs++){
                      var sco = document.getElementById('scopezx' + rs);
                      var scop = sco.options[sco.selectedIndex].text;
                      var nama = document.getElementById('nama' + rs).value; 
                      var roler = document.getElementById('rolz' + rs); // 1:PIC, 2:TEAM
                      var roles = roler.options[roler.selectedIndex].text;
                      var perio = document.getElementById('perioz' + rs);
                      var perios = perio.options[perio.selectedIndex].text;
                      var tarikh = document.getElementById('tariz' + rs).value;
                      // alert(tarikh)
                      kiraTeam++;
                      if (nama == "--Team member--" || nama == "" || nama == null){
                        Swal.fire({
                          icon: 'warning',
                          title: 'Ops...',
                          text: 'Please insert team member!',
                          timer: 2000,
                        })
                      }else if (scop == "--SCOPE OF WORK--" || scop == "" || scop == null){
                        Swal.fire({
                          icon: 'warning',
                          title: 'Ops...',
                          text: 'Please choose scope of work!',
                          timer: 2000,
                        })
                      }else if (roles == "--ROLE--" || roles == "" || roles == null){
                        Swal.fire({
                          icon: 'warning',
                          title: 'Ops...',
                          text: 'Please choose team role!',
                          timer: 2000,
                        })
                      }else if (tarikh == "" || tarikh == null){
                        Swal.fire({
                          icon: 'warning',
                          title: 'Ops...',
                          text: 'Please choose the date to handover!',
                          timer: 2000,
                        })
                      }else{
                        $.ajax({
                          url: "theFunction/saveTeam.php",
                          type: "POST",
                          data: {
                            scop: scop,
                            nama: nama,
                            roles: roles,
                            perios: perios,
                            tarikh: tarikh,
                            namepro: namepro,
                            id: id,
                            proManager: proManager,
                            proDetail: proDetail,
                            proPillar: proPillar,
                            proPro: proPro,
                            protin:protin,
                          },
                          
                          success: function (data, status, xhr) {    // success callback function
                            var datas = data;
                            datas = datas.replace('"','');
                            if (datas.includes("100")){
                              // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                                if (kiraTeam == kiratableTeam){
                                Swal.fire({
                                  icon: 'success',
                                  title: 'Success',
                                  text: 'Successful',
                                  timer: 2000,
                                })
                                setTimeout(function() {
                                  window.location.href = "detail.php?pn=<?php echo $id;?>";
                                }, 2000);
                              }
                            }else{
                              Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Not successful',
                                timer: 2000,
                              })
                              setTimeout(function() {
                                window.location.href = "detail.php?pn=<?php echo $id;?>";
                              }, 2000);
                            }
                          }
                        });
                      }
                    }
                  }
                </script>
              </form>
		    </div>
	      </div>
        </div>

        <!-- Delete Team -->
        <div class="modal fade customscroll" id="dele" name="dele" tabindex="-1" role="dialog">
		  <input type="hidden" id="edits5" name="edits5" value="">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<input type="hidden" id="edits5" name="edits5" value="">
		      <div class="modal-content">
				<div class="modal-header">
			      <h5 class="modal-title" id="exampleModalLongTitle"></h5>
				  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
                <form ction="" method="post" enctype="multipart/form-data">
                  <div class="modal-body pd-0">
                    <div class="task-list-form">
                      <ul>
                        <li>
                          <div class="form-group row">
                          </div>
                          <div class="form-group row">
                            <label class="col-md-4">Team Member</label>
                              <div class="col-md-8">
                                <select name="prolistc" id="prolistc"  class="custom-select2 form-control" style="width: 100%; height: 38px;">
                                  <option>--Team member--</option>
                                  <?php
                                    $sqlAssign = "SELECT * FROM `sales_funnel` WHERE id='$id'";
                                    $resultAssign = $connect->query($sqlAssign);
                                    while ( $rowAssign = mysqli_fetch_assoc($resultAssign)){
                                      $temer = $rowAssign['project_team'];
                                      // if (in_array($temer, $teamPunya)){
                                      // }else{
                                        $str_arr = preg_split ("/\,/", $temer); 
                                        foreach ($str_arr as $sellsd) {
                                          if ($sellsd == "" || $sellsd == null){

                                          }else{
                                        // }
                                      ?>
                                        <option value="<?php echo $sellsd?>"><?php echo $sellsd?></option>
                                      <?php
                                        }
                                      }
                                    }
                                      ?>
												        </select>	
                              </div>
                            </div>
                            <div class="form-group row">
                                            <!-- <label class="col-md-4">Job Scope</label> -->
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-8">
                                                <!-- <input type="button" value="Remove" class="btn btn-danger"> -->
                                                <!-- <textarea name="jobscope" id="jobscope" cols="35" rows="20" class="form-control"></textarea> -->
                                                <!-- <input type="text" class="form-control"> -->
                              </div>
                            </div>
                          </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" id="nameRemove" name="nameRemove">
                        <!--<button type="button" href="confirm4" data-bs-toggle="modal" data-bs-target="#confirm4" class="btn btn-primary">Insert</button>-->
                        <input type="button" id="removerx" onclick="rex()" class="btn btn-danger" value="Remove">
                        <!-- <input type="submit" name="remover" id="remover" class="btn btn-danger" value="Remove"> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
		        </div>
	        </div>
        </div>
        <script>
            // $("#remover").hide();
          function rex(){
            let assec = document.getElementById('prolistc');
            let id = document.getElementById('idd').value;
            let protin = document.getElementById('protin').value;
            let teamNamezc = assec.options[assec.selectedIndex].text;
            if (teamNamezc == "--Team member--" || teamNamezc == null || teamNamezc == ""){
              Swal.fire({
                icon: 'warning',
                title: 'Ops...',
                text: 'Please select team member to remove!',
                timer: 2000,
              })
            }else{
              // document.getElementById("nameRemove").value = teamNamezc;
              $.ajax({
                          url: "theFunction/removeTeam.php",
                          type: "POST",
                          data: {
                            id: id,
                            teamNamezc: teamNamezc,
                            protin: protin,
                          },
                          
                          success: function (data, status, xhr) {    // success callback function
                            var datas = data;
                            datas = datas.replace('"','');
                            if (datas.includes("100")){
                              // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                                Swal.fire({
                                  icon: 'success',
                                  title: 'Success',
                                  text: 'Successful',
                                  timer: 2000,
                                })
                                setTimeout(function() {
                                  window.location.href = "detail.php?pn=<?php echo $id;?>";
                                }, 2000);
                            }else{
                              Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Not successful',
                                timer: 2000,
                              })
                              setTimeout(function() {
                                window.location.href = "detail.php?pn=<?php echo $id;?>";
                              }, 2000);
                            }
                          }
                        });
              // $("#remover").click()
            }
          }
        </script>
      
    <!-- Transfer Task -->
    <div class="modal fade customscroll" id="trans" name="trans" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle"></h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
          <form>
            <div class="modal-body pd-0">
              <div class="task-list-form">
                <ul>
                  <li>
                    <div class="form-group row"></div>
                    <div class="form-group row">
                      <label class="col-md-4">Team Member</label>
                      <div class="col-md-8">
                        <select name="transMem" id="transMem"  class="custom-select2 form-control" style="width: 100%; height: 38px;">
                          <option>--Team member--</option>
                          <?php
                             $sqlAssignds = "SELECT * FROM `sales_funnel` WHERE id='$id'";
                             $resultAssignds = $connect->query($sqlAssignds);
                             while ( $rowAssignds = mysqli_fetch_assoc($resultAssignds)){
                              $temerds = $rowAssignds['project_team'];
                              $str_arrds = preg_split ("/\,/", $temerds); 
                              foreach ($str_arrds as $sellsdds) {
                                if ($sellsdds == "" || $sellsdds == null){

                                }else{
                            ?>
                            <option value="<?php echo $sellsdds?>"><?php echo $sellsdds?></option>
                            <?php
                                }
                              }
                            }
                            ?>
												</select>	
                      </div>
                    </div><br>
                    <div class="form-group row">
                      <label class="col-md-4">To Team Member</label>
                      <div class="col-md-8">
                        <select name="toTransMem" id="toTransMem"  class="custom-select2 form-control" style="width: 100%; height: 38px;">
												<!-- <optgroup label="Please choose team member"> -->
                          <option>--Team member--</option>
                          <?php
                          $sqlAssignq = "SELECT * FROM `sales_funnel` WHERE id='$id'";
                          $resultAssignq = $connect->query($sqlAssignq);
                          while ( $rowAssignq = mysqli_fetch_assoc($resultAssignq)){
                           $temerq = $rowAssignq['project_team'];
                           $str_arrq = preg_split ("/\,/", $temerq); 
                           foreach ($str_arrq as $selq) {
                             if ($selq == "" || $selq == null){

                             }else{
                         ?>
                         <option value="<?php echo $selq?>"><?php echo $selq?></option>
                         <?php
                             }
                           }
                         }
                         ?>
                        <!-- </optgroup> -->
												</select>	
                      </div>
                    </div>
                         <br>
                    <div class="row">
                      <div class="col-lg-12">
                      <!-- <table style="font-size: 14px;;" id="myTablexv" class="table table-bordered table-striped">
                          <tr>
                            <th>NO.</th>
                            <th>TASK JOB</th>
                            <th>PROGRESS</th>
                            <th>REMARKS</th>
                            <th></th>
                          </tr>
                        </table> -->
                        <table style="font-size: 14px;;" id="myTablexx" class="table table-bordered table-striped">
                          <tr>
                            <th>NO.</th>
                            <th>TASK JOB</th>
                            <th>PROGRESS</th>
                            <th>REMARKS</th>
                            <th></th>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="transferPro" class="btn btn-warning">Transfer</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </form>
          <script>
          $("#transMem").change(function(){
          // alert("ahade")
            let id = document.getElementById('idd').value
            let names = document.getElementById('transMem')
            let nameb = names.options[names.selectedIndex].text;
            $.ajax({
              url:'theFunction/tasking.php',
              type:'POST',
              data: {
                id: id,
                nameb: nameb,
              },
              success:function(result){
                var datas = result;
                $("#myTablexx").html(result);
              },
              error:function(status){
                alert('error');
              }
            });
          });

          $("#transferPro").click(function(){
            let id = document.getElementById('idd').value;
            let a = document.getElementById('transMem')
            let nameFrom = a.options[a.selectedIndex].text;
            let b = document.getElementById('toTransMem')
            let nameTo = b.options[b.selectedIndex].text;
            $.ajax({
              url: "theFunction/transferTask.php",
              type: "POST",
              data: {
                id: id,
                namef: nameFrom,
                namet: nameTo,
              },
              success: function (data, status, xhr) {
                var datas = data;
                datas = datas.replace('"','');
                if (datas.includes("100")){
                  Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Successful',
                    timer: 2000,
                  })
                  setTimeout(function() {
                    window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                  }, 2000);
                               
                }else{
                  Swal.fire({
                    icon: 'warning',
                    title: 'Ops...',
                    text: 'Not successful',
                    timer: 2000,
                  })
                  setTimeout(function() {
                    window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                  }, 2000);
                }
              }
            });
          })
          </script>
		    </div>
	    </div>
    </div>


    <!-- Add Task Project -->
    <div class="modal fade customscroll" id="newTask" name="newTask" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle"></h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
          <form>
            <div class="modal-body pd-0">
              <div class="task-list-form">
                <ul>
                  <li>
                    <div class="form-group row"></div>
                    <div class="form-group row">
                      <label class="col-md-4">Team Member</label>
                      <div class="col-md-8">
                        <select name="addTeamName" id="addTeamName"  class="custom-select2 form-control" style="width: 100%; height: 38px;">
                                                    <option>--Team member--</option>
                                                        <?php
                                                             $sqlAssignd = "SELECT * FROM `sales_funnel` WHERE id='$id'";
                                                             $resultAssignd = $connect->query($sqlAssignd);
                                                             while ( $rowAssignd = mysqli_fetch_assoc($resultAssignd)){
                                                              $temerd = $rowAssignd['project_team'];
                                                              // if (in_array($temer, $teamPunya)){
                                                              // }else{
                                                                $str_arrd = preg_split ("/\,/", $temerd); 
                                                                foreach ($str_arrd as $sellsdd) {
                                                                  if ($sellsdd == "" || $sellsdd == null){
                        
                                                                  }else{
                                                            ?>
                                                            <option value="<?php echo $sellsdd?>"><?php echo $sellsdd?></option>
                                                            <?php
                                                                  }
                                                                }
                                                             }
                                                             ?>
                                                    </optgroup>
												</select>	
                                            </div>
                                        </div>
                                        <!-- <form class="form-horizontal"> -->
                                          <br>
                     <div class="row">
                         <div class="col-lg-12">
                            <table id="myTablef" class="table table-bordered table-striped">
                            <tr>
                                <th>JOB TASK</th>
                                <th>MODULE</th>
                                <th>DATE STARTED</th>
                                <th>DUE DATE</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" id="jobName" name="jobName" placeholder="" value="">  </td>
                                <td><input type="text" class="form-control" id="modul" name="modul" placeholder="" value="">  </td>
                                <td><input type="date" format="dd/mm/yyyy" class="form-control" id="dateStart" name="dateStart" placeholder="" value="" style="font-size: 12px;"></td>
                                <td><input type="date" class="form-control" id="dueDate" name="dueDate" placeholder="" value="" style="font-size: 12px;"></td>
                                <td><button type="button"  class="btn btn-warning btn-block" onclick="productAddToTable()">Add</button></td>
                            </tr>
                            </table>
                        </div>
                     </div>

                      <div class="row">
                      <!-- <div class="offset-sm-8 col-sm-4"> -->
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-4">
                      <input type="button" name="saveTask" id="saveTask" value="Submit" class="btn btn-primary btn-block">
                      </div>
                      <div class="col-md-4">
                      <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal">Close</button>
                          <!-- <button type="button" onclick="saveJob()" name="simpan" id="simpan" class="btn btn-success btn-block">SUBMIT</button> -->
                        </div>
                      </div>
                    </form>

                    <script>

                    function productAddToTable() {
                        // First check if a <tbody> tag exists, add one if not
                        if ($("#myTablef tbody").length == 0) {
                            $("#myTablef").append("<tbody></tbody>");
                        }

                        let jn = document.querySelector('#jobName').value;
                        let mod = document.querySelector('#modul').value;
                        let ds = document.querySelector('#dateStart').value;
                        let dd = document.querySelector('#dueDate').value;

                        let harids = ds.substring(10, 8);
                        let bulands = ds.substring(7, 5);
                        let tahunds = ds.substring(0, 4);

                        let haridd = dd.substring(10, 8);
                        let bulandd = dd.substring(7, 5);
                        let tahundd = dd.substring(0, 4);

                        let fullDateds = harids + "/" + bulands + "/" + tahunds;
                        let fullDatedd = haridd + "/" + bulandd + "/" + tahundd;

                        if (jn == "" || jn == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your Job Task',
                                timer: 2000,
                            })
                        }else if (mod == "" || mod == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your modul',
                                timer: 2000,
                            })

                        }else if (ds == "" || ds == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your date start',
                                timer: 2000,
                            })

                        }else if (dd == "" || dd == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your due date',
                                timer: 2000,
                            })
                        }else{
                        // Append product to the table
                        $("#myTablef tbody").append(
                            "<tr>" +
                            "<td>" + $("#jobName").val() + "</td>" +
                            "<td>" + $("#modul").val() + "</td>" +
                            "<td>" + fullDateds + "</td>" +
                            "<td>" + fullDatedd + "</td>" +
                            "<td>" +
                            "<button type='button' onclick='productDelete(this);' name='simpan' id='simpan' class='btn btn-danger btn-block'>Delete</button>" +
                            // "<button type='button' onclick='productDelete(this);'                                  class='btn btn-default'>" +
                            // "<span class='glyphicon glyphicon-remove' />" +
                            // "</button>" +
                            "</td>" +
                            "</tr>");

                            document.querySelector('#jobName').value = "";
                            document.querySelector('#modul').value = "";
                            document.querySelector('#dateStart').value = "";
                            document.querySelector('#dueDate').value = "";
                        }
                    }
                    </script>
                    <script>
                    function productDelete(ctl) {
                        $(ctl).parents("tr").remove();
                    }
                    function productDelete3(ctl) {
                        $(ctl).parents("tr").remove();
                    }
                    function productDelete4(ctl) {
                        $(ctl).parents("tr").remove();
                    }

                    function productDeleter(ctl4) {
                        $(ctl4).parents("tr").remove();
                    }


                    function myFunction() {

                        let jn = document.querySelector('#jobName').value;
                        let mod = document.querySelector('#modul').value;
                        let ds = document.querySelector('#dateStart').value;
                        let dd = document.querySelector('#dueDate').value;
                            
                        if (jn == "" || jn == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your Job Task',
                                timer: 2000,
                            })
                        }else if (mod == "" || mod == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your modul',
                                timer: 2000,
                            })

                        }else if (ds == "" || ds == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your date start',
                                timer: 2000,
                            })

                        }else if (dd == "" || dd == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your due date',
                                timer: 2000,
                            })
                        }else{
                            var table = document.getElementById("myTable");
                            var row = table.insertRow(1);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);

                            cell1.innerHTML = document.querySelector('#jobName').value;
                            cell2.innerHTML = document.querySelector('#modul').value;
                            cell3.innerHTML = document.querySelector('#dateStart').value;
                            cell4.innerHTML = document.querySelector('#dueDate').value;
                            cell5.innerHTML = "<button type='button' onclick='productDelete(this);' name='simpan' id='simpan' class='btn btn-danger btn-block'>Delete</button>";


                            document.querySelector('#jobName').value = "";
                            document.querySelector('#modul').value = "";
                            document.querySelector('#dateStart').value = "";
                            document.querySelector('#dueDate').value = "";
                        }
                        function productDelete(ctl) {
                            $(ctl).parents("tr").remove();
                        }
                    }

                    $("#saveTask").click(function(){
                       let kira = 0;
                        var table = document.getElementById("myTablef");
                        var nama = document.getElementById('addTeamName').value;
                        var proId = document.getElementById('idd').value;  
                        var projeckName = document.getElementById('nameProject').value;
                        let kiratable = table.rows.length - 2;
                        if (nama == "--Team member--" || nama == "" || nama == null){
                          Swal.fire({
                            icon: 'warning',
                            title: 'Ops...',
                            text: 'Please select team name!',
                            timer: 2000,
                          })
                        }else{
                        for (var r = 2, n = table.rows.length; r < n; r++){
                          var jobName = table.rows[r].cells[0].innerHTML;
                          var modul = table.rows[r].cells[1].innerHTML;
                          var dateStart = table.rows[r].cells[2].innerHTML;
                          var dueDate = table.rows[r].cells[3].innerHTML;

                          kira++;

                          $.ajax({
                            url: "theFunction/addJobAd.php",
                              type: "POST",
                              data: {
                                jobName: jobName,
                                modul: modul,
                                dateStart: dateStart,
                                dueDate: dueDate,
                                nama: nama,
                                projeckName: projeckName,
                                proId: proId,
                            },
                            success: function (data, status, xhr) {
                              var datas = data;
                              datas = datas.replace('"','');
                              if (datas.includes("100")){
                                if (kira == kiratable){
                                  Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Successful',
                                    timer: 2000,
                                  })
                                  setTimeout(function() {
                                    window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                                  }, 2000);
                                }else{
                                  Swal.fire({
                                    icon: 'warning',
                                    title: 'Ops...',
                                    text: 'Not successful',
                                    timer: 2000,
                                  })
                                  setTimeout(function() {
                                    window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                                  }, 2000);
                                }
                              }else{
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Ops...',
                                    text: 'Not successful',
                                    timer: 2000,
                                  })
                                  setTimeout(function() {
                                    window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                                  }, 2000);
                              }
                            }
                          });
                        }
                      }
                    })
                   
                    
                  </script>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" id="saveTaskcc" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div> -->
                    </form>
		        </div>
	        </div>
        </div>

        <!-- Edit Project -->
        <div class="modal fade customscroll" id="edit" name="edit" tabindex="-1" role="dialog">
        <input type="hidden" id="edits5" name="edits5" value="">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				  <input type="hidden" id="edits5" name="edits5" value="">
				    <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body pd-0">
                  <div class="task-list-form">
                    <ul>
                      <li>
                        <div class="row">
                            <label for="detailtext">Project Detail</label>
                        </div>
                        <div class="row">
                            <textarea name="detailtext" id="detailtext" cols="70" rows="10"><?php echo $projectDetail?></textarea>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="modal-footer">
                <!--<button type="button" href="confirm4" data-bs-toggle="modal" data-bs-target="#confirm4" class="btn btn-primary">Insert</button>-->
                  <button type="button" id="saveDetail" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
              <script>
                $("#saveDetail").click(function(){

                  let idPro = document.getElementById("idd").value;
                  let detailtext = document.getElementById("detailtext").value;
                  // alert(detailtext);
                  $.ajax({
                    url: "theFunction/saveD.php",
                    type: "POST",
                    data: {
                      idPro: idPro,
                      detailtext: detailtext,
                    },
                    success: function (data, status, xhr) {    // success callback function
                    var datas = data;
                    datas = datas.replace('"','');
                      if (datas.includes("100")){
                      // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                        Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Successful',
                          timer: 2000,
                        })
                        setTimeout(function() {
                          window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                        }, 2000);
                      }else{
                        Swal.fire({
                          icon: 'warning',
                          title: 'Ops...',
                          text: 'Not successful',
                          timer: 2000,
                        })
                        setTimeout(function() {
                          window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                        }, 2000);
                      }
                    }
                  });
                })
              </script>
		        </div>
	        </div>
        </div>

        <!-- Upload Project -->
        <div class="modal fade customscroll" id="upl" name="upl" tabindex="-1" role="dialog">
        <input type="hidden" id="edits5" name="edits5" value="">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				  <input type="hidden" id="edits5" name="edits5" value="">
				    <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body pd-0">
                  <div class="task-list-form">
                    <ul>
                      <li>
                        <div class="row">
                          <label for="detailtext">Upload Appendix</label>
                        </div>
                        <div class="row">
                          <input type="file">
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="modal-footer">
                <!--<button type="button" href="confirm4" data-bs-toggle="modal" data-bs-target="#confirm4" class="btn btn-primary">Insert</button>-->
                  <button type="button" onclick="saveProject()" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
		        </div>
	        </div>
        </div>

        <!-- Gant Chart -->
        <div class="modal fade customscroll" id="gant" name="gant" tabindex="-1" role="dialog">
        <input type="hidden" id="edits5" name="edits5" value="">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> 
				  <input type="hidden" id="edits5" name="edits5" value="">
				    <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Gantt Chart</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form >
                <div class="modal-body pd-0">
                  <div class="task-list-form">
                    <ul>
                      <li>
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box shadow">
                              <div class="info-box-content">
                                <center>
                                  <span class="info-box-text" style="color: #0000FF;">Project</span>
                                </center>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <span class="info-box-number">Start <?php echo $proStart1;?></span>
                                  </div>
                                  <div class="col-lg-6">
                                    <span class="info-box-number">End</span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="proStart" name="proStart" value="<?php echo $proStart1;?>">
                                  </div>
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="proEnd" name="proEnd" value="<?php echo $proStart2;?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><br>

                          <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box shadow">
                              <div class="info-box-content">
                                <center>
                                  <span class="info-box-text" style="color: #0000FF;">Development</span>
                                </center>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <span class="info-box-number">Start</span>
                                  </div>
                                  <div class="col-lg-6">
                                    <span class="info-box-number">End</span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="ipStart" name="ipStart" value="<?php echo $ipStart1;?>">
                                  </div>
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="ipEnd" name="ipEnd"  value="<?php echo $ipStart2;?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><br>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box shadow">
                              <div class="info-box-content">
                                <center>
                                  <span class="info-box-text" style="color: #0000FF;">Troubleshooting | Testing</span>
                                </center>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <span class="info-box-number">Start</span>
                                  </div>
                                  <div class="col-lg-6">
                                    <span class="info-box-number">End</span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="troStart" name="troStart" value="<?php echo $troStart1;?>">
                                  </div>
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="troEnd" name="troEnd"  value="<?php echo $troStart2;?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box shadow">
                              <div class="info-box-content">
                                <center>
                                  <span class="info-box-text" style="color: #0000FF;">UAT | Training</span>
                                </center>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <span class="info-box-number">Start</span>
                                  </div>
                                  <div class="col-lg-6">
                                    <span class="info-box-number">End</span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="uatStart" name="uatStart" value="<?php echo $uatStart1;?>">
                                  </div>
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="uatEnd" name="uatEnd"  value="<?php echo $uatStart2;?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box shadow">
                              <div class="info-box-content">
                                <center>
                                  <span class="info-box-text" style="color: #0000FF;">Completed | Golive</span>
                                </center>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <span class="info-box-number">Start</span>
                                  </div>
                                  <div class="col-lg-6">
                                    <span class="info-box-number">End</span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="comStart" name="comStart" value="<?php echo $comStart1;?>">
                                  </div>
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="comEnd" name="comEnd" value="<?php echo $comStart2;?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box shadow">
                              <div class="info-box-content">
                                <center>
                                  <span class="info-box-text" style="color: #0000FF;">Pending</span>
                                </center>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <span class="info-box-number">Start</span>
                                  </div>
                                  <div class="col-lg-6">
                                    <span class="info-box-number">End</span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="penStart" name="penStart" value="<?php echo $penStart1;?>">
                                  </div>
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="penEnd" name="penEnd" value="<?php echo $penStart2;?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-3 col-sm-6 col-12">
                          </div>
                          <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box shadow">
                              <div class="info-box-content">
                                <center>
                                  <span class="info-box-text" style="color: #0000FF;">Support | Maintenance</span>
                                </center>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <span class="info-box-number">Start</span>
                                  </div>
                                  <div class="col-lg-6">
                                    <span class="info-box-number">End</span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="supStart" name="supStart" value="<?php echo $supStart1;?>">
                                  </div>
                                  <div class="col-lg-6">
                                    <input type="date" class="form-control" id="supEnd" name="supEnd" value="<?php echo $supStart2;?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </li>
                    </ul>
                  </div>
                </div>
                <div class="modal-footer">
                <!--<button type="button" href="confirm4" data-bs-toggle="modal" data-bs-target="#confirm4" class="btn btn-primary">Insert</button>-->
                  <button type="button" id="saveGant" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
              <script>
                $("#saveGant").click(function(){

                  let idPro = document.getElementById("idd").value;
                  let idCom = document.getElementById("idcomp").value;
                  let proName = document.getElementById("nameProject").value;

                  let proStart = document.getElementById("proStart").value;
                  let proEnd = document.getElementById("proEnd").value;

                  let ipStart = document.getElementById("ipStart").value;
                  let ipEnd = document.getElementById("ipEnd").value;

                  let troStart = document.getElementById("troStart").value;
                  let troEnd = document.getElementById("troEnd").value;

                  let uatStart = document.getElementById("uatStart").value;
                  let uatEnd = document.getElementById("uatEnd").value;

                  let comStart = document.getElementById("comStart").value;
                  let comEnd = document.getElementById("comEnd").value;

                  let penStart = document.getElementById("penStart").value;
                  let penEnd = document.getElementById("penEnd").value;

                  let supStart = document.getElementById("supStart").value;
                  let supEnd = document.getElementById("supEnd").value;

                  // alert(idPro)
                  // alert(detailtext);
                  $.ajax({
                    url: "theFunction/saveGant.php",
                    type: "POST",
                    data: {
                      idPro: idPro,
                      idCom: idCom,
                      proName: proName,
                      proStart: proStart,
                      proEnd: proEnd,
                      ipStart: ipStart,
                      ipEnd: ipEnd,
                      troStart: troStart,
                      troEnd: troEnd,
                      uatStart: uatStart,
                      uatEnd: uatEnd,
                      comStart: comStart,
                      comEnd: comEnd,
                      penStart: penStart,
                      penEnd: penEnd,
                      supStart: supStart,
                      supEnd: supEnd,
                    },
                    success: function (data, status, xhr) {    // success callback function
                    var datas = data;
                    datas = datas.replace('"','');
                      if (datas.includes("100")){
                      // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                        Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Successful',
                          timer: 2000,
                        })
                        setTimeout(function() {
                          window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                        }, 2000);
                      }else{
                        Swal.fire({
                          icon: 'warning',
                          title: 'Ops...',
                          text: 'Not successful',
                          timer: 2000,
                        })
                        setTimeout(function() {
                          window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                        }, 2000);
                      }
                    }
                  });
                })
              </script>
		        </div>
	        </div>
        </div>

        <!-- Delete Task -->
        <div class="modal fade customscroll" id="delTask" name="delTask" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body pd-0">
                  <div class="task-list-form">
                    <ul>
                      <li>
                        <div class="form-group row"></div>
                        <div class="form-group row">
                          <label class="col-md-4">Team Member</label>
                          <div class="col-md-8">
                            <select name="transMem" id="transMemc"  class="custom-select2 form-control" style="width: 100%; height: 38px;">
                              <option>--Team member--</option>
                              <?php
                                $sqlAssigndsc = "SELECT * FROM `sales_funnel` WHERE id='$id'";
                                $resultAssigndsc = $connect->query($sqlAssigndsc);
                                while ( $rowAssigndsc = mysqli_fetch_assoc($resultAssigndsc)){
                                  $temerdsc = $rowAssigndsc['project_team'];
                                  $str_arrdsc = preg_split ("/\,/", $temerdsc); 
                                  foreach ($str_arrdsc as $sellsddsc) {
                                    if ($sellsddsc == "" || $sellsddsc == null){

                                    }else{
                                ?>
                                <option value="<?php echo $sellsddsc?>"><?php echo $sellsddsc?></option>
                                <?php
                                    }
                                  }
                                }
                                ?>
                            </select>	
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <table style="font-size: 14px;;" id="myTablexxc" class="table table-bordered table-striped">
                              <tr>
                                <th>NO.</th>
                                <th>TASK JOB</th>
                                <th>PROGRESS</th>
                                <th>REMARKS</th>
                                <th></th>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="transferProc" class="btn btn-danger">Delete</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
              <script>
              $("#transMemc").change(function(){
              // alert("ahade")
                let id = document.getElementById('idd').value
                let names = document.getElementById('transMemc')
                let nameb = names.options[names.selectedIndex].text;
                $.ajax({
                  url:'theFunction/tasking.php',
                  type:'POST',
                  data: {
                    id: id,
                    nameb: nameb,
                  },
                  success:function(result){
                    var datas = result;
                    $("#myTablexxc").html(result);
                  },
                  error:function(status){
                    alert('error');
                  }
                });
              });

              $("#transferProc").click(function(){
                let id = document.getElementById('idd').value;
                let a = document.getElementById('transMemc')
                let nameFrom = a.options[a.selectedIndex].text;
                
                $.ajax({
                  url: "theFunction/transferTask.php",
                  type: "POST",
                  data: {
                    id: id,
                    namef: nameFrom,
                    namet: nameTo,
                  },
                  success: function (data, status, xhr) {
                    var datas = data;
                    datas = datas.replace('"','');
                    if (datas.includes("100")){
                      Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Successful',
                        timer: 2000,
                      })
                      setTimeout(function() {
                        window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                      }, 2000);
                                  
                    }else{
                      Swal.fire({
                        icon: 'warning',
                        title: 'Ops...',
                        text: 'Not successful',
                        timer: 2000,
                      })
                      setTimeout(function() {
                        window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                      }, 2000);
                    }
                  }
                });
              })
              </script>
            </div>
          </div>
        </div>

    </div>
  </div>
</section>
  
</body>


<script>
    (function(document) {
  var _bars = [].slice.call(document.querySelectorAll('.bar-inner'));
  _bars.map(function(bar, index) {
    setTimeout(function() {
    	bar.style.width = bar.dataset.percent;
    }, index * 1000);
    
  });
})(document)

// $("#saveDetail").click(function(){
//   alert("detail12")
 


// })
function saveProject(){
    var teamName = document.getElementById('prolist').value;
    var teamScope = document.getElementById('jobscope').value;
    var nameProject = document.getElementById('nameProject').value;
    // alert(teamScope);

    $.ajax({
        url: "saveTeam.php",
        type: "POST",
        data: {
            teamName: teamName,
            teamScope: teamScope,
            nameProject: nameProject,
        },
        success: function (data, status, xhr) {    // success callback function
            var datas = data;
            datas = datas.replace('"','');
            // alert(datas)
            if (datas.includes("100")){
            // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Successful',
					timer: 2000,
				})
                setTimeout(function() {
                    window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                }, 2000);
                
            }else{
                Swal.fire({
					icon: 'warning',
					title: 'Ops...',
					text: 'Not successful',
					timer: 2000,
				})
                setTimeout(function() {
                    window.location.href = "detail.php?pn=<?php echo $iddd;?>";
                }, 2000);
            }
            //alert("berjaya");
            //window.location.href = "https://uruzsales.com/a-template.php";

        }
    });
}



</script>

<?php
// include_once("footer.php");
?>