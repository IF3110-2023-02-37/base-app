<?php 

class Library extends Controller {
  public function index () {
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
      if ($_SESSION['role'] === 'user'){
        $data['song'] = $this->model('SongModel')->getLikedSongs()[0];
        $data['totalPage'] = $this->model('SongModel')-> getLikedSongs()[1];
        $data['IDlikedSong'] = $this->model('SongModel')->getIDLikedSongs();
        $data['profilePicture'] =  $this->model('UserModel') -> getUser($_SESSION['username'])[0]['profilePicture'];
        if (count($data['song']) < 1) {
          $_SESSION['emptyLibrary'] = true;
        }
        $this->view('library/index', $data);
      } else if ($_SESSION['role'] === 'admin'){ 
        header('Location: /index');
      } 
    } else {
      $this->view('login/index');
    }
  }
}