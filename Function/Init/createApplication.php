<?php
  require ("config.php");
  $sql = "CREATE TABLE Application (
      Result_ID INT NOT NULL AUTO_INCREMENT,
      Username VARCHAR(255) NOT NULL,
      College_Name VARCHAR(255) NOT NULL,
      Building_No VARCHAR(255) NOT NULL,
      Status TINYINT NOT NULL,
      Manager_Username VARCHAR(255),
      PRIMARY KEY (Result_ID),
      FOREIGN KEY (College_Name, Building_No) REFERENCES College(College_Name, Building_No)
  )";

  if (mysqli_query($conn, $sql)) {
    echo "Table Result created successfully";
  }
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
