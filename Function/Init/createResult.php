<?php
  require ("config.php");
  $sql = "CREATE TABLE Result (
      ResultID INT NOT NULL AUTO_INCREMENT,
      IdentificationID VARCHAR(255) NOT NULL,
      Building_No VARCHAR(255) NOT NULL,
      Room_No INT NOT NULL,
      Status BOOLEAN,
      ManagerID INT NOT NULL,
      PRIMARY KEY (ResultID),
      FOREIGN KEY (Building_No,Room_No) REFERENCES College(Building_No,Room_No),
      FOREIGN KEY (ManagerID) REFERENCES Approval(ManagerID)
  )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table Result created successfully</h3>";
  }
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
