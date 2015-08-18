<?php

class Index extends Controller{

    public function __construct(){
	parent::__construct();
	$this->view->title = 'Home';
        $this->view->script[] = 'script';
        $this->view->script[] = 'makeEditable';
        //$this->view->script = 'bedrijf';
    }

    public function index(){
	$this->view->getHeader();
	$this->view->render('index');
        $this->view->render('overOns');
        $this->view->render('portfolio');
        $this->view->render('contact');
	$this->view->getFooter();
    }

}
