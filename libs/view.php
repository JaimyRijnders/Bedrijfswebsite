<?php

class View {

    function __construct() {
        
    }

    public function render($name = false, $noInclude = true) {
        if ($noInclude) {
            require 'view/content/' . $name . '.php';
        } else {
            require 'view/template/header.php';
            require 'view/content/' . $name . '.php';
            require 'view/template/footer.php';
        }
    }
    
    public function getHeader() {
        require 'view/template/header.php';
    }
    
    public function getFooter() {
        require 'view/template/footer.php';
    }

}
