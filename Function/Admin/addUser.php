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

// print "$username $password $id $userlevel $firstname $lastname $phone $email $address";
$sql = "INSERT INTO User VALUES (
    '$username',
    '$password',
    '$userlevel',
    '$firstname',
    '$lastname',
    '$phone',
    '$email',
    '$address'
    )";

if (mysqli_query($conn, $sql)) {
    echo "User added successfully";
} else {
    echo "Error adding user: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
