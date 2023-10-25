<?php 

class Song extends Controller {
  public function add () {
    header('Content-Type: application/json');
    if ($_POST['add'] === '1') {
      $this->model('SongModel')-> addFavorite($_POST['username'], $_POST['id']);
      // $data = $_POST;
      // $this->view('test/index', $data);
    } else {
      $this->model('SongModel')-> removeFavorite($_POST['username'], $_POST['id']);
    }
    http_response_code(200);
  }
}