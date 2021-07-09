<?php
// session_start();
require "../Init/config.php";

$username = $_POST["username"];
$password = $_POST["password"];
$userlevel = $_POST["user-level"];
$firstname = $_POST["first-name"];
$lastname = $_POST["last-name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];

$sql = "UPDATE User
    SET
    Username = CASE WHEN '$username' = '' THEN Username ELSE '$username' END,
    Password = CASE WHEN '$password' = '' THEN Password ELSE '$password' END,
    User_Level = CASE WHEN '$userlevel' = '' THEN User_Level ELSE '$userlevel' END,
    First_Name = CASE WHEN '$firstname' = '' THEN First_Name ELSE '$firstname' END,
    Last_Name = CASE WHEN '$lastname' = '' THEN Last_Name ELSE '$lastname' END,
    Phone_No = CASE WHEN '$phone' = '' THEN Phone_No ELSE '$phone' END,
    Email = CASE WHEN '$email' = '' THEN Email ELSE '$email' END,
    Address = CASE WHEN '$address' = '' THEN Address ELSE '$address' END
    WHERE Username = '$username'";
$columncheck = "SELECT EXISTS (SELECT * FROM User WHERE Username = '$username')";

if (mysqli_query($conn, $sql)) {
    // mysqli_query($conn, $sql);
    echo "<h3>User edited successfully</h3>";
} else {
    echo "Error editing user: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
