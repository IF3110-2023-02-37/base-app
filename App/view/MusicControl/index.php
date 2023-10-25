<?php 
  require_once "App/util/getter.php";
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <?php
    getCss('MusicControl.css');
    getCss('adminNavbar.css');
    getCss('addMusic.css');
    getCss('editMusic.css');
    getCss('search.css');
    getScript('addMusic.js');
    getScript('editMusic.js');
    getScript('AdminBrowse.js');
    getScript('confirmDeleteMusic.js');
    getScript('browse.js');
    ?>
</head>
<body>
  <?php 
    include("App/view/MusicControl/editMusic.php"); 
    include("App/view/MusicControl/addMusic.php");  
    include("App/view/components/confirmModalDeleteMusic.php");
  ?>
  <div class="container">
    <?php 
    include("App/view/components/adminNavbar.php");
    ?>

    <div class="main-container">
      
    
     <!-- ADD MUSIC -->
    <div class="songs-container" id="songs-container">
      
      <?php include("App/view/components/search.php"); ?>
      <div class="add-music-container">
        <a href="" class="add-music" onclick="openAddModal(event)">
          <p>Add Music</p>  
          <img src="<?php getImg('add.svg'); ?>" class="add-btn" alt="">
        </a>
      </div>
      <h2 style="color: white; margin-top: 2rem;">
        <?php 
          if (isset($_SESSION['empty'])) {
            echo "No songs found :(";
            unset($_SESSION['empty']);
          }
        ?>
      </h2>

      <div class="songs-wrapper" id="songs-wrapper">
        <?php foreach($data['song'] as $song)  {?>
          <div class="song-container" 
            id="container-<?= $song['songID']; ?>"
          >
          <div class="details-container">
            <img src="<?= getCover($song['coverImage']); ?>" class="song-cover" alt="" >
            <div class="detail-wrapper">   
              <p class="detail-title"><?= $song['title']; ?> </p>
              <p class="detail-name"><?= $song['name']; ?></p>
            </div>
          </div>
          <div class="buttons-container">
              <a class="edit-btn btns" href="#"
                onclick="openEditModal(event, '<?= $song['songID']; ?>', '<?= $song['title']; ?>', '<?= $song['genre']; ?>' , '<?= $song['id']; ?>')">
              <img src="App/Public/image/edit.svg" alt="" class="edit-icon icons"></a>
              <!-- <?php echo var_dump($song); ?> -->
              
              <a class="delete-btn btns" href="#" 
                onclick="openConfirmModal(event, '<?= $song['songID']; ?>')"
              ><img src="App/Public/image/delete.svg" alt="" class="delete-icon icons"></a>
            </div>
          </div>
        <div class="divider" id="divider-<?= $song['songID']; ?>"></div>
        <?php } ?>
      </div>
      
        
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