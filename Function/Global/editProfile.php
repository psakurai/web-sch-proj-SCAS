<!--User Edit Profile-->

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
      <a href = editPassword.php style="text-align:right;margin-right:24px;">Change Password</a><br>
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
                  <td><label>First Name </label></td>
                  <td><input type="text" name="newFirstName" class="form-box" value ="<?php echo $row['First_Name']; ?>"></td>
                </tr>

              </div>
              <div class = "form-box">
                <tr>
                  <td><label>Last Name </label> </td>
                  <td><input type="text" name="newLastName" class="form-box" value ="<?php echo $row['Last_Name']; ?>"></td>
                </tr>

              </div>
              <div class = "form-box">
                <tr>
                  <td><label>Phone Number </label></td>
                  <td><input type="text" name="newPhone" class="form-box" value ="<?php echo $row['Phone_No']; ?>"></td>
                </tr>

              </div>
              <div class = "form-box">
                <tr>
                  <td><label>Email Address</label></td>
                  <td><input type="text" name="newEmail" class="form-box" value ="<?php echo $row['Email']; ?>"></td>
                </tr>

              </div>
              <div class = "form-box">
                <tr>
                  <td><label>Address </label></td>
                  <td><input type="text" name="newAddress" class="form-box" value ="<?php echo $row['Address']; ?>"></td>
                </tr>

              </div>

              <br>
              <div class = "form-box">
                <tr>
                  <td colspan="2"><input type ="submit" name="update" class ="submit-button" value="Update" id="button-update"></td>
                </tr>

              </div>
            </table>
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
</div>
