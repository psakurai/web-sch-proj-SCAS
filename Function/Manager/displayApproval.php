<?php
    require_once ("config.php");

    $sql = "SELECT U.IdentificationID, U.First_Name, U.User_Level, R.IdentificationID FROM User S, Result R WHERE User_Level = 'Student' AND U.IdentificationID=R.IdentificationID ORDER BY U.First_Name ASC";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
	          echo $row["IdentificationID"],$row["First_Name"],$row["Last_Name"],$row["Building_No"],$row["Room_No"],$row["Status"];
		    }
		}
    else {
		    echo "No student applied for colleges!";
		}

	  mysqli_close($conn);
?>
