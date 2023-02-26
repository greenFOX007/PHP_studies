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
		if ( $_SESSION['idgroup'] == 1 )
		{	
			if(!empty($_GET['fillterBY'])&&!empty($_GET['value'])){
				$fillterBY = $_GET['fillterBY'];
				$value = $_GET['value'];

				$_SESSION['url']=$_SERVER['REQUEST_URI'];

				$page = intval($_GET['p'] ?? 1);
				$data = $this->model->get_data_usersFillter($fillterBY,$value,$page);
				$this->view->generate('admin_users_view.php', 'template_admin_users_view.php',$data);
			}else{
				unset($_SESSION['url']);
				$page = intval($_GET['p'] ?? 1);
				$data = $this->model->get_data_users($page);
				$this->view->generate('admin_users_view.php', 'template_admin_users_view.php',$data);
			}
			
		}
		else
		{
			Route::ErrorPage404();
		}

	}

	function action_detailNews(){
		$idNews = intval($_GET['idNews']);
		$data = $this->model->get_data_detailNews($idNews);
		$this->view->generate('admin_detail_news.php','template_admin_view.php',$data);
	}


	function action_editNews(){
		$idNews = intval($_GET['idNews']);
		$data = $this->model->get_data_detailNews($idNews);
		$this->view->generate('admin_edit_news.php','template_admin_view.php',$data);
	}

	function action_update_news(){

		// $idNews = intval($_GET['idNews']);
		$this->model->update_news();
		
	}


	function action_resetMainFillter(){
		unset($_SESSION['url']);
		header("Location: /admin/");
	}

	function action_resetModerFillter(){
		unset($_SESSION['url']);
		header("Location: /admin/moderation");
	}

	function action_resetUserFillter(){
		unset($_SESSION['url']);
		header("Location: /admin/users");
	}

	function action_deleteNews (){
			
		$idNews = $_POST['idNews'];
			
		 $this->model->deleteNews($idNews);
	}

	function action_deleteUser (){
			
		$idUser = $_POST['idUser'];
			
		 $this->model->deleteUser($idUser);
	}
	

	function action_publish(){
		$idNews = $_POST['idNews'];
			
		 $this->model->publishNews($idNews);
	}
	

	function action_sendForModerationNews(){
		$idNews = $_POST['idNews'];
			
		 $this->model->sendForModerationNews($idNews);
	}

	

}
