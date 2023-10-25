 <div class="add-modal" id="add-modal" style="visibility: hidden;">
  <form action="MusicControl/addMusic" class="add-modal-container" method="post">
    <div class="add-item">
      <div class="title-container">
        <label for="title" >Title</label>
      </div>
      <input type="text" id="m-title" name="title" required>
    </div>

    <div class="m-dropdown-wrapper">
      <div class="m-dropdown-item">
        <select class="filter-dropdown m-dropdown" id="m-filter-genre" type="dropdown" name="genre" required> 
          <option class="option" value="" disabled selected>Genre</option>
          
          <?php foreach($data['genres'] as $genre) { ?>
          <option class="option" value="<?= $genre['genre']; ?>"><?= $genre['genre']; ?></option>
          <?php } ?>
        </select>
      </div>
        
      <div class="m-dropdown-item">
        <select class="filter-dropdown m-dropdown" type="dropdown" id="m-filter-artist" name="id" required> 
          <option class="option" value="" disabled selected>Artist</option>
          <?php foreach ($data['allArtists'] as $artist) { ?>
            <option class="option" value="<?= $artist['id']; ?>" ><?= $artist['name']; ?></option>
            <?php } ?>
          </select>
      </div>
    </div>
      
    <div class="add-item">Cover</label>
      <p class="alert">Make sure the image is in the folder Public/image/cover/</p>
      <input type="file" id="m-coverImage" name="coverImage" required>
    </div>

    <div class="add-item">Music</label>
      <p class="alert">Make sure the audio is in the folder Public/audio/</p>
      <input type="file" id="m-audio" name="audio" required>
    </div>

    <div class="buttons-wrapper">
      <a href="#" class="btns-add cancel-btn" onclick="closeAddModal(event)">Cancel</a>
      <button class="btns-add save-btn btn" type="submit" onclick="addMusic(event)">Save</button>
    </div>

    <div class="info-container">
      <p class="info" id="m-info"></p>
    </div>
  </form>
</div>