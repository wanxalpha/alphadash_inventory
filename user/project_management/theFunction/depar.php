<?php
    include '../connection/config.php';

    $departId = $_POST['id'];
    $sql = "SELECT * FROM employees WHERE f_department = '$departId'";
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0){

        while ($row = mysqli_fetch_assoc($result)){
            $resul = $row['f_first_name'];
            $bil = $row['f_bil'];
            
            echo '<option value="' . $bil . '">' . $resul . '</option>';
           
            // $name = json_encode($resul);
            // echo $name;
        }
        
    }else{
        echo "xde";
    }


?>