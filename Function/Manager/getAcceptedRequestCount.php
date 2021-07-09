<?php
require "../Init/config.php";

if ($acc_result = mysqli_query($conn, 'SELECT * FROM Application WHERE Status = "1"')) {
    $acc_result_cnt = mysqli_num_rows($acc_result);
}
$return = ['accResultCnt' => $acc_result_cnt];
echo json_encode($return);
mysqli_close($conn);
