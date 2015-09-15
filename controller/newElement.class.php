<?php

class newElement extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->title = 'New Element';
    }
    public function index(){
        $this->view->render("newElement");
    }
}