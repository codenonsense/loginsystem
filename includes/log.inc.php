<?php

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

    require_once 'dbcon.inc.php';
    require_once 'functions.php';

    if(emptyInputLogin($user,$pwd) !== false){
        header("location: ../sign.php?error=emptyinput");
        exit();
      }
      loginUser($conn,$user,$pwd);
}else{
    header("location: ../log.php");
    exit();
}





