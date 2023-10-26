<?php require_once "App/util/getter.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <?php
    getCss('login.css');
  ?>
</head>
<body>
  <div class="container">
    <div class="left-container">
      <img src="App/Public/image/img1.png" class="img1" alt="">
    </div>
    
    <div class="right-container">
      <div class="login-container">
        <p class="title">Have an account?</p>
        <form class="login-form" action="login/signin" method="post">
          <input class="input" type="text" id="username" name="username" placeholder="Username" required>
          <input class="input" type="password" id="password" name="password" placeholder="Password" required>
          <p class="error-message" style="color: var(--red100);">
              <?php if (isset($_SESSION['error'])) {
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                }
              ?>
          </p>
          <p class="error-message" style="color: var(--blue350);">
              <?php if (isset($_SESSION['success'])) {
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                }
              ?>
          </p>
          <button class="signin-btn btn" type="submit" name="signin">Sign In</button>
        </form>
        <p class="signup">New user?<a class="a-signup" href="register"> Sign up</a></p>
      </div>
    </div>
  </div>
</body>
</html>