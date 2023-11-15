<?php 
  require_once "App/util/getter.php";
  include("App/core/RestClient.php");
  $podcaster = RestClient::request('GET', '/user/getPodcaster');
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

  <?php 
    $test = array(
      "artist1" => array(
          "name" => "Podkesmas",
          "status" => "Pending"
      ),
      "artist2" => array(
          "name" => "Rapot",
          "status" => "None"
      ),
      "artist3" => array(
          "name" => "BKR Brothers",
          "status" => "Subscribed"
      ),
      "artist4" => array(
          "name" => "Do You See What I See?",
          "status" => "Rejected"
      ),
  );  
  ?>
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
        <?php foreach ($podcaster as $t) {?>
          <div class="subscribed-card-podcast">
            <div class="artist-name"><a href="podcast/list" class="artist-name-accepted"><?= $t['displayName']; ?></a></div>
            <div class="status-request">Accepted</div>
          </div>
        <?php } ?>


      </div>
    </div>


  </div>
  
</body>
</html>