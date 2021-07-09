<?php

include "../../Function/Init/config.php";

$id=$_POST['reject'];

$sql="SELECT * FROM Application WHERE Username='$id'";
$pen_result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_array($pen_result);

if(isset($_POST['reject']))
{
$sql="UPDATE Application SET Status = '-1' WHERE Username = '$id'";
$result=mysqli_query($conn, $sql);

if($result==-1)
{
  mysqli_close($conn);
  header('location: ../../User/Manager/mainManager.php');
  exit;
}
else
{
    echo mysqli_error();
}
}
?>
