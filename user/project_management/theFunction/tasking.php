<?php
    include '../connection/config.php';

    $id = $_POST['id'];
    $nameb = $_POST['nameb'];
    $nuk = 1;
    $sql = "SELECT * FROM job_task WHERE PROJECT_ID = '$id' AND MEMBER_NAME='$nameb'";
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0){

        while ($row = mysqli_fetch_assoc($result)){
            $jobTask = $row['JOB_TASK'];
            $progress = $row['PROJECT_STATUS'];
            $remarks = $row['PROJECT_REMARKS'];

            // echo 'var table = document.getElementById("myTablexx");
            // var row = table.insertRow(-1);
          
            // var cell1 = row.insertCell(0);
            // var cell2 = row.insertCell(1);
            // var cell3 = row.insertCell(2);
            // var cell4 = row.insertCell(3);
            // cell1.innerHTML = "' . $nuk . '";
            // cell2.innerHTML = "' . $jobTask . '";
            // cell3.innerHTML = "' . $progress . '";
            // cell4.innerHTML = "' . $remarks . '";';

           
            echo '<tr>' .
                 '<td>' . $nuk . '</td>' .
                 '<td>' . $jobTask . '</td>' .
                 '<td>' . $progress . '%</td>' .
                 '<td>' . $remarks . '</td>' .
                 '</tr>';
                 $nuk++;
            // $name = json_encode($resul);
            // echo $name;
        }
        
    }else{
        echo "No Data";
    }


?>