<!-- User view profile -->

<?php
session_start();
require('../Init/config.php');
echo "<link rel='stylesheet' type='text/css' href='../../Assets/css/style.css' />"; // Use external css file
?>


<header>
    <div class="header-container">
        <div class="header-container-left">
            <div id="nav_home"> HOME </div>
        </div>
        <div class="header-container-right">
          <div><a href="../../Function/Global/logout.php">SIGN OUT</a></div>
        </div>
    </div>
</header>
<br><br><br><br><br>

<?php
  $currentUser = $_SESSION["USER"];
  $sql = "SELECT * FROM User WHERE Username = '$currentUser'";
  $result = mysqli_query($conn,$sql);

  if($result)
    if(mysqli_num_rows($result)>0)
      while($row = mysqli_fetch_array($result))
        {
          ?>
            <div class = "title-view-profile">
              <div class = "edit-profile-button">
                <a href = editProfile.php>Edit profile</a>
              </div>
              <h1><?php echo $row['First_Name'] ; ?> 's Profile

              <hr>
            </div>

          <div class = "profile-table-container">
          <div class = "profile-section"><h2><u>Personal Information</u></h2></div>
          <table class = "profile-table">
          <tr>
              <td><th>Username</th><td>
              <td>:</td>
              <td><?php echo $row['Username'] ; ?></td>
          </tr>

          <tr>
            <td><th>First Name</th><td>
            <td>:</td>
            <td><?php echo $row['First_Name'] ; ?></td>
          </tr>

          <tr>
            <td><th>Last Name</th><td>
            <td>:</td>
            <td><?php echo $row['Last_Name'] ; ?></td>
          </tr>

          <tr>
            <td><th>Phone Number</th><td>
            <td>:</td>
            <td><?php echo $row['Phone_No'] ; ?></td>
          </tr>

          <tr>
            <td><th>Email Address</th><td>
            <td>:</td>
            <td><?php echo $row['Email'] ; ?></td>
          </tr>

          <tr>
            <td><th>Address</th><td>
            <td>:</td>
            <td><?php echo $row['Address'] ; ?></td>
          </tr>
        </table>
      <?php
      }

      if($_SESSION["LEVEL"] === "Student")
      {
        $currentUser2 = $_SESSION["USER"];
        $sql2 = "SELECT * FROM Academic_Information WHERE Username = '$currentUser2'";
        $result2 = mysqli_query($conn,$sql2);

        if($result2)
          if(mysqli_num_rows($result2)>0)
            while($row2 = mysqli_fetch_array($result2)) {
          ?>
          <div class = "profile-section"><h2><u>Academic Information</u></h2></div>

          <table class = "profile-table">
          <tr>
            <td><th>Study Level</th><td>
            <td>:</td>
            <td><?php echo $row2['Study_Level'] ; ?></td>
          </tr>

          <tr>
            <td><th>Year of Study</th><td>
            <td>:</td>
            <td><?php echo $row2['Year'] ; ?></td>
          </tr>

          <tr>
            <td><th>Semester</th><td>
            <td>:</td>
            <td><?php echo $row2['Semester'] ; ?></td>
          </tr>
        </table>

        <?php
        }

      }
      ?>
      </div>
<br><br>
