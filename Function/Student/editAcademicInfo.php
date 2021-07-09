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

<div class = "nav-bar-container">
<nav class = "navigation-bar-edit-profile">
  <ul>
    <li><a href = ../Global/viewProfile.php>Back</a></li>
    <li><a href = ../Global/editProfile.php >Personal Information</a></li>
    <li><a href = ../Student/editAcademicInfo.php class="active">Academic Information</a></li>
    <li><a href = ../Global/editPassword.php>Change Password</a></li>
  </ul>
</nav>
</div>

<form action ="../Global/updateInformation.php" method="post">
<?php
  $currentUser = $_SESSION["USER"];

  $sql = "SELECT * FROM Academic_Information WHERE Username = '$currentUser'";
  $result = mysqli_query($conn,$sql);

  if($result)
    if(mysqli_num_rows($result)>0)
      while($row = mysqli_fetch_array($result))
        {
          ?>
          <div class = "form-box-container">
          <div class = "form-box">
            <label>Study Level</label> <input type="text" name="newStudyLevel" class="form-box" value ="<?php echo $row['Study_Level']; ?>">
          </div>
          <div class = "form-box">
            <label>Year </label><input type="text" name="newYear" class="form-box" value ="<?php echo $row['Year']; ?>">
          </div>
          <div class = "form-box">
            <label>Semester </label><input type="text" name="newSemester" class="form-box" value ="<?php echo $row['Semester']; ?>">
          </div>

          <br>
          <div class = "form-box">
            <input type ="submit" name="update_Academic" class ="submit-button" value="Update">
          </div>
          <br>

            <?php
        }
?>
</form>

<?php
if(isset($_GET["error"])){
  if($_GET["error"] == "emptyinput"){
    echo "<script type='text/javascript'>alert('Fill in the fields!');</script>";
  }

  else if($_GET["error"] == "none")
  {
  echo "Academic Information Updated!";
  }
}
?>
</div>


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
