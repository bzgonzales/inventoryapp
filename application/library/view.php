<?php

/**
 * 
 */
class View 
{
	
	function __construct()
	{
		//echo 'this is view library <br />';
	}
	public function render_page($template){

		$file = 'application/views/'.$template.'.php';

		if(file_exists($file)){
			require 'application/views/include/inc-header.php';
			require $file;
			require 'application/views/include/inc-footer.php';
		}else{
			require 'application/controllers/errorhandler.php';
			$controller = new Errorhandler();
			return false;
		}


	}

	function prevent_CSRF()
	{
		$pos = strpos(@$_SERVER['HTTP_REFERER'], @$_SERVER['HTTP_HOST']);
		if (is_numeric($pos)) {
			return 'true';
		} else {
			return 'false';
		}
	}
	
}