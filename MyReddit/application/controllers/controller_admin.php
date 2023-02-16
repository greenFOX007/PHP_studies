<?php

class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();
	}
	
	function action_index()
	{
		session_start();
		
		unset($_SESSION['lol']);
	
		if ( $_SESSION['idgroup'] == 1 )
		{	
			$page = intval($_GET['p'] ?? 1);
			$data = $this->model->get_dataPage($page);
			$this->view->generate('admin_main_view.php', 'template_admin_view.php',$data);
		}
		else
		{
			Route::ErrorPage404();
		}

	}
	function action_allNews()
	{
		session_start();
		
	
		if ( $_SESSION['idgroup'] == 1 )
		{	
			if(!empty($_GET['fillterBY'])&&!empty($_GET['value'])){
				
				$fillterBY = $_GET['fillterBY'];
				$value = $_GET['value'];

				$_SESSION['url']="fillterBY=$fillterBY&value=$value";

				if($fillterBY == 'moderationStatus' && $value=="Опубликовано"){
					$value = 1;
				}else if($fillterBY == 'moderationStatus' && $value=="Не опубликовано"){
					$value = 0;
				}

				$page = intval($_GET['p'] ?? 1);

				$data = $this->model->get_dataFillter($fillterBY,$value,$page);
				$this->view->generate('admin_main_view.php', 'template_admin_view.php',$data);
			}else{
				// unset($_SESSION['url']);
				$page = intval($_GET['p'] ?? 1);
				$data = $this->model->get_dataPage($page);
				$this->view->generate('admin_main_view.php', 'template_admin_view.php',$data);
			}
		}
		else
		{
			Route::ErrorPage404();
		}

	}

	function action_fillter()
	{
		session_start();
		
		if ( $_SESSION['idgroup'] == 1 )
		{	
			$fillterBY = $_GET['fillterBY'];
			$value = $_GET['value'];

			if($fillterBY == 'moderationStatus' && $value=="Опубликовано"){
				$value = 1;
			}else if($fillterBY == 'moderationStatus' && $value=="Не опубликовано"){
				$value = 0;
			}
			$page = intval($_GET['p'] ?? 1);

			$data = $this->model->get_dataFilter($fillterBY,$value,$page);
			$this->view->generate('admin_main_view.php', 'template_admin_view.php',$data);
		}
		else
		{
			Route::ErrorPage404();
		}

	}

	function action_moderation()
	{
		session_start();
	
		if ( $_SESSION['idgroup'] == 1 )
		{	
			if(!empty($_GET['fillterBY'])&&!empty($_GET['value'])){
				
				$fillterBY = $_GET['fillterBY'];
				$value = $_GET['value'];

				$_SESSION['url']=$_SERVER['REQUEST_URI'];

				$page = intval($_GET['p'] ?? 1);

				$data = $this->model->get_data_moderationFilter($fillterBY,$value,$page);
				$this->view->generate('admin_moder_view.php', 'template_adminModer_view.php',$data);
			}else{
				unset($_SESSION['url']);
				$page = intval($_GET['p'] ?? 1);
				$data = $this->model->get_data_moderation($page);
				$this->view->generate('admin_moder_view.php', 'template_adminModer_view.php',$data);
			}

		}
		else
		{
			Route::ErrorPage404();
		}

	}

	function action_users()
	{
		session_start();
		

		if ( $_SESSION['idgroup'] == 1 )
		{	
			$page = intval($_GET['p'] ?? 1);
			$data = $this->model->get_data_users($page);
			$this->view->generate('admin_users_view.php', 'template_admin_view.php',$data);
		}
		else
		{
			Route::ErrorPage404();
		}

	}
	
	

}
