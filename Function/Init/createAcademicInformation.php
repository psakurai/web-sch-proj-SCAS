<?php
  require ("config.php");
  $sql = "CREATE TABLE Academic_Information (
      InfoID INT AUTO_INCREMENT NOT NULL,
      Username VARCHAR(255) NOT NULL,
      Study_Level VARCHAR(255) NOT NULL,
      Year INT NOT NULL,
      Semester INT NOT NULL,
      PRIMARY KEY (InfoID),
      FOREIGN KEY (Username) REFERENCES User(Username)
  )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table Academic_Information created successfully</h3>";
  }
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
