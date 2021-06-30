<?php
require "../Init/config.php";

$username = $_POST["username"];
$id = $_POST["id"];

$sql = "DELETE FROM User WHERE
        Username = '$username' AND
        IdentificationID = '$id'";

if (mysqli_query($conn, $sql)) {
    echo "<h3>User deleted successfully</h3>";
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
