function remove(event, username, songID) {
  event.preventDefault();

  const playingSongID = document.getElementById('playing-title').getAttribute('data-id');
  if (songID === playingSongID) {
    const likeIcon = document.getElementById('like-icon');
    if (likeIcon.src.endsWith('App/Public/image/favorite.svg')) {
      likeIcon.src = 'App/Public/image/unfavorite.svg';
    }
  }

  const hideSongs = document.querySelectorAll('.hide-container' + songID);
  hideSongs.forEach((h) => {
    h.style.display = 'none';
  });


  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'song/add');

  const data = new FormData();
  data.append('username', username);
  data.append('id', songID);
  data.append('add', '0');


  xhr.send(data);
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      // const response = JSON.parse(xhr.responseText);
    }
  }

}