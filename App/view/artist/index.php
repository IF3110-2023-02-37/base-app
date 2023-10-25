<?php 
  require_once "App/util/getter.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ganti jadi nama artisnya -->
  <title>Artist Page</title> 
  <?php
    getCss('navbar.css');
    getCss('player.css');
    getCss('artistPage.css');
    getScript('player.js');
  ?>
</head>
<body>
  <div class="container">
    <?php 
      include("App/view/components/navbar.php"); 
      include("App/view/components/player.php");
    ?>

    <div class="container-page">
      <div class="artist-profile-container">
        <img class="artist-image" src="<?php getArtistImg($data['artist']['artistImage']); ?>" alt="">
        <div class="details-artist-container">
          <p class="artist-name"><?= $data['artist']['name']; ?></p>
          <p class="artist-description"><?= $data['artist']['description']; ?></p>
        </div>
      </div>


      <div class="songs-container">
        <?php foreach($data['songs'] as $s)  {?>
          <?php 
            $liked = '0';
            if (in_array($s['songID'], $data['IDlikedSong'])) {
              $liked = '1';
            }  
          ?>
          <div class="song-container">
            <div class="details-container">
              <img src="<?= getCover($s['coverImage']); ?>" class="song-cover" alt="" >
              <div class="detail-wrapper">
                <p class=""><?= $s['title']; ?></p>
                <p><?= $s['name']; ?></p>
              </div>
            </div>
            <div class="buttons-container">
              <button class="play-btn btn" onclick="
                playSong(event, '<?= $s['audio']; ?>', '<?= $s['title']; ?>', '<?= $s['name']; ?>', '<?= $s['coverImage']; ?>','<?= $liked; ?>', '<?= $s['songID']; ?>')
                ">
                <img src="<?php getImg('play.svg'); ?>" alt="">
              </button>
            </div>

            </div>
            <div class="divider"></div>
        <?php } ?>

      </div>
      
    </div>


  </div>
  
</body>
</html>