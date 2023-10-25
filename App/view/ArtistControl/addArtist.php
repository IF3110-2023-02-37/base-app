<div class="add-modal" id="add-modal" style="visibility: hidden;">
  <form class="add-modal-container">
    <div class="add-item">
      <div class="artistname-container">
        <label for="artistName" >Artist Name</label>
      </div>
      <input type="text" id="add-artistName" name="name" required>
    </div>
    <div class="add-item">
      <label for="description">Description</label>
      <textarea class="description" name="description" id="add-description" cols="30" rows="10" required></textarea>
    </div>
    <div class="add-item">
      <label for="artistImage">Artist Image</label>
      <p class="alert">Make sure the image is in the folder Public/image/artist/</p>
      <input type="file" id="add-artistImage" name="artistImage" required>
    </div>

    <div class="buttons-wrapper">
      <a href="#" class="btns-add cancel-btn" onclick="closeAddModal(event)">Cancel</a>
      <button class="btns-add save-btn btn" type="submit" onclick="addArtist(event)">Save</button>
    </div>

    <div class="info-container">
      <p class="info" id="info-add"></p>
    </div>
  </form>
</div>