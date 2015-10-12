<?php

class newElement extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->title = 'New Element';
        $this->view->style = "popup";
    }
    public function index(){
        $this->view->render("newElement");
    }
    public function image($typeId){
        $this->view->render("subs/add/" . $typeId);
    }
}