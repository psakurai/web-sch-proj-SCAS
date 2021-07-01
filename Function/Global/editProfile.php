<!--Student Edit Profile-->

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
  $currentUser = $_SESSION["USER"];
  $currentUserID = $_SESSION["ID"];
  $sql = "SELECT * FROM user WHERE Username = '$currentUser'";
  $result = mysqli_query($conn,$sql);

  if($result)
    if(mysqli_num_rows($result)>0)
      while($row = mysqli_fetch_array($result))
        {
          ?>
          <div class = "form-box">
            First Name <input type="text" name="newFirstName" class="form-box" value ="<?php echo $row['First_Name']; ?>">
          </div>
          <div class = "form-box">
            Last Name <input type="text" name="newLastName" class="form-box" value ="<?php echo $row['Last_Name']; ?>">
          </div>
          <div class = "form-box">
            Phone Number <input type="text" name="newPhone" class="form-box" value ="<?php echo $row['Phone_No']; ?>">
          </div>
          <div class = "form-box">
            Email <input type="text" name="newEmail" class="form-box" value ="<?php echo $row['Email']; ?>">
          </div>
          <div class = "form-box">
            Address <input type="text" name="newAddress" class="form-box" value ="<?php echo $row['Address']; ?>">
          </div>

          <div class = "form-box">
            <input type ="submit" name="update" class ="submit-button" value="Update">
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
  echo "Personal Information Updated!";
  }
}
?>
