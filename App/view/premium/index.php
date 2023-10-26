<?php 
  require_once "App/util/getter.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium</title>
  <?php
    getCss('premium.css');
    getCss('navbar.css');
  ?>
</head>
<body>

  <?php 
    $test = array(
      "artist1" => array(
          "name" => "New Jeans",
          "status" => "Pending",
          "image" => "newjeans.jpg"
      ),
      "artist2" => array(
          "name" => "Coldplay",
          "status" => "None",
          "image" => "coldplay.jpg"
      ),
      "artist3" => array(
          "name" => "Black Pink",
          "status" => "Accepted",
          "image" => "blackpink.jpg"
      ),
      "artist4" => array(
          "name" => "Tulus",
          "status" => "Rejected",
          "image" => "tulus.jpg"
      ),
      // Add more elements as needed
  );  
  ?>
  <div class="container-premium">
    <?php 
      include("App/view/components/navbar.php"); 
    ?>

    <div class="premium-card-container">
      <div class="title-wrapper">
        <p class="title">Premium Artists</p>
      </div>
      <div class="list-card-premium">

        <?php foreach ($test as $t) {?>
          <div class="card-premium">
            <?php if ($t['status'] != "Accepted") {?>
              <div class="artist-name"><?= $t['name']; ?></div>
              <?php if ($t['status'] != "None") {?>
                <div class="status-request"><?= $t['status']; ?></div>
              <?php } else {?>
                <button class="status-request subscribe-btn btn">Subscribe</button>
              <?php } ?>
            <?php } else { ?>
              <div class="artist-name"><a href="" class="artist-name-accepted"><?= $t['name']; ?></a></div>
              <button class="see-songs-btn status-request btn">See Songs</button>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>


  </div>
  
</body>
</html>