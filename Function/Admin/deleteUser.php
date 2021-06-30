<?php
require "../Init/config.php";

$id = $_POST["id"];

$sql = "DELETE FROM User WHERE
        IdentificationID = '$id'";

if (mysqli_query($conn, $sql)) {
    echo "<h3>User deleted successfully</h3>";
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
