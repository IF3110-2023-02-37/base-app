
<div class="player-container" id="player-container" style="visibility: hidden;">
<!-- <div class="player-container" id="player-container" > -->
  <div class="player-wrapper-container">
    <div class="player-wrapper">
      <div class="playing-song-container">
        <img class="playing-image" id="playing-image" src="<?php getCover('supershy.png') ?>" alt="">
        <div class="playing-detail">
          <div class="playing-title"><p id="playing-title" data-id="1">Super Shy</p></div>
          <a href="#" class="playing-artist" id="playing-artist">New Jeans</a>
          
        </div>
      </div>

      <div class="player-bar-like-container">
        
        <div class="player-bar-container">
          <audio id="audioPlayer" controls class="audio-player">
            <source id="audioSource" src="App/Public/audio/supershy-newjeans.mp3" type="audio/mpeg">>
          </audio>
        </div>
        
        <a clas="like-btn" href="#" onclick="likeSong(event, '<?= $_SESSION['username']; ?>')" data-songID="1" id="like-btn"><img class="like-icon" id="like-icon" src="<?php getImg('unfavorite.svg'); ?>" alt=""></a>
      </div>
    </div>
  </div>

</div>