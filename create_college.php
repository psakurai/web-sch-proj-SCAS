<?php
  require ("config.php");
  $sql = "CREATE TABLE College (
      College_Name VARCHAR(255) NOT NULL,
      Building_No VARCHAR(255) NOT NULL,
      Room_No INT NOT NULL,
      Capacity INT NOT NULL,
      Available INT NOT NULL,
      PRIMARY KEY (Building_No, Room_No)
  )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table College created successfully</h3>";
  }
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
