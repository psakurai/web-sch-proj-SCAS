<?php
require "../Init/config.php";

$username = $_POST["username"];

$sql = "DELETE FROM User WHERE
        Username = '$username'";

if (mysqli_query($conn, $sql)) {
    echo "<h3>User deleted successfully</h3>";
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
