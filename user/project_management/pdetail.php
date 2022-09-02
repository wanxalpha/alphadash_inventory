<?php
include 'layouts/menu.php';
include 'connection/config.php';
$iddd = $_GET['pn'];

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
              <h5 class="card-header2">PROJECT DETAILS</h5><br>
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
                      <div class="info-box-content">
                        <span class="info-box-text" style="color: #0000FF;">STATUS:</span>
                        <span class="info-box-number"><?php echo $projectStatus?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div><br>
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
              <h5 class="card-header2">PROJECT PROGRESS</h5><br>
              <div class="col-md-12 col-sm-6 col-12">
                <div class="info-box bg-gradient-info shadow">
                  <div class="info-box-content">
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


</script>

<?php
include_once("footer.php");
?>