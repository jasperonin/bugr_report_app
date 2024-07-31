<?php

class Controller {

    // gets the create_new_ticket file found in front_end folder
    public function new_ticket(){
        $this->render('front_end/create_new_ticket');
    }

    public function home_page(){
        $this->render('front_end/home_page');
    }

    public function home(){
        $this->render('front_end/login');
    }

    public function tickets(){
        $this->render('front_end/tickets');
    }

    public function api() {
        $this->render('backend/controller/api/api');
    }


    // to render all files in front_end
    private function render($front_end) {
        $file = __DIR__ . "/../../assets/front_end/{$front_end}.php";
        if(file_exists($file)) {
            include $file;
        } else {
            return;
        }
    }
}