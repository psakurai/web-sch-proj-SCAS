<?php

include "../Init/config.php";

$id=$_POST['accept'];

$sql="SELECT * FROM Result WHERE IdentificationID='$id'";
$pen_result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_array($pen_result);

if(isset($_POST['accept']))
{
$sql="UPDATE result SET Status = '1' WHERE IdentificationID = '$id'";
$result=mysqli_query($conn, $sql);

if($result==1)
{
  mysqli_close($conn);
  header('location: displayApplicantList.php');
  exit;
}
else
{
    echo mysqli_error();
}
}
?>
