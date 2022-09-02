<?php
    include 'connection/config.php';
    $teamName = $_POST['teamName'];
    $teamScope = $_POST['teamScope'];
    $nameProject = $_POST['nameProject'];
    $id = $_POST['id'];

    $sqlSearch = "SELECT * FROM sales_funnel WHERE id='$id'";
    $resultSearch = mysqli_query($connect, $sqlSearch);
    $numSearch = mysqli_num_rows($resultSearch);
    if ($numSearch > 0){
        $rowSearch = mysqli_fetch_assoc($resultSearch);
        $namaTeam = $rowSearch['project_team'];
        $namaDetail= $rowSearch['project_detail'];
        $namaManager = $rowSearch['project_manager'];
        $namaPillar = $rowSearch['project_pillar'];
        $namaPriority = $rowSearch['project_priority'];

        $namez = $namaTeam . "," .  $teamName;
    }else{
        $namez = $teamName;
    }
    $sql = "UPDATE `sales_funnel` SET project_team='$namez' WHERE id='$id'";
    
    if (mysqli_query($connect, $sql)){

        $sqlW = "INSERT INTO `project_assign`( `project_name`,`project_manager`, `project_assign`, `project_detail`, `project_scope`, `project_progress`, `project_pillar`, `project_priority`, `project_status`) 
        VALUES ('$nameProject','$namaManager','$teamName','$namaDetail','$teamScope','0','$namaPillar','$namaPriority', 'Running')";
        
        if (mysqli_query($connect, $sqlW)){

        $response = "100";
        }else{
            $response = "200";
        }
        
    }else{
        $response = "200";
        
    }
    $result = json_encode($response);
    echo $result;
?>