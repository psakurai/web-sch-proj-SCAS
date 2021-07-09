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
<br><br><br><br><br>
<div class = "nav-bar-container">
<nav class = "navigation-bar-edit-profile">
  <ul>
    <?php
      if($_SESSION["LEVEL"] === "Student")
      {
        echo "<li><a href = ../Student/editAcademicInfo.php>Academic Information</a></li>";
      }
    ?>
    <li><a href = editPassword.php>Change Password</a></li>
  </ul>
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
          <div class = "form-box">
            <label>First Name </label><input type="text" name="newFirstName" class="form-box" value ="<?php echo $row['First_Name']; ?>">
          </div>
          <div class = "form-box">
            <label>Last Name </label> <input type="text" name="newLastName" class="form-box" value ="<?php echo $row['Last_Name']; ?>">
          </div>
          <div class = "form-box">
            <label>Phone Number </label><input type="text" name="newPhone" class="form-box" value ="<?php echo $row['Phone_No']; ?>">
          </div>
          <div class = "form-box">
            <label>Email Address</label><input type="text" name="newEmail" class="form-box" value ="<?php echo $row['Email']; ?>">
          </div>
          <div class = "form-box">
            <label>Address </label><input type="text" name="newAddress" class="form-box" value ="<?php echo $row['Address']; ?>">
          </div>

          <br>
          <div class = "form-box">
            <input type ="submit" name="update" class ="submit-button" value="Update">
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
  echo "Personal Information Updated!";
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
