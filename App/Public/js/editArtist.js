function closeEditModal(e) {
  e.preventDefault();
  document.getElementById('edit-modal').style.visibility = "hidden";
}

function openEditModal(e, id) {
  e.preventDefault();
  document.getElementById('info-edit').textContent = "";

  containerID = "container-" + id;
  console.log(containerID)
  const parentDiv = document.getElementById(containerID); 
  artistname = parentDiv.querySelector(".a-detail-artistname").textContent;
  console.log(artistname)
  description = parentDiv.querySelector(".a-detail-description").textContent;

  document.getElementById('edit-modal').style.visibility = "visible";
  document.getElementById('artistName').value = artistname;
  document.getElementById('description').value = description;
  document.getElementById('artist-id').textContent = id;
}

function save(e) {
  e.preventDefault();
  
  var confirmation = confirm("Do you want to change it?");
  
  if (!confirmation) {
    return;
  }

  info = document.getElementById('info-edit');
  artistName = document.getElementById('artistName').value;
  if (artistName === "") {
    info.textContent = "Artist name must not empty."
    return;
  }
  
  description = document.getElementById('description').value;
  console.log(description)
  artistID = document.getElementById('artist-id').textContent;
  
  //get the full path 
  imagePath = document.getElementById('artistImage').value;
  
  // trim into its file name
  image = imagePath.replace(/^.*[\\\/]/, ''); 
  console.log(image);
  
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/ArtistControl/editArtist');

  const data = new FormData();
  data.append('id', artistID);
  data.append('description', description);
  data.append('name', artistName);

  data.append('image', image);
  
  
  xhr.send(data);
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 ) {
      if (xhr.status === 200) {
        containerID = "container-" + artistID;
        console.log(containerID);
        const parentDiv = document.getElementById(containerID); 
        parentDiv.querySelector(".a-detail-artistname").textContent = artistName;
        parentDiv.querySelector(".a-detail-description").textContent = description;
        if (image !== "") {
          parentDiv.querySelector(".artist-cover").src = "http://localhost/App/Public/image/artist/" + image;
        }
        document.getElementById('edit-modal').style.visibility = "hidden";
      } else {
        info.textContent = "Artist name already exists."
      }
    }
  }
}