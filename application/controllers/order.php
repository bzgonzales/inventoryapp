<?php 

class Order extends Controller
{

	public function __Construct()
	{
		parent::__construct();
		Session::initialize();
		$loggedin = Session::get('loggedin');
		if(!$loggedin){
			header("Location: ".base_url."login");
			die();
		}else{
			$user = Session::get('user');
			$this->usertype = $user['user_type'];
		}
	}


	function index()
	{

		$this->view->clients = $this->model->get_clients();

		$this->view->render_page('view-order');
	}
	

}