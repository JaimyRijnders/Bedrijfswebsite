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
                ':content' => nl2br($content)
            ));
            return true;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function addElement($parent) {
        //Element toevoegen
        $sth = $this->dbh->prepare("
            INSERT INTO elements (parent, content, place, type, mediaId)
                VALUES (:parent, :content, 
                    (SELECT max(place) FROM `elements` AS x WHERE parent = '1' ) + 10, 
                :type, :media)");
        try {
            $sth->execute(array(
                ':parent' => $parent,
                ':content' => "Voeg uw text toe",
                ':type' => "0",
                ':media' => "0"
            ));
            return true;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    
    public function deleteElement($id) {
        $sth = $this->dbh->prepare("DELETE FROM elements WHERE id = :id");
        try {
            $sth->execute(array(
                ':id' => $id
            ));
            return true;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

}
