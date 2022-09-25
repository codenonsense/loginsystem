<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign in</title>
  </head>
  <body>
<?php include_once 'includes/navbar.php'; ?>
<?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>Below Fields Are Empty.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($_GET["error"] == "invalidUid") {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>Username is invalid.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($_GET["error"] == "passwordsdontmatch") {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>Please match the passwords correctly.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    
    if ($_GET["error"] == "none") {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>Account Created.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
?>
<form action ="includes/sign.inc.php" method = "post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="user"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" name="cpwd" class="form-control" id="exampleInputPassword1">
    <div id="emailHelp" class="form-text">Please Confirm you're password</div>
  
  <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
</form>

  </body>
</html>


