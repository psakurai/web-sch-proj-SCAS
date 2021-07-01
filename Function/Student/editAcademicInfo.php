<?php
session_start();
require('../Global/config.php');
?>

<ul>
  <li><a href = ../Global/editProfile.php>Personal Information</a></li>
  <?php
    if($_SESSION["LEVEL"] === "Student")
    {
      echo "<li><a href = editAcademicInfo.php>Academic Info</a></li>";
    }
  ?>
  <li><a href = ../Global/editPassword.php>Change Password</a></li>
</ul>

<hr>
<form action ="../Global/updateInformation.php" method="post">
<?php
  $currentUser = $_SESSION["ID"];

  $sql = "SELECT * FROM academic_information WHERE IdentificationID = '$currentUser'";
  $result = mysqli_query($conn,$sql);

  if($result)
    if(mysqli_num_rows($result)>0)
      while($row = mysqli_fetch_array($result))
        {
          ?>
          <div class = "form-box">
            Study Level <input type="text" name="newStudyLevel" class="form-box" value ="<?php echo $row['Study_Level']; ?>">
          </div>
          <div class = "form-box">
            Year <input type="text" name="newYear" class="form-box" value ="<?php echo $row['Year']; ?>">
          </div>
          <div class = "form-box">
            Semester <input type="text" name="newSemester" class="form-box" value ="<?php echo $row['Semester']; ?>">
          </div>

          <div class = "form-box">
            <input type ="submit" name="update_Academic" class ="submit-button" value="Update">
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

  else if($_GET["error"] == "none")
  {
  echo "Academic Information Updated!";
  }
}
?>
