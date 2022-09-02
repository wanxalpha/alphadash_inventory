<?php
include_once("../menu/menu-dash-a.php");
include 'connection/config.php';

$projectBil = $_GET['pr'];

$sqlProject = "SELECT * FROM sales_funnel WHERE id='$projectBil'";
$resultProject = mysqli_query($connect, $sqlProject);
// $resultProject = $connect->query($sqlProject);
$numProject = mysqli_num_rows($resultProject);
if ($numProject > 0){
    $rowProject = mysqli_fetch_assoc($resultProject);
    $theTotal = "";
    $projectId = $rowProject['id'];
    $projectStatus = $rowProject['status'];
    $projectDate = $rowProject['project_receive_date'];
    $projectName = $rowProject['project_name'];
    $projectPillar = $rowProject['project_pillar'];
    $projectDiscount = $rowProject['discount'];
    if ($projectDiscount == "" || $projectDiscount == null){
      $projectDiscount = "0";
    }

    $theTotal;
    $str_arrzx = preg_split ("/\,/", $projectPillar); 
    foreach ($str_arrzx as $sellsdzx) {

      // $pilla = str_replace('A','ALPHADASH',$pilla);
      $sellsdzx = str_replace('[','',$sellsdzx);
      $sellsdzx = str_replace(']','',$sellsdzx);
      $sellsdzx = str_replace('"','',$sellsdzx);
      $sellsdzx = str_replace('"','',$sellsdzx);
      $sellsdzx = str_replace(',','',$sellsdzx);

      $sqlCheckP = "SELECT * FROM project_pillar WHERE project_code='$sellsdzx'";
      $resCheck = mysqli_query($connect, $sqlCheckP);
      $numCheck = mysqli_num_rows($resCheck);
      if ($numCheck > 0){
        $rowCheck = mysqli_fetch_assoc($resCheck);
        $theTotal .= $rowCheck['project_pillar'] . ",";
      }
    }

    // $projectPillar = str_replace('[','',$projectPillar);
    // $projectPillar = str_replace(']','',$projectPillar);
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

    $clientName = $rowProject['customer_name'];
    $companyName = $rowProject['company_name'];
    $companyAddress = $rowProject['company_address'];
    $contactNo = $rowProject['customer_contact'];
    $clientEmail = $rowProject['customer_email'];
    $clientPosition = $rowProject['customer_position'];
    $projectDetail = $rowProject['project_detail'];
    $projectValue = $rowProject['value'];
}
?>

<script>
  // var element1 = document.getElementById("test1");
  // var element2 = document.getElementById("test2");
  // var element3 = document.getElementById("test3");
  // element2.classList.remove("active");
  // element3.classList.remove("active");
  // element1.classList.add("active");
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Content Wrapper. Contains page content -->
 <style>
   .vl {
  border-left: 6px solid white;
  /* height: 500px; */
}

