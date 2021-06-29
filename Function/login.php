<?php
session_start();

require('Init/config.php');

$myusername=$_POST["Username"];
$mypassword=$_POST["Password"];

$sql="SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";

$result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_assoc($result);

$user_name=$rows["Username"];
$user_password=$rows["Password"];
$user_level=$rows["User_Level"];

$count=mysqli_num_rows($result);

if($count==1){

$_SESSION["Login"] = "YES";
$_SESSION["USER"] = $user_name;
$_SESSION["ID"] = $user_password;
$_SESSION["LEVEL"] =$user_level;

echo "<h2>You are now logged in as ".$_SESSION["USER"]." with access level ".$_SESSION["LEVEL"]."</h2>";
echo "<a href='main.php'>Enter site</a><br/><br/>";
echo "<a href='index.php'>Back to login page</a>";

} else {

$_SESSION["Login"] = "NO";
header("Location: index.php");
}

mysqli_close($conn);

?>
