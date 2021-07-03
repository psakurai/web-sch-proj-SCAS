<?php
  require ("config.php");
  $sql = "CREATE TABLE College (
      College_Name VARCHAR(255) NOT NULL,
      Building_No VARCHAR(255) NOT NULL,
      Capacity INT NOT NULL
      PRIMARY KEY (College_Name, Building_No)
  )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table college created successfully</h3>";
  }
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
