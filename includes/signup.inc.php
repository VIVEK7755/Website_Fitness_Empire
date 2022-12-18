<?php

if (isset($_POST["submit"]))
{
  $name = $_POST["name"];
  $username = $_POST["uid"];
  $email = $_POST["email"];
  $pnum = $_POST["pnum"];
  $pwd = $_POST["pwd"];
  $repwd = $_POST["repwd"];

  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

  if (emptyInputSignup($name,$email,$username,$pnum,$pwd,$repwd)!==false) {
    header("location:../signup.php?error=emptyinput");
    exit();
  }
  if (invalidUid($username)!==false) {
    header("location:../signup.php?error=invalidUid");
    exit();
  }
  if (invalidEmail($email)!==false) {
    header("location:../signup.php?error=invalidEmail");
    exit();
  }
  if (pwdMatch($pwd,$repwd)!==false) {
    header("location:../signup.php?error=passwordsdontmatch");
    exit();
  }
  if (UidExists($conn,$username,$email)!==false) {
    header("location:../signup.php?error=usernametake");
    exit();
  }

  createUser($conn,$name,$email,$username,$pnum,$pwd);
}
else {
  header("location:../signup.php");
}
