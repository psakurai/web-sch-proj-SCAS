<?php
session_start();
require('config.php');
?>

<ul>
  <li><a href = editProfile.php>Personal Information</a></li>
  <?php
    if($_SESSION["LEVEL"] === "Student")
    {
      echo "<li><a href = ../Student/editAcademicInfo.php>Academic Info</a></li>";
    }
  ?>
  <li><a href = editPassword.php>Change Password</a></li>
</ul>

<hr>
<form action ="updateInformation.php" method="post">
<?php
  $currentUser = $_SESSION["ID"];

  $sql = "SELECT * FROM user WHERE IdentificationID = '$currentUser'";
  $result = mysqli_query($conn,$sql);

  if($result)
    if(mysqli_num_rows($result)>0)
      while($row = mysqli_fetch_array($result))
        {
          echo $_SESSION["PASSWORD"];
          ?>
          <div class = "form-box">
            Current Password <input type="password" name="currentPassword" class="form-box">
          </div>

          <div class = "form-box">
            New Password (Minimum 6 characters)<input type="password" name="newPassword" class="form-box">
          </div>

          <div class = "form-box">
            Re-enter New Password <input type="password" name="newRepeatPassword" class="form-box">
          </div>

          <div class = "form-box">
            <input type ="submit" name="update_Password" class ="submit-button" value="Update">
          </div>
            <?php
        }
?>
</form>

<?php
  if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
      echo "<script type='text/javascript'>alert('Fill in the fields!');</script>";
    }

    if($_GET["error"] == "pwdwrong"){
      echo "<script type='text/javascript'>alert('Wrong current password!');</script>";
    }

    else if($_GET["error"] == "pwdshort"){
      echo "<script type='text/javascript'>alert('New password need to be atleast 6 characters long!');</script>";
    }

    else if($_GET["error"] == "pwdnotmatch"){
      echo "<script type='text/javascript'>alert('Please re-enter the same new password!');</script>";
    }

    else if($_GET["error"] == "none")
    {
    echo "Password Updated!";
    }
}
  ?>
