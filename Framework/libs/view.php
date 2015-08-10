<?php

class View{

    function __construct(){
	
    }

    public function render($name, $noInclude = false){
	if($noInclude == true){
	    require 'view/content/' . $name . '.php';
	}else{
	    require 'view/template/header.php';
	    require 'view/content/' . $name . '.php';
	    require 'view/template/footer.php';
	}
    }

}
