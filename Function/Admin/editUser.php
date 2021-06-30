<?php
// session_start();
require "../Init/config.php";

$username = $_POST["username"];
$password = $_POST["password"];
$id = $_POST["id"];
$userlevel = $_POST["user-level"];
$firstname = $_POST["first-name"];
$lastname = $_POST["last-name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];

// print "$username $password $id $userlevel $firstname $lastname $phone $email $address";
$sql = "UPDATE User
    SET
    Username = '$username',
    Password = '$password',
    User_Level = '$userlevel',
    First_Name = '$firstname',
    Last_Name = '$lastname',
    Phone_No = '$phone',
    Email = '$email',
    Address = '$address'
    WHERE IdentificationID = '$id'";

if (mysqli_query($conn, $sql)) {
    echo "<h3>User edited successfully</h3>";
} else {
    echo "Error editing user: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
