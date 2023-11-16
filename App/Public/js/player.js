let currentSong = "";
function playSong(event, songPath, title, name, cover,  liked, songID) {
  event.preventDefault();
  const playerContainer = document.getElementById('player-container');
  if (playerContainer.style.visibility === "hidden") {
    playerContainer.style.visibility = "visible";
  } 
  
  const address = "http://localhost/App/Public/";
  const audioPlayer = document.getElementById('audioPlayer');
  const audioSource = document.getElementById('audioSource');
  const likeIcon = document.getElementById('like-icon');

  let playingArtist = document.getElementById('playing-artist');
  let artistName = name.split(" ").join("+");
  console.log(artistName);
  playingArtist.href= encodeURI("/artist?name=" + name).replace(/%20/g, "+");;
  

  const playingTitleElement = document.getElementById('playing-title');
  playingTitleElement.setAttribute('data-id', songID);
  console.log(songID);
  document.getElementById('playing-title').textContent  = title;
  document.getElementById('playing-artist').textContent  = name;
  document.getElementById('playing-image').src  = address + "image/cover/" +  cover;
  if (liked === '1') {
    likeIcon.src = address + 'image/favorite.svg';
  } else {
    likeIcon.src = address + 'image/unfavorite.svg';
  }
  songPath = address + "audio/" + songPath;
  if (currentSong !== songPath) {
    audioSource.src = songPath;
    audioPlayer.load();
    audioPlayer.play();
    currentSong = songPath;
  } else {
    // If the same song is clicked again, pause it
    if (audioPlayer.paused) {
      audioPlayer.play();
    } else {
      audioPlayer.pause();
    }
  }
}

function likeSong(event, username) {
  event.preventDefault();
  const likeIcon = document.getElementById('like-icon');
  let add = '1';
  if (likeIcon.src.endsWith('http://localhost/App/Public/image/favorite.svg')) {
    likeIcon.src = 'http://localhost/App/Public/image/unfavorite.svg';
    add = '0';
  } else {
    likeIcon.src = 'http://localhost/App/Public/image/favorite.svg';
  }


  // Retrieve the value of the data-id attribute
  const songID = document.getElementById('playing-title').getAttribute('data-id');

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/song/add');

  const data = new FormData();
  data.append('username', username);
  data.append('id', songID);
  data.append('add', add);


  xhr.send(data);
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      // const response = JSON.parse(xhr.responseText);
    }
  }
}

function playPodcast(event, songPath, title, name, cover,  liked, songID) {
  event.preventDefault();
  const playerContainer = document.getElementById('player-container');
  if (playerContainer.style.visibility === "hidden") {
    playerContainer.style.visibility = "visible";
  } 
  
  const address = "http://localhost:3000/";
  const audioPlayer = document.getElementById('audioPlayer');
  const audioSource = document.getElementById('audioSource');
  const likeIcon = document.getElementById('like-icon');

  let playingArtist = document.getElementById('playing-artist');
  let artistName = name.split(" ").join("+");
  console.log(artistName);
  playingArtist.href= "#";
  likeIcon.style.display = "none";
  

  const playingTitleElement = document.getElementById('playing-title');
  playingTitleElement.setAttribute('data-id', songID);
  console.log(songID);
  document.getElementById('playing-title').textContent  = title;
  document.getElementById('playing-artist').textContent  = name;
  document.getElementById('playing-image').src  = address + "cover/" +  cover;
  
  songPath = address + "audio/" + songPath;
  if (currentSong !== songPath) {
    audioSource.src = songPath;
    audioPlayer.load();
    audioPlayer.play();
    currentSong = songPath;
  } else {
    // If the same song is clicked again, pause it
    if (audioPlayer.paused) {
      audioPlayer.play();
    } else {
      audioPlayer.pause();
    }
  }
}

