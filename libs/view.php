<?php

class View {

    function __construct() {
        
    }

    public function render($name = false, $noInclude = 0) {
        switch ($noInclude) {
            case 0:
                require 'view/content/' . $name . '.php';
                break;
            case 1:
                require 'view/template/header.php';
                require 'view/content/' . $name . '.php';
                require 'view/template/footer.php';
                break;
            case 2:
                echo "<link rel='stylesheet' type='text/css' href='" . URL . "public/css/" . $this->style . ".css'/>";
                require 'view/content/' . $name . '.php';
                break;
        }
    }

    public function getHeader() {
        require 'view/template/header.php';
    }

    public function getFooter() {
        require 'view/template/footer.php';
    }

}
