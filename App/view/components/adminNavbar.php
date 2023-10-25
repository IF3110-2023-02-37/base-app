<script defer> 
  function navbarToggle(e) {
    e.preventDefault();
    img = document.getElementById('navbar-icon');
    navbar =document.getElementById('navbar-admin');
    if (navbar.style.display === "block") {
      img.src = "http://localhost/App/Public/image/navbar.svg";
      navbar.style.display = "none";
    } else {
      img.src = "http://localhost/App/Public/image/close.svg";
      navbar.style.display = "block";
    }
  }
</script>
<a class="navbar-button" href="#" onclick="navbarToggle(event)" aria-label="toggle navbar">
  <img class="navbar-icon" id="navbar-icon" src="<?php getImg('navbar.svg') ?>" alt="">
</a>

<div class="navbar-admin" id="navbar-admin" style="display: none;">

  <div class="navbar-container" >

    <div class="item-navbar-container">
      <a class="item-navbar" href="/MusicControl" id="nav-music-control" aria-label="music control">Music Control</a>
      <a class="item-navbar" href="/ArtistControl" id="nav-artist-control" aria-label="artist control">Artist Control</a>
    </div>
    <a class="logout btn" href="/login/signout" aria-label="logout">Logout</a>

  </div>
</div>