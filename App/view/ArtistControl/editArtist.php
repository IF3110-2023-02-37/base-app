<div class="edit-modal" id="edit-modal" style="visibility: hidden;">
  <form action="" class="edit-modal-container">
    <div class="edit-item">
      <div class="artistname-container">
        <label for="artistName" >Artist Name</label>
        <p>id: <span id="artist-id"></span></p>
      </div>
      <input type="text" id="artistName" required>
    </div>
    <div class="edit-item">
      <label for="description">Description</label>
      <textarea class="description" name="" id="description" cols="30" rows="10" required></textarea>
    </div>
    <div class="edit-item">
      <label for="artistImage">Artist Image</label>
      <p class="alert">Make sure the image is in the folder Public/image/artist/</p>
      <input type="file" id="artistImage">
    </div>

    <div class="buttons-wrapper">
`       <a href="#" class="btns-edit cancel-btn btn" onclick="closeEditModal(event)">Cancel</a>
      <button class="btns-edit save-btn btn" type="submit"onclick="save(event)">Save</button>
    </div>

    <div class="info-container">
      <p class="info" id="info-edit"></p>
    </div>
  </form>
</div>