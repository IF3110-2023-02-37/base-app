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
    getCss('ArtistControl.css');
    getCss('adminNavbar.css');
    getCss('editArtist.css');
    getCss('addArtist.css');
    getCss('confirmModal.css');
    getScript('editArtist.js');
    getScript('addArtist.js');
    getScript('confirm.js');
  ?>
</head>
<body>
  <?php 
    include("App/view/ArtistControl/editArtist.php"); 
    include("App/view/ArtistControl/addArtist.php"); 
    include("App/view/components/confirmModal.php");
  ?>
  <div class="container">
    
    <?php 
      include("App/view/components/adminNavbar.php");
    ?>

    <div class="main-container">
      <div class="a-artists-container" id="artists-container">
        <div class="add-artist-container">
          <a href="" class="add-artist" onclick="openAddModal(event)">
            <p class="add-text">Add Artist</p>  
            <img src="<?php getImg('add.svg'); ?>" class="add-btn" alt="">
          </a>
        </div>

        <div class="artists-wrapper" id ="artists-wrapper">
          <?php foreach ($data['artists'] as $artist) {?>
            <div class="artist-container" id="container-<?= $artist['id']; ?>">
              <div class="a-details-container">
                <img src="<?php getArtistImg($artist['artistImage']); ?>" class="artist-cover" alt="" >
                <div class="a-detail-wrapper">
                  <p class="a-detail-artistname"><?= $artist['name']; ?></p>
                  <p class="a-detail-description a-detial" style=""><?= $artist['description']; ?></p>
                </div>
              </div>
              <div class="a-buttons-container">
                <a class="a-edit-btn a-btns" href="#" 
                
                  onclick="openEditModal(event, '<?= $artist['id']; ?>')">
                <img class="a-icons" src="App/Public/image/edit.svg" alt=""></a>
                <a class="a-delete-btn a-btns" href="#" 
                  onclick="openConfirmModal(event, '<?= $artist['id']; ?>')"
                ><img class="a-icons" src="App/Public/image/delete.svg" alt=""></a>
              </div>

            </div>
            <div class="divider" id="divider-<?= $artist['id']; ?>"></div>
          <?php } ?>
        </div>


        <div class="pagination">
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
              href="?page=<?= $i; ?>" 
              id="<?= $i; ?>"
              aria-label="Go to another page"
            >
              <?= $i; ?>
            </a>
          <?php } ?>
        </div>
      </div>


      

    </div>

    
  </div>
</body>
</html>