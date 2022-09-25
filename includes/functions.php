<?php
//if username and passwords are empty
function emptyInputSignup($user,$pwd,$cpwd){
    $result;
    if (empty($user) ||  empty($pwd) ||  empty($cpwd)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
//
function invalidUid($user){
    $result;
    if (!preg_match('/^[a-zA-Z0-9]*$/',$user)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd,$cpwd){
    $result;
    if ($pwd !== $cpwd) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function uidExists($conn,$user){
   $sql = "SELECT * FROM `users` WHERE user = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("location: ../sign.php?error=usernametaken");
    exit();
   }
   mysqli_stmt_bind_param($stmt , "s" , $user);
   mysqli_stmt_execute($stmt);
   $resultData = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
   }else{
    $result = false;
    return $result;
   }
   mysqli_stmt_close($stmt);
}

function createUser($conn,$user,$pwd,$cpwd){
    $sql = "INSERT INTO users (user,pwd) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
     header("location: ../sign.php?error=stmtFailed");
     exit();
    }
    $hashedPwd = password_hash($pwd , PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt , "ss" , $user,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../sign.php?error=none");
    exit();
 }
 function emptyInputLogin($user,$pwd){
    $result;
    if (empty($user) ||  empty($pwd)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$user,$pwd){
    $uidExists = uidExists($conn,$user);
    if ($uidExists === false) {
        header("location: ../log.php?wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["pwd"];
    $checkpwd = password_verify($pwd,$pwdHashed);
    if ($checkpwd === false) {
        header("location: ../log.php?wronglogin");
        exit();
    }elseif($checkpwd === true){
        session_start();
     
    $_SESSION['id'] = $uidExists["id"];
    $_SESSION['user'] = $uidExists["user"];
    header("location: ../index.php");
    exit();
    }
}


