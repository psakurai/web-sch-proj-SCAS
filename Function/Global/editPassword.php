<?php
session_start();
require('../Init/config.php');
echo "<link rel='stylesheet' type='text/css' href='../../Assets/css/style.css' />"; // Use external css file
?>

<header>
  <div class="header-container">
      <div class="header-container-left">
      </div>
      <div class="header-container-right">
        <div><a href = viewProfile.php>BACK</a></div>
        <div><a href="../../Function/Global/logout.php">SIGN OUT</a></div>
      </div>
  </div>
</header>
<div id="background"></div>
<div class = "nav-bar-container">
<nav class = "navigation-bar-edit-profile"><hr>
  <div style="text-align:right;padding-right:35px;">
    <a href = editProfile.php style="text-align:right;padding-right:5px;">Personal Information</a><br>
    <?php
      if($_SESSION["LEVEL"] === "Student")
      {
        echo "<a href = ../Student/editAcademicInfo.php>Academic Information</a>";
      }
    ?>
  </div>
<hr>
</nav>
</div>

<form action ="updateInformation.php" method="post">
<?php
  $currentUser = $_SESSION["USER"];

  $sql = "SELECT * FROM User WHERE Username = '$currentUser'";
  $result = mysqli_query($conn,$sql);

  if($result)
    if(mysqli_num_rows($result)>0)
      while($row = mysqli_fetch_array($result))
        {
          ?>
          <div class = "form-box-container">
          <table>
            <div class = "form-box">
              <tr>
                <td><label>Current Password</label></td>
                <td><input type="password" name="currentPassword" class="form-box"></td>
              </tr>
            </div>
            <div class = "form-box">
              <tr>
                <td><label>New Password (Minimum 6 characters)</label></td>
                <td><input type="password" name="newPassword" class="form-box"></td>
              </tr>
            </div>
            <div class = "form-box">
              <tr>
                <td><label>Re-enter New Password </label></td>
                <td><input type="password" name="newRepeatPassword" class="form-box"></td>
              </tr>
            </div>
            <br>
            <div class = "form-box">
              <tr>
                <td colspan="2"><input type ="submit" name="update_Password" class ="submit-button" value="Update" id="button-update"></td>
              </tr>
            </div>
          </table></div>
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
</div>
