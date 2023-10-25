<script defer>
  function toggleNavbar(event) {
    event.preventDefault();
    nav =document.getElementById('navbar-expand');
    console.log("test");
    console.log(nav.style.display)
    if (nav.style.display === "none") {
      nav.style.display = "block";
    } else {
      nav.style.display = "none";
    }
  }
</script>

<div class="navbar">
  <div class="navbar-container">
    <div class="navbar-wrapper">
      <a href="/home" class="nav-home nav-item" aria-label="home page">Home</a>
      <a href="/library" class="nav-library nav-item" aria-label="library page">Library</a>
      <a href="/login/signout" class="nav-logout nav-item" aria-label="logout">Logout</a>
      <a href="/profile" class="nav-profile nav-item" aria-label="profile page"> <img src="<?php getProfile($data['profilePicture']) ?>" class="profile-img" id="profile-img-1" alt=""></a>
    </div>
  </div>
</div>

<div class="m-navbar">
  <div class="m-navbar-container">
    <div class="m-navbar-wrapper">
      <a href="#" class="nav-item" aria-label="Toggle navbar"> <img src="<?php getImg('navbar.svg') ?>" onclick="toggleNavbar(event)" alt=""></a>
      <a href="/profile" class="nav-profile nav-item" aria-label="Go to profile page"> <img src="<?php getProfile($data['profilePicture']) ?>" class="profile-img" id="profile-img-2" alt=""></a>
    </div>
    <div class="navbar-expand" id="navbar-expand" style="display: none;">
      <a href="/home" class="nav-home m-nav-item" aria-label="home page">Home</a>
      <a href="/library" class="nav-library m-nav-item" aria-label="library page">Library</a>
      <a href="/login/signout" class="nav-logout m-nav-item" aria-label="logout">Logout</a>
    </div>

  </div>
  

</div>
