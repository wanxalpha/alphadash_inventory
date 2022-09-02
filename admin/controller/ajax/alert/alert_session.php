<?php
session_start();
// unset($_SESSION['language']);
$change = $_GET['alert'];

$_SESSION['alert_session'] = $change;

//echo $result; exit;
echo $alert;
    

?>