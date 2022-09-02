<?php

include_once '../../../include/config.php';

$sql = "SELECT a.f_id, a.f_quotes, a.f_proposal, b.f_full_name, a.f_created_date FROM quotes a LEFT JOIN employees b ON a.f_emp_id=b.f_emp_id WHERE a.f_delete='N'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
$cnt = 1;
if ($nums > 0) {
    // $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $quote_id = $rows['f_id'];
        $quotes = $rows['f_quotes'];
        $proposal = $rows['f_proposal'];
        $emp_name = $rows['f_full_name'];
        $date = $rows['f_created_date'];

        // echo $memo_id; echo '<br>';
        $out = strlen($quotes) > 30 ? substr($quotes,0,30)."..." : $quotes;

        $created_date = date('d M Y', strtotime($date));     

        echo '
        <tr>
            <td>' . $cnt . '</td>
            <td>' . $quotes . '</td>
            <td>' . $proposal . '</td>
            <td>' . $emp_name . '</td>
            <td>' . $created_date . '</td>
            <td class="text-right">
                <a class="btn btn-sm btn-warning" href="#" id="edit_quotes'.$quote_id.'" name="edit_quotes" data-bs-toggle="modal" data-bs-target="#edit_quotes" data-value="'.$quote_id.'">Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="del_quotes'.$quote_id.'" name="delete_quotes" data-bs-toggle="modal" data-bs-target="#delete_quotes" data-value="'.$quote_id.'">Delete</a>
            </td>
        </tr>
        <script>
        
        $("#edit_quotes' . $quote_id . '").click(function() {
            
            $("#edit_quote_id").val("'.$quote_id.'");
            $("#edit_quote").val("'.$quotes.'");
            $("#edit_proposal").val("'.$proposal.'");
        });

        $("#del_quotes' . $quote_id . '").click(function() {

            $("#del_quote_id").val("'.$quote_id.'");
							
        });
        </script>
        ';

        $cnt += 1;
    }
}
?>

<!-- class="holiday-upcoming" -->