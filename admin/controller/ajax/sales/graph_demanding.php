<?php

    include_once '../../../include/config.php';

    $list_month = [
        '01' => 'Jan',
        '02' => 'Feb',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'Aug',
        '09' => 'Sep',
        '10' => 'Oct',
        '11' => 'Nov',
        '12' => 'Dec'
    ];

    $pillar =   [
        'A' => 'Alphadash',
        'W' => 'Web Builder',
        'M' => 'Mobile Apps Development',
        'SC' => 'Software Customization',
        'BD' => 'Big Data Analytics',
        'AI' => 'Aritifical Intellegence',
        'DM' => 'Digital Marketing And Branding',
        'TE' => 'Technical Engineering Outsourcing',
        'VAS' => 'Value Added Services'
    ];  

    foreach($pillar as $idx_projects => $projects)
    {
        $data_array = [];

        foreach($list_month as $idx => $month)
        {
            $data_array [] = calculatePillar($idx,$idx_projects);
        }
        $sales_marketing [] = [
            'name' => $projects,
            'data' => $data_array
        ];
        // echo json_encode($projects);
    }

    function calculatePillar($month,$projects){

        global $conn;

        $sql = "SELECT * FROM sales_funnel where DATE_FORMAT(`created_at`, '%m') = $month";
        $value_project = 0;

        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
    
        while ($row = mysqli_fetch_array($result)) { 
            $project_pillar = json_decode($row['project_pillar']);

            if(in_array($projects,$project_pillar)) $value_project =+ $row['value'];
        }
        

        return $value_project;

    }



?>
