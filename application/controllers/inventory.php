<?php 

class Inventory extends Controller
{

	public function __Construct()
	{
		parent::__construct();
		Session::initialize();
		$loggedin = Session::get('loggedin');
		if(!$loggedin){
			header("Location: ".base_url."login");
			die();
		}
	}
	
	function index()
	{

		$this->view->clients = $this->model->get_clients();
		// Functions::print_in($clients);
		// exit();

		$this->view->render_page('view-inventory');
	}

}