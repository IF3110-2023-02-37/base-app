<?php 
  require_once "App/util/getter.php";
  include("App/core/RestClient.php");
  include("App/core/SoapClient.php");
  $podcasters = RestClient::request('GET', '/user/getPodcaster');
  $testsoap = SoapClient::getSubsWithSubscriber("dinda");

  $xml = simplexml_load_string($testsoap);

// Access the elements
  $podcasterUsername = $xml->xpath('//podcaster_username');
  $status = $xml->xpath('//status');
  $usernames = array();


  // Loop through the elements and populate the array
  foreach ($podcasterUsername as $index => $podcasterUsername) {
    $username = (string)$podcasterUsername;
    $usernamedata[$index]['podcaster_username'] = $username;
    $usernamedata[$index]['status'] = (string)$status[$index];
  }
// Access the elements using XPath
  $podcasterUsernames = $xml->xpath('//podcaster_username');

  // Loop through the elements and populate the array
  foreach ($podcasterUsernames as $podcasterUsername) {
      $usernames[] = (string)$podcasterUsername;
  }

  // Output the values
  // Convert SimpleXML object to JSON and then to an associative array
  $json = json_encode($xml);
  
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
  echo var_dump($usernamedata);
?>
<?php 
    $test = array(
      "artist1" => array(
          "name" => "Podkesmas",
          "status" => "Pending",
          "username" => "test1234"

      ),
      "artist2" => array(
          "name" => "Rapot",
          "status" => "None",
          "username" => "test1234"
      ),
      "artist3" => array(
          "name" => "BKR Brothers",
          "status" => "Subscribed",
          "username" => "test1234"
      ),
      "artist4" => array(
          "name" => "Do You See What I See?",
          "status" => "Rejected",
          "username" => "test1234"
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
        <p class="title">Podcast Subscription</p>
        <p class="tagline">Listen Anytime, Anywhere: Subscribe to your favorite podcast today!</p>
      </div>
      <div class="list-podcast">

        <?php foreach ($usernamedata as $t) {?>
          <div class="card-podcast">
            <?php if ($t['status'] != "accepted") {?>
              <div class="artist-name"><?= $t['podcaster_username']; ?></div>
              <?php if ($t['status'] != "None") {?>
                <div class="status-request"><?= $t['status']; ?></div>
              <?php } else {?>
                <button class="status-request subscribe-btn btn">Subscribe</button>
              <?php } ?>
            <?php } else { ?>
              <div class="artist-name">
                <a href="podcast/list?podcaster=<?= $t['podcaster_username']; ?>" class="artist-name-accepted">
                  <?= $t['podcaster_username']; ?>
                </a>
              </div>
              <a href="podcast/list?podcaster=<?= $t['podcaster_username']; ?>" class="status-request">
                  See Podcast
              </a>
            <?php } ?>
          </div>
        <?php } ?>

        <!-- blm selesai -->
        <!-- <?php foreach ($podcasters as $podcaster) {?>
          <div class="subscribed-card-podcast">
            <div class="artist-name"><a href="podcast/list?podcaster=<?= $podcaster['username']; ?>" class="artist-name-accepted"><?= $podcaster['displayName']; ?></a></div>
            <a class="status-request" href="/podcast/list?podcaster=<?= $podcaster['username']; ?>">Accepted</a>

          </div>
        <?php } ?> -->


      </div>
    </div>


  </div>
  
</body>
</html>