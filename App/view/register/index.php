<?php require_once "App/util/getter.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <?php
    getCss('register.css');
  ?>
</head>
<body>
  <div class="container">
    
    <div class="left-container">
      <div class="signin-container">
        <p class="title">Sign up for free</p>
        <form class="signin-form" method="post" action="register/addAccount">
          <input class="input" id="username" name="username" type="text" placeholder="Username" required>
          <input class="input" id="displayName" name="displayName" type="text" placeholder="Display name" required>
          <input class="input" id="password" name="password" type="password" placeholder="Password" required>
          <input class="input" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm your password" required>
          <p class="" style="color: var(--red100);">
            <?php 
             if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              }
            ?>
        </p>
          <button class="signin-btn btn" type="submit">Sign Up</button>
        </form>

        <p class="signup">Already have an account?<a class="a-signup" href="/login"> Sign in</a></p>
      </div>
    </div>

    <div class="right-container">
      <img src="App/Public/image/img2.png" class="img1" alt="">
    </div>
  </div>
</body>
</html>