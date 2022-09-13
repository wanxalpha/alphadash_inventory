<?php 
    include 'global_function.php';
    include_once('Lookup/FunnelStatus.php');
    include_once('Lookup/ProjectSector.php');
    include_once('Lookup/SoftDelete.php');


        $data_kpi = getKPISalesPerson();
        $data_team_kpi = getKPISalesTeam();
        $data_funnel_status = getStatusFunnel();
        $data_funnel_category = getCategoryFunnel();
        $data_pillar = calculatePillar();
        $data_pillar_increase = calculatePillar(true);
        $data_calendar = Calendar();

        $purchase_details = purchaseDetails();

    function purchaseDetails(){
        global $conn;
        $comp_id = $_SESSION['company'];

        $query = "SELECT a.id,b.f_first_name AS stakeholder_name, a.reference_number, a.date, a.remark, d.name AS product_name, c.quantity, d.sales_price, d.buy_price
        from inv_stock_out AS a
        LEFT JOIN employees AS b ON a.stakeholder_id = b.f_id
        LEFT JOIN inv_stock_out_product AS c ON a.id = c.stock_out_id
        LEFT JOIN inv_product AS d ON c.product_id = d.id
        where a.deleted_at IS NULL AND c.deleted_at IS NULL AND a.status = 1 and a.company_id = '$comp_id'
        GROUP BY a.id,b.f_first_name,a.reference_number,a.date, a.remark, d.name, c.quantity, d.sales_price, d.buy_price"; 

        $result = mysqli_query($conn, $query);

        return $result;
    }

    function calculatePillar($increase = false){
        global $conn;

        $less_year = isset($_GET['demand_less_year']) ? $_GET['demand_less_year'] : date('Y');
        $more_year = isset($_GET['demand_more_year']) ? $_GET['demand_more_year'] : date('Y');

        $less_product = isset($_GET['demand_less_product']) ? $_GET['demand_less_product'] : null;
        $more_product = isset($_GET['demand_more_product']) ? $_GET['demand_more_product'] : null;

        $sales_marketing = [];

        $list_month = listMonth(true);

        if($increase){
            $pillar = getPillar($more_product);
        }
        else{
            $pillar = getPillar($less_product);
        }


        while ($row = mysqli_fetch_array($pillar)) {

            $data_array = [];

            foreach($list_month as $month => $label_month)
            {
                if($increase){
                    $query = "where value > 99999 AND DATE_FORMAT(`created_at`, '%m') = $month AND DATE_FORMAT(`created_at`, '%Y') = $more_year";
                }
                else{
                    $query = "where value < 100000 AND DATE_FORMAT(`created_at`, '%m') = $month AND DATE_FORMAT(`created_at`, '%Y') = $less_year";
                }
                

                if($_SESSION['role'] == 'User'){
                    $query = $query. ' AND employee_id='.$_SESSION['emp_id'];
                }

                
                
                $sql = "SELECT * FROM sales_funnel $query";

                $value_project = 0;
        
                $result_funnel = mysqli_query($conn, $sql);
            
                while ($row_funnel = mysqli_fetch_array($result_funnel)) { 
                    $project_pillar = json_decode($row_funnel['project_pillar']);
        
                    if(in_array($row['project_code'],$project_pillar)) $value_project =+ $row_funnel['value'];
                }

                $data_array [] = $value_project;
                
            }
            $sales_marketing [] = [
                'name' => $row['project_pillar'],
                'data' => $data_array
            ];
        }

        return $sales_marketing;
    }

    function getKPISalesPerson(){

        global $conn;

        $date = isset($_GET['kpi_year']) ? $_GET['kpi_year'] : date('Y');

        $kpi_sales_person = isset($_GET['kpi_sales_person']) ? $_GET['kpi_sales_person'] : null ;

        if(isset($_GET['kpi_month'])){

            $full_name = date("F", mktime(0, 0, 0, $_GET['kpi_month'], 10));
            $short_name = strtolower(date("M", mktime(0, 0, 0, $_GET['kpi_month'], 10)));

            $list_month = [
                $short_name =>$full_name
            ];
        }
        else{
            $list_month =  [
                'jan' => 'January', 
                'feb' => 'February', 
                'mar' => 'March', 
                'apr' => 'April', 
                'may' => 'May', 
                'jun' => 'June',
                'jul' => 'July',
                'aug' => 'August', 
                'sep' => 'September', 
                'oct' => 'October', 
                'nov' => 'November', 
                'dec' => 'December'
            ];
        }


        $query = " AND year = $date";

        if($kpi_sales_person && $_SESSION['role'] != 'User'){
            $query = $query." AND employee_id=".$kpi_sales_person;
        }

        if($_SESSION['role'] == 'User'){
            $query = $query." AND employee_id=".$_SESSION['emp_id'];
        }   
        $comp_id = $_SESSION['company'];

        $sql = "SELECT sales_value.kpi_jan,sales_value.act_jan,sales_value.act_feb,sales_value.act_mar,sales_value.act_apr,sales_value.act_may,sales_value.act_jun,
                sales_value.act_jul,sales_value.act_aug,sales_value.act_sep,sales_value.act_oct,sales_value.act_nov,sales_value.act_dec,
                sales_value.kpi_jan,sales_value.kpi_feb,sales_value.kpi_mar,sales_value.kpi_apr,sales_value.kpi_may,sales_value.kpi_jun,sales_value.kpi_jul,sales_value.kpi_aug,
                sales_value.kpi_sep,sales_value.kpi_oct,sales_value.kpi_nov,sales_value.kpi_dec,
                employees.f_first_name,employees.f_last_name
                FROM sales_value 
                INNER JOIN employees ON sales_value.employee_id = employees.f_id
                INNER JOIN departments ON employees.f_department = departments.f_id
                where departments.f_code = 'SM' AND employees.f_company_id= ".$comp_id.$query;
    
        $result = mysqli_query($conn, $sql);
        $data_kpi = [];
        while ($row = mysqli_fetch_array($result)) { 
            $data = $goals = [];


            foreach($list_month as $idx => $month)
            {
                $goals = [];
                if($row['kpi_'.$idx])
                {
                    $goals[] = [
                        'name' => 'Expected',
                        'value' =>  $row['kpi_'.$idx],
                        // 'strokeWidth' => 10,
                        // 'strokeDashArray' => 10,
                        'strokeColor' => '#FF0000',
                        'borderColor' => '#FF0000',
                        'style' => [
                          'color' => '#FF0000',
                          'background' => '#FF0000'
                        ],
                
                    ];
                    
                }
                
                $data [] = [
                    'x' => $month,
                    'y' => $row['act_'.$idx],
                    'goals' => $goals
                ];
            }
           

           
            
            $data_kpi[] = [
                'name' => $row['f_first_name'] .' '. $row['f_last_name'],
                'data' =>$data
                // 'data' => [$row['act_jan'],$row['act_feb'],$row['act_mar'],$row['act_apr'],$row['act_may'],$row['act_jun'],$row['act_jul'],$row['act_aug'],$row['act_sep'],$row['act_oct'],$row['act_nov'],$row['act_dec']],
                // 'markers' => [$row['act_jan'],$row['act_feb'],$row['act_mar'],$row['act_apr'],$row['act_may'],$row['act_jun'],$row['act_jul'],$row['act_aug'],$row['act_sep'],$row['act_oct'],$row['act_nov'],$row['act_dec']],
            ];
        }

        return $data_kpi;
    }

    function getKPISalesTeam(){
        global $conn;

        $date = isset($_GET['kpi_team_year']) ? $_GET['kpi_team_year'] : date('Y');

        // $kpi_sales_person = isset($_GET['kpi_sales_person']) ? $_GET['kpi_sales_person'] : null ;

        if(isset($_GET['kpi_team_month'])){

            $full_name = date("F", mktime(0, 0, 0, $_GET['kpi_team_month'], 10));
            $short_name = strtolower(date("M", mktime(0, 0, 0, $_GET['kpi_team_month'], 10)));

            $list_month = [
                $short_name =>$full_name
            ];
        }
        else{
            $list_month =  [
                'jan' => 'January', 
                'feb' => 'February', 
                'mar' => 'March', 
                'apr' => 'April', 
                'may' => 'May', 
                'jun' => 'June',
                'jul' => 'July',
                'aug' => 'August', 
                'sep' => 'September', 
                'oct' => 'October', 
                'nov' => 'November', 
                'dec' => 'December'
            ];
        }


        $query = "AND year = $date";

        // if($kpi_sales_person && $_SESSION['role'] != 'User'){
        //     $query = $query." AND employee_id=".$kpi_sales_person;
        // }

        // if($_SESSION['role'] == 'User'){
        //     $query = $query." AND employee_id=".$_SESSION['emp_id'];
        // }   

        $status = SoftDelete::CREATED;
        $comp_id = $_SESSION['company'];

        $sql_team_grouping = "SELECT * from sales_grouping where status = $status AND CompanyId =".$comp_id;

        $result_grouping = mysqli_query($conn, $sql_team_grouping);
        $data_kpi = [];

        while ($row_grouping = mysqli_fetch_array($result_grouping)) { 
            $sql = "SELECT 
                sum(sales_value.act_jan) as act_jan,sum(sales_value.act_feb) as act_feb,
                sum(sales_value.act_mar) as act_mar,sum(sales_value.act_apr) as act_apr,
                sum(sales_value.act_may) as act_may,sum(sales_value.act_jun) as act_jun,
                sum(sales_value.act_jul) as act_jul,sum(sales_value.act_aug) as act_aug,
                sum(sales_value.act_sep) as act_sep,sum(sales_value.act_oct) as act_oct,
                sum(sales_value.act_nov) as act_nov,sum(sales_value.act_dec) as act_dec,
                sum(sales_value.kpi_jan) as kpi_jan,sum(sales_value.kpi_feb) as kpi_feb,
                sum(sales_value.kpi_mar) as kpi_mar,sum(sales_value.kpi_apr) as kpi_apr,
                sum(sales_value.kpi_may) as kpi_may,sum(sales_value.kpi_jun) as kpi_jun,
                sum(sales_value.kpi_jul) as kpi_jul,sum(sales_value.kpi_aug) as kpi_aug, 
                sum(sales_value.kpi_sep) as kpi_sep,sum(sales_value.kpi_oct) as kpi_oct,
                sum(sales_value.kpi_nov) as kpi_nov,sum(sales_value.kpi_dec) as kpi_dec
                FROM sales_value 
                INNER JOIN employees ON sales_value.employee_id = employees.f_id
                INNER JOIN sales_grouping_member ON employees.f_id = sales_grouping_member.f_id
                INNER JOIN sales_grouping ON sales_grouping_member.sales_grouping_id = sales_grouping.id                
                where sales_grouping.id = '$row_grouping[id] ' $query";
                                

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) { 
                    $data = $goals = [];


                    foreach($list_month as $idx => $month)
                    {
                        $goals = [];
                        if($row['kpi_'.$idx])
                        {
                            $goals[] = [
                                'name' => 'Expected',
                                'value' =>  $row['kpi_'.$idx],
                                // 'strokeWidth' => 10,
                                // 'strokeDashArray' => 10,
                                'strokeColor' => '#FF0000',
                                'borderColor' => '#FF0000',
                                'style' => [
                                    'color' => '#FF0000',
                                    'background' => '#FF0000'
                                ],
                        
                            ];
                            
                        }
                        
                        $data [] = [
                            'x' => $month,
                            'y' => $row['act_'.$idx],
                            // 'goals' => $goals
                        ];
                    }
                }

                $data_kpi[] = [
                    'name' => $row_grouping['Name'],
                    'data' =>$data
                    // 'data' => [$row['act_jan'],$row['act_feb'],$row['act_mar'],$row['act_apr'],$row['act_may'],$row['act_jun'],$row['act_jul'],$row['act_aug'],$row['act_sep'],$row['act_oct'],$row['act_nov'],$row['act_dec']],
                    // 'markers' => [$row['act_jan'],$row['act_feb'],$row['act_mar'],$row['act_apr'],$row['act_may'],$row['act_jun'],$row['act_jul'],$row['act_aug'],$row['act_sep'],$row['act_oct'],$row['act_nov'],$row['act_dec']],
                ];

        }

        return $data_kpi;
    }

    function getStatusFunnel(){
        global $conn;

        $potential = $closed = $kiv = $loss = 0;

        $comp_id = $_SESSION['company'];

        $role = $_SESSION['role'] == 'User' ? ' WHERE employee_id='.$_SESSION['emp_id'] : null;

        $month = isset($_GET['status_month']) ?  $_GET['status_month'] : null ;

        $year = isset($_GET['status_year']) ? $_GET['status_year'] : date('Y');

        $product = isset($_GET['status_product']) ?  $_GET['status_product'] : null ;

        $query = ' WHERE f_id_com='.$comp_id;

        if($month){
            $query = $query." AND DATE_FORMAT(`created_at`, '%m') = $month ";
        }

        if($year){
            $query = $query." AND DATE_FORMAT(`created_at`, '%Y') = $year ";
        }

        if($product){
            $query = $query." AND project_pillar LIKE '%$product%' ";
        }

        if($_SESSION['role'] == 'User'){
            $query = $query." AND employee_id=".$_SESSION['emp_id'];
        }

        $sql = "SELECT status FROM sales_funnel $query";
        
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) { 

            if($row['status'] ==  FunnelStatus::POTENTIAL) $potential += 1;

            elseif($row['status'] ==  FunnelStatus::CLOSED) $closed += 1;

            elseif($row['status'] ==  FunnelStatus::KIV) $kiv += 1;

            elseif($row['status'] ==  FunnelStatus::LOSS) $loss += 1;
        }

        return [$potential,$closed,$kiv,$loss];
    }

    function getCategoryFunnel(){
        global $conn;

        $gov = $private = $channel = 0;

        $comp_id = $_SESSION['company'];

        $role = $_SESSION['role'] == 'User' ? ' WHERE employee_id='.$_SESSION['emp_id'] : null;

        $month = isset($_GET['category_month']) ?  $_GET['category_month'] : null ;

        $year = isset($_GET['category_year']) ? $_GET['category_year'] : date('Y');

        $category = isset($_GET['category_category']) ?  $_GET['category_category'] : null ;

        $query = ' WHERE f_id_com='.$comp_id;

        if($month){
            $query = $query." AND DATE_FORMAT(`created_at`, '%m') = $month ";
        }

        if($year){
            $query = $query." AND DATE_FORMAT(`created_at`, '%Y') = $year ";
        }

        if($category){
            $query = $query." AND Category = $category ";
        }

        if($_SESSION['role'] == 'User'){
            $query = $query." AND employee_id=".$_SESSION['emp_id'];
        }

        $sql = "SELECT Category FROM sales_funnel $query";
        
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) { 

            if($row['Category'] ==  ProjectSector::GOVERMENT) $gov += 1;

            elseif($row['Category'] ==  ProjectSector::PRIVATES) $private += 1;

            elseif($row['Category'] ==  ProjectSector::CHANNEL) $channel += 1;
        }

        return [$gov,$private,$channel];
    }

    function Calendar(){
        global $conn;

        $leave_arr = array();

        $sql = "SELECT f_holiday_name AS name, f_start_day AS le_type, f_end_day AS total, f_restart_day AS start_time, f_reend_day AS end_time,
                CASE WHEN f_restart_date != 'none' THEN f_restart_date ELSE f_start_date END AS start_date, 
                CASE WHEN f_reend_date != 'none' THEN f_reend_date ELSE f_end_date END AS end_date
                from holidays 
                UNION (
                SELECT f_first_name, f_leave_type, f_total, f_start_time, f_end_time, f_start_date, f_end_date
                FROM leaves a 
                LEFT JOIN leave_type b ON a.f_leave_type = b.f_id 
                LEFT JOIN employees c ON a.f_emp_id = c.f_emp_id 
                WHERE a.f_status='Approved')";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) { 

            if($row["total"] >= 1){
                $total = $row["end_date"];
                $line = date('Y-m-d', strtotime($total . ' +1 day'));
                $start = $row["start_date"];
            }elseif($row["total"] < 1){
                $line = $row["end_date"]."T".$row["end_time"];
                $start = $row["start_date"]."T".$row["start_time"];
            }else{
                $line = $row["end_date"];
                $start = $row["start_date"];
            }

            if($row["le_type"] == "1"){
                $color = "purple";
            }elseif($row["le_type"] == "2"){
                $color = "black";
            }elseif($row["le_type"] == "3"){
                $color = "red";
            }elseif($row["le_type"] == "4"){
                $color = "yellow";
            }elseif($row["le_type"] == "5"){
                $color = "green";
            }elseif($row["le_type"] == "6"){
                $color = "black";
            }elseif($row["le_type"] == "7"){
                $color = "green";
            }else{
                $color = "maroon";
            }

            $leave_arr[] = array(
                'title'   => $row['name'] ,
                'start'   => $start,
                'end'   => $line,
                'color' => $color
            );
        }

        $query = $_SESSION['role'] == 'User' ? ' AND a.employee_id='.$_SESSION['emp_id'] : null;
        $comp_id = $_SESSION['company'];


        $sql = "SELECT a.id , a.company_name, a.appointment_date, b.f_first_name,b.f_last_name 
                FROM sales_appointment a 
                LEFT JOIN employees b ON a.employee_id = b.f_id 
                INNER JOIN departments ON b.f_department = departments.f_id
                where departments.f_code = 'SM' AND b.f_company_id= ".$comp_id.$query;
        
        $result = mysqli_query($conn, $sql);
        $same_day = null;
        echo ($conn->error);
        while ($row = mysqli_fetch_array($result)) { 
            
            if($same_day == date('Y-m-d',strtotime($row['appointment_date'])) ){
                $color = '#'.random_color();
            }
            else{
                $same_day = date('Y-m-d',strtotime($row['appointment_date']));
                $color = "blue";
            }
            
            // $color = null;
            $leave_arr[] = array(
                'color' => $color,
                'title' => $row['f_first_name'] ,
                'start' => date('Y-m-d H:i:s',strtotime($row['appointment_date'])),
                'end' => date('Y-m-d H:i',strtotime($row['appointment_date'])),
                'url' => "../../controller/dashboard.php?action=calender&id=".$row['id']
            );
        }

        return $leave_arr;
    
    }

    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
    
    function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    }
    

?>