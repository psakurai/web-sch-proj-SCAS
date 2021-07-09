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
            <div><a href = ../Global/viewProfile.php>BACK</a></div>
            <div><a href="../../Function/Global/logout.php">SIGN OUT</a></div>
          </div>
      </div>
</header>
<div id="background"></div>
<div class = "nav-bar-container">
<nav class = "navigation-bar-edit-profile"><hr>
  <div style="text-align:right;padding-right:35px;">
    <a href = ../Global/editProfile.php style="text-align:right;padding-right:5px;">Personal Information</a><br>
    <a href = ../Global/editPassword.php style="text-align:right;padding-right:24px;">Change Password</a><br>
  </div>
</nav><hr>
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
          <div class = "form-box-container" style="padding-top:35px;">
            <table>
              <div class = "form-box">
                <tr>
                  <td><label>Study Level</label></td>
                  <td><input type="text" name="newStudyLevel" class="form-box" value ="<?php echo $row['Study_Level']; ?>"></td>
                </tr>
              </div>
              <div class = "form-box">
                <tr>
                  <td><label>Year </label></td>
                  <td><input type="text" name="newYear" class="form-box" value ="<?php echo $row['Year']; ?>"></td>
                </tr>
              </div>
              <div class = "form-box">
                <tr>
                  <td><label>Semester </label></td>
                  <td><input type="text" name="newSemester" class="form-box" value ="<?php echo $row['Semester']; ?>"></td>
                </tr>
              </div>
              <div class = "form-box">
                <tr>
                  <td colspan="2"><input type ="submit" name="update_Academic" class ="submit-button" value="Update" id="button-update"></td>
                </tr>
              </div>
            </table>

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
