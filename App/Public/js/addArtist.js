function closeAddModal(e) {
  e.preventDefault();
  document.getElementById('add-modal').style.visibility = "hidden";
}

function openAddModal(e) {
  e.preventDefault();
  document.getElementById('info-add').textContent = "";
  document.getElementById('add-modal').style.visibility = "visible";
  // document.getElementById('artistName').value = name;
  // document.getElementById('description').value = description;
  // document.getElementById('artist-id').textContent = id;
}

function addArtist(e) {
  e.preventDefault();
  // closeAddModal(e);
  var confirmation = confirm("Do you want to add this artist?");
  
  if (!confirmation) {
    return;
  } 
  artistName = document.getElementById('add-artistName').value;
  description = document.getElementById('add-description').value;
  console.log(description)
  
  //get the full path 
  imagePath = document.getElementById('add-artistImage').value;
  image = imagePath.replace(/^.*[\\\/]/, ''); 
  image = (image === "") ? "dummyProfile.jpg" : image;

  if (artistName === "") {
    document.getElementById('info-add').textContent = "Artist name must not empty.";
    return;
  }

  if (description === "") {
    description = "This artist has no description yet."
  }
  
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/ArtistControl/addArtist');

  const data = new FormData();
  data.append('description', description);
  data.append('name', artistName);
  data.append('image', image);
  
  
  xhr.send(data);

  xhr.onreadystatechange = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200){
        var response = JSON.parse(xhr.responseText);
        addNewArtist(response);
        console.log("success!");
        document.getElementById('add-modal').style.visibility = "hidden";

        document.getElementById('add-artistName').value = "";
        document.getElementById('add-artistImage').value = "";
        document.getElementById('add-description').value = "";
      } else {
        document.getElementById('info-add').textContent = "Artist name already exists."
      }
    }
  }
}

function addNewArtist (data) {
  console.log(data);

  const container = document.createElement("div");
  container.className = "artist-container";
  container.id = "container-" + data['artistID'];
  console.log(data['artistImage']);
  image = "http://localhost/App/Public/image/artist/" + data['artistImage'];
  // $data['artistImage'] = ($data['artistImage'] === "") ? "dummyProfile.jpg" : $data['artistImage'];
  container.innerHTML = `
    <div class="a-details-container">
      <img src="${image}" class="artist-cover" alt="" >
      <div class="a-detail-wrapper">
        <p class="a-detail-artistname">${data['name']}</p>
        <p class="a-detail-description a-detial" style="">${data['description']}</p>
      </div>
    </div>
    <div class="a-buttons-container">
      <a class="a-edit-btn a-btns" href="#" 
      
        onclick="openEditModal(event, ${data['artistID']})">
      <img class="a-icons" src="App/Public/image/edit.svg" alt=""></a>
      <a class="a-delete-btn a-btns" href="#" 
        onclick="openConfirmModal(event, ${data['artistID']})"
      ><img class="a-icons" src="App/Public/image/delete.svg" alt=""></a>
    </div>
  `;

  // Append the new artist

  // add a divider
  const artistContainer = document.getElementById("artists-wrapper");

  if (artistContainer.children.length > 8) {
    // Remove the last child 
    artistContainer.removeChild(artistContainer.lastChild);
    // Remove the last divider
    artistContainer.removeChild(artistContainer.lastChild);
  }
  
  // Add a divider
  const divider = document.createElement("div");
  divider.className = "divider";
  divider.id = "divider-" + data['artistID'];
  artistContainer.insertBefore(divider, artistContainer.firstChild);
  // Add the new song as the first child
  artistContainer.insertBefore(container, artistContainer.firstChild);

}