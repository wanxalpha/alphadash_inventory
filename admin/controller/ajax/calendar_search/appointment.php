<?php

include_once '../../../include/config.php';

$id = trim($_GET["id"]);


    $sql = "SELECT * FROM sales_appointment WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows>0) {
        while ($row = mysqli_fetch_array($result)) { 
            
            $data = [
                'company_name' => $row['company_name'],
                'pic_name' => $row['pic_name'],
                'pic_position' => $row['pic_position'],
                'pic_mobile' => $row['pic_mobile'],
                'pic_email' => $row['pic_email'],
                'remark' => $row['remark'],
                'appointment_date' => date('d-m-Y',strtotime($row['appointment_date']))
            ];
        }
        echo json_encode($data) ;

    }else{
        return null;
    }



?>
