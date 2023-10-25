function closeEditModal(e) {
    e.preventDefault();
    document.getElementById('edit-modal').style.visibility = "hidden";
  }
  
  function openEditModal(e, id, title, genre, artistID) {
    e.preventDefault();
    document.getElementById('edit-modal').style.visibility = "visible";
    document.getElementById('song-id').textContent = id;
    document.getElementById('title').value = title;
    document.getElementById('filter-genre').value = genre;
    document.getElementById('filter-artist').value = artistID;
    console.log(id)
    console.log(title)
    console.log(genre)
    console.log(artistID)
  }
  
  function save(e) {
    e.preventDefault();
    var confirmation = confirm("Do you want to change it?");
    
    if (!confirmation) {
      return;
    } 
    title = document.getElementById('title').value;
    songID = document.getElementById('song-id').textContent;
    genre = document.getElementById('filter-genre').value;
    console.log(genre)
    
    //get the full path 
    imagePath = document.getElementById('coverImage').value;
    audioPath = document.getElementById('audio').value;
    
    // trim into its file name
    coverImage = imagePath.replace(/^.*[\\\/]/, ''); 
    audio = audioPath.replace(/^.*[\\\/]/, ''); 
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/MusicControl/editMusic');
  
    const data = new FormData();
    data.append('id', songID);
    data.append('title', title);  
    data.append('genre', genre);
    data.append('coverImage', coverImage);
    data.append('audio', audio);
    
    
    xhr.send(data);
    xhr.onreadystatechange = () => {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
        // const response = JSON.parse(xhr.responseText);
        // closeEditModal(e);
        document.getElementById('edit-modal').style.visibility = "hidden";
      }
    }
    
    containerID = "container-" + songID;
    const parentDiv = document.getElementById(containerID); 
    if (coverImage !== "") {
      parentDiv.querySelector(".song-cover").src ="http://localhost/image/cover/" + coverImage;
    }
    parentDiv.querySelector(".detail-title").textContent = title;

    const dropdown = document.getElementById("filter-artist");
    const selectedOption = dropdown.options[dropdown.selectedIndex];
    const artist = selectedOption.textContent;
    parentDiv.querySelector(".detail-name").textContent = artist;
    console.log(artist)


  }