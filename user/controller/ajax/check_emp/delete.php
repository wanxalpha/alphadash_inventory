<?php

include_once '../../../includes/config.php';

$del_emp = trim($_GET["del_emp"]);

if (strlen($del_emp) > 0) {

    $sql = "UPDATE employees SET f_delete='Y' WHERE f_id='$del_emp'";
    $result = mysqli_query($conn, $sql);
    // echo

}if($result){
    echo '1';
}else{
    echo '0';  
}

?>