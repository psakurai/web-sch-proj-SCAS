<?php
session_start();

require('../Init/config.php');

$myusername=$_POST["Username"];
$mypassword=$_POST["Password"];

$sql="SELECT * FROM User WHERE Username='$myusername' and Password='$mypassword'";

$result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_array($result,MYSQLI_ASSOC);

$count=mysqli_num_rows($result);

if($count==1){
$user_name=$rows["Username"];
$user_password=$rows["Password"];
$user_level=$rows["User_Level"];

$_SESSION["Login"] = "YES";
$_SESSION["USER"] = $user_name;
$_SESSION["PASSWORD"] = $user_password;
$_SESSION["LEVEL"] =$user_level;

echo "<h2>You are now logged in as ".$_SESSION["USER"]." with access level ".$_SESSION["LEVEL"]."</h2>";
switch ($user_level) {
case "Admin":
	header("Location: ../../User/Admin/mainAdmin.html");
	break;
case "Manager":
	header("Location: ../../User/Manager/mainManager.php");
	break;
case "Student":
	header("Location: ../../User/Student/mainStudent.html");
	break;
default:
    echo "No User Level!";
}
}
else {

$_SESSION["Login"] = "NO";
echo "Login failed. Incorrect username or password.";
header("Location: ../../Login/index.html");
}

mysqli_close($conn);

?>
