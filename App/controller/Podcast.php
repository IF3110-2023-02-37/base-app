<?php 

class Podcast extends Controller {
    public function index () {
        session_start();
        $data['profilePicture'] =  $this->model('UserModel') -> getUser($_SESSION['username'])[0]['profilePicture'];
        $this->view('podcast/index', $data);
    }

    public function list () {
      session_start();
      $data['profilePicture'] =  $this->model('UserModel') -> getUser($_SESSION['username'])[0]['profilePicture'];
      $this->view('podcast/list', $data);
    }
    
}