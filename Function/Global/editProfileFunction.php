<?php

function emptyInputInfo($userFirstName, $userLastName, $userPhone, $userEmail , $userAddress)
{
  $result;

  if(empty($userFirstName) || empty($userLastName) || empty($userPhone) || empty($userEmail) || empty($userAddress))
    {
      $result = true;
    }
  else
    {
      $result = false;
    }

  return $result;
}

function emptyInputAcademic($study,$year,$semester)
{
  $result;

  if(empty($study) || empty($year) || empty($semester))
    {
      $result = true;
    }
  else
    {
      $result = false;
    }

  return $result;
}

function pwdWrong($pwd, $crntpwd) {
  $result;
  if($pwd !== $crntpwd) {
    $result = true;
  }

  else {
    $result = false;
  }

return $result;
}

function pwdShort($pwd) {
  $result;
  if(strlen($pwd) <= 5) {
    $result = true;
  }

  else {
    $result = false;
  }
  return $result;
  }

  function pwdMatch($pwd, $rptpwd) {
    $result;
    if($pwd !== $rptpwd) {
      $result = true;
    }

    else {
      $result = false;
    }

  return $result;
  }

  function emptyInputPassword($crntpwd,$pwd,$rptpwd)
  {
    $result;

    if(empty($crntpwd) || empty($pwd) || empty($rptpwd))
      {
        $result = true;
      }
    else
      {
        $result = false;
      }

    return $result;
  }
