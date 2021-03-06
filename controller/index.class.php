<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        $_SESSION['cms'] = true;
        $this->view->title = 'Home';
        $this->view->script[] = "external/jquery";
        $this->view->script[] = 'script';
        $this->view->script[] = "external/jquery.popup.min";
        //cms scripts
        $this->view->script[] = 'editElement';
        $this->view->script[] = 'newElement';
        //$this->view->script = 'bedrijf';
    }

    public function index() {
        $this->view->getHeader();
        $this->view->render('index');
        $content = $this->getContent();
        foreach ($content as $page) {
            //subCss leegmaken
            $this->view->subCss = array();
            $this->view->title = $page[0]['title'];
            $this->view->parentId = $this->parentId($page[0]['title']);
            $this->view->render("subs/subTitle");
            foreach ($page as $element) {

                //nodige variabelen opvragen
                $id = $element['id'];
                $type = $element['type'];
                $this->view->parent = $element['parent'];
                //kijken of er media bij betrokken is
                //media path aanmaken voor later
                $css_media_path = array();
                //media id's decoden naar php array
                if ($mediaId = json_decode($element['mediaId'])) {
                    //uitlezen en "joinen" aan de overOns array
                    foreach ($mediaId as $mediumId) {
                        $result = $this->model->getMedium($mediumId);
                        //0 achter result om een nutteloze array te voorkomen
                        $result = $result[0];
                        $element['media'][] = $result;
                        $css_media_path[] = "public/css/subs/media/" . $result["type"] . ".php";
                        //voor elk medium de css inladen
                        foreach ($css_media_path as $media_path) {
                            //kijken of het bestand bestaat
                            if (file_exists($media_path)) {
                                //als het bestaad inladen en de juiste parameters inladen
                                $this->view->subCss[] = $media_path . "?id=" . $result['id'] .
                                        "&url=" . URL . "public/img/" . $result['url'] .
                                        "&settings=" . urlencode(serialize($result['settings']));
                            }
                        }
                        $css_media_path = array();
                    }
                }
                //kijken of media bestaat
                if (isset($element['media'])) {
                    //media doorgeven aan de view
                    $this->view->media = $element['media'];
                }
                //kijken of een css voor deze view is
                $css_path = "public/css/subs/" . $type . ".php";
                if (file_exists($css_path)) {
                    //css inladen
                    $this->view->subCss[] = $css_path;
                }
                //goede instellingen in de view zetten
                $this->view->id = $id;
                $this->view->content = $element['content'];
                //Zorgen dat de goede view wordt ingeladen en gerenderd
                $this->view->render("subs/" . $type);
            }
            $this->view->render("subs/subFooter");
        }
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
        foreach ($content as $key => $value) {
            $newContent[$value['parent']][] = $content[$key];
        }
        return $newContent;
    }

    private function parentId($parent) {
        $parent = strtolower($parent);
        while ($pos = strpos($parent, " ")) {
            $nextChar = $parent[$pos + 1];
            $parent = substr_replace($parent, strToUpper($nextChar), $pos, 2);
        }
        return $parent;
    }

}
