<?php

class Ajax extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->title = 'ajaxRequests';
    }

    public function index() {
        if (isset($_POST['id']) && isset($_POST['target'])) {
            $id = $_POST['id'];
            $target = $_POST['target'];

            switch ($_POST['target']) {
                case "send":
                    if (isset($_POST['content'])) {
                        $this->sendAjax($id, $_POST['content']);
                    }
                    break;
            }
        }
        exit;
    }

    public function sendAjax($id, $content) {
        $this->model->editElement($id, $content);
    }

}
