<?php 

class Login extends Controller
{

	public function __Construct()
	{
		parent::__construct();
		SESSION::initialize();
		if(@$_SESSION['user']){
			header("Location: ".base_url."inventory");
			die();
		}
	}

	function index()
	{

		$this->view->render_page('view-user-login');
	}

	

}