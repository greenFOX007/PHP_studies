<?php

class Controller_Registration extends Controller
{

	function __construct()
	{
		$this->model = new Model_Registration();
		$this->view = new View();
	}
	
	function action_index()
	{	
		

		// $data = $this->model->get_data();		
		$this->view->generate('registration_view.php', 'template_login_view.php');
	}

	// function action_postNews(){
	// 	// $data = $this->model->get_data_js();		

	// 	$this->view->generate('main_view.php', 'template_view.php');
	// }
}