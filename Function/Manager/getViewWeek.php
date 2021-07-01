<?php
require "../Init/config.php";

// $name = (isset($_POST['userName'])) ? $_POST['userName'] : 'no name';
// $computedString = "Hi, " . $name . "!";
// $array = ['userName' => $name, 'computedString' => $computedString];
// echo json_encode($array);

if ($result = mysqli_query($conn, 'SELECT * FROM Result')) {
    $result_cnt = mysqli_num_rows($result);
}
$return = ['resultCnt' => $result_cnt];
// $return = ['resultCnt' => '10'];
echo json_encode($return);
mysqli_close($conn);
