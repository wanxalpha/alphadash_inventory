<?php
include 'layouts/menu.php';
include 'connection/config.php';

$projectBil = $_GET['pr'];

$sqlGetProject = "SELECT * FROM `sales_funnel` WHERE id='$projectBil'";
$resultProject = mysqli_query($connect, $sqlGetProject);
  $numProject = mysqli_num_rows($resultProject);

  if ($numProject > 0){
    $rowProject = mysqli_fetch_assoc($resultProject);

      $projectBil = $rowProject['id'];
      $projectName = $rowProject['project_name'];
      $projectStart = $rowProject['project_start'];
      $projectDuration = $rowProject['project_duration'];
      $projectStatus = $rowProject['status'];
  }
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

 <body>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <input type="hidden" id="userNama" value="<?php echo $fullName?>">
    <input type="hidden" id="projeckName" value="<?php echo $projectName?>">
    <input type="hidden" id="idd" value="<?php echo $projectBil?>">
    <input type="hidden" id="iddCom" value="<?php echo $idCom?>">

    <section class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-header2">STATUS UPDATE</h5>
                <h6 class="card-header2" style="color: #0000FF;"><?php echo $projectName?></h6>
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
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#tasklist" data-bs-toggle="tab">TASK LIST</a></li>
                        <li class="nav-item"><a class="nav-link" href="#inpro" data-bs-toggle="tab">DEVELOPMENT</a></li>
                        <li class="nav-item"><a class="nav-link" href="#com" data-bs-toggle="tab">COMPLETED</a></li>
                        <li class="nav-item"><a class="nav-link" href="#balog" data-bs-toggle="tab">TRANSFER TASK</a></li>
                        <li class="nav-item"><a class="nav-link" href="#delet" data-bs-toggle="tab">DELETE TASK</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane" id="cp">
                          <form class="form-horizontal">
                            <input type="hidden" id="theKeya" name="theKeya" value="<?php echo $theKey?>">
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="oldPassword"  name="oldPassword"placeholder="old password">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="new password">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Confirm Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="confirm password">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-8 col-sm-4">
                                <button type="button" onclick="savePass()" class="btn btn-success">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <div class="active tab-pane" id="tasklist">
                          <form class="form-horizontal">
                            <div class="row">
                              <div class="col-lg-12">
                                <table id="myTable" class="table table-bordered table-striped">
                                  <tr>
                                    <th>TASK NAME</th>
                                    <th>MODULE</th>
                                    <th>DATE STARTED</th>
                                    <th>DUE DATE</th>
                                    <th>EDITABLE</th>
                                  </tr>
                                  <?php 
                                  $sqlInProgressz = "SELECT * FROM `job_task` WHERE MEMBER_NAME='$fullName' AND PROJECT_ID='$projectBil' AND f_id_com='$idCom' AND PROJECT_REMARKS IS NULL";
                                  $resultInProgressz = mysqli_query($connect, $sqlInProgressz);
                                   $numInProgressz = mysqli_num_rows($resultInProgressz);
          
                                   if ($numInProgressz > 0){
                                     while($rowInProgressz = mysqli_fetch_assoc($resultInProgressz)){
                                         $jobTAskz = $rowInProgressz['JOB_TASK'];
                                         $jobTCoz = $rowInProgressz['CO_LANG'];
                                         $jobModz = $rowInProgressz['MOD_PAG'];
                                         $jobStatusz = $rowInProgressz['PROJECT_STATUS'];
                                         $editing = $rowInProgressz['EDITING'];
                                         $dateStart = $rowInProgressz['DATE_START'];
                                         $dueDate = $rowInProgressz['DUE_DATE'];
                                  ?>
                                  <tr>
                                    <td><?php echo $jobTAskz?></td>
                                    <td><?php echo $jobModz?></td>
                                    <td><?php echo $dateStart?></td>
                                    <td><?php echo $dueDate?></td>
                                    <td><?php echo $editing?></td>
                                  </tr>
                                  <?php
                                     }
                                    }
                                    ?>
                                  <tr>
                                    <td><input type="text" class="form-control" id="jobName" name="jobName" placeholder="" value="">  </td>
                                    <td><input type="text" class="form-control" id="modul" name="modul" placeholder="" value="">  </td>
                                    <td><input type="date" format="dd/mm/yyyy" class="form-control" id="dateStart" name="dateStart" placeholder="" value="" style="font-size: 12px;"></td>
                                    <td><input type="date" class="form-control" id="dueDate" name="dueDate" placeholder="" value="" style="font-size: 12px;"></td>
                                    <td><button type="button"  class="btn btn-warning btn-block" onclick="productAddToTable()">Add</button></td>
                                  </tr>
                                </table>
                              </div>
                            </div><br>

                            <div class="form-group row">
                              <div class="offset-sm-8 col-sm-4">
                                <button type="button" onclick="saveJob()" name="simpan" id="simpan" class="btn btn-success btn-block">SUBMIT</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <script>
                          function productAddToTable() {
                            if ($("#myTable tbody").length == 0) {
                                $("#myTable").append("<tbody></tbody>");
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

                            // let fullDateds = harids + "/" + bulands + "/" + tahunds;
                            // let fullDatedd = haridd + "/" + bulandd + "/" + tahundd;
                            let fullDateds = ds;
                            let fullDatedd = dd;

                            if (jn == "" || jn == null){
                              Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your Task Name',
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
                              $("#myTable tbody").append(
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

                          function productDelete(ctl) {
                              $(ctl).parents("tr").remove();
                          }

                      function myFunction() {

                        let jn = document.querySelector('#jobName').value;
                        let mod = document.querySelector('#modul').value;
                        let ds = document.querySelector('#dateStart').value;
                        let dd = document.querySelector('#dueDate').value;
                        // let idPro = document.getElementById('idd').value;
                            
                        if (jn == "" || jn == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your Task Name',
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

                    function saveJob() {
                    //    alert("hi")
                        let kira = 0;
                        var table = document.getElementById("myTable");
                        let idPro = document.getElementById('idd').value;
                        let idCom = document.getElementById('iddCom').value;
                        // alert(idCom)
                        let kiratable = table.rows.length - 2;
                        for (var r = 2, n = table.rows.length; r < n; r++){
                            var jobName = table.rows[r].cells[0].innerHTML;
                            var modul = table.rows[r].cells[1].innerHTML;
                            var dateStart = table.rows[r].cells[2].innerHTML;
                            var dueDate = table.rows[r].cells[3].innerHTML;

                            var nama = document.getElementById('userNama').value; 
                            var projeckName = document.getElementById('projeckName').value;

                            kira++;
                            

                            // alert(kira + " = " + kiratable)

                            $.ajax({
                                url: "saveJob.php",
                                type: "POST",
                                data: {
                                    jobName: jobName,
                                    modul: modul,
                                    dateStart: dateStart,
                                    dueDate: dueDate,
                                    nama: nama,
                                    projeckName: projeckName,
                                    idPro: idPro,
                                    idCom: idCom,
                                },
                                success: function (data, status, xhr) {    // success callback function
                                    var datas = data;
                                    datas = datas.replace('"','');
                                    // alert(datas)
                                    if (datas.includes("100")){
                                    // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                                        if (kira == kiratable){
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: 'Successful',
                                                timer: 2000,
                                            })
                                            setTimeout(function() {
                                                window.location.href = "update.php?pr=<?php echo $projectBil;?>";
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
                                            window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                                        }, 2000);
                                    }
                                    //alert("berjaya");
                                    //window.location.href = "https://uruzsales.com/a-template.php";

                                }
                            });
                        }
                    }
                    
                        </script>
                  
                        <div class="tab-pane" id="inpro">
                          <form class="form-horizontal">
                            <div class="row">
                              <div class="col-md-3">
                                <label for="inputEmail" class="form-label">TASK NAME</label>
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="form-label">LANGUAGE</label>
                              </div>
                              <div class="col-md-3">
                                <label for="inputEmail" class="form-label">STATUS</label>
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="form-label">PROGRESS</label>
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="form-label">ACTION</label>
                              </div>
                            </div><br>
                     <?php
                        $totalJobInPro = 0;
                        $sqlInProgress = "SELECT * FROM `job_task` WHERE MEMBER_NAME='$fullName' AND PROJECT_ID='$projectBil' AND f_id_com='$idCom' AND PROJECT_REMARKS IS NULL";
                        $resultInProgress = mysqli_query($connect, $sqlInProgress);
                         $numInProgress = mysqli_num_rows($resultInProgress);

                         if ($numInProgress > 0){
                           while($rowInProgress = mysqli_fetch_assoc($resultInProgress)){
                               $jobTAsk = $rowInProgress['JOB_TASK'];
                               $jobTCo = $rowInProgress['PROJECT_STATUS'];
                               $jobMod = $rowInProgress['CO_LANG'];
                               $jobStatus = $rowInProgress['PROJECT_STATUS'];
                               $jid = $rowInProgress['BIL'];

                               $totalJobInPro++;
                     ?>
                            <div class="row">
                              <div class="col-md-3">
                                <h5 ><?php echo $jobTAsk?></h5>
                                <input type="hidden" class="form-control" id="jobT<?php echo $jid?>" name="jobT<?php echo $jid?>" placeholder="" value="<?php echo $jobTAsk?>">  
                              </div>
                              <div class="col-md-2">
                                <input type="text" class="form-control" id="codLang<?php echo $jid?>" name="codLang<?php echo $jid?>" placeholder="" value="<?php echo $jobMod?>">
                              </div>
                              <div class="col-md-3">
                                <select name="sta<?php echo $jid?>" id="sta<?php echo $jid?>" class="form-control">
                                  <option value="0">PENDING</option>
                                  <option value="1">HOLD</option>
                                  <option value="2">PROBLEM</option>
                                  <option value="3" selected>ON-GOING</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="modPages<?php echo $jid?>" name="modPages<?php echo $jid?>" placeholder="" value="<?php echo $jobTCo?>"> -->
                              </div>
                              <div class="col-md-2">
                                <input type="text" class="form-control" id="prog<?php echo $jid?>" name="prog<?php echo $jid?>" placeholder="" value="<?php echo $jobStatus?>">
                              </div>
                              <div class="col-md-2">
                                <input type="button" class="btn btn-success" onclick="upd<?php echo $jid?>()" id="codLang<?php echo $jid?>" name="codLang<?php echo $jid?>" value="Update">
                              </div>
                            </div><br>
                            <script>
                              function upd<?php echo $jid?>(){
                                let idTask = "<?php echo $jid?>";
                                let lnagu = document.getElementById('codLang' + idTask).value;
                                let asse = document.getElementById('sta' + idTask);
                                let staus = asse.options[asse.selectedIndex].text
                                let prog = document.getElementById('prog' + idTask).value;

                                // alert(prog);

                                $.ajax({
                                  url: "theFunction/saveInPro.php",
                                  type: "POST",
                                  data: {
                                    idTask: idTask,
                                    lnagu: lnagu,
                                    staus: staus,
                                    prog: prog,
                                    // codLang: codLang,
                                    // modPages: modPages,
                                    // proStatus: proStatus,
                                    // nama: nama,
                                    // projeckName: projeckName,
                                  },
                                  success: function (data, status, xhr) {    // success callback function
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
                                        window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                                      }, 2000);
                                    }else{
                                      Swal.fire({
                                        icon: 'warning',
                                        title: 'Ops...',
                                        text: 'Not successful',
                                        timer: 2000,
                                      })
                                      setTimeout(function() {
                                        window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                                      }, 2000);
                                    }
                                  }
                                });
                              }
                              </script>
                            <?php
                           }
                        }
                           ?>
                     
                            <div class="form-group row">
                              <div class="offset-sm-8 col-sm-4">
                                <!-- <button type="button" onclick="saveInPro()" name="simpan" id="simpan" class="btn btn-success btn-block">SUBMIT</button> -->
                                <input type="hidden" id="totalJoInPro" value="<?php echo $totalJobInPro?>">
                              </div>
                            </div>
                          </form>
                        </div>
                        <script>
                          function saveInPro(){
                            let totalJ = document.getElementById('totalJoInPro').value;
                            let kiraIn = 0;
                            for (var w = 1, q = totalJ + 1; w < q; w++){
                              let jobT = document.getElementById('jobT' + w).value;
                              let codLang = document.getElementById('codLang' + w).value;
                              let modPages = document.getElementById('modPages' + w).value;
                              let proStatus = document.getElementById('proStatus' + w).value;
                              var nama = document.getElementById('userNama').value; 
                              var projeckName = document.getElementById('projeckName').value;

                            kiraIn++;
                            // alert(jobT)
                            $.ajax({
                                url: "theFunction/saveInPro.php",
                                type: "POST",
                                data: {
                                    jobT: jobT,
                                    codLang: codLang,
                                    modPages: modPages,
                                    proStatus: proStatus,
                                    nama: nama,
                                    projeckName: projeckName,
                                },
                                success: function (data, status, xhr) {    // success callback function
                                    var datas = data;
                                   
                                    datas = datas.replace('"','');
                                    if (datas.includes("100")){
                                        if ( kiraIn == totalJ){
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: 'Successful',
                                            timer: 2000,
                                        })
                                        setTimeout(function() {
                                            window.location.href = "update.php?pr=<?php echo $projectBil;?>";
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
                                            window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                                        }, 2000);
                                    }
                                }
                            });
                        }
                      }
                        </script>
                        <div class="tab-pane" id="com">
                          <form class="form-horizontal">
                            <div class="row">
                              <div class="col-md-4">
                                <label for="inputEmail" class="form-label">TASK NAME</label>
                              </div>
                              
                              <div class="col-md-4">
                                <label for="inputEmail" class="form-label">STATUS</label>
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="form-label">PROGRESS</label>
                              </div>
                              <div class="col-md-2">
                                <label for="inputEmail" class="form-label">ACTION</label>
                              </div>
                              <!-- <div class="col-md-3">
                                <label for="inputEmail" class="form-label">REMARKS</label>
                              </div> -->
                            </div><br>
                            <?php
                              $totalJob = 0;
                              $sqlComplete = "SELECT * FROM `job_task` WHERE MEMBER_NAME='$fullName' AND PROJECT_ID='$projectBil' AND f_id_com='$idCom' AND PROJECT_REMARKS IS NULL";
                              $resultComplete = mysqli_query($connect, $sqlComplete);
                              $numInComplete = mysqli_num_rows($resultComplete);

                              if ($numInComplete > 0){
                                while($rowIComplete = mysqli_fetch_assoc($resultComplete)){
                                $jobTAsk = $rowIComplete['JOB_TASK'];

                                $codeLang = $rowIComplete['CO_LANG'];
                                $dateCom = $rowIComplete['DATE_COMPLETE'];
                                $modPages = $rowIComplete['MOD_PAG'];
                                $modBil = $rowIComplete['BIL'];
                                $jobStatus = $rowIComplete['f_status'];
                                $jobProg = $rowIComplete['PROJECT_STATUS'];

                                $totalJob++;
                            ?>
                            <div class="row">
                              <div class="col-md-4">
                                <h5><?php echo $jobTAsk?></h5>
                                <input type="hidden" class="form-control" id="jobC<?php echo $modBil?>" name="jobC<?php echo $modBil?>" placeholder="" value="<?php echo $jobTAsk?>">  
                              </div>
                             
                              <div class="col-md-4">
                                <h5><?php echo $jobStatus?></h5>
                                <input type="hidden" class="form-control" id="moduPag<?php echo $modBil?>" name="moduPag<?php echo $modBil?>" placeholder="" value="<?php echo $jobStatus?>">
                              </div>
                              <div class="col-md-2">
                                <h5><?php echo $jobProg?></h5>
                                <input type="hidden" class="form-control" id="moduPag<?php echo $modBil?>" name="moduPag<?php echo $modBil?>" placeholder="" value="<?php echo $jobProg?>">
                              </div>
                               <!-- <div class="col-md-3">
                                <input type="text" class="form-control" id="codLa<?php echo $modBil?>" name="codLa<?php echo $modBil?>" placeholder="" value="<?php echo $jobProg?>">
                              </div> -->
                              <div class="col-md-2">
                                <input type="button" class="btn btn-success" id="dateCom<?php echo $modBil?>" name="dateCom<?php echo $modBil?>" placeholder="" onclick="comm<?php echo $modBil?>()" value="COMPLETED">
                              </div>
                            </div><br>
                            <script>
                              function comm<?php echo $modBil?>(){
                                let billi = "<?php echo $modBil?>";
                                let remarksApp = "";
                                let transferTo = "";
                                let nameApp = "<?php echo $fullName?>";
                                let typeApp = "COMPLETED";
                                let designation = "<?php echo $positionUser?>";
                                let projectId = "<?php echo $projectBil?>";
                                // let projectName = "<?php //echo $projectName?>";
                                // let taskName = "";
                                let taskId = "<?php echo $modBil?>";
                                let idCom = "<?php echo $idCom?>";
                                // alert(idCom)
                                $.ajax({
                                url: "theFunction/appTask.php",
                                type: "POST",
                                data: {

                                  nameApp: nameApp,
                                  typeApp: typeApp,
                                  designation: designation,
                                  remarksApp: remarksApp,
                                  transferTo: transferTo,
                                  projectId: projectId,
                                  // projectName: projectName,
                                  // taskName: taskName,
                                  taskId: taskId,
                                  idCom: idCom,
                                  },
                                  success: function (data, status, xhr) {    // success callback function
                                    var datas = data;
                                    datas = datas.replace('"','');
                                    if (datas.includes("100")){
                                      // if (kira == kiratable){
                                        Swal.fire({
                                          icon: 'success',
                                          title: 'Success',
                                          text: 'Successful',
                                          timer: 2000,
                                        })
                                        setTimeout(function() {
                                          window.location.href = "update.php?pr=<?php echo $projectBil;?>";
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
                                        window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                                      }, 2000);
                                    }
                                  }
                                });
                              }
                              </script>
                            <?php
                                }
                              }
                            ?>
                          </form>
                        </div>

                        <div class="tab-pane" id="balog">
                          <form class="form-horizontal">
                            <div class="row">
                              <div class="col-lg-3">
                                <label for="inputEmail" class="form-label">TASK NAME</label>
                              </div>
                              <div class="col-lg-3">
                                <label for="inputEmail" class="form-label">TEAM NAME</label>
                              </div>
                              <div class="col-lg-3">
                                <label for="inputEmail" class="form-label">REMARKS</label>
                              </div>
                              <div class="col-lg-3">
                                <label for="inputEmail" class="form-label">ACTION</label>
                              </div>
                            </div><br>
                            <?php
                              $sqlInProgress = "SELECT * FROM `job_task` WHERE MEMBER_NAME='$fullName' AND PROJECT_ID='$projectBil' AND f_id_com='$idCom' AND PROJECT_REMARKS IS NULL AND f_status = ''";
                              $resultInProgress = mysqli_query($connect, $sqlInProgress);
                              $numInProgress = mysqli_num_rows($resultInProgress);

                              if ($numInProgress > 0){
                                while($rowInProgress = mysqli_fetch_assoc($resultInProgress)){
                                  $jobTAsk = $rowInProgress['JOB_TASK'];
                                  $jobBil = $rowInProgress['BIL'];
                            ?>

                            <div class="row">
                              <div class="col-lg-3">
                                <!-- <input type="text" class="form-control" value="<?php //echo $jobTAsk?>" id="jobTask<?php echo $jobBil?>" readonly> -->
                                <h5><?php echo $jobTAsk?></h5>
                              </div>
                              <div class="col-lg-3">
                                <select class="form-control select2" id="team<?php echo $jobBil?>">
                                  <option>--Team Member--</option>
                                  <?php 
                                    $teamName = "SELECT * FROM `sales_funnel` WHERE f_id_com='$idCom' AND id='$projectBil'";
                                    $resultTeamNa = $connect->query($teamName);
                                    $numTeamNA = mysqli_num_rows($resultTeamNa);

                                    if ($numTeamNA > 0){
                                      while ( $rowTeamNa = mysqli_fetch_assoc($resultTeamNa)){
                                        $userNa = $rowTeamNa['project_team'];

                                        $str_arrz = preg_split ("/\,/", $userNa); 
                                        foreach ($str_arrz as $sellsdz) {
                                          if ($sellsdz == "" || $sellsdz == " " || $sellsdz == null){
                                           }else{
                                  ?>
                                        <option><?php echo $sellsdz?></option>
                                  <?php
                                          }
                                        }
                                      }       
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="col-lg-3">
                                <input type="text" class="form-control" id="remarkss<?php echo $jobBil?>" name="remarkss<?php echo $jobBil?>" placeholder="" value="">
                              </div>
                              <div class="col-lg-3">
                                <input type="button" class="btn btn-warning" id="transe<?php echo $jobBil?>" name="transe<?php echo $jobBil?>" value="Transfer" onclick="tran<?php echo $jobBil?>()">
                              </div>
                            </div><br>
                            <script>
                              function tran<?php echo $jobBil?>(){
                                let billi = "<?php echo $jobBil?>";
                                let remarksApp = document.getElementById('remarkss' + billi).value;
                                let asse = document.getElementById('team' + billi);
                                let transferTo = asse.options[asse.selectedIndex].text
                                let nameApp = "<?php echo $fullName?>";
                                let typeApp = "TRANSFER";
                                let designation = "<?php echo $positionUser?>";
                                let projectId = "<?php echo $projectBil?>";
                                // let projectName = "<?php //echo $projectName?>";
                                // let taskName = "";
                                let taskId = "<?php echo $jobId?>";
                                let idCom = "<?php echo $idCom?>";
                                // alert(taskId)
                                $.ajax({
                                url: "theFunction/appTask.php",
                                type: "POST",
                                data: {

                                  nameApp: nameApp,
                                  typeApp: typeApp,
                                  designation: designation,
                                  remarksApp: remarksApp,
                                  transferTo: transferTo,
                                  projectId: projectId,
                                  // projectName: projectName,
                                  // taskName: taskName,
                                  taskId: taskId,
                                  idCom: idCom,
                                  },
                                  success: function (data, status, xhr) {    // success callback function
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
                                          window.location.href = "update.php?pr=<?php echo $projectBil;?>";
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
                                        window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                                      }, 2000);
                                    }
                                  }
                                });
                              }
                              </script>
                            <?php
                                }
                              }
                            ?>
                          </form>
                        </div>
                        <script>
                          function saveBackLog(){
                            let ds = document.querySelector('#dateStart').value;
                            // alert("transfer")
                            let harids = ds.substring(10, 8);
                            let bulands = ds.substring(7, 5);
                            let tahunds = ds.substring(0, 4);
                          }
                        </script>

                        <div class="tab-pane" id="prob">
                          <form class="form-horizontal">
                            <div class="row">
                              <div class="col-md-3">
                                <label for="inputEmail" class="form-label">TASK NAME</label>
                              </div>
                              <div class="col-md-3">
                                <label for="inputEmail" class="form-label">MODULE / PAGES</label>
                              </div>
                              <div class="col-md-3">
                                <label for="inputEmail" class="form-label">DATE</label>
                              </div>
                              <div class="col-md-3">
                                <label for="inputEmail" class="form-label">SOLUTIONS</label>
                              </div>
                            </div><br>

                            <?php
                                $sqlInProgress = "SELECT * FROM `job_task` WHERE MEMBER_NAME='$fullName' AND PROJECT_ID='$projectBil' AND f_id_com='$idCom'";
                                $resultInProgress = mysqli_query($connect, $sqlInProgress);
                                $numInProgress = mysqli_num_rows($resultInProgress);

                                if ($numInProgress > 0){
                                  while($rowInProgress = mysqli_fetch_assoc($resultInProgress)){
                                      $jobTAsk = $rowInProgress['JOB_TASK'];
                            ?>

                            <div class="row">
                              <div class="col-md-3">
                                <h5><?php echo $jobTAsk?></h5>
                              </div>
                              <div class="col-md-3">
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="" value="">
                              </div>
                              <div class="col-md-3">
                                <input type="date" class="form-control" id="fullName" name="fullName" placeholder="" value="">
                              </div>
                              <div class="col-md-3">
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="" value="">
                              </div>
                            </div><br>

                            <?php
                                }
                              }
                            ?>

                            <div class="form-group row">
                              <div class="offset-sm-8 col-sm-4">
                                <button type="button" onclick="saveProb()" name="simpan" id="simpan" class="btn btn-success btn-block">SUBMIT</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <script>
                          function saveProb(){
                            alert("Problem")
                          }
                        </script>

                        <div class="tab-pane" id="delet">
                          <form class="form-horizontal">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="inputEmail" class="form-label">TASK NAME</label>
                              </div>
                             
                              <div class="col-lg-4">
                                <label for="inputEmail" class="form-label">REMARKS</label>
                              </div>
                              <div class="col-lg-4">
                                <label for="inputEmail" class="form-label">ACTION</label>
                              </div>
                            </div><br>
                            <?php
                              $sqlInProgress = "SELECT * FROM `job_task` WHERE MEMBER_NAME='$fullName' AND PROJECT_ID='$projectBil' AND f_id_com='$idCom' AND PROJECT_REMARKS IS NULL AND f_status = ''";
                              $resultInProgress = mysqli_query($connect, $sqlInProgress);
                              $numInProgress = mysqli_num_rows($resultInProgress);

                              if ($numInProgress > 0){
                                while($rowInProgress = mysqli_fetch_assoc($resultInProgress)){
                                  $jobTAsk = $rowInProgress['JOB_TASK'];
                                  $jobId = $rowInProgress['BIL'];
                            ?>

                            <div class="row">
                              <div class="col-lg-4">
                                <h5><?php echo $jobTAsk?></h5>
                              </div>
    
                              <div class="col-lg-4">
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="" value="">
                              </div>
                              <div class="col-lg-4">
                                <input type="button" class="btn btn-danger" onclick="delle<?php echo $jobId?>()" id="delets" name="fullName" placeholder="" value="Delete">
                              </div>
                            </div><br>
                            <script>
                              function delle<?php echo $jobId?>(){
                                let nameApp = "<?php echo $fullName?>";
                                let typeApp = "DELETE";
                                let designation = "<?php echo $positionUser?>";
                                let remarksApp ="";
                                let transferTo = "";
                                let projectId = "<?php echo $projectBil?>";
                                // let projectName = "<?php echo $projectName?>";
                                // let taskName = "";
                                let taskId = "<?php echo $jobId?>";
                                let idCom = "<?php echo $idCom?>";
                                // alert(taskId)
                                $.ajax({
                                url: "theFunction/appTask.php",
                                type: "POST",
                                data: {

                                  nameApp: nameApp,
                                  typeApp: typeApp,
                                  designation: designation,
                                  remarksApp: remarksApp,
                                  transferTo: transferTo,
                                  projectId: projectId,
                                  // projectName: projectName,
                                  // taskName: taskName,
                                  taskId: taskId,
                                  idCom: idCom,
                                },
                                success: function (data, status, xhr) {    // success callback function
                                    var datas = data;
                                    datas = datas.replace('"','');
                                    // alert(datas)
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
                                                window.location.href = "update.php?pr=<?php echo $projectBil;?>";
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
                                            window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                                        }, 2000);
                                    }
                                    //alert("berjaya");
                                    //window.location.href = "https://uruzsales.com/a-template.php";

                                }
                            });

                                alert(id)
                              }
                            </script>
                            <?php
                                }
                              }
                            ?>
                          </form>
                        </div>

                        </div>
                      </div><!-- /.card-body -->
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
</body>
<?php
include_once("footer.php");
?>

<script>
var xValues = ["Project Started", "Development", "SpaTroubleshooting | Testingin", "UAT | Training", "Completed | Golive", "Pending", "Support | Maintenance"];
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