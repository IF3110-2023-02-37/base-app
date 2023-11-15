<?php 
  require_once "App/util/getter.php";
  include("App/core/RestClient.php");
  $podcasters = RestClient::request('GET', '/user/getPodcaster');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium</title>
  <?php
    getCss('podcast.css');
    getCss('navbar.css');
    getScript('podcast.js');
  ?>
</head>
<body>


  <div class="container-premium">
    <?php 
      include("App/view/components/navbar.php"); 
    ?>

    <div class="premium-card-container">
      <div class="title-wrapper">
        <p class="title">Podcast Subscription</p>
        <p class="tagline">Listen Anytime, Anywhere: Subscribe to your favorite podcast today!</p>
      </div>
      <div class="list-podcast">

        <!-- <?php foreach ($podcaster as $t) {?>
          <div class="card-podcast <?php echo ($t['status'] === 'Subscribed') ? ' subscribed-card-podcast' : ''; ?>">
            <?php if ($t['status'] != "Accepted") {?>
              <div class="artist-name"><?= $t['displaynName']; ?></div>
              <?php if ($t['status'] != "None") {?>
                <div class="status-request"><?= $t['status']; ?></div>
              <?php } else {?>
                <button class="status-request subscribe-btn btn">Subscribe</button>
              <?php } ?>
            <?php } else { ?>
              <div class="artist-name"><a href="podcast/list" class="artist-name-accepted"><?= $t['name']; ?></a></div>
              <div class="status-request"><?= $t['status']; ?></div>
            <?php } ?>
          </div>
        <?php } ?> -->

        <!-- blm selesai -->
        <?php foreach ($podcasters as $podcaster) {?>
          <div class="subscribed-card-podcast">
            <div class="artist-name"><a href="podcast/list?podcaster=<?= $podcaster['username']; ?>" class="artist-name-accepted"><?= $podcaster['displayName']; ?></a></div>
            <a class="status-request" href="/podcast/list?podcaster=<?= $podcaster['username']; ?>">Accepted</a>

          </div>
        <?php } ?>


      </div>
    </div>


  </div>
  
</body>
</html>