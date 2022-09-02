<?php

// $host       = "localhost";
// $user       = "root";
// $pass       = "";
// $database   = "pm";

$host       = "67.23.254.53";
$user       = "alphacor_prod";
$pass       = "@1phac0ret3ch123";
$database   = "alphacor_smarthr2";

$connect = new mysqli($host, $user, $pass, $database);
//$connect -> set_charset('utf8mb4');
if (!$connect) {
    die("connection failed: " . mysqli_connect_error());
} else {
    //$connect->set_charset('utf8');
    $connect->set_charset('utf8mb4');
}
$ENABLE_RTL_MODE = 'false';

date_default_timezone_set("Asia/Kuala_Lumpur");
