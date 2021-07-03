<?php
session_start();
require '../Init/config.php';

$currentUserID = $_SESSION['ID'];
$collegeName = $_POST['college-name'];
$buildingNo = $_POST['building-no'];

$sqlApplyCollege = "INSERT INTO Result (
    'Identification_ID',
    'College_Name'
    'Building_No',
    'Status'
    ) VALUES (
    '$currentUserID',
    '$collegeName',
    '$buildingNo'
)";

if (mysqli_query($conn, $sqlApplyCollege)) {
    echo 'Applied for college successfully';
} else {
    echo 'Error applying college: ' . mysqli_error($conn);
}

mysqli_close($conn);
