<?php
namespace application\controllers;
use \application\core\Controller;

class Controller_404 extends Controller
{
	
	function action_index()
	{
		$this->view->generate('404_view.php', 'template_404_view.php');
	}

}
