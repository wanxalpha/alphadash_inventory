<?php
include 'layouts/menu.php';
include 'connection/config.php';
// $iddd = $_GET['pn'];

// $projectDetailz = "SELECT * FROM `sales_funnel` WHERE id='$iddd'";
// $result = $connect->query($projectDetailz);
// $rowd = mysqli_fetch_assoc($result);
// $id = $rowd['id'];
// $projectName = $rowd['project_name'];
// $projectPillarz = $rowd['project_pillar'];
// $projectDetail = $rowd['project_detail'];
// $projectStart = $rowd['project_start'];
// $projectDue = $rowd['project_due_date'];
// $projectProgress = $rowd['project_progress'];
// $projectStatus = $rowd['status'];
// $projectManager = $rowd['project_manager'];
// $projectTeam = $rowd['project_team'];
// $projectPIC = $rowd['pic_name'];
// $projectCost = $rowd['value'];
// $totalHours = $rowd['total_hours'];
// $projectPriority = $rowd['project_priority'];
// $createdBy = $rowd['created_by'];
// $createdDate = $rowd['created_at'];
// $proDur = $rowd['project_duration'];
// $demClass = "bo1";

// if ($projectProgress == "" || $projectProgress == null){
//     $projectProgress = "0";
// }

// $theLength = strlen($projectCost);
// if ($theLength == 4 || $theLength == "4"){
//   $theCost1= substr($projectCost,0,1);
//   $theCost2= substr($projectCost,1,3);
//   $theCust = $theCost1 . "," . $theCost2 . ".00";
// }else if ($theLength == 5 || $theLength == "5"){
//   $theCost1= substr($projectCost,0,2);
//   $theCost2= substr($projectCost,2,3);
//   $theCust = $theCost1 . "," . $theCost2 . ".00";
// }else if ($theLength == 6 || $theLength == "6"){
//   $theCost1= substr($projectCost,0,3);
//   $theCost2= substr($projectCost,3,3);
//   $theCust = $theCost1 . "," . $theCost2 . ".00";
// }else if ($theLength == 7 || $theLength == "7"){
//   $theCost1= substr($projectCost,0,1);
//   $theCost2= substr($projectCost,1,3);
//   $theCost3= substr($projectCost,4,3);
//   $theCust = $theCost1 . "," . $theCost2 . "," . $theCost3 . ".00";
// }else if ($theLength == 8 || $theLength == "8"){
//   $theCost1= substr($projectCost,0,2);
//   $theCost2= substr($projectCost,2,3);
//   $theCost3= substr($projectCost,5,3);
//   $theCust = $theCost1 . "," . $theCost2 . "," . $theCost3 . ".00";
// }else if ($theLength == 9 || $theLength == "9"){
//   $theCost1= substr($projectCost,0,3);
//   $theCost2= substr($projectCost,3,3);
//   $theCost3= substr($projectCost,6,3);
//   $theCust = $theCost1 . "," . $theCost2 . "," . $theCost3 . ".00";
// }else {
//   $theCust = $projectCost . ".00";
// }


// $sqlGant = "SELECT * FROM `gant_chart` WHERE project_id='$iddd' AND f_id_com='$idCom'";
// $resGant = $connect->query($sqlGant);
// $numGant = mysqli_num_rows($resGant);
// if ($numGant > 0){
//   $rowGant = mysqli_fetch_assoc($resGant);
//   $proStart1 = $rowGant['pro_start_1'];
//   $proStart2 = $rowGant['pro_start_2'];
//   $ipStart1 = $rowGant['pro_ip_1'];
//   $ipStart2 = $rowGant['pro_ip_2'];
//   $troStart1 = $rowGant['pro_tro_1'];
//   $troStart2 = $rowGant['pro_tro_2'];
//   $uatStart1 = $rowGant['pro_uat_1'];
//   $uatStart2 = $rowGant['pro_uat_2'];
//   $comStart1 = $rowGant['pro_com_1'];
//   $comStart2 = $rowGant['pro_com_2'];
//   $penStart1 = $rowGant['pro_pen_1'];
//   $penStart2 = $rowGant['pro_pen_2'];
//   $supStart1 = $rowGant['pro_sup_1'];
//   $supStart2 = $rowGant['pro_sup_2'];
// }else{
//   $proStart1 = "";
//   $proStart2 = "";
//   $ipStart1 = "";
//   $ipStart2 = "";
//   $troStart1 = "";
//   $troStart2 = "";
//   $uatStart1 = "";
//   $uatStart2 = "";
//   $comStart1 = "";
//   $comStart2 = "";
//   $penStart1 = "";
//   $penStart2 = "";
//   $supStart1 = "";
//   $supStart2 = "";
// }

