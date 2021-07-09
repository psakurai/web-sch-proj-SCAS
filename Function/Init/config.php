 <?php
    $db_host='localhost';
    $db_user='root';
    $db_pass='password';
    $db_name='mydatabase';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
