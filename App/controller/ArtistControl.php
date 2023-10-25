<?php 

class ArtistControl extends Controller {
  public function index () {
      session_start();
      if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
        if ($_SESSION['role'] === 'admin'){
          $data['artists'] = $this->model('ArtistModel')->browseAllArtists()[0];
          $data['totalPage'] = $this->model('ArtistModel')->browseAllArtists()[1];
          $data['allArtists'] = $this->model('ArtistModel') -> getAllArtists();
          
          $this->view('ArtistControl/index', $data);
        } else if ($_SESSION['role'] === 'user'){ 
          header('Location: /index');
        } 
      } else {
        $this->view('login/index');
      }
    } 

    public function editArtist() {  
      header('Content-Type: application/json');
      http_response_code(200);
      $this->model('ArtistModel') ->editArtist($_POST);
    }

    public function addArtist() {
      header('Content-Type: application/json');
      $this->model('ArtistModel')->createArtist($_POST);
    }

    public function deleteArtist()  {
      $this->model('ArtistModel') -> deleteArtist($_POST);
      header('Content-Type: appliacation/json');
      http_response_code(200);
      echo json_encode(["deleted"=> $_POST['artistID']]);
    }
  }