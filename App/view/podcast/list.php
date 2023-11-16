<?php 
  require_once "App/util/getter.php";
  require_once "App/core/RestClient.php";
  $podcasterId = $data['podcasterId'];
  $get = RestClient::request('GET', "/user/getDataPodcaster/$podcasterId");
  $podcaster = $get['podcaster'];
  $podcasts = $get['podcasts'];
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
  <div class="container-podcast">
    <?php 
      include("App/view/components/navbar.php"); 
      include("App/view/components/player.php");
      include("App/view/podcast/review.php")
    ?>
    <div class="wrapper-premium-songs">
      <div class="podcast-info-container">
        <div class="info-up-wrapper">
          <img class="podcaster-img" src="<?= getPodcasterProfile($podcaster['picture']) ?>" alt="">
          <div class="info-sub-wrapper">
            <p>Podcast by</p>
            <h1><?= $podcaster['displayName']; ?></h1>
          </div>
        </div>
        <p class="podcast-desc"><?= $podcaster['description']; ?></p>
      </div>

      <div class="list-songs">
        <img src="<?= $test; ?>" alt="">
        <?php foreach ($podcasts as $podcast) {?>
          <div class="song-container">
            <div class="details-container">
              <img src="<?= getPodcastCover($podcast['picture']); ?>" class="song-cover" alt="" >
              <div class="detail-wrapper">
                <p class="p-title"><?= $podcast['title']; ?></p>
                <p class="p-date"><?= $podcast['date']; ?></p>
              </div>
            </div>
            <div class="buttons-container">

              <button class="comment-btn btn" onclick="openReview(event, '<?= $podcast['id']; ?>', '<?= $podcaster['username']; ?>',  '<?= $_SESSION['username']; ?>')">
                <img src="<?php getImg('add_comment.svg') ?>" alt="">
              </button>
              <button class="play-btn btn" onclick="
                playPodcast(event, '<?= $podcast['audio']; ?>', '<?= $podcast['title']; ?>', '<?= $podcaster['displayName']; ?>', '<?= $podcast['picture']; ?>','0', '<?= $podcast['id']; ?>')
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
    function openReview(e, id, podcaster, reviewer) {
      e.preventDefault(); 
      const reviewContainer = document.getElementById('review-container');
      reviewContainer.style.visibility = "visible";
      reviewContainer.setAttribute('data-id', id);
      reviewContainer.setAttribute('data-podcaster', podcaster);
      reviewContainer.setAttribute('data-reviewer', reviewer);
    }
  </script>
</body>


</html>