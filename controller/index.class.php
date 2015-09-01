<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        $_SESSION['cms'] = true;
        $this->view->title = 'Home';
        $this->view->script[] = 'script';
        $this->view->script[] = 'editElement';
        //$this->view->script = 'bedrijf';
    }

    public function index() {
        $this->view->getHeader();
        $this->view->allContent = $this->getContent();
        $this->view->render('index');
        $this->view->render('overOns');
        $this->view->render('portfolio');
        $this->view->render('contact');
        $this->view->getFooter();
    }

    public function getContent($page = false) {
        if ($page) {
            $content = $this->model->getContentFrom($page);
            $this->view->title = $this->model->getTitle($page);
        } else {
            $content = $this->model->getAllContent();
            $content = $this->sortContent($content);
        }
        return $content;
    }

    //sort de content by groep
    public function sortContent($content) {
        $newContent = "";
        foreach($content as $key => $value){
                $newContent[$value['parent']][] = $content[$key];
        }
       return $newContent;
    }

}
