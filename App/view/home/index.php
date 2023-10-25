<?php 
  require_once "App/util/getter.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <?php
    getCss('home.css');
    getCss('navbar.css');
    getCss('player.css');
    getCss('search.css');
    getScript('player.js');
    getScript('browse.js');
  ?>
</head>
<body>
  <div class="container">

    <!-- call navbar and player -->
    <?php 
      include("App/view/components/navbar.php"); 
      include("App/view/components/player.php");
    ?>
    
    <!-- home -->
    <div class="main-container">
      <div class="main-wrapper">


        <div class="welcome-container">
          <h1>Welcome back, <?= $data['displayName']; ?></h1>
        </div>
        <div class="banner-container">
        </div>

        <?php include("App/view/components/search.php"); ?>
        
        <div class="songs-grid">
          
          <?php foreach($data['song'] as $s) { ?>

            <!-- check whether the song is liked or not -->
            <?php 
              $liked = '0';
              if (in_array($s['songID'], $data['IDlikedSong'])) {
                $liked = '1';
              }  
            ?>
              
            <div class="song">
              <a href="#" 
                aria-label="Play the songs"
                data-liked = '<?= $liked; ?>'
                onclick="
                  playSong(event, '<?= $s['audio']; ?>', '<?= $s['title']; ?>', '<?= $s['name']; ?>', '<?= $s['coverImage']; ?>','<?= $liked; ?>', '<?= $s['songID']; ?>', '<?= $s['name']; ?>')
                ">
              
                <img class="song-img" src="<?php getCover($s['coverImage'])?>" id="test" alt="" >
              </a>
              <div class="details">
                <div class="song-title-container">
                    <p class="song-title"><?= $s['title']; ?></p>
                </div>
                <div class="song-title"> 
                  <a href='/artist?name=<?= urlencode($s['name']); ?>' aria-label="Detail artist" class="song-artist"><?= $s['name']; ?></a>
                </div>
              </div>
            </div>
          <?php } ?>
          
        </div>
        <p>
          <?php 
            if (isset($_SESSION['empty']) && $_SESSION['empty']) {
              echo "No Songs Found :(";
              unset($_SESSION['empty']);
            }
          ?>
        </p>

        <div class="pagination">
          <?php 
            $url = "";
            if (isset($_GET['artist'])) {
              $url = $url . "&artist=" . $_GET['artist'];
            }
            if (isset($_GET['genre'])) {
              $url = $url . "&genre=" . $_GET['genre'];
            }
            if (isset($_GET['sort'])) {
              $url = $url . "&sort=" . $_GET['sort'];
            }

          ?>
          <?php 
            $totalPages = $data['totalPage']; // 13
            $currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1; // 4
            $startPage = max(1, $currentPage - 2); // 2
            $endPage = min($totalPages, $currentPage + 2); // 6
            
            if ($startPage < 2) {
                $endPage = min(5, $totalPages); // Show up to 5 pages when startPage is less than or equal to 3
            }
            
            if ($totalPages - $currentPage < 3) {
                $startPage = max(1, $totalPages - 4); // Ensure a range of 5 pages when near the end
            }
          ?>
          <?php for ($i = $startPage; $i <= $endPage; $i++) { ?>
            <a 
              class="number-page <?= (isset($_GET['page']) && $i == $_GET['page']) ? 'current-page' : ''; ?>" 
              href="?page=<?= $i; ?><?= $url; ?>" 
              id="<?= $i; ?>"
              aria-label="Go to another page"
            >
              <?= $i; ?>
            </a>
          <?php } ?>
          
          
            
        </div>

        <div>
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>