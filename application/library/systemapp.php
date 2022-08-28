
<?php
/**
 * 
 */
class Systemapp
{
	


	function __construct()
	{


		// calling controller area

		$get = isset($_GET['url'])?$_GET['url']:null;
		$get = rtrim($get);
		$url = explode('/',$get );

		if(empty($url[0])){
			require 'application/controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}

		$file = 'application/controllers/'.$url[0].'.php';

		if(file_exists($file)){
			require $file;
		}else{
			require 'application/controllers/errorhandler.php';
			$controller = new Errorhandler();
			return false;
		}

		// calling method area

		$controller = new $url[0];
		$controller->load_model('query'); 

		if(isset($url[2])){
			if(method_exists($controller,$url[1])){
				$controller->{$url[1]}($url[2]);
			}else{
				//$this->errorhandler();
			}

		}else{
			if(isset($url[1])){
				$controller->{$url[1]}();
			}else{
				$controller->index();
			}
		}


	}
}