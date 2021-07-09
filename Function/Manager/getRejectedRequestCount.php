<?php
require "../Init/config.php";

if ($rej_result = mysqli_query($conn, 'SELECT * FROM Application WHERE Status = "2"')) {
    $rej_result_cnt = mysqli_num_rows($rej_result);
}
$return = ['rejResultCnt' => $rej_result_cnt];
echo json_encode($return);
mysqli_close($conn);
