function openConfirmModal(event, id) {
  event.preventDefault();
  document.getElementById('confirm-modal').style.visibility= "visible";
  const confirmButton = document.getElementById('m-delete-btn');

  function confirmButtonClickHandler() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/ArtistControl/deleteArtist');

    const data = new FormData();
    data.append('artistID', id);
    console.log(id);

    xhr.send(data);

    xhr.onreadystatechange = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Request was successful, and you can access the response data
          var response = JSON.parse(xhr.responseText);
          console.log(response)
          console.log(response['deleted']);
          removeContainer(response['deleted']);
          document.getElementById('confirm-modal').style.visibility= "hidden";

        } else {
          // Request encountered an error
          console.error('Request failed with status code:', xhr.status);
        }
      }
    }
  }

  // Attach the click event listener to the confirmButton
  confirmButton.addEventListener('click', confirmButtonClickHandler);
}

function closeConfirmModal(event) {
  event.preventDefault();
  document.getElementById('confirm-modal').style.visibility= "hidden";
}

function removeContainer (id) {
  console.log(id);
  let container = "container-" + id;
  let divider = "divider-" + id; 
  console.log(container);
  document.getElementById(container).style.display = "none";
  document.getElementById(divider).style.display = "none";
}