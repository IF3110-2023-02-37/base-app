<div class="edit-modal" id="edit-modal" style="visibility: hidden;">
  <form action="" class="edit-modal-container">
    <div class="edit-item">
      <div class="title-container">
        <label for="title" >Title</label>
        <p>id: <span id="song-id"></span></p>
      </div>
      <input type="text" id="title" required name="title">
    </div>

    <div class="add-item">
      <select class="filter-dropdown dropdown" id="filter-genre" type="dropdown" name="genre"> 
        <option class="option" value="" disabled selected>Genre</option>

        <?php foreach($data['genres'] as $genre) { ?>
          <option class="option" value="<?= $genre['genre']; ?>"><?= $genre['genre']; ?></option>
        <?php } ?>
      </select>
      <!-- <input type="text" id="title" required> -->
    </div>

    <div class="add-item">
      <select class="filter-dropdown dropdown" type="dropdown" id="filter-artist" name="id"> 
        <option class="option" value="" disabled selected>Artist</option>
        <?php foreach ($data['artists'] as $artist) { ?>
          <option class="option" value="<?= $artist['id']; ?>" ><?= $artist['name']; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="add-item">Cover</label>
      <p class="alert">Make sure the image is in the folder Public/image/cover/</p>
      <input type="file" id="coverImage" name="coverImage">
    </div>

    <div class="edit-item">Music</label>
      <p class="alert">Make sure the audio is in the folder Public/audio/</p>
      <input type="file" id="audio" name="audio">
    </div>

    <div class="buttons-wrapper">
      <a href="#" class="btns-edit cancel-btn" onclick="closeEditModal(event)">Cancel</a>
      <button class="btns-edit save-btn" type="submit"onclick="save(event)">Save</button>
    </div>

    <div class="info-container">
      <p class="info" id="info"></p>
    </div>
  </form>
</div>