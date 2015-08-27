<?php

class Ajax_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function editElement($id, $content) {
        $sth = $this->dbh->prepare("UPDATE elements SET content = :content WHERE id = :id");
        try {
            $sth->execute(array(
                ':id' => $id,
                ':content' => $content
            ));
            return true;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

}
