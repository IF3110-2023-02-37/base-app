<div class="search-container">
    <input class="search-bar" type="text" placeholder="Search Songs" id="search-bar">
    <a class="search-btn btn" id="search" href="#" onclick="browse(event)"><img src="<?php getImg('search.svg'); ?>" alt=""></a>
  </div>
  
  <div class="filter-sort-container">
    <!-- buat options filternya nanti query dari db -->
    <select class="filter-dropdown dropdown" id="search-filter-genre" type="dropdown"> 
      <option class="option" value=""  selected>Genre</option>

      <?php foreach($data['genres'] as $genre) { ?>
        <option class="option" value="<?= $genre['genre']; ?>"
          <?php if (isset($_GET['genre']) && ($_GET['genre']) === $genre['genre']) { echo "selected"; }?>
          >
          <?= $genre['genre']; ?>
        </option>
      <?php } ?>
    </select>
    
    <select class="filter-dropdown dropdown" type="dropdown" id="search-filter-artist"> 
      <option class="option" value=""  selected>Artist</option>

      <?php foreach ($data['allArtists'] as $artist) { ?>
        <option class="option" value="<?= $artist['id']; ?>" 
          <?php if (isset($_GET['artist']) && ($_GET['artist']) === $artist['id']) { echo "selected"; }?>
        ><?= $artist['name']; ?>
        </option>

      <?php } ?>
    </select>

    <select class="sort-dropdown dropdown" id="search-sort" type="dropdown">
      <option class="option" value=""  selected>Sort</option>
      <option class="option" value="title_asc" 
        <?php if (isset($_GET['sort']) && ($_GET['sort']) === "title_asc") { echo "selected"; }?>
      >Title asc</option>
      <option class="option" value="title_desc"
        <?php if (isset($_GET['sort']) && ($_GET['sort']) === "title_desc") { echo "selected"; }?>
      >Title desc</option>
      <option class="option" value="artist_asc"
        <?php if (isset($_GET['sort']) && ($_GET['sort']) === "artist_asc") { echo "selected"; }?>
      >Artist asc</option>
      <option class="option" value="artist_desc"
        <?php if (isset($_GET['sort']) && ($_GET['sort']) === "artist_desc") { echo "selected"; }?>
      >Artist desc</option>
    </select>
</div>