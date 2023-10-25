<?php 

class Login extends Controller {
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
    }
    $this->view('login/index');
  }

  public function signin() {
    session_start();
    $result = $this->model('UserModel')-> login($_POST);
    if ( $result === -1) {
      $_SESSION['error'] = "Username not found";
      header('Location: /login');
    } else if ($result === 0){
      $_SESSION['error'] = "Incorrect password";
      header('Location: /login');
    } else {
      // Periksa peran pengguna
      $userRole = $result['role'];
      // echo var_dump($userRole);

      if ($userRole === 'admin') {
          $_SESSION['username'] = $result['userName'];
          $_SESSION['role'] = 'admin';
          header('Location: /MusicControl');
      } else {
          $_SESSION['username'] = $result['userName'];
          $_SESSION['role'] = 'user';
          header('Location: /home');
      }
    }
  }

  public function signout() {
    session_start();
    session_unset();
    session_destroy();
    header('Location: /login');
  }
}