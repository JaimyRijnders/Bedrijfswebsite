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
            return json_encode(array("result" => true, "content" => nl2br($content)));
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

            //laatst gemaakte element aanvragen
            $sth = $this->dbh->prepare("SELECT * FROM `main`
                            INNER JOIN `elements`
                            ON main.id = elements.parent
                            ORDER BY elements.id DESC LIMIT 1");
                $sth->execute();
                return $sth->fetchall(PDO::FETCH_ASSOC);
                
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
            $this->fixPlacing();
            return "1";
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    private function fixPlacing() {
        $sth = $this->dbh->prepare("SELECT * FROM elements ORDER BY place ASC");
        try {
            $sth->execute();
            $results = $sth->fetchall(PDO::FETCH_ASSOC);
            $i=0;
            foreach($results as $result){
                $sth= $this->dbh->prepare("UPDATE elements SET place = :i WHERE id = :id ");
                $sth->execute(Array(
                    ":i" => $i,
                    ":id" => $result["id"]
                ));
                $i= $i + 10;
            }
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

}
