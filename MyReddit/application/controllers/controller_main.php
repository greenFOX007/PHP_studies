<?php

class Controller_Main extends Controller
{

	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}
	
	function action_index()
	{	

		$data = $this->model->get_dataPage(1);		
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_page(){
		
		$page = intval($_GET['p'] ?? 1);
		$data = $this->model->get_dataPage($page);		
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_postNews(){
		$this->model->post_news();
	}
	

	// function action_postNews(){
	// 	// $data = $this->model->get_data_js();		

	// 	$this->view->generate('main_view.php', 'template_view.php');
	// }
}