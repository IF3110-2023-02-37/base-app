<?php 

class Profile extends Controller {
  public function index () {
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
      if ($_SESSION['role'] === 'user') { 
        $data = $this->model('UserModel')->getUser($_SESSION['username'])[0];
        $this->view('profile/index', $data);
      } else { 
        header('Location: /MusicControl');
      } 
    } else {
      header('Location: /login');
    }
  }

  public function editProfile() {
    header('Content-Type: application/json');
    if ($_POST['displayname'] === "") {
      http_response_code(400);
      echo json_encode(["message"=> "Invalid displayname."]);
    } else {
      $this->model('UserModel')->editUser($_POST);
    }
  }

  public function deleteUser () {
    $this->model('UserModel')->deleteUser($_POST);
    session_start();
    session_unset();
    session_destroy();
    header('Location: /login');

  }
}