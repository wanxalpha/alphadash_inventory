<?php
include 'layouts/menu.php';
include 'connection/config.php';
?>
<script>
//   var element1 = document.getElementById("test1");
//   var element2 = document.getElementById("test2");
//   var element3 = document.getElementById("test3");
//   var element4 = document.getElementById("test4");
//   element1.classList.remove("active");
//   element3.classList.remove("active");
//   element2.classList.remove("active");
//   element4.classList.add("active");
</script>
 <style>
  .vl {
    border-left: 6px solid white;
  }

  .h5w {
    color: white;
    font-size: 16px;
  }

  .bk {
    background-color: #4682B4;
    border-radius: 5px;
    border-top: 11px;
    padding-top: 12px;
  }

  .box{  
    position: left; 
    height:30px; 
    width: 30px; 
    left: 20%; 
  } 

  .hg{  
    position: absolute; 
    left: 25%; 
  }
 </style>
 <body>

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

  <div class="content-wrapper">
    <input type="hidden" value="<?php echo $idCom?>" id="iddCom">
    <!-- Main content -->
    <section class="content">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h4 class="card-header2" style="text-align: left;">SETUP</h4>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content-header">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-sm-12">
                  <h5 class="card-header2" style="text-align: left;">New Member</h5><hr>
                  <div class="row">
                    <div class="col-lg-5">
                      <h6 class="card-title">Department</h6>
                    </div>
                    <div class="col-lg-5">
                      <h6 class="card-title">Staff Name</h6>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-lg-5">
                      <select name="departments" id="departments" class="form-control select2" onchange="dep1()">
                        <option value="0"></option>
                          <?php
                            $sqlDepartment = "SELECT * FROM departments";
                            $resultDepartment = mysqli_query($connect, $sqlDepartment);
                            $numDepartment = mysqli_num_rows($resultDepartment);
                            if ($numDepartment > 0){
                              while ($rowDepartment = mysqli_fetch_assoc($resultDepartment)){
                                $depidz = $rowDepartment['f_id'];
                                $dep = $rowDepartment['f_department'];
                          ?>
                        <option value="<?php echo $depidz?>"><?php echo $dep?></option>
                          <?php
                              }
                            }
                          ?>
                      </select>
                    </div>
                    <div class="col-lg-5">
                      <select name="team" id="teamMember" class="form-control select2">
                        <option value="0"></option>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <input type="button" id="addMember" class="btn btn-success btn-block" value="Add member">
                    </div>
                  </div>
                </div>
              </div><br>

              <div class="row">
                <div class="col-12">
                  <h6 class="card-header2" style="text-align: left;">Designation</h6><hr>
                    <div class="row">
                      <div class="col-lg-5">
                        <h6 class="card-header2" style="text-align: left;">Member</h6>
                      </div>
                      <div class="col-lg-5">
                        <h6 class="card-header2" style="text-align: left;">Role</h6>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-lg-5">
                        <select name="departas" id="departas" class="form-control select2">
                          <option value="0"></option>
                          <?php
                            $sqlMember = "SELECT * FROM `project_member` WHERE f_designation IS NULL";
                            $resultMember = mysqli_query($connect, $sqlMember);
                            $numMember = mysqli_num_rows($resultMember);
                            if ($numMember > 0){
                              while($rowMember = mysqli_fetch_assoc($resultMember)){
                          ?>
                          <option value="<?php echo $rowMember['f_bil']?>"><?php echo $rowMember['f_name']?></option>
                          <?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="col-lg-5">
                        <select name="teampa" id="teampa" class="form-control select2">
                          <option value="0"></option>
                          <option value="1">PROJECT MANAGER</option>
                          <option value="2">TEAM</option>
                          <option value="3">MANAGEMENT</option>
                          <option value="4">SALES</option>
                        </select>
                      </div>
                      <div class="col-lg-2">
                        <input type="button" id="saverole" class="btn btn-success btn-block" value="Save">
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="col-12">
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Designation</th>
                              <th>Department</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $kiraDes = 1;
                            $sqlDes = "SELECT * FROM `project_member` WHERE f_designation IS NOT NULL";
                            $resultDes = mysqli_query($connect, $sqlDes);
                            $numDes = mysqli_num_rows($resultDes);
                            if ($numDes > 0){
                              while ($rowDes = mysqli_fetch_assoc($resultDes)){
                          ?>
                            <tr>
                              <td><?php echo $kiraDes?></td>
                              <td><?php echo $rowDes['f_name']?></td>
                              <td><?php echo $rowDes['f_designation']?></td>
                              <td><?php echo $rowDes['f_department']?></td>
                              <td><a  type="button" href="#" class="btn btn-warning btn-block" data-bs-toggle="modal" data-bs-target="#edit<?php echo $rowDes['f_bil']?>">Edit Role</a></td>

                              <!-- Edit role -->
                              <div class="modal fade customscroll" id="edit<?php echo $rowDes['f_bil']?>" name="edit" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">EDIT ROLE</h5>
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
                                                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $rowDes['f_name']?></h5>
                                              </div>
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <select name="teampa1<?php echo $rowDes['f_bil']?>" id="teampa1<?php echo $rowDes['f_bil']?>" class="form-control select2">
                                                    <option value="0"></option>
                                                    <option value="1">PROJECT MANAGER</option>
                                                    <option value="2">TEAM</option>
                                                    <option value="3">MANAGEMENT</option>
                                                    <option value="4">SALES</option>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <div class="offset-sm-8 col-sm-4">
                                                </div>
                                              </div>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" onclick="editRole<?php echo $rowDes['f_bil']?>()" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </form><br>
                                  </div>
                                </div>
                              </div>
                            </tr>
                            <script>
                              function editRole<?php echo $rowDes['f_bil']?>(){
                              let idd;
                              let username = <?php echo $rowDes['f_bil']?>;
                              let id = document.getElementById('teampa1<?php echo $rowDes['f_bil']?>').value;
                              if (id == "0"){
                                Swal.fire({
                                  icon: 'warning',
                                  title: 'Warning!',
                                  text: 'Please select team role.',
                                  showConfirmButton: false,
                                  timer: 3000,
                                });
                              }else {
                                if(id == "1"){
                                  idd = "PROJECT MANAGER";
                                }else if(id == "2"){
                                  idd = "TEAM";
                                }else if(id == "3"){
                                  idd = "MANAGEMENT";
                                }else if(id == "4"){
                                  idd = "SALES";
                                }
                                $.ajax({
                                  url:'theFunction/addrole.php',
                                  type:'POST',
                                  data: {
                                    id: idd,
                                    username:username,
                                  },
                                  success:function(result){
                                  var datas = result;
                                  if (datas.includes("100")){
                                    Swal.fire({
                                      icon: 'success',
                                      title: 'Success',
                                      text: 'Successful',
                                      timer: 2000,
                                    })
                                    setTimeout(function() {
                                                                        window.location.href = "setup.php";
                                                                    }, 2000);
                                                            }else{
                                                                Swal.fire({
                                                                    icon: 'warning',
                                                                    title: 'Ops...',
                                                                    text: 'Not successful',
                                                                    timer: 2000,
                                                                })
                                                                setTimeout(function() {
                                                                    window.location.href = "setup.php";
                                                                }, 2000);
                                                            }
                                                            },
                                                            // error:function(status){
                                                            //     alert('error');
                                                            // }
                                                        });
                                                    }

                                                }
                                            </script>
                                        <?php
                                                $kiraDes++;
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
          </div>
        </div>
      </section><br>

      <section class="content-header">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-sm-12">
                  <h5 class="card-header2" style="text-align: left;">Upload Data</h5><hr>
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-3"><center><a href="form_sample.csv">--download sample form--</a></center></div>
                            <div class="col-md-6">
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="fileUpload">
                                  <label class="custom-file-label" for="custom-file-input">.xlsx or .csv file only</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3"><input type="button" class="btn btn-primary btn-block" onclick="myFunction()" id="upload" value="Upload">
                            </div>
                          </div>
                          <div class="row"> 
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                              <input type="button" class="btn btn-warning btn-block" onclick="canc()" id="cance" value="Cancel">
                            </div>
                            <div class="col-md-3">
                              <input type="button" class="btn btn-success btn-block" onclick="saved()" id="saved" value="Save">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Position</th>
                                      <th>Department</th>
                                      <th>E-mail</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
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
          </div>
        </div>
      </section><br>

      <section class="content-header">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-sm-12">
                  <h5 class="card-header2" style="text-align: left;">Upload Project</h5><hr>
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">PROJECT NAME</div>
                            <div class="col-md-4">CLIENT NAME</div>
                            <div class="col-md-4">COMPANY NAME</div>
                          </div>
                          <div class="row">
                            <div class="col-md-4"><input type="text" class="form-control" id="pName" name="pName"></div>
                            <div class="col-md-4"><input type="text" class="form-control" id="cName" name="cName"></div>
                            <div class="col-md-4"><input type="text" class="form-control" id="coName" name="coName"></div>
                          </div><br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="row">
                                <div class="col-md-5">
                                  <div class="row">
                                    <div class="col-md-12">
                                    COMPANY ADDRESS
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                    <textarea name="cAddress" id="cAddress" cols="50" rows="5"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-7">
                                  <div class="row">
                                    <div class="col-md-6">CONTACT NUMBER</div>
                                    <div class="col-md-6">EMAIL</div>
                                  </div>  
                                  <div class="row">
                                    <div class="col-md-6"><input type="text" class="form-control" id="cNumber" name="cNumber"></div>
                                    <div class="col-md-6"><input type="text" class="form-control" id="emelClient" name="emelClient"></div>
                                  </div>   <br> 
                                  <div class="row">
                                    <div class="col-md-6">POSITION</div>
                                    <div class="col-md-6">PROJECT PRODUCT</div>
                                  </div> 
                                  <div class="row">
                                    <div class="col-md-6"><input type="text" class="form-control" id="posi" name="posi"></div>
                                    <div class="col-md-6"><select name="pProduct" id="pProduct" class="form-control">
                                      <option value="0">--Project Product--</option>
                                      <?php
                                      $cPo = 1;
                                      $sqlPo = "SELECT * FROM `project_pillar` WHERE f_id_com='$idCom'";
                                      $resPo = mysqli_query($connect, $sqlPo);
                                      $numPo = mysqli_num_rows($resPo);
                                      if ($numPo > 0){
                                        while ($rowPo = mysqli_fetch_assoc($resPo)){
                                          $pillNAme = $rowPo['project_pillar'];
                                      ?>
                                      <option value="<?php echo $cPo?>"><?php echo $pillNAme?></option>
                                      <?php
                                      $cPo++;
                                        }
                                      }
                                      ?>
                                    </select></div>
                                  </div>             
                                </div>
                              </div>
                            </div>
                          </div><br>

                          <div class="row"> 
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                              <!-- <input type="button" class="btn btn-warning btn-block" onclick="canc()" id="cance" value="Cancel"> -->
                            </div>
                            <div class="col-md-3">
                              <input type="button" class="btn btn-success btn-block" onclick="saved2()" id="saved" value="Save">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h5>Bulk Upload Project</h5>
                          <div class="row">
                            <div class="col-md-3"><center><a href="form_sample_project.csv">--download sample form project--</a></center></div>
                            <div class="col-md-6">
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="fileUploadz">
                                  <label class="custom-file-label" for="custom-file-input">.xlsx or .csv file only</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3"><input type="button" class="btn btn-primary btn-block" onclick="myFunction1()" id="upload" value="Upload"></div>
                          </div>
                          <div class="row"> 
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                              <input type="button" class="btn btn-warning btn-block" onclick="canc()" id="cance" value="Cancel">
                            </div>
                            <div class="col-md-3">
                              <input type="button" class="btn btn-success btn-block" onclick="saved1()" id="saved" value="Save">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Project name</th>
                                      <th>Client Name</th>
                                      <th>Company Name</th>
                                      <th>Company Address</th>
                                      <th>Contact No.</th>
                                      <th>E-mail</th>
                                      <th>Position</th>
                                      <th>Project Product</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
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
          </div>
        </div>
      </section><br>

      <section class="content-header">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-sm-12">
                  <h5 class="card-header2" style="text-align: left;">Product Services</h5><hr>
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-12">PRODUCT NAME</div>
                                <div class="col-md-12"><input type="text" class="form-control" id="prodName" name="prodName"></div>
                              </div><br>
                              <div class="row">
                                <div class="col-md-12">PRODUCT CODE</div>
                                <div class="col-md-12"><input type="text" class="form-control" id="prodCode" name="prodCode"></div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-12">
                                PRODUCT DETAIL
                                </div>
                                <div class="col-md-12"><textarea name="proDetail" id="proDetail" cols="70" rows="5"></textarea></div>
                              </div>
                            </div>
                          </div>
                          <div class="row"> 
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                              <input type="button" class="btn btn-warning btn-block" onclick="canc()" id="cance" value="Cancel">
                            </div>
                            <div class="col-md-3">
                              <input type="button" class="btn btn-success btn-block" onclick="savePillar()" id="savePillar" value="Save">
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
        </div>
      </section><br>
    </section>
  </div>
</body>
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


<script>
    // addMember

    $("#savePillar").click(function(){
        let proName = document.getElementById('prodName').value;
        let proCode = document.getElementById('prodCode').value;
        let proDetail = document.getElementById('proDetail').value;
        let idCOmpany = document.getElementById('iddCom').value;
        if (proName == "" || proName == null){
            Swal.fire({
                icon: 'warning',
                title: 'Ops...',
                text: 'Please insert your Product Name!',
                timer: 2000,
            })
        }else if (proCode == "" || proCode == null){
            Swal.fire({
                icon: 'warning',
                title: 'Ops...',
                text: 'Please insert your Product Code!',
                timer: 2000,
            })
        }else if (proDetail == "" || proDetail == null){
            Swal.fire({
                icon: 'warning',
                title: 'Ops...',
                text: 'Please insert your Product Detail!',
                timer: 2000,
            })
        }else{
            $.ajax({
                url:'theFunction/addProduct.php',
                type:'POST',
                data: {
                    proName: proName,
                    proCode: proCode,
                    proDetail: proDetail,
                    idCOmpany: idCOmpany,
                },
                success:function(result){
                    var datas = result;
                        if (datas.includes("100")){
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Successful',
                                timer: 2000,
                            })
                            setTimeout(function() {
                                window.location.href = "setup.php";
                            }, 2000);
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ops...',
                            text: 'Not successful',
                            timer: 2000,
                        })
                        setTimeout(function() {
                            window.location.href = "setup.php";
                        }, 2000);
                    }
                },
            });
        }
    })
    $("#departments").change(function(){
        let id = document.getElementById('departments').value
         $.ajax({
            url:'theFunction/depar.php',
            type:'POST',
            data: {
                id: id,
            },
            success:function(result){
                var datas = result;
                $("#teamMember").html(result);
            },
            error:function(status){
                alert('error');
            }
        });
    });

    $("#addMember").click(function(){
        // alert("test")
        let idz = document.getElementById('teamMember');
        let ids = idz.options[idz.selectedIndex].text;
        let id = document.getElementById('teamMember').value;
        // alert(id)
        if (ids == "" || ids == null){
            Swal.fire({
                icon: 'warning',
                title: 'Ops...',
                text: 'Please select staff name!',
                timer: 2000,
            })
        }else{
            $.ajax({
                url:'theFunction/addMemAl.php',
                type:'POST',
                data: {
                    ids: ids,
                },
                success:function(result){
                    var datas = result;
                        if (datas.includes("100")){
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Successful',
                                timer: 2000,
                            })
                            setTimeout(function() {
                                window.location.href = "setup.php";
                            }, 2000);
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ops...',
                            text: 'Not successful',
                            timer: 2000,
                        })
                        setTimeout(function() {
                            window.location.href = "setup.php";
                        }, 2000);
                    }
                },
                // error:function(status){
                //     alert('error');
                // }
            });
        }
    });

    $("#saverole").click(function(){
        // departas
        // alert("test12")
        let idd;
        let id = document.getElementById('teampa').value
        let username = document.getElementById('departas').value;
        let idCOmpany = document.getElementById('iddCom').value;
        // let a = document.getElementById('departas');
        // var username = a.options[a.selectedIndex].text;
        if (id == "0"){
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Please select team role.',
                showConfirmButton: false,
                timer: 3000,
            });
        }else {
            if(id == "1"){
                idd = "PROJECT MANAGER";
            }else if(id == "2"){
                idd = "TEAM";
            }else if(id == "3"){
                idd = "MANAGEMENT";
            }else if(id == "4"){
                idd = "SALES";
            }
            $.ajax({
                url:'theFunction/addrole.php',
                type:'POST',
                data: {
                    id: idd,
                    username:username,
                    idCOmpany: idCOmpany,
                },
                success:function(result){
                    var datas = result;
                    if (datas.includes("100")){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Successful',
                            timer: 2000,
                        })
                        setTimeout(function() {
                            window.location.href = "setup.php";
                        }, 2000);
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ops...',
                        text: 'Not successful',
                        timer: 2000,
                    })
                    setTimeout(function() {
                        window.location.href = "setup.php";
                    }, 2000);
                }
                },
                // error:function(status){
                //     alert('error');
                // }
            });
        }
    });

    function dep(){
       
        let id = document.getElementById('departments').value
        // alert(id);
        $.ajax({
            url:'theFunction/depar.php',
            type:'POST',
            data: {
                id: id,
            },
            success:function(result){
                // var optionsList = "";
                var datas = result;
                // alert(datas);
                
                for(item in result){
                    // alert(result[item])
                    $('#team').append('<option value='+result[item] + '>'+result[item]+'</option>');
                    // optionsList += "<option value='" + result[item] + "'>" + result[item] + "</option>";
                }
            },
            error:function(status){
                alert('error');
            }
        });
        // $('#team').append(optionsList);
    }

    function myFunction() {
        var fileUpload = document.getElementById("fileUpload");
        var regex = /^([a-z A-Z0-9\s_\\.\-:()])+(.xls|.xlsx|.csv)$/;
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
                if (reader.readAsBinaryString) {
				    reader.onload = function (e) {
				        ProcessExcel(e.target.result);
			        };
		            reader.readAsBinaryString(fileUpload.files[0]);
			    } else {
			        //For IE Browser.
				    reader.onload = function (e) {
                        var data = "";
                        var bytes = new Uint8Array(e.target.result);
                        for (var i = 0; i < bytes.byteLength; i++) {
                            data += String.fromCharCode(bytes[i]);
                        }
                        ProcessExcel(data);
				    };
				    reader.readAsArrayBuffer(fileUpload.files[0]);
			    }
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'This browser does not support HTML5.',
                    showConfirmButton: false,
                    timer: 3000,
                });
                setTimeout(function () {
			        window.location.href = "setup.php";
		        }, 3000);
            }
        }else{
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Please upload a valid .xlsx or .csv file.',
                showConfirmButton: false,
                timer: 3000,
            });
            setTimeout(function () {
                window.location.href = "setup.php";
            }, 3000);
        }
    }

    function ProcessExcel(data) {
        var workbook = XLSX.read(data, {
		    type: 'binary'
	    });
        //Fetch the name of First Sheet.
        var firstSheet = workbook.SheetNames[0];
	    //Read all rows from First Sheet into an JSON array.
	    var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
	    var table = document.getElementById("example1"); // get table id for insert data into table
        for (var i = 0; i < excelRows.length; i++) {
            let idd = excelRows[i].ID;
            let username = excelRows[i].FIRST_NAME;
            let fullName = excelRows[i].LAST_NAME;
            let position = excelRows[i].POSITION;
            let department = excelRows[i].DEPARTMENT;
            let emel = excelRows[i].EMAIL;
            // alert(username)
        /*******checking for title,name,phone number ***************/
            if (typeof idd == 'undefined' || idd == null || idd == 'undefined' || idd == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your id is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof username == 'undefined' || username == null || username == 'undefined' || username == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your first name is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof fullName == 'undefined' || fullName == null || fullName == 'undefined' || fullName == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your last name is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof position == 'undefined' || position == null || position == 'undefined' || position == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your position is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof department == 'undefined' || department == null || department == 'undefined' || department == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your department is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof emel == 'undefined' || emel == null || emel == 'undefined' || emel == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your emel is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else{
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);

            cell1.innerHTML = idd;
            cell2.innerHTML = username;
            cell3.innerHTML = fullName; 
            cell4.innerHTML = position;
            cell5.innerHTML = department;
            cell6.innerHTML = emel;
        }
    }
}