// $projectTeamzz =  explode(",",$projectTeam);
// $projectTeamzz = preg_split ("/\,/", $projectTeam); 
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
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="./plugins/jszip/jszip.min.js"></script>
 <script src="./plugins/pdfmake/pdfmake.min.js"></script>
 <script src="./plugins/pdfmake/vfs_fonts.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <script src="./dist/js/adminlte.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>


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
              <h5 class="card-header2">APPROVAL</h5><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Remarks</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                  $bilg = 1;
                        $sqlHis = "SELECT * FROM approval_pro WHERE f_id_com='$idCom' AND action_app IS NULL";
                        $resHis = mysqli_query($connect, $sqlHis);
                        $numHis = mysqli_num_rows($resHis);
                        if ($numHis > 0){
                          while ($rowHis = mysqli_fetch_assoc($resHis)){

                            $transferAppg = $rowHis['tarnsfer_to'];
                            if ($transferAppg == "" || $transferAppg == null){
                              $transg = "";
                            }else{
                              $transg = "TO (" . $transferAppg . ")";
                            }
                      ?>
                      <tr>
                      <td><?php echo $bilg?></td>
                      <td><?php echo $rowHis['type_app']?></td>
                      <td><?php echo $rowHis['name_app']?></td>
                      <td><?php echo $rowHis['designation_app']?></td>
                      <td><?php echo $rowHis['remarks_app']?> <?php echo $transg?></td>
                      <td><a  type="button" href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#appr<?php echo $rowHis['id']?>">Approved</a> <a  type="button" href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rej<?php echo $rowHis['id']?>">Reject</a></td>
                      <!-- insert cost -->
                  <div class="modal fade customscroll" id="appr<?php echo $rowHis['id']?>" name="appr<?php echo $rowHis['id']?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                      <div class="modal-content">
                        <form>
                          <div class="modal-body pd-0">
                            <div class="task-list-form">
                              <!-- <ul>
                                <li> -->
                                  <div class="form-group row">
                                  <h5 class="modal-title" style="text-align: center;">Are you sure want to Approve?</h5>
                                  </div>
                                <!-- </li>
                              </ul> -->
                            </div>
                          </div>
                       
                          <div class="modal-footer" style="align-self: center;">
                          <!-- <input type="button" class="btn btn-success" value="Yes" onclick="yesza<?php echo $rowHis['id']?>()"> -->
                            <button type="button" onclick="yesza<?php echo $rowHis['id']?>()" class="btn btn-success"  data-bs-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <script>
                              function yesza<?php echo $rowHis['id']?>(){
                                let idd = "<?php echo $rowHis['id']?>";
                                let projectId = <?php echo $rowHis['project_id']?>;
                                let taskId = <?php echo $rowHis['task_id']?>;
                                let idCom = <?php echo $rowHis['f_id_com']?>;
                                let stat = "YES";
                                let typeApp = "";
                                let transferTo = "";
                                // alert("test")
                                // alert(stat)
                                $.ajax({
                                url: "theFunction/approvez.php",
                                type: "POST",
                                data: {
                                    idd: idd,
                                    projectId: projectId,
                                    taskId: taskId,
                                    idCom: idCom,
                                    stat: stat,
                                    typeApp: typeApp,
                                    transferTo: transferTo,
                                },
                                success: function (data, status, xhr) {    // success callback function
                                    var datas = data;
                                    // alert(datas)
                                    datas = datas.replace('"','');
                                    // if (datas.includes("100")){
                                    // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                                        // if (kira == kiratable){
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: 'Successful',
                                                timer: 2000,
                                            })
                                            setTimeout(function() {
                                                window.location.href = "approval.php";
                                            }, 2000);
                                        // }
                                    // }else{
                                    //     Swal.fire({
                                    //         icon: 'warning',
                                    //         title: 'Ops...',
                                    //         text: 'Not successful',
                                    //         timer: 2000,
                                    //     })
                                    //     setTimeout(function() {
                                    //         window.location.href = "approval.php";
                                    //     }, 2000);
                                    // }
                                }
                                });
                                // alert("aha")
                              }
                              </script>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade customscroll" id="rej<?php echo $rowHis['id']?>" name="rej<?php echo $rowHis['id']?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                      <div class="modal-content">
                        <form>
                          <div class="modal-body pd-0">
                            <div class="task-list-form">
                              <div class="form-group row">
                                <h5 class="modal-title" style="text-align: center;">Are you sure want to Reject?</h5>
                              </div>
                            </div>
                          </div>
                       
                          <div class="modal-footer" style="align-self: center;">
                            <button type="button" onclick="noza<?php echo $rowHis['id']?>()" class="btn btn-success" data-bs-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <script>
                              function noza<?php echo $rowHis['id']?>(){
                              let idd = <?php echo $rowHis['id']?>;
                              let projectId = <?php echo $rowHis['project_id']?>;
                              let taskId = <?php echo $rowHis['task_id']?>;
                              let typeApp = "";
                              let idCom = <?php echo $rowHis['f_id_com']?>;
                              let transferTo = "";
                              let stat = "NO";
                              // alert(typeApp)
                              $.ajax({
                                url: "theFunction/approvez.php",
                                type: "POST",
                                data: {
                                    idd: idd,
                                    projectId: projectId,
                                    taskId: taskId,
                                    idCom: idCom,
                                    stat: stat,
                                    typeApp: typeApp,
                                    transferTo: transferTo,
                                },
                                success: function (data, status, xhr) {    // success callback function
                                    var datas = data;
                                    datas = datas.replace('"','');
                                    if (datas.includes("100")){
                                    // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                                        // if (kira == kiratable){
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: 'Successful',
                                                timer: 2000,
                                            })
                                            setTimeout(function() {
                                                window.location.href = "approval.php";
                                            }, 2000);
                                        // }
                                    }else{
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Ops...',
                                            text: 'Not successful',
                                            timer: 2000,
                                        })
                                        setTimeout(function() {
                                            window.location.href = "approval.php";
                                        }, 2000);
                                    }
                                }
                            });
                          }
                              </script>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                      </tr>
                      <script>
                          function yesz<?php echo $rowHis['id']?>(){
                              let idd = "<?php echo $rowHis['id']?>";
                              alert(idd)
                              // let projectId = <?php echo $rowHis['project_id']?>;
                              // let taskId = <?php echo $rowHis['task_id']?>;
                              // let idCom = <?php echo $rowHis['f_id_com']?>;
                              // let stat = "YES";
                              // alert(stat)
                            //   $.ajax({
                            //     url: "theFunction/approvez.php",
                            //     type: "POST",
                            //     data: {
                            //         idd: idd,
                            //         projectId: projectId,
                            //         taskId: taskId,
                            //         idCom: idCom,
                            //         stat: stat,
                            //     },
                            //     success: function (data, status, xhr) {    // success callback function
                            //         var datas = data;
                            //         datas = datas.replace('"','');
                            //         if (datas.includes("100")){
                            //         // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                            //             if (kira == kiratable){
                            //                 Swal.fire({
                            //                     icon: 'success',
                            //                     title: 'Success',
                            //                     text: 'Successful',
                            //                     timer: 2000,
                            //                 })
                            //                 setTimeout(function() {
                            //                     window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                            //                 }, 2000);
                            //             }
                            //         }else{
                            //             Swal.fire({
                            //                 icon: 'warning',
                            //                 title: 'Ops...',
                            //                 text: 'Not successful',
                            //                 timer: 2000,
                            //             })
                            //             setTimeout(function() {
                            //                 window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                            //             }, 2000);
                            //         }
                            //     }
                            // });

                          }

                          
                      </script>
                      <?php
                      $bilg++;
                          }
                        }
                      ?>
                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><br>
    <!-- </div>

    

    <div class="container-xxl flex-grow-1 container-p-y"> -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-header2">HISTORY</h5><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Remarks</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                      <?php
                      $idf = 1;
                        $sqlHisz = "SELECT * FROM approval_pro WHERE f_id_com='$idCom' AND action_app IS NOT NULL";
                        $resHisz = mysqli_query($connect, $sqlHisz);
                        $numHisz = mysqli_num_rows($resHisz);
                        if ($numHisz > 0){
                          while ($rowHisz = mysqli_fetch_assoc($resHisz)){
                              $actionapp = $rowHisz['action_app'];
                              $transferApp = $rowHisz['tarnsfer_to'];
                              if ($actionapp == "APPROVED"){
                                  $colorApp = "green";
                              }else if ($actionapp == "REJECT"){
                                    $colorApp = "red";
                              }else{
                                $colorApp = "orange";
                              }

                              if ($transferApp == "" || $transferApp == null){
                                $trans = "";
                              }else{
                                $trans = "TO (" . $transferApp . ")";
                              }
                      ?>
                      <tr>
                      <td style="color:<?php echo $colorApp?> ;"><?php echo  $idf?></td>
                      <td style="color:<?php echo $colorApp?> ;"><?php echo $rowHisz['type_app']?></td>
                      <td style="color:<?php echo $colorApp?> ;"><?php echo $rowHisz['name_app']?></td>
                      <td style="color:<?php echo $colorApp?> ;"><?php echo $rowHisz['designation_app']?></td>
                      <td style="color:<?php echo $colorApp?> ;"><?php echo $rowHisz['remarks_app']?> <?php echo $trans?></td>
                      <td style="color:<?php echo $colorApp?> ;"><?php echo $rowHisz['action_app']?></td>
                      </tr>
                      <?php
                       $idf++;
                          }
                        }
                      ?>
                  
                </tbody>
              </table>
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


</script>

<?php
include_once("footer.php");
?>

 <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="./plugins/jszip/jszip.min.js"></script>
 <script src="./plugins/pdfmake/pdfmake.min.js"></script>
 <script src="./plugins/pdfmake/vfs_fonts.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <script src="./dist/js/adminlte.min.js"></script>
 <script>
    $(function () {
      $("#example2").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
      $("#example3").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
      $("#onGoing").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#contact_wrapper .col-md-6:eq(0)');
    });

 </script>