<?php

/**
 * 	
 */
class Controller
{
	
	function __construct()
	{
		$this->view = new View();
	}
	public function load_model($name){
		$pathfile = 'application/models/'.$name.'_model.php';
		if(file_exists($pathfile)){
			require $pathfile;
			$modelName = $name.'_model';
			$this->model = new $modelName();
		}
	}
}