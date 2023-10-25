<?php 

class Artist extends Controller {
  public function index () {
    
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {

      if ($_SESSION['role'] === 'user' && isset($_GET['name'])) { 
        $artist = $_GET['name'];
        $data['songs'] = $this->model('SongModel')->getArtistSongs($artist);
        $data['artist'] = $this->model('ArtistModel') -> getDetailArtist($artist);
        $data['IDlikedSong'] = $this->model('SongModel')->getIDLikedSongs();
        $data['profilePicture'] =  $this->model('UserModel') -> getUser($_SESSION['username'])[0]['profilePicture'];
        // $data['description'] = $this->model('ArtistModel')->getDescription($artist)['description'];
        $this->view('artist/index', $data);
      } else { 
        header('Location: /MusicControl');
      } 
    } else {
      header('Location: /login');
    }
  }

  
}