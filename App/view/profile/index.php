<?php 
  require_once "App/util/getter.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <?php
    getCss('profile.css');
    getCss('navbar.css');
    getScript('editProfile.js');
    getScript('deleteUser.js');
  ?>
</head>
<body>
  <div class="delete-modal" style="visibility: hidden;" id="delete-modal">test

    <div class="delete-container">
      <div class="wrapper-text">
        <p class="warning" >Deleting Account</p>
        <a href="" class="close-btn" onclick="closeModalDelete(event)">X</a>
      </div>
      <p class="text">Deleting your account will remove all of your information from our database. This cannot be undone</p>
      <form action="profile/deleteUser" method="post" class="delete-form">
        <div class="confirm-delete-container">
          <label class="text-delete" for="confirm-delete">To confirm this, type <span>"DELETE"</span></label>
          <input id="confirm-delete" type="text" placeholder="type here" class="confirm-delete">
          <input type="text" id="username"  name="username" value="<?= $_SESSION['username']; ?>" style="visibility: hidden;">
        </div>
        <button id="delete-btn" class="delete-btn btn" onclick="deleteUser(event, '<?= $_SESSION['username']; ?>')" disabled>Delete Account</button>
      </form>
      </div>
    </div>
  </div>
  <?php 
      include("App/view/components/navbar.php"); 
  ?>
    
  <div class="container">
    




    <div class="wrapper">
      <div class="wrap">
        <form action="" class="form">
          <input type="file" class="input-file hide" name="" id="upload-image">
          <div class="profile-wrapper">
            <label for="upload-image">
              <div id="frame" class="frame" style="background-image: url('<?php getProfile($data['profilePicture']) ?>');">
                <div class="edit-button">
                  <p>Edit</p>
                </div>
              </div>
            </label>
            <div class="name-wrapper">
              <label for="display-name" >Display name</label>
              <input id="display-name" type="text" required value="<?= $data['displayName']; ?>" class="display-name">
              <p class="username" id="username"><?= $data['userName']; ?></p>
              <p class="p-message">Make sure your profile picture is in folder Public/image/profile/</p>
            </div>
          </div>
          <div class="bio-wrapper">
            <label for="bio">Your Bio</label>
            <textarea name="bio" id="bio" class="bio" cols="30" rows="10" value="<?= $data['bio']; ?>"></textarea>
          </div>
          
          <div class="button-wrapper">
            <a class="delete-account" href="" onclick="openModalDelete(event)">Delete Account?</a>
            <a class="btn save-btn" onclick="editProfile(event, '<?= $_SESSION['username']; ?>')" href="#">Save</a>
          </div>

          <div class="message-container">
            <p class="message" id="message"></p>
          </div>
          
        </form>



      </div>
    </div>
  </div>
</body>
</html>