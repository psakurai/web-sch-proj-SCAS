<?php
  require ("config.php");
  $sql = "CREATE TABLE User (
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    IdentificationID VARCHAR(255) NOT NULL,
    User_Level VARCHAR(255) NOT NULL,
    First_Name VARCHAR(255) NOT NULL,
    Last_Name VARCHAR(255) NOT NULL,
    Phone_No VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    PRIMARY KEY (IdentificationID)
  )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table User created successfully</h3>";
  }
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
