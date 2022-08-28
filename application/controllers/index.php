<?php 

class Index extends Controller
{

	public function __Construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render_page('view-homepage');
	}

	public function testindex(){
		echo 'test index';
	}

}