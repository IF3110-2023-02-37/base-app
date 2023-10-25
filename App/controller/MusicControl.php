<?php 

class MusicControl extends Controller {
  public function index () {
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
      if ($_SESSION['role'] === 'admin'){
        $data['artists'] = $this->model('ArtistModel')->getAllArtists();
        $data['genres'] = $this->model('SongModel')->getAllGenres();
        $data['song'] = $this->model('SongModel')->browseAllSongs()[0];
        $data['totalPage'] = $this->model('SongModel')->browseAllSongs()[1];
        $data['allArtists'] = $this->model('ArtistModel') -> getAllArtists();

        if (count($data['song']) === 0) {
          $_SESSION['empty'] = true;
        }
        $this->view('MusicControl/index', $data);
      } else if ($_SESSION['role'] === 'user'){ 
        header('Location: /login');
      } 
    } else {
      header('Location: /login');
    }
  }

  public function editMusic() {  
    header('Content-Type: application/json');
    http_response_code(200);
    $this->model('SongModel') ->editMusic($_POST);
  }
  
  public function addMusic() {
    header('Content-Type: application/json');
    $this->model('SongModel')->createMusic($_POST);
  }
  public function deleteMusic()  {
    $this->model('SongModel') -> deleteMusic($_POST);
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode(["deleted"=> $_POST['songID']]);
  }

  public function browse($param) {
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['admin'])) {

      if ($_SESSION['role'] === 'admin') { 
        $data['displayName'] = $this->model('UserModel')->getDisplayName($_SESSION['username'])[0]['displayName'];
        $data['song'] = $this->model('SongModel')-> browseSongs($param);
        $data['IDlikedSong'] = $this->model('SongModel')->getIDLikedSongs();
        $data['artists'] = $this->model('ArtistModel')->getAllArtists();
        $data['genres'] = $this->model('SongModel')->getAllGenres();
        
        $this->view('MusicControl/index', $data);
      } else { 
        header('Location: /home');
      } 
      
      
    } else {
      header('Location: /login');
    }
    // $this->view('test/index', $data);
  }
}
