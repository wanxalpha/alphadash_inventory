<?php

include_once '../../../include/config.php';

$sql = "SELECT a.f_id, a.f_quotes, b.f_first_name, b.f_last_name, a.f_delete, a.f_created_date FROM proposal a LEFT JOIN employees b ON a.f_emp_id=b.f_emp_id WHERE a.f_delete!='Y'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
$cnt = 1;
if ($nums > 0) {
    // $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $quote_id = $rows['f_id'];
        $quotes = $rows['f_title'];
        $first_name = $rows['f_first_name'];
        $last_name = $rows['f_last_name'];
        $date = $rows['f_created_date'];
        $status = $rows['f_delete'];

        // echo $memo_id; echo '<br>';
        $created_date = date('d M Y', strtotime($date));     

        echo '
        <tr>
            <td>' . $cnt . '</td>
            <td>' . $quotes . '</td>
            <td>' . $first_name . ' ' . $last_name .'</td>
            <td>' . $created_date . '</td>
            <td class="text-right">
                '?>
                <?php
                if($status == "N"){
                    echo '
                    <a class="btn btn-sm btn-primary" href="#" id="suc_quotes'.$quote_id.'" name="suc_quotes">Published</a>
                    '; 
                }else{
                    echo '
                    <a class="btn btn-sm btn-success" href="#" id="pub_quotes'.$quote_id.'" name="pub_quotes" data-value="'.$quote_id.'">Publish</a>
                    ';
                }
                ?>
                <?php echo '
                <a class="btn btn-sm btn-warning" href="#" id="edit_quotes'.$quote_id.'" name="edit_quotes" data-bs-toggle="modal" data-bs-target="#edit_quotes" data-value="'.$quote_id.'">Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="del_quotes'.$quote_id.'" name="delete_quotes" data-bs-toggle="modal" data-bs-target="#delete_quotes" data-value="'.$quote_id.'">Delete</a>
            </td>
        </tr>
        <script>
        $("#pub_quotes' . $quote_id . '").click(function() {
            pub_id = "'.$quote_id.'"
            console.log("running")
            $("#pub_quotes' . $quote_id . '").html("Publishing");

            var url = "../controller/ajax/edit_function/publish_quotes.php";

            $.get(url, {
                pub_id: pub_id

            })
            .done(function(data) {
                if (data) {
                    console.log(data);
                    if(data == "1"){
                        alert("Publish Success");
                        window.location.href="../employee/quotes.php";
                    }else{
                        alert("Publish Failed");
                        window.location.href="../employee/quotes.php";
                    }
                } else {
                    console.log("no data");
                }
            })

        });
        
        $("#edit_quotes' . $quote_id . '").click(function() {
            $("#edit_quote_id").val("'.$quote_id.'");
            $("#edit_quote").val("'.$quotes.'");
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