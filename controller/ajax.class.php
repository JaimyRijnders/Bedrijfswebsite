 <?php

class Ajax extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->title = 'ajaxRequests';
    }

    public function index() {
        if (isset($_POST['target'])) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            $target = $_POST['target'];

            switch ($target) {
                case "update":
                    if (isset($_POST['content'])) {
                        $this->updateAjax($id, $_POST['content']);
                    }
                    break;
                case "insert":
                    if (isset($_POST['parent'])) {
                        $this->insertAjax($_POST['parent']);
                    }
                    break;
                case "delete":
                    if (isset($id)) {
                        $this->deleteAjax($id);
                    }
                    break;
            }
        } else {
            echo "Geen target gezet";
        }
        exit;
    }

    private function updateAjax($id, $content) {
        echo $this->model->editElement($id, $content);
    }

    private function insertAjax($parent) {
        $data = $this->model->addElement($parent);
        if (gettype($data) != "array") {
            echo $data;
        } else {
            //quickfix, ik ben een luie flikker
            $data = $data[0];
            echo '<p class="mainText editable" data-id="' . $data['id'] . '">'
                . $data["content"] .
            '</p><span class="deleteElement" data-id="' . $data['id'] . '">Delete</span>';
        }
    }

    private function deleteAjax($id) {
        echo $this->model->deleteElement($id);
    }

}
