<?php 
  require_once "App/util/getter.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>
  <script src="App/Public/js/player.js" defer></script>
  <script src="App/Public/js/removeFavorite.js" defer></script>
  <?php
    getCss('navbar.css');
    getCss('player.css');
    getCss('library.css');
  ?>
</head> 
<body>


  <div class="container">
    <?php 
      include "App/view/components/navbar.php";
      include "App/view/components/player.php";
    ?>

    <div class="songs-container">
      <h1 style="color: white;">Library</h1>
      <div class="empty-message">
        <p class="empty-message">
          <?php 
          if (isset($_SESSION['emptyLibrary'])) {
            echo "Songs not found, Let's add your favorite songs!";
            unset($_SESSION['emptyLibrary']);
          }
          ?>
        </p>
      </div>
      <?php foreach($data['song'] as $s)  {?>
        <?php 
          $liked = '0';
          if (in_array($s['songID'], $data['IDlikedSong'])) {
            $liked = '1';
          }  
        ?>
      
        <div class="song-container hide-container<?= $s['songID']; ?>">
          <div class="details-container">
            <img src="<?= getCover($s['coverImage']); ?>" class="song-cover" alt="" >
            <div class="detail-wrapper">
              <p class="song-title"><?= $s['title']; ?></p>
              <p href='/artist/<?= urlencode($s['name']); ?>' class="song-artist"><?= $s['name']; ?></p>
            </div>
          </div>
          <div class="buttons-container">
            <button class="play-btn btn" aria-label="play song" onclick="playSong(event, '<?= $s['audio']; ?>', '<?= $s['title']; ?>', '<?= $s['name']; ?>', '<?= $s['coverImage']; ?>', '<?= $liked; ?>', '<?= $s['songID']; ?>')">
              <img src="App/Public/image/play.svg" alt="">
            </button>
            <a href= "#" class="delete-btn btn" aria-label="delete song" aria-label="delete song" onclick="remove(event, '<?= $_SESSION['username']; ?>', '<?= $s['songID']; ?>')"><img src="<?php getImg('delete.svg'); ?>" alt=""></a>
          </div>

        </div>
        <div class="divider hide-container<?= $s['songID']; ?>" ></div>
    <?php } ?>

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
    </div>
  </div>
</body>
</html>