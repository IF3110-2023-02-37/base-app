function editProfile(event, username) {
  event.preventDefault();
  displayName = document.getElementById('display-name').value;
  bio = document.getElementById('bio').value;

  //get the full path 
  imagePath = document.getElementById('upload-image').value;
  
  // // trim into its file name
  image = imagePath.replace(/^.*[\\\/]/, ''); 
  
  console.log(image)
  console.log(displayName)
  console.log(bio)
  console.log(username)

  var confirmation = confirm("Do you want to change your profile?");
    
  if (!confirmation) {
    return;
  } 

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/Profile/editProfile');

  const data = new FormData();
  data.append('username', username);
  data.append('image', image);
  data.append('displayname', displayName);
  data.append('bio', bio);
  
  
  xhr.send(data);
  
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4) {
      const response = JSON.parse(xhr.responseText);
      $msg = document.getElementById('message');
      $msg.textContent = response['message'];

      if (xhr.status === 200) {

        $msg.style.color = "white";
        if (image) {
          document.getElementById('profile-img-1').src = "http://localhost/App/Public/image/profile/" + image; 
          document.getElementById('profile-img-2').src = "http://localhost/App/Public/image/profile/" + image; 
        }
      } else {
        $msg.style.color = "#DB0000";
      }
    }
  }

}
var fileInput = document.getElementById('upload-image');

fileInput.addEventListener('change', function() {
  if (fileInput.files && fileInput.files[0]) {
    var frame = document.getElementById('frame');
    const filename = fileInput.files[0].name;
    // Set the src attribute of the image to your custom URL with the filename
    var src = "http://localhost/App/Public/image/profile/" + filename ;
    frame.style.backgroundImage = "url(" + src + ")";
  }
});