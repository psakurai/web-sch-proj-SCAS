<?php
  require ("config.php");
  $sql = "CREATE TABLE Approval (
      ManagerID INT NOT NULL AUTO_INCREMENT,
      IdentificationID INT NOT NULL,
      PRIMARY KEY (ManagerID),
      FOREIGN KEY (IdentificationID) REFERENCES User(IdentificationID)
  )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table Approval created successfully</h3>";
  }
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
