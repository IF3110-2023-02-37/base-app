<?php 

class Home extends Controller {
  public function index () {
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
      if ($_SESSION['role'] === 'user') { 
        $data['displayName'] = $this->model('UserModel') ->getUser($_SESSION['username'])[0]['displayName'];
        $data['profilePicture'] =  $this->model('UserModel') -> getUser($_SESSION['username'])[0]['profilePicture'];
        $data['song'] = $this->model('SongModel')-> browseAllSongs()[0];
        $data['totalPage'] = $this->model('SongModel')-> browseAllSongs()[1];
        $data['IDlikedSong'] = $this->model('SongModel')->getIDLikedSongs();
        $data['artists'] = $this->model('ArtistModel')->browseAllArtists();
        $data['genres'] = $this->model('SongModel')->getAllGenres();
        $data['allArtists'] = $this->model('ArtistModel') -> getAllArtists();

        if (count($data['song']) < 1) {
          $_SESSION['empty'] = true;
        }
        
        $this->view('home/index', $data);
      } else { 
        header('Location: /MusicControl');
      } 
    } else {
      header('Location: /login');
    }
  }

  public function browse($param) {
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {

      if ($_SESSION['role'] === 'user') { 
        $data['displayName'] = $this->model('UserModel')->getDisplayName($_SESSION['username'])[0]['displayName'];
        $data['song'] = $this->model('SongModel')-> browseSongs($param);
        $data['IDlikedSong'] = $this->model('SongModel')->getIDLikedSongs();
        $data['artists'] = $this->model('ArtistModel')->getAllArtists();
        $data['genres'] = $this->model('SongModel')->getAllGenres();
        
        $this->view('home/index', $data);
      } else { 
        header('Location: /MusicControl');
      } 
      
      
    } else {
      header('Location: /login');
    }
    // $this->view('test/index', $data);
  }

  public function addLibrary ($songID) {
    $this->model('SongModel')->addLikedSong($songID);
  }
}