<?php

class Index_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllContent() {
        $sth = $this->dbh->prepare("SELECT * FROM `main`
                            INNER JOIN `elements`
                            ON main.id = elements.parent
                            ORDER BY elements.parent ASC, elements.place ASC");
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }
    
    public function getMedium($mediumId){
        $sth = $this->dbh->prepare("SELECT * FROM `media`
                            WHERE id = " . $mediumId);
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }
    
    public function getContentFrom($page){
        
    }

}
