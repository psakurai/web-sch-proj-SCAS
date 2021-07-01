<?php
session_start();
require('config.php');
require_once 'editProfileFunction.php';

if(isset($_POST['update'])) { // This if statement if user click update button on Personal Info Page
  $currentUser = $_SESSION["USER"];

  $userFirstName = $_POST['newFirstName'];
  $userLastName = $_POST['newLastName'];
  $userPhone = $_POST['newPhone'];
  $userEmail = $_POST['newEmail'];
  $userAddress = $_POST['newAddress'];

  if(emptyInputInfo($userFirstName, $userLastName, $userPhone, $userEmail , $userAddress) !== false)
    {
      header("location: editProfile.php?error=emptyinput");
      exit();
    }

  $sql ="UPDATE user SET First_Name = '$userFirstName', Last_Name = '$userLastName', Phone_No = '$userPhone', Email = '$userEmail', Address = '$userAddress' WHERE Username = '$currentUser'";

  mysqli_query($conn,$sql);
  header("Location: editProfile.php?error=none");
  exit;
}

if(isset($_POST['update_Academic'])) {  // This if statement if user click update button on Academic Info Page
  $currentUser = $_SESSION["ID"];
  $userStudyLevel = $_POST['newStudyLevel'];
  $userYear = $_POST['newYear'];
  $userSemester = $_POST['newSemester'];

  if(emptyInputAcademic($userStudyLevel, $userYear, $userSemester) !== false)
    {
      header("location: ../Student/editAcademicInfo.php?error=emptyinput");
      exit();
    }

  $sql ="UPDATE academic_information SET Study_Level = '$userStudyLevel', Year = '$userYear', Semester = '$userSemester' WHERE IdentificationID = '$currentUser'";
  mysqli_query($conn,$sql);
  header("Location: ../Student/editAcademicInfo.php?error=none");
  exit;
}

if(isset($_POST['update_Password'])) { // This if statement if user click update button on Change Password Page
  $currentUser = $_SESSION["ID"];
  $userCurrentPassword = $_SESSION["PASSWORD"];

  $userPassword = $_POST['currentPassword'];
  $userNewPassword = $_POST['newPassword'];
  $userRepeatNewPassword = $_POST['newRepeatPassword'];

  if(emptyInputPassword($userPassword, $userNewPassword, $userRepeatNewPassword) !== false)
    {
      header("location: editPassword.php?error=emptyinput");
      exit();
    }

  if(pwdWrong($userPassword,$userCurrentPassword) !== false) // Check if entered password same as current password
    {
      header("location: editPassword.php?error=pwdwrong");
      exit();
    }

  if(pwdShort($userNewPassword) !== false) //Check if new password is at least 6 characters long
    {
      header("location: editPassword.php?error=pwdshort");
      exit();
    }
  if(pwdMatch($userNewPassword, $userRepeatNewPassword) !== false) // Check if new password match with reentered new password
    {
      header("location: editPassword.php?error=pwdnotmatch");
      exit();
    }

  $sql ="UPDATE user SET password = '$userNewPassword' WHERE IdentificationID = '$currentUser'";
  mysqli_query($conn,$sql);
  $_SESSION["PASSWORD"] = $userNewPassword;
  header("location: editPassword.php?error=none");
  exit;
}
