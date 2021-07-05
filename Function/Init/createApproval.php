<?php
  require ("config.php");
  $sql = "CREATE TABLE Approval (
      Manager_Username VARCHAR(255) NOT NULL,
      Username VARCHAR(255) NOT NULL,
      PRIMARY KEY (Manager_Username),
      FOREIGN KEY (Username) REFERENCES User(Username)
  )";

  if (mysqli_query($conn, $sql)) {
    echo "<h3>Table Approval created successfully</h3>";
  }
  else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
