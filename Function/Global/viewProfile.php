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
            <div id="nav_apply"> APPLY ROOM </div>
            <div id="nav_view"> VIEW ROOM </div>
            <div id="wrap-icon">
                <i></i>
                <i></i>
                <i></i>
            </div>
        </div>
    </div>
    <div class="wrap-icon-menu">
        <ul id="menu-opt">
            <li>
                <a>MY PROFILE</a>
            </li>
            <li>
                <a> SETTING </a>
            </li>
            <li>
                <a> SIGN OUT </a>
            </li>
        </ul>
    </div>
</header>


<?php
  $currentUser = $_SESSION["USER"];
  $currentUserID = $_SESSION["ID"];
  $sql = "SELECT * FROM user WHERE Username = '$currentUser'";
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
            <td><th>Identification ID</th><td>
            <td>:</td>
            <td><?php echo $row['IdentificationID'] ; ?></td>
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
        $currentUser2 = $_SESSION["ID"];
        $sql2 = "SELECT * FROM academic_information WHERE IdentificationID = '$currentUser2'";
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

<footer>
    <h4>CONNECT</h4> <br>
    <div class="footer-container">
        <div id="footer-left">
            <p>Contact us for more information</p>
            <p>unsource@email.com</p>
            <p>+60 12-345 6789</p>
        </div>

        <div id="footer-right">
            <ul>Connect us on your social media</ul>
        </div>
    </div>
</footer>
