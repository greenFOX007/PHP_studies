<?php
namespace application\controllers;
use \application\core\Controller;
use \application\core\View;
use \application\models\Model_Category;
class Controller_Category extends Controller
{

	function __construct()
	{
		$this->model = new Model_Category();
		$this->view = new View();
	}
	
	// function action_index()
	// {	
	// 	$data = $this->model->get_data();		
	// 	$this->view->generate('main_view.php', 'template_view.php', $data);
	// }

	function action_JavaScript(){
		$page = intval($_GET['p'] ?? 1);
		$data = $this->model->get_data_JavaScript($page);		

		$this->view->generate('category_view.php', 'template_view.php', $data);
	}

    function action_PHP(){
		$page = intval($_GET['p'] ?? 1);
		$data = $this->model->get_data_PHP($page);		

		$this->view->generate('category_view.php', 'template_view.php', $data);
	}

    function action_DataBases(){
		$page = intval($_GET['p'] ?? 1);
		$data = $this->model->get_data_DataBases($page);		

		$this->view->generate('category_view.php', 'template_view.php', $data);
	}

    function action_ReactJS(){
		$page = intval($_GET['p'] ?? 1);
		$data = $this->model->get_data_ReactJS($page);		

		$this->view->generate('category_view.php', 'template_view.php', $data);
	}
}