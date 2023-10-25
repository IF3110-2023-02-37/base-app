function browse (event) {
  event.preventDefault();
  var filterArtist = document.getElementById('filter-artist').value;
  var filterGenre = document.getElementById('filter-genre').value;
  var sort = document.getElementById('sort').value;
  var searchBar = document.getElementById('search-bar').value;
  var search = document.getElementById('search');
  
  console.log(filterArtist);
  console.log(filterGenre);
  console.log(sort);

  var url = "http://localhost/MusicControl?page=1"

  if (filterArtist !== "") {
    url = url + "&artist=" + filterArtist;
  }

  if (filterGenre !== "") {
    url = url + "&genre=" + filterGenre;
  }

  if (sort !== "") {
    url = url + "&sort=" + sort;
  }

  if (searchBar !== "") {
    url = url + "&search=" + searchBar;
  }
  window.location.href = url;
  // search.href = url;
}