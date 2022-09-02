<?php
session_start();
error_reporting(0);
include_once('../include/config.php');
include_once("../include/functions.php");
if (strlen($_SESSION['userlogin']) == 0) {
  header('location:../auth/login.php');
} elseif (isset($_GET['delid'])) {
  $rid = intval($_GET['delid']);
  $sql = "DELETE from employees where id=:rid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':rid', $rid, PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Employee Has Been Deleted');</script>";
  echo "<script>window.location.href ='employees.php'</script>";
}

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$hour = date("H", $t);
$minute = date("i", $t);
?>
<?php include_once("../menu/menu-dash-a.php"); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
      <div class="col-md-12">

        <button class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#exLargeModal"><i class="bx bx-plus"></i> Add Employee</button>

        <form class="d-flex" method="post" style="float:left" enctype="multipart/form-data">
          <select class="form-select" id="emp_desc" name="emp_desc">
            <option value="0">Designation</option>
            <?php
            $sql2 = "SELECT * from designations";
            $query2 = $dbh->prepare($sql2);
            $query2->execute();
            $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
            foreach ($result2 as $row) {
            ?>
              <option value="<?php echo htmlentities($row->f_id); ?>">
                <?php echo htmlentities($row->f_position); ?></option>
            <?php } ?>
          </select>&nbsp;

          <input class="form-control me-2" type="text" placeholder="Search ID" aria-label="Search" name="emp_id" id="emp_id" />
          <input class="form-control me-2" type="text" placeholder="Search name" aria-label="Search" name="emp_name" id="emp_name" />
          <input class="form-control me-2" type="text" placeholder="Search name" aria-label="Search" name="acc_level" id="acc_level" value="<?php echo $user_level?>" hidden/>
          <a href="#" class="btn btn-primary" name="emp_search" id="emp_search">Search</a>
        </form>
      </div>
    </div>
    <?php include_once '../include/modals/employee/add_employee.php' ?>

    <div id="emp_list2" class="row mb-4"> </div>
  </div>
</div>
<!-- / Content -->

<?php include_once("../menu/footer.php"); ?>

<script>
  $(function() {
    $('#fullname').keydown(function(e) {
      if (e.altKey) {
        e.preventDefault();
      } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90) || (key == 191) || (key == 86))) {
          e.preventDefault();
        }
      }
    });

    $('#ec1_name').keydown(function(e) {
      if (e.altKey) {
        e.preventDefault();
      } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90) || (key == 191) || (key == 86))) {
          e.preventDefault();
        }
      }
    });

    $('#ec1_relationship').keydown(function(e) {
      if (e.altKey) {
        e.preventDefault();
      } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90) || (key == 191) || (key == 86))) {
          e.preventDefault();
        }
      }
    });

    $('#ec2_relationship').keydown(function(e) {
      if (e.altKey) {
        e.preventDefault();
      } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90) || (key == 191) || (key == 86))) {
          e.preventDefault();
        }
      }
    });
  });
</script>

<script type="text/javascript">
  emp_id = $('#emp_id').val();
  emp_name = $('#emp_name').val();
  emp_desc = $('#emp_desc').val();
  user_level = $('#acc_level').val();

  console.log(emp_id);
  console.log(emp_name);
  console.log(emp_desc);
  console.log(user_level);

  var url = "../controller/ajax/check_emp/search.php";

  $.get(url, {
      emp_id: emp_id,
      emp_name: emp_name,
      emp_desc: emp_desc,
      user_level: user_level
    })
    .done(function(data) {
      if (data) {
        // console.log(data);
        $('#emp_list2').html(data);

      } else {
        console.log('no data');
      }
    })


  $(document).ready(function() {
    $('#emp_search').click(function() {

      emp_id = $('#emp_id').val();
      emp_name = $('#emp_name').val();
      emp_desc = $('#emp_desc').val();
      user_level = $('#acc_level').val();

      if (emp_id != "" || emp_name != "" || emp_desc != "") {
        console.log(emp_id);
        console.log(emp_name);
        console.log(emp_desc);
        console.log(user_level);

        var url = "../controller/ajax/check_emp/search.php";
      } else {
        console.log('no data');
      }

      $.get(url, {
          emp_id: emp_id,
          emp_name: emp_name,
          emp_desc: emp_desc,
          user_level: user_level
        })
        .done(function(data) {
          if (data) {
            // console.log(data);
            $('#emp_list2').html(data);

          } else {
            console.log('no data');
          }
        })

    })
  });
</script>