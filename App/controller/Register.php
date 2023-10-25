<?php 

class Register extends Controller {
  public function index () {
    session_start();
    if (isset($_SESSION['username'])) {
      if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] === 'admin') {
          header('Location: /MusicControl');
        } else {
          header('Location: /home');
        }
      }
    } else if (isset($_SESSION['success'])) {
      $this->view('login/index');
    } else {
      $this->view('register/index');
    }
  }

  public function addAccount () {
    session_start();
    $result = $this->model('UserModel')-> createUser($_POST);
    
    if ( $result === 0) {
      header('Location: /Register');
    }  else  {

      $_SESSION['success'] = "Your account has been registered. Please re-login";
      header('Location: /login');
    }
  }
}