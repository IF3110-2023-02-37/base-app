function closeAddModal(e) {
    e.preventDefault();
    document.getElementById('add-modal').style.visibility = "hidden";
  }
  
function openAddModal(e) {
  e.preventDefault();
  document.getElementById('add-modal').style.visibility = "visible";
  document.getElementById('m-info').textContent = "";
}

function addMusic(e) {
  e.preventDefault();
  
  title = document.getElementById('m-title').value;
  genre = document.getElementById('m-filter-genre').value;
  artist = document.getElementById('m-filter-artist').value;
  console.log(genre)
  console.log(title)
  console.log(artist)
  
  //get the full path 
  imagePath = document.getElementById('m-coverImage').value;
  audioPath = document.getElementById('m-audio').value;
  
  // trim into its file name
  coverImage = imagePath.replace(/^.*[\\\/]/, ''); 
  audio = audioPath.replace(/^.*[\\\/]/, ''); 
  console.log(coverImage)
  console.log(audio)
  
  if (title !== "" && genre !== "" && coverImage !== "" && audio !== "" && artist !== "") {
    var confirmation = confirm("Do you want to add the new song?");
    
    if (confirmation) {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'http://localhost/MusicControl/addMusic');
    
      const data = new FormData();
      data.append('title', title);
      data.append('genre', genre);
      data.append('coverImage', coverImage);
      data.append('audio', audio);
      data.append('artist', artist);

      console.log(data)
      xhr.send(data);
      // closeAddModal(e);
      xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 400){
            var response = JSON.parse(xhr.responseText);
            document.getElementById('m-info').textContent = response['message'];
          } else if (xhr.status === 200){
            var response = JSON.parse(xhr.responseText);
            addNewSong(response);
            document.getElementById('add-modal').style.visibility = "hidden";

            document.getElementById('m-title').value = "";
            document.getElementById('m-filter-genre').value = "";
            document.getElementById('m-filter-artist').value = "";
            document.getElementById('m-coverImage').value = "";
            document.getElementById('m-audio').value = "";
    
            
          }
        }
      }
    }
  } else {
    document.getElementById('m-info').textContent = "Please fill the entire fields."
    console.log("gagal");
  }
}

function addNewSong(data) {
  title = data['title'];
  console.log(data)
  console.log(title)
  const songContainer = document.createElement("div");
  songContainer.className = "song-container";
  songContainer.id = "container-" + data['songID'];
  songContainer.innerHTML = `
      <div class="details-container">
        <img src="http://localhost/App/Public/image/cover/${data['coverImage']}" class="song-cover" alt="" >
        <div class="detail-wrapper">   
          <p class="detail-title">${data['title']}</p>
          <p href="" class="detail-name">${data['name']}</p>
        </div>
      </div>
      <div class="buttons-container">
          <a class="edit-btn btns" href="#"
            onclick="openEditModal(event, ${data['songID']}, '${data['title']}', '${data['genre']}' , '${data['artistID']}')">
          <img src="App/Public/image/edit.svg" alt="" class="edit-icon icons"></a>
          
          <a class="delete-btn btns" href="#" 
            onclick="openConfirmModal(event, ${data['songID']})"
          ><img src="App/Public/image/delete.svg" alt="" class="delete-icon icons"></a>
        </div>
      </div>
  `;

  const songsContainer = document.getElementById("songs-wrapper");

  if (songsContainer.children.length > 8) {
    // Remove the last child 
    songsContainer.removeChild(songsContainer.lastChild);
    // Remove the last divider
    songsContainer.removeChild(songsContainer.lastChild);
  }
  
  // Add a divider
  const divider = document.createElement("div");
  divider.className = "divider";
  divider.id = "divider-" + data['songID'];
  songsContainer.insertBefore(divider, songsContainer.firstChild);
  // Add the new song as the first child
  songsContainer.insertBefore(songContainer, songsContainer.firstChild);


}