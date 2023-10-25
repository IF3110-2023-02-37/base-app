function browse (event) {
  event.preventDefault();
  var filterArtist = document.getElementById('search-filter-artist').value;
  var filterGenre = document.getElementById('search-filter-genre').value;
  var sort = document.getElementById('search-sort').value;
  var searchBar = document.getElementById('search-bar').value;
  console.log ("test" + searchBar)
  var search = document.getElementById('search');
  
  console.log(filterArtist);
  console.log(filterGenre);
  console.log(sort);

  var searchforadmin = (document.title === "Admin Page") ? true : false;
  console.log(document.title);
  console.log(searchforadmin);
  var url = searchforadmin ? "http://localhost/MusicControl?page=1" : "http://localhost/home?page=1";

  if (filterArtist !== "") {
    url =  url + "&artist=" + filterArtist;
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
  console.log(url)
  window.location.href = url;
  // search.href = url;
}