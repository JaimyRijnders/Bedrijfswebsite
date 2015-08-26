<?php

class Router{

    function __construct(){
	$url = isset($_GET['url']) ? $_GET['url'] : null;
	$url = rtrim($url, '/');
	$url = explode('/', $url);

	// for debugging
	//print_r($url);
	// print_r($_SESSION);

	if(empty($url[0])){
	    require 'controller/index.class.php';
	    $controller = new Index();
            
            //zodat de index ook een model mag hebben
            $controller->loadmodel("index");
	    $controller->index();
	    return false;
	}

	$file = 'controller/' . $url[0] . '.class.php';
	if(file_exists($file)){
	    require $file;
	}else{
	    $this->error();
	    return false;
	}

	$controller = new $url[0];
	$controller->loadmodel($url[0]);

	// calling methods
	if(isset($url[2])){
	    if(method_exists($controller, $url[1])){
		$controller->{$url[1]}($url[2]);
	    }else{
		$this->error();
	    }
	}else{
	    if(isset($url[1])){
		if(method_exists($controller, $url[1])){
		    $controller->{$url[1]}();
		}else{
		    $this->error();
		}
	    }else{
		$controller->index();
	    }
	}
    }

    function error(){
	require 'controller/error.class.php';
	$controller = new Error();
	$controller->index();
	return false;
    }

}
