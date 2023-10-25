<?php 

class NotFound extends Controller {
    public function index () {
        session_start();
        $this->view('notFound/index');
        http_response_code(404);
    }
    
}