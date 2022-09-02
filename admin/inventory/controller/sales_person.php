<?php 
    include 'global_function.php';
   


    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $id =  isset($_POST['id']) ? $_POST['id'] : null;

        $action =  isset($_POST['action']) ? $_POST['action'] : null;


        if($id){
            $sql = "UPDATE sales_value SET employee_id='$_POST[employee_id]',year='$_POST[year]',kpi_jan='$_POST[kpi_jan]',kpi_feb='$_POST[kpi_feb]',kpi_mar='$_POST[kpi_mar]',kpi_apr='$_POST[kpi_apr]',kpi_may='$_POST[kpi_may]',kpi_jun='$_POST[kpi_jun]',
                    kpi_jul='$_POST[kpi_jul]',kpi_aug='$_POST[kpi_aug]',kpi_sep='$_POST[kpi_sep]',kpi_oct = '$_POST[kpi_oct]',kpi_nov = '$_POST[kpi_nov]',kpi_dec='$_POST[kpi_dec]',act_jan='$_POST[act_jan]',
                    act_feb='$_POST[act_feb]',act_mar='$_POST[act_mar]',act_apr='$_POST[act_apr]',act_may='$_POST[act_may]',act_jun='$_POST[act_jun]',act_jul='$_POST[act_jul]',act_aug='$_POST[act_aug]',act_sep='$_POST[act_sep]',
                    act_oct='$_POST[act_oct]',act_nov='$_POST[act_nov]',act_dec='$_POST[act_dec]',updated_at=current_timestamp() WHERE id='$id'";
        }
        else{
            $sql = "INSERT INTO sales_value(employee_id,year,kpi_jan,kpi_feb,kpi_mar,kpi_apr,kpi_may,kpi_jun,kpi_jul,kpi_aug,kpi_sep,kpi_oct,kpi_nov,
            kpi_dec,act_jan,act_feb,act_mar,act_apr,act_may,act_jun,act_jul,act_aug,act_sep,act_oct,act_nov,act_dec,created_at,updated_at) 
            VALUES ('$_POST[employee_id]','$_POST[year]','$_POST[kpi_jan]','$_POST[kpi_feb]','$_POST[kpi_mar]','$_POST[kpi_apr]','$_POST[kpi_may]','$_POST[kpi_jun]','$_POST[kpi_jul]',
                    '$_POST[kpi_aug]','$_POST[kpi_sep]','$_POST[kpi_oct]','$_POST[kpi_nov]','$_POST[kpi_dec]','$_POST[act_jan]','$_POST[act_feb]','$_POST[act_mar]','$_POST[act_apr]','$_POST[act_may]','$_POST[act_jun]',
                    '$_POST[act_jul]','$_POST[act_aug]','$_POST[act_sep]','$_POST[act_oct]','$_POST[act_nov]','$_POST[act_dec]',current_timestamp(),current_timestamp())";
        }
        if($_SESSION['role'] == 'User') { 
            postAction('Sales Person',$action,$sql,"Location:../resource/sales_person/edit.php");
        }
        else{
            postAction('Sales Person',$action,$sql,"Location:../resource/sales_person/index.php");
        }


    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;

        $emp_id =  isset($_GET['emp_id']) ? $_GET['emp_id'] : $_SESSION['emp_id'];

        $sql ="SELECT * FROM employees WHERE f_id=".$emp_id;

        $readonly = $_SESSION['role'] == 'User' ? 'readonly' : null ;

        $result_employee = mysqli_query($conn, $sql);
        
        if($action == 'list')
        {
            $comp_id = $_SESSION['company'];

            $sql = "SELECT employees.f_id,employees.f_picture,employees.f_first_name,employees.f_last_name FROM employees 
                    INNER JOIN departments ON employees.f_department = departments.f_id
                    where departments.f_code = 'SM' AND employees.f_company_id=".$comp_id;

            $result = mysqli_query($conn, $sql);
            // $num_rows = mysqli_num_rows($result);

            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['f_id'];
                $picture = $row['f_picture'];
                $full_name = $row['f_first_name'] .' ' . $row['f_last_name'];

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>' .$full_name. '</td>
                    <td style="text-align:center">
                        <a class="btn btn-sm btn-warning" href="edit.php?emp_id='.$id.'">Edit</a>
                    </td>
                </tr>
                ';
            }
        }
        elseif($action == 'kpi'){
            $data_value = KPIList();

            echo '
                <thead>
                    <tr>
                        <th class="text-center">JAN</th>
                        <th class="text-center">FEB</th>
                        <th class="text-center">MAR</th>
                        <th class="text-center">APR</th>
                        <th class="text-center">MAY</th>
                        <th class="text-center">JUN</th>
                        <th class="text-center">JUL</th>
                        <th class="text-center">AUG</th>
                        <th class="text-center">SEP</th>
                        <th class="text-center">OCT</th>
                        <th class="text-center">NOV</th>
                        <th class="text-center">DEC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input name="kpi_jan" id="kpi_jan" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_jan'] .'"><input type="hidden" name="id" value="'.$data_value['id'] .'"></td>
                        <td><input name="kpi_feb" id="kpi_feb" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_feb'] .'"><input type="hidden" name="year" value="'.$data_value['year'] .'"></td>
                        <td><input name="kpi_mar" id="kpi_mar" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_mar'] .'"></td>
                        <td><input name="kpi_apr" id="kpi_apr" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_apr'] .'"></td>
                        <td><input name="kpi_may" id="kpi_may" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_may'] .'"></td>
                        <td><input name="kpi_jun" id="kpi_jun" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_jun'] .'"></td>
                        <td><input name="kpi_jul" id="kpi_jul" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_jul'] .'"></td>
                        <td><input name="kpi_aug" id="kpi_aug" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_aug'] .'"></td>
                        <td><input name="kpi_sep" id="kpi_sep" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_sep'] .'"></td>
                        <td><input name="kpi_oct" id="kpi_oct" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_oct'] .'"></td>
                        <td><input name="kpi_nov" id="kpi_nov" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_nov'] .'"></td>
                        <td><input name="kpi_dec" id="kpi_dec" class="form-control" '. $readonly.' type="number" value="' .$data_value['kpi_dec'] .'"></td>
                    </tr>
                    <tr>
                        <th colspan="12">ACTUAL</th>
                    </tr>
                    <tr>
                        <td><input name="act_jan" id="act_jan" class="form-control" type="text" value=" ' .$data_value['act_jan'] . '"></td>
                        <td><input name="act_feb" id="act_feb" class="form-control" type="text" value=" ' .$data_value['act_feb'] . '"></td>
                        <td><input name="act_mar" id="act_mar" class="form-control" type="text" value=" ' .$data_value['act_mar'] . '"></td>
                        <td><input name="act_apr" id="act_apr" class="form-control" type="text" value=" ' .$data_value['act_apr'] . '"></td>
                        <td><input name="act_may" id="act_may" class="form-control" type="text" value=" ' .$data_value['act_may'] . '"></td>
                        <td><input name="act_jun" id="act_jun" class="form-control" type="text" value=" ' .$data_value['act_jun'] . '"></td>
                        <td><input name="act_jul" id="act_jul" class="form-control" type="text" value=" ' .$data_value['act_jul'] . '"></td>
                        <td><input name="act_aug" id="act_aug" class="form-control" type="text" value=" ' .$data_value['act_aug'] . '"></td>
                        <td><input name="act_sep" id="act_sep" class="form-control" type="text" value=" ' .$data_value['act_sep'] . '"></td>
                        <td><input name="act_oct" id="act_oct" class="form-control" type="text" value=" ' .$data_value['act_oct'] . '"></td>
                        <td><input name="act_nov" id="act_nov" class="form-control" type="text" value=" ' .$data_value['act_nov'] . '"></td>
                        <td><input name="act_dec" id="act_dec" class="form-control" type="text" value=" ' .$data_value['act_dec'] . '"></td>
                    </tr>
                    <tr>
                        <th colspan="12">Month-to-Date</th>
                    </tr>
                    <tr>
                        <td>'.calculatePercentage($data_value['kpi_jan'], $data_value['act_jan']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_feb'], $data_value['act_feb']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_mar'], $data_value['act_mar']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_apr'], $data_value['act_apr']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_may'], $data_value['act_may']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_jun'], $data_value['act_jun']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_jul'], $data_value['act_jul']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_aug'], $data_value['act_aug']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_sep'], $data_value['act_sep']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_oct'], $data_value['act_oct']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_nov'], $data_value['act_nov']).' %</td>
                        <td>'.calculatePercentage($data_value['kpi_dec'], $data_value['act_dec']).' %</td>
                    </tr>
                    <tr>
                        <td>'.calculateLabel($data_value['kpi_jan'], $data_value['act_jan']).'</td>
                        <td>'.calculateLabel($data_value['kpi_feb'], $data_value['act_feb']).'</td>
                        <td>'.calculateLabel($data_value['kpi_mar'], $data_value['act_mar']).'</td>
                        <td>'.calculateLabel($data_value['kpi_apr'], $data_value['act_apr']).'</td>
                        <td>'.calculateLabel($data_value['kpi_may'], $data_value['act_may']).'</td>
                        <td>'.calculateLabel($data_value['kpi_jun'], $data_value['act_jun']).'</td>
                        <td>'.calculateLabel($data_value['kpi_jul'], $data_value['act_jul']).'</td>
                        <td>'.calculateLabel($data_value['kpi_aug'], $data_value['act_aug']).'</td>
                        <td>'.calculateLabel($data_value['kpi_sep'], $data_value['act_sep']).'</td>
                        <td>'.calculateLabel($data_value['kpi_oct'], $data_value['act_oct']).'</td>
                        <td>'.calculateLabel($data_value['kpi_nov'], $data_value['act_nov']).'</td>
                        <td>'.calculateLabel($data_value['kpi_dec'], $data_value['act_dec']).'</td>
                    </tr>
                     <tr>
                        <th colspan="12">Year-to-Date</th>
                    </tr>
                    <tr>
                        <td>'.calculatePercentage($data_value['acc_kpi_jan'],$data_value['acc_act_jan']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_feb'],$data_value['acc_act_feb']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_mar'],$data_value['acc_act_mar']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_apr'],$data_value['acc_act_apr']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_may'],$data_value['acc_act_may']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_jun'],$data_value['acc_act_jun']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_jul'],$data_value['acc_act_jul']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_aug'],$data_value['acc_act_aug']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_sep'],$data_value['acc_act_sep']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_oct'],$data_value['acc_act_oct']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_nov'],$data_value['acc_act_nov']).' %</td>
                        <td>'.calculatePercentage($data_value['acc_kpi_dec'],$data_value['acc_act_dec']).' %</td>
                    </tr>
                    <tr>
                        <td>'.calculateLabel($data_value['acc_kpi_jan'], $data_value['acc_act_jan']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_feb'], $data_value['acc_act_feb']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_mar'], $data_value['acc_act_mar']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_apr'], $data_value['acc_act_apr']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_may'], $data_value['acc_act_may']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_jun'], $data_value['acc_act_jun']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_jul'], $data_value['acc_act_jul']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_aug'], $data_value['acc_act_aug']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_sep'], $data_value['acc_act_sep']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_oct'], $data_value['acc_act_oct']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_nov'], $data_value['acc_act_nov']).'</td>
                        <td>'.calculateLabel($data_value['acc_kpi_dec'], $data_value['acc_act_dec']).'</td>
                    </tr>
                    
                    
                </tbody>';

            // echo $emp_id;
            
          
                   
           
            
        }
        elseif($action == 'summary_kpi'){
            $data_value = KPIList();

            echo '
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">
                            SUMMARY KPI
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-center">SUB TOTAL (January - June)</th>
                        <th class="text-center">'.calculateLabel($data_value['acc_kpi_jun'], $data_value['acc_act_jun']) .'</th>
                    </tr>
                    <tr>
                        <th class="text-center">Grand TOTAL (January - December) </th>
                        <th class="text-center">'.calculateLabel($data_value['acc_kpi_dec'], $data_value['acc_act_dec']) .'</th>
                    </tr>
                </tbody>' ;          
        }
        elseif($action == 'excel'){

            $data_value = KPIList();

            $export = '
                <table style="border: 1px solid;"> 
                    <tr> 
                        <th style="background-color:#FFA07A; border: 1px solid;" colspan="12"> KPI COMPARISON</th>
                    </tr>
                    <tr>
                        <th style="text-align:center;border: 1px solid;">January</th>
                        <th style="text-align:center;border: 1px solid;">February</th>
                        <th style="text-align:center;border: 1px solid;">March</th>
                        <th style="text-align:center;border: 1px solid;">April</th>
                        <th style="text-align:center;border: 1px solid;">May</th>
                        <th style="text-align:center;border: 1px solid;">June</th>
                        <th style="text-align:center;border: 1px solid;">July</th>
                        <th style="text-align:center;border: 1px solid;">August</th>
                        <th style="text-align:center;border: 1px solid;">September</th>
                        <th style="text-align:center;border: 1px solid;">October</th>
                        <th style="text-align:center;border: 1px solid;">November</th>
                        <th style="text-align:center;border: 1px solid;">December</th>
                    </tr>
                    <tr>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_jan'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_feb'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_mar'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_apr'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_may'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_jun'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_jul'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_aug'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_sep'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_oct'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_nov'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['kpi_dec'] . '</td>
                    </tr>
                    <tr> 
                        <th style="background-color:#FFA07A;" colspan="12"> ACTUAL</th>
                    </tr>
                    <tr>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_jan'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_feb'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_mar'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_apr'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_may'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_jun'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_jul'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_aug'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_sep'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_oct'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_nov'] . '</td>
                        <td style="text-align:center;border: 1px solid;">' . $data_value['act_dec'] . '</td>
                    </tr>
                    <tr> 
                        <th style="background-color:#FFA07A;" colspan="12"> MONTH-TO-DATE</th>
                    </tr>
                    <tr>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_jan'],$data_value['act_jan']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_feb'],$data_value['act_feb']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_mar'],$data_value['act_mar']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_apr'],$data_value['act_apr']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_may'],$data_value['act_may']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_jun'],$data_value['act_jun']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_jul'],$data_value['act_jul']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_aug'],$data_value['act_aug']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_sep'],$data_value['act_sep']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_oct'],$data_value['act_oct']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_nov'],$data_value['act_nov']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['kpi_dec'],$data_value['act_dec']) . '%</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_jan'],$data_value['act_jan']) .'"> RM ' . calculateAmountDifference($data_value['kpi_jan'],$data_value['act_jan']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_feb'],$data_value['act_feb']) .'"> RM ' . calculateAmountDifference($data_value['kpi_feb'],$data_value['act_feb']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_mar'],$data_value['act_mar']) .'"> RM ' . calculateAmountDifference($data_value['kpi_mar'],$data_value['act_mar']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_apr'],$data_value['act_apr']) .'"> RM ' . calculateAmountDifference($data_value['kpi_apr'],$data_value['act_apr']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_may'],$data_value['act_may']) .'"> RM ' . calculateAmountDifference($data_value['kpi_may'],$data_value['act_may']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_jun'],$data_value['act_jun']) .'"> RM ' . calculateAmountDifference($data_value['kpi_jun'],$data_value['act_jun']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_jul'],$data_value['act_jul']) .'"> RM ' . calculateAmountDifference($data_value['kpi_jul'],$data_value['act_jul']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_aug'],$data_value['act_aug']) .'"> RM ' . calculateAmountDifference($data_value['kpi_aug'],$data_value['act_aug']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_sep'],$data_value['act_sep']) .'"> RM ' . calculateAmountDifference($data_value['kpi_sep'],$data_value['act_sep']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_oct'],$data_value['act_oct']) .'"> RM ' . calculateAmountDifference($data_value['kpi_oct'],$data_value['act_oct']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_nov'],$data_value['act_nov']) .'"> RM ' . calculateAmountDifference($data_value['kpi_nov'],$data_value['act_nov']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['kpi_dec'],$data_value['act_dec']) .'"> RM ' . calculateAmountDifference($data_value['kpi_dec'],$data_value['act_dec']) . '</td>
                    </tr>
                    <tr> 
                        <th style="background-color:#FFA07A;" colspan="12"> YEAR-TO-DATE</th>
                    </tr>
                    <tr>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_jan'],$data_value['acc_act_jan']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_feb'],$data_value['acc_act_feb']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_mar'],$data_value['acc_act_mar']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_apr'],$data_value['acc_act_apr']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_may'],$data_value['acc_act_may']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_jun'],$data_value['acc_act_jun']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_jul'],$data_value['acc_act_jul']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_aug'],$data_value['acc_act_aug']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_sep'],$data_value['acc_act_sep']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_oct'],$data_value['acc_act_oct']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_nov'],$data_value['acc_act_nov']) . '%</td>
                        <td style="text-align:center;border: 1px solid;">' . calculatePercentage($data_value['acc_kpi_dec'],$data_value['acc_act_dec']) . '%</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_jan'],$data_value['acc_act_jan']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_jan'],$data_value['acc_act_jan']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_feb'],$data_value['acc_act_feb']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_feb'],$data_value['acc_act_feb']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_mar'],$data_value['acc_act_mar']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_mar'],$data_value['acc_act_mar']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_apr'],$data_value['acc_act_apr']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_apr'],$data_value['acc_act_apr']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_may'],$data_value['acc_act_may']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_may'],$data_value['acc_act_may']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_jun'],$data_value['acc_act_jun']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_jun'],$data_value['acc_act_jun']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_jul'],$data_value['acc_act_jul']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_jul'],$data_value['acc_act_jul']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_aug'],$data_value['acc_act_aug']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_aug'],$data_value['acc_act_aug']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_sep'],$data_value['acc_act_sep']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_sep'],$data_value['acc_act_sep']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_oct'],$data_value['acc_act_oct']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_oct'],$data_value['acc_act_oct']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_nov'],$data_value['acc_act_nov']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_nov'],$data_value['acc_act_nov']) . '</td>
                        <td style="text-align:center;border: 1px solid;'. backgroundColor($data_value['acc_kpi_dec'],$data_value['acc_act_dec']) .'"> RM ' . calculateAmountDifference($data_value['acc_kpi_dec'],$data_value['acc_act_dec']) . '</td>
                    </tr>
                    
                    ';

            $export .= '</table>';
            
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=info.xls');
            echo $export;
        }
        // elseif($action == 'excel'){
        //     namespace Dompdf;
        //     require_once '../assets/dompdf/autoload.inc.php';
        //     $dompdf = new Dompdf(); 
        //     $dompdf->loadHtml('
        //         <table border=1 align=center width=400>
        //         <tr><td>Name : </td><td></td></tr>
        //         <tr><td>Email : </td><td></td></tr>
        //         <tr><td>Age : </td><td></td></tr>
        //         <tr><td>Country : </td><td></td></tr>
        //     </table>
        //     ');
        //     $dompdf->setPaper('A4', 'landscape');
        //     $dompdf->render();
        //     $dompdf->stream("",array("Attachment" => false));
        //     exit(0);
        // }
        
    }

    function calculatePercentage($kpi, $actual){
        if($kpi == 0) return 0;

        $value = ($actual / $kpi) * 100;

        $final_value = round($value);

        if($final_value < 100){
            return '<i class="fas fa-exclamation-circle blink" style="color:red"></i><font color = "red"> '.$final_value.'</font>';
        }
        elseif($final_value == "100") return $final_value ;

        else return '<i class="fas fa-trophy" style="color:gold"></i>'.$final_value;
    }

    function calculateAmountDifference($kpi, $actual){
        $value = $actual - $kpi;
        return number_format($value);
    }

    
    function calculateLabel($kpi,$actual){
        $value = $actual - $kpi;

        $sub = substr($value,0,1);

        $total = calculateAmountDifference($kpi, $actual);

        if($sub == "-"){
            return '<i class="fas fa-exclamation-circle blink" style="color:red"></i><font color = "red"> RM '.$total.'</font>';
        }
        elseif($sub == "0") return 'RM'.$total ;

        else return '<i class="fas fa-trophy" style="color:gold"></i> RM'.$total;
    }

    function backgroundColor($kpi,$actual){
        $value = $actual - $kpi;

        $sub = substr($value,0,1);

        if($sub == "-" ){
            $color = 'background-color:#C11B17;' ;
        }
        elseif($sub == "0") {
            $color = null;
        }
        else {
            $color = 'background-color:#55ce63;' ;
        }
    
        return $color;
    
    }

    function KPIList(){
        global $conn;
        
        $emp_id = isset($_GET["emp_id"]) ? $_GET["emp_id"] : null;
        $data_return['year'] = isset($_GET["year_selected"]) ? $_GET["year_selected"] : date('Y') ;

        $sql = "SELECT * FROM sales_value WHERE employee_id='$emp_id' AND year='$data_return[year]'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);

        $data_return['id'] = null;
        $data_return['kpi_jan'] = $data_return['kpi_feb'] = $data_return['kpi_mar'] = $data_return['kpi_apr'] = $data_return['kpi_may'] = $data_return['kpi_jun'] = $data_return['kpi_jul'] = $data_return['kpi_aug'] = $data_return['kpi_sep'] = $data_return['kpi_oct'] = $data_return['kpi_nov'] = $data_return['kpi_dec'] =
        $data_return['act_jan'] = $data_return['act_feb'] = $data_return['act_mar'] = $data_return['act_apr'] = $data_return['act_may'] = $data_return['act_jun'] = $data_return['act_jul'] = $data_return['act_aug'] = $data_return['act_sep'] = $data_return['act_oct'] = $data_return['act_nov'] = $data_return['act_dec'] = 
        $data_return['acc_kpi_jan'] = $data_return['acc_kpi_feb'] = $data_return['acc_kpi_mar'] = $data_return['acc_kpi_apr'] = $data_return['acc_kpi_may'] = $data_return['acc_kpi_jun'] = $data_return['acc_kpi_jul'] = $data_return['acc_kpi_aug'] = $data_return['acc_kpi_sep'] = $data_return['acc_kpi_oct'] = $data_return['acc_kpi_nov'] = $data_return['acc_kpi_dec'] =
        $data_return['acc_act_jan'] = $data_return['acc_act_feb'] = $data_return['acc_act_mar'] = $data_return['acc_act_apr'] = $data_return['acc_act_may'] = $data_return['acc_act_jun'] = $data_return['acc_act_jul'] = $data_return['acc_act_aug'] = $data_return['acc_act_sep'] = $data_return['acc_act_oct'] = $data_return['acc_act_nov'] = $data_return['acc_act_dec'] = 0;

        while ($row = mysqli_fetch_array($result)) {   
            $data_return['id'] = $row['id'];
            $data_return['employee_id'] = $row['employee_id'];
            $data_return['year'] = $row['year'];
            $data_return['kpi_jan'] = $row['kpi_jan'];
            $data_return['kpi_feb'] = $row['kpi_feb'];
            $data_return['kpi_mar'] = $row['kpi_mar'];
            $data_return['kpi_apr'] = $row['kpi_apr'];
            $data_return['kpi_may'] = $row['kpi_may'];
            $data_return['kpi_jun'] = $row['kpi_jun'];
            $data_return['kpi_jul'] = $row['kpi_jul'];
            $data_return['kpi_aug'] = $row['kpi_aug'];
            $data_return['kpi_sep'] = $row['kpi_sep'];
            $data_return['kpi_oct'] = $row['kpi_oct'];
            $data_return['kpi_nov'] = $row['kpi_nov'];
            $data_return['kpi_dec'] = $row['kpi_dec'];
            $data_return['act_jan'] = $row['act_jan'];
            $data_return['act_feb'] = $row['act_feb'];
            $data_return['act_mar'] = $row['act_mar'];
            $data_return['act_apr'] = $row['act_apr'];
            $data_return['act_may'] = $row['act_may'];
            $data_return['act_jun'] = $row['act_jun'];
            $data_return['act_jul'] = $row['act_jul'];
            $data_return['act_aug'] = $row['act_aug'];
            $data_return['act_sep'] = $row['act_sep'];
            $data_return['act_oct'] = $row['act_oct'];
            $data_return['act_nov'] = $row['act_nov'];
            $data_return['act_dec'] = $row['act_dec'];

            $data_return['acc_kpi_jan'] = $data_return['kpi_jan'];
            $data_return['acc_kpi_feb'] = $data_return['acc_kpi_jan'] + $data_return['kpi_feb'];
            $data_return['acc_kpi_mar'] = $data_return['acc_kpi_feb'] + $data_return['kpi_mar'];
            $data_return['acc_kpi_apr'] = $data_return['acc_kpi_mar'] + $data_return['kpi_apr'];
            $data_return['acc_kpi_may'] = $data_return['acc_kpi_apr'] + $data_return['kpi_may'];
            $data_return['acc_kpi_jun'] = $data_return['acc_kpi_may'] + $data_return['kpi_jun'];
            $data_return['acc_kpi_jul'] = $data_return['acc_kpi_jun'] + $data_return['kpi_jul'];
            $data_return['acc_kpi_aug'] = $data_return['acc_kpi_jul'] + $data_return['kpi_aug'];
            $data_return['acc_kpi_sep'] = $data_return['acc_kpi_aug'] + $data_return['kpi_sep'];
            $data_return['acc_kpi_oct'] = $data_return['acc_kpi_sep'] + $data_return['kpi_oct'];
            $data_return['acc_kpi_nov'] = $data_return['acc_kpi_oct'] + $data_return['kpi_nov'];
            $data_return['acc_kpi_dec'] = $data_return['acc_kpi_nov'] + $data_return['kpi_dec'];

            $data_return['acc_act_jan'] = $data_return['act_jan'];
            $data_return['acc_act_feb'] = $data_return['acc_act_jan'] + $data_return['act_feb'];
            $data_return['acc_act_mar'] = $data_return['acc_act_feb'] + $data_return['act_mar'];
            $data_return['acc_act_apr'] = $data_return['acc_act_mar'] + $data_return['act_apr'];
            $data_return['acc_act_may'] = $data_return['acc_act_apr'] + $data_return['act_may'];
            $data_return['acc_act_jun'] = $data_return['acc_act_may'] + $data_return['act_jun'];
            $data_return['acc_act_jul'] = $data_return['acc_act_jun'] + $data_return['act_jul'];
            $data_return['acc_act_aug'] = $data_return['acc_act_jul'] + $data_return['act_aug'];
            $data_return['acc_act_sep'] = $data_return['acc_act_aug'] + $data_return['act_sep'];
            $data_return['acc_act_oct'] = $data_return['acc_act_sep'] + $data_return['act_oct'];
            $data_return['acc_act_nov'] = $data_return['acc_act_oct'] + $data_return['act_nov'];
            $data_return['acc_act_dec'] = $data_return['acc_act_nov'] + $data_return['act_dec'];
        }

        return $data_return;
    }

?>