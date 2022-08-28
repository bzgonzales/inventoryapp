<?php
/**
 * 
 */
class Errorhandler extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->view->render_page('view-404');
	}
}
