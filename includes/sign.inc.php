<?php


if (isset($_POST["submit"])) {
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];
  $cpwd = $_POST['cpwd'];
  require_once 'dbcon.inc.php';
  require_once 'functions.php';
  if(emptyInputSignup($user,$pwd,$cpwd) !== false){
    header("location: ../sign.php?error=emptyinput");
    exit();
  }
  if(invalidUid($user) !== false){
    header("location: ../sign.php?error=invalidUid");
    exit();
  }
  if(pwdMatch($pwd,$cpwd) !== false){
    header("location: ../sign.php?error=passwordsdontmatch");
    exit();
  }
  if(uidExists($conn,$user) !== false){
    header("location: ../sign.php?error=usernametaken");
    exit();
  }
  createUser($conn,$user,$pwd,$cpwd);
 
}else{
    header("location:../sign.php");
    exit();
}
 ?>