function saved(){
    var table = document.getElementById("example1");iddCom
    var idCOmpany = document.getElementById("iddCom").value;
    kira= 0;
    let kiratable = table.rows.length - 2;
    for (var r = 2, n = table.rows.length; r < n; r++){
        var id = table.rows[r].cells[0].innerHTML;
        var username = table.rows[r].cells[1].innerHTML;
        var fullName = table.rows[r].cells[2].innerHTML;
        var position = table.rows[r].cells[3].innerHTML;
        var department = table.rows[r].cells[4].innerHTML;
        var emel = table.rows[r].cells[5].innerHTML;

        // alert(id)
        // var nama = document.getElementById('userNama').value; 
        // var projeckName = document.getElementById('projeckName').value;

        // kira++;
                            // alert(kira + " = " + kiratable)

        $.ajax({
            url: "theFunction/saveUpload.php",
            type: "POST",
            data: {
                id: id,
                username: username,
                fullName: fullName,
                position: position,
                department: department,
                emel: emel,
                idCOmpany: idCOmpany,
            },
            success: function (data, status, xhr) {    // success callback function
            var datas = data;
            datas = datas.replace('"','');
            // alert(datas)
                if (datas.includes("100")){
                    // alert(kira + " = " + kiratable)
                    // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                    if (kira == kiratable){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Successful',
                            timer: 2000,
                        })
                        setTimeout(function() {
                            window.location.href = "setup.php";
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
                        window.location.href = "setup.php";
                    }, 2000);
                }
            }
        });
        kira++;
    }
}


