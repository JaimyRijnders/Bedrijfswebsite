<?php

class Index_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllContent() {
        $sth = $this->dbh->prepare("SELECT * FROM `main`
                            INNER JOIN `elements`
                            ON main.id = elements.parent");
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_ASSOC);
    }
    
    public function getContentFrom($page){
        
    }

}
