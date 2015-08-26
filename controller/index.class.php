<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->title = 'Home';
        $this->view->script[] = 'script';
        $this->view->script[] = 'makeEditable';
        $this->view->script[] = 'autoSize';
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
        } else {
            $content = $this->model->getAllContent();
            $content = $this->sortContent($content);
            return $content;
        }
    }

    //sort de content by groep
    public function sortContent($content) {
        foreach($content as $key => $value){
                $newContent[$value['title']][] = $content[$key];
        }
       return $newContent;
    }

}