function myFunction1() {
        var fileUpload = document.getElementById("fileUploadz");
        var regex = /^([a-z A-Z0-9\s_\\.\-:()])+(.xls|.xlsx|.csv)$/;
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
                if (reader.readAsBinaryString) {
				    reader.onload = function (e) {
				        ProcessExcel1(e.target.result);
			        };
		            reader.readAsBinaryString(fileUpload.files[0]);
			    } else {
			        //For IE Browser.
				    reader.onload = function (e) {
                        var data = "";
                        var bytes = new Uint8Array(e.target.result);
                        for (var i = 0; i < bytes.byteLength; i++) {
                            data += String.fromCharCode(bytes[i]);
                        }
                        ProcessExcel1(data);
				    };
				    reader.readAsArrayBuffer(fileUpload.files[0]);
			    }
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'This browser does not support HTML5.',
                    showConfirmButton: false,
                    timer: 3000,
                });
                setTimeout(function () {
			        window.location.href = "setup.php";
		        }, 3000);
            }
        }else{
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Please upload a valid .xlsx or .csv file.',
                showConfirmButton: false,
                timer: 3000,
            });
            setTimeout(function () {
                window.location.href = "setup.php";
            }, 3000);
        }
    }

    function ProcessExcel1(data) {
        var workbook = XLSX.read(data, {
		    type: 'binary'
	    });
        //Fetch the name of First Sheet.
        var firstSheet = workbook.SheetNames[0];
	    //Read all rows from First Sheet into an JSON array.
	    var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
	    var table = document.getElementById("example3"); // get table id for insert data into table
        for (var i = 0; i < excelRows.length; i++) {
            let idd = excelRows[i].ID;
            let projectName = excelRows[i].PROJECT_NAME;
            let clientName = excelRows[i].CLIENT_NAME;
            let companyName = excelRows[i].COMPANY_NAME;
            let companyAddress = excelRows[i].COMPANY_ADDRESS;
            let contactNo = excelRows[i].CONTACT_NO;
            let emel = excelRows[i].EMAIL;
            let position = excelRows[i].POSITION;
            let projectPillar = excelRows[i].PROJECT_PILLAR;
            // alert(username)
        /*******checking for title,name,phone number ***************/
            if (typeof idd == 'undefined' || idd == null || idd == 'undefined' || idd == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your id is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof projectName == 'undefined' || projectName == null || projectName == 'undefined' || projectName == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your project name is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof clientName == 'undefined' || clientName == null || clientName == 'undefined' || clientName == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your client name is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof companyName == 'undefined' || companyName == null || companyName == 'undefined' || companyName == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your client company name is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof companyAddress == 'undefined' || companyAddress == null || companyAddress == 'undefined' || companyAddress == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your client company address is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else if (typeof contactNo == 'undefined' || contactNo == null || contactNo == 'undefined' || contactNo == ""){
                    Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Your client PIC is not complete!',
                showConfirmButton: false,
                timer: 3000,
            });
                    break;
            }else{
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);
            var cell9 = row.insertCell(8);

            cell1.innerHTML = idd;
            cell2.innerHTML = projectName;
            cell3.innerHTML = clientName; 
            cell4.innerHTML = companyName;
            cell5.innerHTML = companyAddress;
            cell6.innerHTML = contactNo;
            cell7.innerHTML = emel;
            cell8.innerHTML = position;
            cell9.innerHTML = projectPillar;
        }
    }
}

