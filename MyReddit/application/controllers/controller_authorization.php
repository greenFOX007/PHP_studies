<?php

class Controller_Authorization extends Controller
{

	function __construct()
	{
		$this->model = new Model_Authorization();
		$this->view = new View();
	}
	
	function action_index()
	{		
		$this->view->generate('authorization_view.php', 'template_login_view.php');
	}


	function action_auth()
	{			
		$this->model->auth();
	}

	function action_logout(){
		session_destroy();

		header("Location:/");
	}
}