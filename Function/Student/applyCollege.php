<?php
session_start();
require '../Init/config.php';

$currentUser = $_SESSION['USER'];
$collegeName = $_POST['college-name'];
$buildingNo = $_POST['building-no'];
$status = '0';

$sqlApplyCollege = "INSERT INTO Application (
    Username,
    College_Name,
    Building_No,
    Status
    ) VALUES (
    '$currentUser',
    '$collegeName',
    '$buildingNo',
    '$status'
)";

if (mysqli_query($conn, $sqlApplyCollege)) {
    echo 'Applied for college successfully';
} else {
    echo 'Error applying college: ' . mysqli_error($conn);
}

mysqli_close($conn);