function saved1(){
    var table = document.getElementById("example3");
    var idCOmpany = document.getElementById("iddCom").value;
    let kiraP= 0;
    let kiratableP = table.rows.length - 2;
    for (var r = 2, n = table.rows.length; r < n; r++){
        var id = table.rows[r].cells[0].innerHTML;
        var projectName = table.rows[r].cells[1].innerHTML;
        var clientName = table.rows[r].cells[2].innerHTML;
        var companyName = table.rows[r].cells[3].innerHTML;
        var companyAddress = table.rows[r].cells[4].innerHTML;
        var contactNo = table.rows[r].cells[5].innerHTML;
        var emel = table.rows[r].cells[6].innerHTML;
        var position = table.rows[r].cells[7].innerHTML;
        var projectPillar = table.rows[r].cells[8].innerHTML;

        $.ajax({
            url: "theFunction/saveProject.php",
            type: "POST",
            data: {
                id: id,
                projectName: projectName,
                clientName: clientName,
                companyName: companyName,
                companyAddress: companyAddress,
                contactNo: contactNo,
                emel: emel,
                position: position,
                projectPillar: projectPillar,
                idCOmpany: idCOmpany,
            },
            success: function (data, status, xhr) {    // success callback function
            var datas = data;
            datas = datas.replace('"','');
            // alert(datas)
                if (datas.includes("100")){
                    // alert(kira + " = " + kiratable)
                    // if (typeof datas == 100 || typeof datas == "100" || datas == 100 || datas == "100" || data == 100 || data == "100"){
                    if (kiraP == kiratableP){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Successful',
                            timer: 2000,
                        })
                        setTimeout(function() {
                            window.location.href = "setup.php";
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
                        window.location.href = "setup.php";
                    }, 2000);
                }
            }
        });
        kiraP++;
    }
}

