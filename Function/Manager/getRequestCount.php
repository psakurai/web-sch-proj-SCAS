<?php
require "../Init/config.php";

if ($result = mysqli_query($conn, 'SELECT * FROM Result')) {
    $result_cnt = mysqli_num_rows($result);
}
$return = ['resultCnt' => $result_cnt];
echo json_encode($return);
mysqli_close($conn);
