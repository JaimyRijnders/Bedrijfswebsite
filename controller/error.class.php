<?php

class Error extends Controller{

    public function __construct(){
	parent::__construct();
	$this->view->title = 'Error 404';
    }

    function index(){
	$this->view->render('error');
	exit;
    }

}