function saved2(){
  var id = "";
  var idCOmpany = document.getElementById("iddCom").value;
  var projectName = document.getElementById("pName").value;
  var clientName = document.getElementById("cName").value;
  var companyName = document.getElementById("coName").value;
  var companyAddress = document.getElementById("cAddress").value;
  var contactNo = document.getElementById("cNumber").value;
  var emel = document.getElementById("emelClient").value;
  var position = document.getElementById("posi").value;
  // var projectPillar = document.getElementById("pProduct").value;
  let idz = document.getElementById('pProduct');
  let projectPillar = idz.options[idz.selectedIndex].text;

  if (projectName == "" || projectName == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please insert your project name!',
      timer: 2000,
    })
  }else if (clientName == "" || clientName == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please insert your client name!',
      timer: 2000,
    })
  }else if (companyName == "" || companyName == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please insert your company name!',
      timer: 2000,
    })
  }else if (companyAddress == "" || companyAddress == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please insert your company address!',
      timer: 2000,
    })
  }else if (contactNo == "" || contactNo == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please insert your client contact number!',
      timer: 2000,
    })
  }else if (emel == "" || emel == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please insert your client email!',
      timer: 2000,
    })
  }else if (position == "" || position == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please insert your client position!',
      timer: 2000,
    })
  }else if (projectPillar == "--Project Product--" || projectPillar == null){
    Swal.fire({
      icon: 'warning',
      title: 'Ops...',
      text: 'Please choose your project product!',
      timer: 2000,
    })
  }else{
    $.ajax({
      url: "theFunction/saveProject.php",
      type: "POST",
      data: {
        id: id,
        projectName: projectName,
        clientName: clientName,
        companyName: companyName,
        companyAddress: companyAddress,
        contactNo: contactNo,
        emel: emel,
        position: position,
        projectPillar: projectPillar,
        idCOmpany: idCOmpany,
      },
      success: function (data, status, xhr) {    // success callback function
        var datas = data;
        datas = datas.replace('"','');
        if (datas.includes("100")){
          // if (kiraP == kiratableP){
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Successful',
              timer: 2000,
            })
            setTimeout(function() {
              window.location.href = "setup.php";
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
            window.location.href = "setup.php";
          }, 2000);
        }
      }
    });
  }
}


function canc() {
    window .location.reload();
};
</script>

<script>
var fileName;
$(".custom-file-input").on("change", function() {
    fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
						//alert("1");
});
</script>