.h5w {
    color: white;
    font-size: 14px;
    /* border-left: 6px solid white; */
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

.bk {
    background-color: #4682B4;
    border-radius: 5px;
    border-top: 11px;
    padding-top: 12px;
  }

  .bc {
    background-color: orange;
    border-radius: 5px;
    border-top: 11px;
    padding-top: 2px;
    padding-bottom: 2px;
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
  <input type="hidden" value="<?php echo $projectName?>" id="namepro">
  <input type="hidden" id="projectId" value="<?php echo $projectId?>">

    <section class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-header2">NEW PROJECT DETAILS / <b style="color: #0000FF;"><?php echo $projectName?></b></h5>
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
                <h6 class="card-header2">PROJECT</h6><hr>
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box shadow" style="height: 50px;">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;font-size:14px; padding:1rem; padding-top:1rem;">PROJECT NAME</span><br>
                          <span class="info-box-number" style="font-size:12px; padding:1rem; padding-top:1rem;"><?php echo $projectName?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box shadow" style="height: 50px;">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;font-size:14px; padding:1rem; padding-top:1rem;">CLIENT NAME</span><br>
                          <span class="info-box-number" style="font-size:12px; padding:1rem; padding-top:1rem;"><?php echo $clientName?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box shadow" style="height: 50px;">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;font-size:14px; padding:1rem; padding-top:1rem;">COMPANY NAME</span><br>
                          <span class="info-box-number" style="font-size:12px; padding:1rem; padding-top:1rem;"><?php echo $companyName?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box shadow" style="height: 50px;">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;font-size:14px; padding:1rem; padding-top:1rem;">COMPANY ADDRESS</span><br>
                          <span class="info-box-number" style="font-size:12px; padding:1rem; padding-top:1rem;"><?php echo $companyAddress?></span>
                        </div>
                      </div>
                    </div>
                  </div><br>
                        
                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box shadow" style="height: 50px;">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;font-size:14px; padding:1rem; padding-top:1rem;">CONTACT NO</span><br>
                          <span class="info-box-number" style="font-size:12px; padding:1rem; padding-top:1rem;"><?php echo $contactNo?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box shadow" style="height: 50px;">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;font-size:14px; padding:1rem; padding-top:1rem;">EMAIL</span><br>
                          <span class="info-box-number" style="font-size:12px; padding:1rem; padding-top:1rem;"><?php echo $clientEmail?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box shadow" style="height: 50px;">
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;font-size:14px; padding:1rem; padding-top:1rem;">POSITION</span><br>
                          <span class="info-box-number" style="font-size:12px; padding:1rem; padding-top:1rem;"><?php echo $clientPosition?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                      <!-- <div class="info-box shadow" style="height: 80px;"> -->
                        <div class="info-box-content">
                          <span class="info-box-text" style="color: #0000FF;font-size:14px;">PRIORITY</span><br>
                          <select id="prior" class="form-control form-control-sm select2" style="font-size:12px">
                            <option value="0" selected="selected">HIGH</option>
                            <option value="1">MEDIUM</option>
                            <option value="2">LOW</option>
                          </select>
                        </div>
                      <!-- </div> -->
                    </div><br>
                    <div class="col-lg-2"><br>
                      <label for="inputName" class="col-form-label">START DATE</label>
                    </div>
                    <div class="col-lg-2"><br>
                      <label for="inputName" class="col-form-label">END DATE</label>
                    </div>
                  </div>
                        
                  <div class="row">
                    <div class="col-lg-2">
                      <input name="starDate" id="starDate" type="date" class="form-control select2" style="font-size:12px">
                    </div>
                    <div class="col-lg-2">
                      <input name="endDate" id="endDate" type="date" class="form-control select2" style="font-size:12px">
                    </div>
                  </div><br>
                        
                  <div class="row">
                    <div class="col-lg-3">
                      <label for="inputName" class="col-form-label">PROJECT PILLAR</label>
                    </div>
                    <div class="col-lg-3">
                      <label for="inputName" class="col-form-label">PROJECT MANAGER</label>
                    </div>
                    <div class="col-lg-3">
                      <label for="inputName" class="col-form-label">TEAM MEMBER</label>
                    </div>
                    <div class="col-lg-3">
                      <label for="inputName" class="col-form-label">PROJECT COST (RM)</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 bk">
                      <h5 class="h5w"><?php echo $theTotal?></h5>
                    </div>
                    <div class="col-lg-3">
                      <select id="projectMana" class="form-control select2" style="font-size:12px">
                        <option value="0" selected="selected">--Choose Project Manager--</option>
                        <?php
                          $mkir = 1;
                          $projectTeamssZA = "SELECT * FROM `project_member` WHERE f_designation='PROJECT MANAGER'";
                          $resultTeamZA = $connect->query($projectTeamssZA);
                          while ( $rowTeamDisplayA = mysqli_fetch_assoc($resultTeamZA)){
                        ?>
                        <option value="<?php echo $mkir?>"><?php echo $rowTeamDisplayA['l_name'];?></option>
                        <?php
                            $mkir++;
                          }
                        ?>
                      </select>
                    </div>
                    <div class=" col-lg-3 bc">
                      <div class="row">
                        <div class="col-lg-8">
                          <select id="teamMem" class="form-control select2" style="font-size:12px">
                            <option value="0" selected="selected">--Team Member--</option>
                            <?php
                              $ret = 1;
                              $projectTeamssZ = "SELECT * FROM `project_member` WHERE f_designation='TEAM'";
                              $resultTeamZ = $connect->query($projectTeamssZ);
                                while ( $rowTeamDisplay = mysqli_fetch_assoc($resultTeamZ)){
                            ?>
                            <option value="<?php echo $ret?>"><?php echo $rowTeamDisplay['l_name'];?></option>
                            <?php
                                  $ret++;
                                }
                            ?>
                          </select>
                        </div>
                        <div class="col-lg-4">
                          <input type="button" onclick="addTeam()" class="btn btn-success" value="ADD">
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-3 bc vl">
                      <div class="row">
                        <div class="col-lg-7">
                          <input type="number" id="totalSales" class="form-control select2" style="font-size:12px" placeholder="0000" value="<?php echo $projectValue?>">
                        </div>
                        <div class="col-lg-5">
                          <a  type="button" href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insert">INSERT</a>
                        </div>
                      </div>
                    </div>
                  </div><hr>
                  <script>
              let kirauy = 1;
              let kirauy1 = 1;
              let totA = 0;
              let totB = 0;
              let grandTota = 0;
                    function productAddToTable() {
                        // First check if a <tbody> tag exists, add one if not
                        if ($("#myTable tbody").length == 0) {
                            $("#myTable").append("<tbody></tbody>");
                        }

                        let defi = document.querySelector('#defi').value;
                        let title = document.querySelector('#title').value;
                        let quantity = document.querySelector('#quantity').value;
                        let rate = document.querySelector('#rate').value;
                        let tot = document.querySelector('#tot').value;

                        if (defi == "" || defi == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your definition...',
                                timer: 2000,
                            })
                        }else if (title == "" || title == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your title...',
                                timer: 2000,
                            })

                        }else if (quantity == "" || quantity == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your quantity...',
                                timer: 2000,
                            })
                        }else if (rate == "" || rate == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your rate (man-day)...',
                                timer: 2000,
                            })
                        }else if (tot == "" || tot == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your total (man-day)...',
                                timer: 2000,
                            })
                        }else{
                        // Append product to the table
                        let a = rate * quantity;
                        let b = a * tot;

                        totA = totA + b;
                        grandTota = totA + totB;
                        $("#myTable tbody").append(
                            "<tr>" +
                            // "<td>" + $("#jobName").val() + "</td>" +
                            "<td>" + kirauy + "</td>" +
                            "<td>" + defi + "</td>" +
                            "<td>" + title + "</td>" +
                            "<td>" + quantity + "</td>" +
                            "<td>" + rate + "</td>" +
                            "<td>" + tot + "</td>" +
                            "<td>" + b + "</td>" +
                            "<td>" +
                            "<button type='button' onclick='productDelete(this);' name='simpan' id='simpan' class='btn btn-danger btn-block'>Delete</button>" +
                            // "<button type='button' onclick='productDelete(this);'                                  class='btn btn-default'>" +
                            // "<span class='glyphicon glyphicon-remove' />" +
                            // "</button>" +
                            "</td>" +
                            "</tr>");

                            kirauy++;
                            document.querySelector('#defi').value = "";
                            document.querySelector('#title').value = "";
                            document.querySelector('#quantity').value = "";
                            document.querySelector('#rate').value = "";
                            document.querySelector('#tot').value = "";
                            document.getElementById('totalA').value = totA;
                            // document.getElementById('grandTotal').value = grandTota;
                            let dosc = document.getElementById('discon').value;
                            let taxing = 0.06 * parseInt(grandTota); 
                            let teTotal = parseInt(taxing) + (parseInt(grandTota) - parseInt(dosc));
                            document.getElementById('tax').value = taxing; //tax 6%
                            document.getElementById('grandTotal').value = teTotal;
                        }
                    }

                    function productAddToTable1() {
                      // alert("ytut");
                        // First check if a <tbody> tag exists, add one if not
                        if ($("#myTable1 tbody").length == 0) {
                            $("#myTable1").append("<tbody></tbody>");
                        }

                        let defi1 = document.querySelector('#defi1').value;
                        let title1 = document.querySelector('#title1').value;
                        let quantity1 = document.querySelector('#quantity1').value;
                        let rate1 = document.querySelector('#rate1').value;
                        let tot1 = document.querySelector('#tot1').value;

                        if (defi1 == "" || defi1 == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your definition...',
                                timer: 2000,
                            })
                        }else if (title1 == "" || title1 == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please insert your title...',
                                timer: 2000,
                            })

                        }else if (quantity1 == "" || quantity1 == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your quantity...',
                                timer: 2000,
                            })
                        }else if (rate1 == "" || rate1 == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your rate (man-day)...',
                                timer: 2000,
                            })
                        }else if (tot1 == "" || tot1 == null){
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your total (man-day)...',
                                timer: 2000,
                            })
                        }else{
                        // Append product to the table
                        let a1 = rate1 * quantity1;
                        let b1 = a1 * tot1;

                        totB = totB + b1;
                        grandTota = totA + totB;
                        $("#myTable1 tbody").append(
                            "<tr>" +
                            // "<td>" + $("#jobName").val() + "</td>" +
                            "<td>" + kirauy1 + "</td>" +
                            "<td>" + defi1 + "</td>" +
                            "<td>" + title1 + "</td>" +
                            "<td>" + quantity1 + "</td>" +
                            "<td>" + rate1 + "</td>" +
                            "<td>" + tot1 + "</td>" +
                            "<td>" + b1 + "</td>" +
                            "<td>" +
                            "<button type='button' onclick='productDelete1(this);' name='simpan' id='simpan' class='btn btn-danger btn-block'>Delete</button>" +
                            // "<button type='button' onclick='productDelete(this);'                                  class='btn btn-default'>" +
                            // "<span class='glyphicon glyphicon-remove' />" +
                            // "</button>" +
                            "</td>" +
                            "</tr>");

                            kirauy1++;
                            document.querySelector('#defi1').value = "";
                            document.querySelector('#title1').value = "";
                            document.querySelector('#quantity1').value = "";
                            document.querySelector('#rate1').value = "";
                            document.querySelector('#tot1').value = "";
                            document.getElementById('totalB').value = totB;
                            let dosc = document.getElementById('discon').value;
                            // document.getElementById('grandTotal').value = grandTota;
                            let taxing = 0.06 * parseInt(grandTota); 
                            let teTotal = parseInt(taxing) + (parseInt(grandTota) - parseInt(dosc));
                            document.getElementById('tax').value = taxing; //tax 6%
                            document.getElementById('grandTotal').value = teTotal;
                        }
                    }

                    let kirr = 1;

                    function addTeam(){
                     
                      if ($("#myTeam tbody").length == 0) {
                            $("#myTeam").append("<tbody></tbody>");
                        }
                        let teamindex = document.getElementById('teamMem').value;
                        let asse = document.getElementById('teamMem');
                        let teamName = asse.options[asse.selectedIndex].text
                      //  alert(teamindex)
                        if (teamName == "--Team Member--"){
                          Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Please select your team member...',
                                timer: 2000,
                            })
                        }else{
                        document.getElementById("teamMem").options[teamindex].disabled = true;
                        let gambar = '<img src="vendors/profile/Profile.png" alt="alphadash Logo" class="brand-image elevation-3" style="border-radius: 8px;width: 55px;height: 55px; border: 1px solid #ddd;"><h5 style="font-size:14px;" id="name' + kirr + '">' + teamName + '</h5> <input type="hidden" id="nama' + kirr + '" value="' + teamName + '">';
                        let scoper = '<select id="scope' + kirr + '" class="form-control select2" style="font-size:12px">' +
                                '<option value="0">--SCOPE OF WORK--</option>' +
                                '<option value="1">UI/UX DESIGN</option>' +
                                '<option value="2">FRONT END DEVELOPER</option>' +
                                '<option value="3">BACK END DEVELOPER</option>' +
                                '<option value="4">FULL STACK DEVELOPER</option>';
                        let roler = '<select id="rol' + kirr + '" class="form-control select2" style="font-size:12px">' +
                                '<option value="0">--ROLE--</option>' +
                                '<option value="1">PIC</option>' +
                                '<option value="2">TEAM</option>';
                        let pero = ' <select id="perio' + kirr + '" class="form-control select2" style="font-size:12px">' +
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
                        // alert(teamName)

                        // Append product to the table
                        $("#myTeam tbody").append(
                            "<tr>" +
                            // "<td>" + $("#jobName").val() + "</td>" +
                            "<td>" + gambar + "</td>" +
                            "<td>" + scoper + "</td>" +
                            "<td>" + pero + "</td>" +
                            "<td>" + '<input id="tari' + kirr + '" type="date" class="form-control select2" style="font-size:12px">' + "</td>" +
                            "<td>" + roler + "</td>" +
                            // "<td>" + '<input id="percen' + kirr + '" type="text" class="form-control select2" style="font-size:12px">' + "</td>" +
                            "<td>" +
                            "<button  type='button' onclick='productDelete3(this);' name='simpan' id='simpan(this)' value='" + teamindex + "' class='btn btn-danger btn-block'>Delete</button>" +
                            // "<button type='button' onclick='productDelete(this);'                                  class='btn btn-default'>" +
                            // "<span class='glyphicon glyphicon-remove' />" +
                            // "</button>" +
                            "</td>" +
                            "</tr>");

                            kirr++;
                        }
                            document.querySelector('#teamMem').value = "0";
                            // document.querySelector('#title1').value = "";
                            // document.querySelector('#quantity1').value = "";
                            // document.querySelector('#rate1').value = "";
                            // document.querySelector('#tot1').value = "";
                            // document.getElementById('totalB').value = totB;
                            // document.getElementById('grandTotal').value = grandTota;
                    }

                    function productDelete(ctl) {
                        $(ctl).parents("tr").remove();
                    }

                    function productDelete2(ctl) {
                        $(ctl).parents("tr").remove();
                    }

                    function productDelete3(ctl) {
                     
                     
                      let gg = document.getElementById("simpan(this)").value;
                      document.getElementById("teamMem").options[gg].disabled = false;
                      // alert(gg)
                      $(ctl).parents("tr").remove();
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

                    function saveJob() {
                    //    alert("hi")
                        let kira = 0;
                        var table = document.getElementById("myTable");
                        let kiratable = table.rows.length - 2;
                        for (var r = 2, n = table.rows.length; r < n; r++){
                            var jobName = table.rows[r].cells[0].innerHTML;
                            var modul = table.rows[r].cells[1].innerHTML;
                            var dateStart = table.rows[r].cells[2].innerHTML;
                            var dueDate = table.rows[r].cells[3].innerHTML;

                            // var nama = document.getElementById('userNama').value; 
                            // var projeckName = document.getElementById('projeckName').value;

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
                    


                    function insertTotal(){
                      let gt = document.getElementById('grandTotal').value;
                      document.getElementById('totalSales').value = gt;
                      
                      // $('#insert').modal('hide');
                      $("#insert .close").click()
                    }
                  </script>

                  <!-- insert cost -->
                  <div class="modal fade customscroll" id="insert" name="insert" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">PROJECT COST</h5>
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
                                  <h5 class="modal-title" id="exampleModalLongTitle">INTERNAL COST</h5>
                                  </div>
                                  <!-- <form class="form-horizontal"> -->
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <table id="myTable" class="table table-bordered table-striped">
                                        <tr>
                                          <th>NO.</th>
                                          <th>DEFINITION</th>
                                          <th>TITLE</th>
                                          <th>QUANTITY</th>
                                          <th>RATE (MAN-DAY)</th>
                                          <th>TOTAL (MAN-DAY)</th>
                                          <!-- <th>SST (6%)</th> -->
                                          <th>TOTAL (RM)</th>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td><input type="text" class="form-control" id="defi" name="defi" placeholder="" value=""></td>
                                          <td><input type="text" class="form-control" id="title" name="title" placeholder="" value=""></td>
                                          <td><input type="number" class="form-control" id="quantity" name="quantity" placeholder="0000" value=""></td>
                                          <td><input type="number" class="form-control" id="rate" name="rate" placeholder="0000" value=""></td>
                                          <td><input type="number" class="form-control" id="tot" name="tot" placeholder="0000" value=""></td>
                                          <!-- <td><input type="text" class="form-control" id="modul" name="modul" placeholder="" value="">  </td> -->
                                          <!-- <td><input type="date" format="dd/mm/yyyy" class="form-control" id="dateStart" name="dateStart" placeholder="" value="" style="font-size: 12px;"></td>
                                          <td><input type="date" class="form-control" id="dueDate" name="dueDate" placeholder="" value="" style="font-size: 12px;"></td> -->
                                          <td><button type="button"  class="btn btn-warning btn-block" onclick="productAddToTable()">Add</button></td>
                                        </tr>
                                      </table>
                                      <div class="form-group row">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-2">
                                          <h5>TOTAL (A) :</h5>
                                        </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="totalA" name="totalA" placeholder="0000" value="">
                                          </div>
                                          <div class="col-sm-1">
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="offset-sm-8 col-sm-4">
                                      <!-- <button type="button" onclick="saveJob()" name="simpan" id="simpan" class="btn btn-success btn-block">SUBMIT</button> -->
                                    </div>
                                  </div>
                                  <!-- </form> -->
                                </li>
                              </ul>

                              <ul>
                                <li>
                                  <div class="form-group row">
                                  <h5 class="modal-title" id="exampleModalLongTitle">3RD PARTY COST</h5>
                                  </div>
                                  <!-- <form class="form-horizontal"> -->
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <table id="myTable1" class="table table-bordered table-striped">
                                        <tr>
                                          <th>NO.</th>
                                          <th>DEFINITION</th>
                                          <th>TITLE</th>
                                          <th>QUANTITY</th>
                                          <th>UNIT PRICE (RM)</th>
                                          <th>TOTAL PRICE (RM)</th>
                                          <!-- <th>SST (6%)</th> -->
                                          <th>GRAND TOTAL (RM)</th>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td><input type="text" class="form-control" id="defi1" name="defi1" placeholder="" value=""></td>
                                          <td><input type="text" class="form-control" id="title1" name="title1" placeholder="" value=""></td>
                                          <td><input type="number" class="form-control" id="quantity1" name="quantity1" placeholder="0000" value=""></td>
                                          <td><input type="number" class="form-control" id="rate1" name="rate1" placeholder="0000" value=""></td>
                                          <td><input type="number" class="form-control" id="tot1" name="tot1" placeholder="0000" value=""></td>
                                          <!-- <td><input type="text" class="form-control" id="modul" name="modul" placeholder="" value="">  </td> -->
                                          <!-- <td><input type="date" format="dd/mm/yyyy" class="form-control" id="dateStart" name="dateStart" placeholder="" value="" style="font-size: 12px;"></td>
                                          <td><input type="date" class="form-control" id="dueDate" name="dueDate" placeholder="" value="" style="font-size: 12px;"></td> -->
                                          <td><button type="button"  class="btn btn-warning btn-block" onclick="productAddToTable1()">Add</button></td>
                                        </tr>
                                      </table>
                                      <div class="form-group row">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-2">
                                          <h5>TOTAL (B) :</h5>
                                        </div>
                                          <div class="col-sm-2">
                                            <input type="number" class="form-control" id="totalB" name="totalB" placeholder="0000" value="">
                                          </div>
                                          <div class="col-sm-1">
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="offset-sm-8 col-sm-4">
                                      <!-- <button type="button" onclick="saveJob()" name="simpan" id="simpan" class="btn btn-success btn-block">SUBMIT</button> -->
                                    </div>
                                  </div>
                                  <!-- </form> -->
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-12">
                              <table id="myTablex" class="table table-bordered table-striped">
                                <tr>
                                  <th>DISCOUNT (RM)</th>
                                  <th>TOTAL (A+B)</th>
                                  <th>AFTER DISCOUNT</th>
                                  <th>SST (6%)</th>
                                  <th>AFTER SST (6%)</th>
                                  <th>GRAND TOTAL (A+B)</th>
                                </tr>
                                <tr>
                                  <td><input type="number" class="form-control" id="discon" name="discon" placeholder="00000" value="<?php echo $projectDiscount?>"></td>
                                  <td><input type="number" class="form-control" id="title" name="title" placeholder="00000" value=""></td>
                                  <td><input type="number" class="form-control" id="tax" name="tax" placeholder="00000" value=""></td>
                                  <td><input type="number" class="form-control" id="rate" name="rate" placeholder="0000" value=""></td>
                                  <td><input type="number" class="form-control" id="tot" name="tot" placeholder="00000" value=""></td>
                                  <td><input type="number" class="form-control" id="grandTotal" name="grandTotal" placeholder="00000" value=""></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" onclick="insertTotal()" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </form>
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
                <h6 class="card-header2">TEAM MEMBER</h6><hr>
                <div class="row">
                  <div class="col-lg-12"> <!-- 1st block -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <table id="myTeam" class="table table-bordered table-striped">
                            <tr>
                              <th></th>
                              <th>SCOPE OF WORK</th>
                              <th>PERIOD</th>
                              <th>HANDOVER DATE</th>
                              <th>ROLE</th>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="offset-sm-8 col-sm-4">
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
                <h6 class="card-header2">DETAILS</h6><hr>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-5">
                      <label for="inputName" class="col-form-label">PROJECT DESCIPTION</label>
                    </div>
                    <!-- <div class="col-lg-3">
                      <label for="inputName" class="col-form-label">UPLOAD APPENDIX DOCUMENT</label>
                    </div> -->
                    <div class="col-lg-4">
                      <label for="inputName" class="col-form-label"></label>
                    </div>
                  </div>
                        
                  <div class="row">
                    <div class="col-lg-5">
                        <textarea class="form-control" name="" id="proDesc" style="width: 100%;" rows="10"><?php echo $projectDetail?></textarea>
                    </div>
                    <!-- <div class="col-lg-3">
                      <div style="  width: auto;height: auto;padding: 10px;border: 1px solid black;">
                        <input type="file" class="form-control select2" style="font-size:11px">
                        <input type="button" class="btn btn-primary" value="Upload"><br>
                        <h6>Supported File</h6>
                        <div class="row">
                          <div class="col-lg-4">
                            <img src="vendors/logo/add-image+.png" alt="">
                          </div>
                          <div class="col-lg-4">
                            <img src="vendors/logo/excel.png" alt="">
                          </div>
                          <div class="col-lg-4">
                            <img src="vendors/logo/word.png" alt="">
                          </div>
                        </div><br>
                        <div class="row">
                          <div class="col-lg-4">
                            <img src="vendors/logo/pdf.png" alt="">
                          </div>
                          <div class="col-lg-4">
                            <img src="vendors/logo/powerpoint.png" alt="">
                          </div>
                          <div class="col-lg-4">
                            <img src="vendors/logo/zip.png" alt="">
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="col-lg-4">
                      <div style="  width: auto;height: 242px;padding: 10px;border: 1px solid black;">
                        <h6>List Uploaded Appendix</h6>
                      </div>
                    </div>
                  </div><hr>
                  <div class="offset-sm-10 col-sm-2">
                    <button type="button" onclick="saveAssign()" class="btn btn-success btn-block">Save</button>
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
  var teamNamez = [];
  function saveAssign1(){
    let kira = 0;
    var table = document.getElementById("myTeam");
    let kiratable = table.rows.length - 2;
    for (var r = 1, n = table.rows.length; r < n; r++){
      var scopeOW = table.rows[r].cells[1].innerHTML;
      var period = table.rows[r].cells[2].innerHTML;
      var handOver = table.rows[r].cells[3].innerHTML;
      var roler = table.rows[r].cells[4].innerHTML;
      var percentage = table.rows[r].cells[5].innerHTML;

      var sco = document.getElementById('scope' + r);
      var scop = sco.options[sco.selectedIndex].text;
      // var sco = document.getElementById('scope' + r).value;
      var nama = document.getElementById('nama' + r).value; 
      // var projeckName = document.getElementById('projeckName').value;

      kira++;
      alert(nama)
      // alert("scope= " + sco + " ,period= " + period + " ,handover= " + handOver + " ,role= " + roler + " ,percentage= " + percentage)
    }
    // alert("hi")
    // var table = document.getElementById("myTeam");
    // var jobName = table.rows[1].cells[0].innerHTML;
    //   var modul = table.rows[1].cells[1].innerHTML;
    //   var modul1 = table.rows[0].cells[1].innerHTML;
    //                               var dateStart = table.rows[1].cells[2].innerHTML;
    //                               var dueDate = table.rows[1].cells[5].innerHTML;
    //   var sco = document.getElementById('scope1').value;
    //                               alert(sco);
  }
// $('#savez').click(function(){

function saveAssign(){
  // alert("test")
  let projectId = document.getElementById('projectId').value;
  let namepro = document.getElementById('namepro').value;
  let pmde = document.getElementById('projectMana');
  let tmde = document.getElementById('teamMem');
  let pm = pmde.options[pmde.selectedIndex].text;
  let tm = tmde.options[tmde.selectedIndex].text;

  let ts = document.getElementById('totalSales').value;
  // let pname = document.getElementById('proName').innerHTML;
  // let clientName = document.getElementById('cliName').innerHTML;
  // let comName = document.getElementById('comName').innerHTML;
  // let comAddress = document.getElementById('comAddress').innerHTML;
  // let conNo = document.getElementById('conNo').innerHTML;
  // let clieEmail = document.getElementById('clieEmail').innerHTML;
  // let cliePosition = document.getElementById('cliePosition').innerHTML;
  
  let sd = document.getElementById('starDate').value;
  let ed = document.getElementById('endDate').value;
  let priorit = document.getElementById('prior').value; //0:HIGH, 1:MEDUIM, 2:LOW
  let grandTotal = document.getElementById('totalSales').value;
  let proDesc = document.getElementById('proDesc').value;
  let theSST = document.getElementById('tax').value;
  let theDiscount = document.getElementById('discon').value;
  

  let keutamaan;
  if (priorit == "0"){
    keutamaan = "HIGH";
  }else if (priorit == "1"){
    keutamaan = "MEDIUM";
  }else if (priorit == "2"){
    keutamaan = "LOW";
  }
  let harisd = sd.substring(10, 8);
  let bulansd = sd.substring(7, 5);
  let tahunsd = sd.substring(0, 4);

  let haried = ed.substring(10, 8);
  let bulaned = ed.substring(7, 5);
  let tahuned = ed.substring(0, 4);

  let startDate = harisd + "/" + bulansd + "/" + tahunsd;
  let endDate = haried + "/" + bulaned + "/" + tahuned;

  let teamNamezx = "";

  var tableTeamz = document.getElementById("myTeam");
  let kiratableTeamz = tableTeamz.rows.length - 1;
  let nama;
  let nz = tableTeamz.rows.length;
  // alert(document.getElementById('name2').innerHTML)
  // alert(tableTeamz.rows.length - 1)
  let kiraTe = 0;
  for (let rz = 1; rz < nz; rz++){
    kiraTe++;
    nama = document.getElementById('name'+ kiraTe).innerHTML;
    teamNamez.push(nama)
    teamNamezx += nama + ", ";
  }
// alert(teamNamezx)
  //total A
  // let defini = document.getElementById('defi').value;
  // let defini = document.getElementById('defi').value;
  // let defini = document.getElementById('defi').value;
  // let defini = document.getElementById('defi').value;
  // let defini = document.getElementById('defi').value;
  
// alert(pname);
  if (pm == "--Choose Project Manager--"){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please select your project manager...',
      timer: 2000,
    })
  // }else if (tm == "--Team Member--"){
  //   Swal.fire({
  //     icon: 'warning',
  //     title: 'Ops...',
  //     text: 'Please select your team member...',
  //     timer: 2000,
  //   })
  }else if (ts == "" || ts == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please insert the value for project cost...',
      timer: 2000,
    })
  }else{
    // alert("pm : " + proDesc);
    // alert("test")
    $.ajax({
      url: "theFunction/saveDetail.php",
      type: "POST",
      data: {
        pm: pm,
        sd: startDate,
        ed: endDate,
        priorit: keutamaan,
        projectId: projectId,
        grandTotal: grandTotal,
        proDesc: proDesc,
        teamNamez: teamNamezx,
      },
      success: function (data, status, xhr) {    // success callback function
      var datas = data;
      datas = datas.replace('"','');
        if (datas.includes("100")){
          // alert("save")
          let kira = 0;
          let totalA = document.getElementById('totalA').value; 
          let costName = "INTERNAL COST";
          var table = document.getElementById("myTable");
          let kiratable = table.rows.length - 2;
          for (var r = 2, n = table.rows.length; r < n; r++){
          
            var definit = table.rows[r].cells[1].innerHTML;
            var titler = table.rows[r].cells[2].innerHTML;
            var quanti = table.rows[r].cells[3].innerHTML;
            var rater = table.rows[r].cells[4].innerHTML;
            var totalMan = table.rows[r].cells[5].innerHTML;
            var totaler = table.rows[r].cells[6].innerHTML;

            // var nama = document.getElementById('userNama').value; 
            // var projeckName = document.getElementById('projeckName').value;

            kira++;
            $.ajax({
              url: "theFunction/saveCostA.php",
              type: "POST",
              data: {
                totalA: totalA,
                projectId: projectId,
                costName: costName,
                
                definit: definit,
                titler: titler,
                quanti: quanti,
                rater: rater,
                totalMan: totalMan,
                totaler: totaler,

                theSST: theSST,
                theDiscount: theDiscount,
              },
              success: function (data, status, xhr) {    // success callback function
                var datas = data;
                datas = datas.replace('"','');
                if (datas.includes("100")){
                // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                  if (kira == kiratable){
                    let kiraw = 0;
                    let totalB = document.getElementById('totalB').value; 
                    let costNamew = "3RD PARTY COST";
                    var table = document.getElementById("myTable1");
                    let kiratablew = table.rows.length - 2;
                    for (var r = 2, n = table.rows.length; r < n; r++){
                    
                      var definitw = table.rows[r].cells[1].innerHTML;
                      var titlerw = table.rows[r].cells[2].innerHTML;
                      var quantiw = table.rows[r].cells[3].innerHTML;
                      var unitP = table.rows[r].cells[4].innerHTML;
                      var totalPri = table.rows[r].cells[5].innerHTML;
                      var grandTo = table.rows[r].cells[6].innerHTML;

                      // var nama = document.getElementById('userNama').value; 
                      // var projeckName = document.getElementById('projeckName').value;

                      kiraw++;
                      $.ajax({
                        url: "theFunction/saveCostB.php",
                        type: "POST",
                        data: {
                          totalB: totalB,
                          projectId: projectId,
                          costName: costNamew,
                          
                          definit: definitw,
                          titler: titlerw,
                          quanti: quantiw,
                          unitP: unitP,
                          totalPri: totalPri,
                          grandTo: grandTo,

                          theSST: theSST,
                          theDiscount: theDiscount,
                        },
                        success: function (data, status, xhr) {    // success callback function
                          var datas = data;
                          datas = datas.replace('"','');
                          // alert("3rd save")
                          // alert(kiraw + " : " + kiratablew)
                          if (datas.includes("100")){
                            if (kiraw == kiratablew){
                              let kiraTeam = 0;
                              var tableTeam = document.getElementById("myTeam");
                              let kiratableTeam = tableTeam.rows.length - 1;
                              for (var rs = 1, ns = tableTeam.rows.length; rs < ns; rs++){
                                  // var dateStart = tableTeam.rows[rs].cells[2].innerHTML;
                                  // var dueDate = tableTeam.rows[rs].cells[3].innerHTML;
                                  var sco = document.getElementById('scope' + rs);
                                  var scop = sco.options[sco.selectedIndex].text;
                                  var nama = document.getElementById('nama' + rs).value; 
                                  var roler = document.getElementById('rol' + rs); // 1:PIC, 2:TEAM
                                  var roles = roler.options[roler.selectedIndex].text;
                                  var perio = document.getElementById('perio' + rs);
                                  var perios = perio.options[perio.selectedIndex].text;
                                  var tarikh = document.getElementById('tari' + rs).value;
                                  
                                  kiraTeam++;
                                  
                                  $.ajax({
                                      url: "theFunction/saveTeam.php",
                                      type: "POST",
                                      data: {
                                        scop: scop,
                                        nama: nama,
                                        roles: roles,
                                        perios: perios,
                                        tarikh: tarikh,
                                        // percen: percen,
                                        namepro: namepro,
                                        idd: projectId,
                                      },
                                      success: function (data, status, xhr) {    // success callback function
                                          var datas = data;
                                          datas = datas.replace('"','');
                                          // alert(datas)
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
                                                      window.location.href = "prodetail.php";
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
                                                  window.location.href = "new.php?pr=<?php echo $projectBil;?>";
                                              }, 2000);
                                          }
                                          //alert("berjaya");
                                          //window.location.href = "https://uruzsales.com/a-template.php";

                                      }
                                  });
                              }
                            }
                          }else{
                              Swal.fire({
                                icon: 'warning',
                                title: 'Ops...',
                                text: 'Not successful to save 3rd party cost',
                                timer: 2000,
                              })
                              // setTimeout(function() {
                              //   window.location.href = "new.php?pr=<?php echo $projectBil;?>";
                              // }, 2000);
                            }
                        }
                      });
                    }
                  }
                }else{
                    Swal.fire({
                      icon: 'warning',
                      title: 'Ops...',
                      text: 'Not successful to save internal cost',
                      timer: 2000,
                    })
                    // setTimeout(function() {
                    //   window.location.href = "update.php?pr=<?php echo $projectBil;?>";
                    // }, 2000);
                  }
              }
            });
          }
        }else{
          Swal.fire({
            icon: 'warning',
            title: 'Ops...',
            text: 'Not successful to save project',
            timer: 2000,
          })
        }
      }
    });
  }
}
// })
</script>