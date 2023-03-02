<?php
namespace application\controllers;
use \application\core\Controller;
use \application\core\View;
use \application\models\Model_Registration;
class Controller_Registration extends Controller
{

	function __construct()
	{
		$this->model = new Model_Registration();
		$this->view = new View();
	}
	
	function action_index()
	{	
		$this->view->generate('registration_view.php', 'template_login_view.php');
	}

	function action_addNewUser(){
		// $data = $this->model->get_data_js();		

		$this->model->addNewUser();
	}
}