<?php 
  require_once "App/util/getter.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Podcast</title>
  <?php
    getCss('podcastList.css');
    getCss('navbar.css');
    getCss('player.css');
    getScript('player.js');
  ?>
</head>
<body>
  <?php
  //dummy data 
    $s = array(
      'audio' => 'dummy.mp3',
      'title' => 'Judul podcastnya',
      'name'  => 'Podkesmas',
      'coverImage' => 'supershy.png',
      'songID' => "4",
      'date' => "04/10/2023"
    )
  ?>

  <div class="container-podcast">
    <?php 
      include("App/view/components/navbar.php"); 
      include("App/view/components/player.php");
      include("App/view/podcast/review.php")
    ?>
    <div class="wrapper-premium-songs">
      <div class="podcast-info-container">
        <div class="info-up-wrapper">
          <img class="podcaster-img" src="<?php getArtistImg('tulus.jpg') ?>" alt="">
          <div class="info-sub-wrapper">
            <p>Podcast by</p>
            <h1>Podkesmas</h1>
          </div>
        </div>
        <p class="podcast-desc">Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum facere ad cum? adipisicing elit. Sapiente aspernatur quibusdam distinctio. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor facere </p>
      </div>

      <div class="list-songs">
        <?php for($i = 0; $i < 10; $i++) { ?>
          <div class="song-container">
            <div class="details-container">
              <img src="<?= getCover($s['coverImage']); ?>" class="song-cover" alt="" >
              <div class="detail-wrapper">
                <p class="p-title"><?= $s['title']; ?></p>
                <p class="p-date"><?= $s['date']; ?></p>
              </div>
            </div>
            <div class="buttons-container">

              <button class="comment-btn btn" onclick="openReview(event)">
                <img src="<?php getImg('add_comment.svg') ?>" alt="">
              </button>
              <button class="play-btn btn" onclick="
                playSong(event, '<?= $s['audio']; ?>', '<?= $s['title']; ?>', '<?= $s['name']; ?>', '<?= $s['coverImage']; ?>','0', '<?= $s['songID']; ?>')
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
  <script defer>
    function openReview(e) {
      e.preventDefault(); 
      document.getElementById('review-container').style.visibility = "visible";
      // document.getElementById('review-container').style.display = "block";
    }
  </script>
</body>


</html>