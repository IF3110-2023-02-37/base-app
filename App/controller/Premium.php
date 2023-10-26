<?php 

class Premium extends Controller {
    public function index () {
        session_start();
        $data['profilePicture'] =  $this->model('UserModel') -> getUser($_SESSION['username'])[0]['profilePicture'];
        $this->view('premium/index', $data);
    }
    
}