<?php

include_once '../../../include/config.php';

$sql = "SELECT b.f_first_name, b.f_last_name, a.f_id, a.f_title, a.f_description, a.f_created_date, a.f_delete, a.f_uploaded_file FROM memo a LEFT JOIN employees b ON a.f_emp_id = b.f_emp_id WHERE a.f_delete!='Y'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

// echo $nums; echo '<br>';
$cnt = 1;
if ($nums > 0) {
    // $x = 1;
    while ($rows = mysqli_fetch_array($result)) {
        $memo_id = $rows['f_id'];
        $title = $rows['f_title'];
        $content = $rows['f_description'];
        $created = $rows['f_created_date'];
        $uploaded = $rows['f_uploaded_file'];
        $first_name = $rows['f_first_name'];
        $last_name = $rows['f_last_name'];
        $status = $rows['f_delete'];

        // echo $memo_id; echo '<br>';
        $out = strlen($content) > 30 ? substr($content,0,30)."..." : $content;

        $created_date = date('Y-m-d', strtotime($created));     

        echo '
        <tr>
            <td>' . $cnt . '</td>
            <td>' . $first_name . ' '.$last_name.'</td>
            <td>' . $title . '</td>
            <td>' . $out . '</td>
            <td>' . $uploaded . '</td>
            <td>' . $created_date . '</td>
            <td class="text-right">
                '?>
                <?php
                if($status == "N"){
                    echo '
                    <a class="btn btn-sm btn-primary" href="#" id="suc_memo'.$memo_id.'" name="suc_memo">Published</a>
                    '; 
                }else{
                    echo '
                    <a class="btn btn-sm btn-success" href="#" id="pub_memo'.$memo_id.'" name="pub_memo" data-value="'.$memo_id.'">Publish</a>
                    ';
                }
                ?>
                <?php echo '
                <a class="btn btn-sm btn-warning" href="#" id="edit_memo'.$memo_id.'"  name="edit_memo" data-bs-toggle="modal" data-bs-target="#edit_memo" data-value="'.$memo_id.'">Edit</a>
                <a class="btn btn-sm btn-danger" href="#" id="del_memo'.$memo_id.'"  name="del_memo" data-bs-toggle="modal" data-bs-target="#delete_memo" data-value="'.$memo_id.'">Delete</a>
            </td>
        </tr>
        <script>
        $("#pub_memo' . $memo_id . '").click(function() {

            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to publish this quotes?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Publish it!"
            }).then(function(result){
                pub_id = "'.$memo_id.'"
                console.log("running")
                $("#pub_memo' . $memo_id . '").html("Publishing");

                var url = "../controller/ajax/edit_function/publish_memo.php";

                $.get(url, {
                    pub_id: pub_id

                })
                .done(function(data) {
                    if (data) {
                        console.log(data);
                        if(data == "1"){
                            alert("Publish Success");
                            window.location.href="../employee/memo.php";
                        }else{
                            alert("Publish Failed");
                            window.location.href="../employee/memo.php";
                        }
                    } else {
                        console.log("no data");
                    }
                })
            })
        });

        $("#edit_memo' . $memo_id . '").click(function() {
            
            $("#edit_memo_desc").val("'.$content.'");
            $("#edit_title").val("'.$title.'");
            $("#edit_memo_id").val("'.$memo_id.'");
        });

        $("#del_memo' . $memo_id . '").click(function() {
            var memo_del = $(this).attr("data-value");
            console.log(memo_del);

            $("#del_memo_id").val(memo_del);
							
        });
        </script>
        ';

        $cnt += 1;
    }
}
?>

<!-- class="holiday-upcoming" -->