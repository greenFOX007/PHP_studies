<?php
namespace application\core;

class Route
{

	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
	
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}


		$controller_name = '\application\controllers\Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		$controller = new $controller_name();
		$controller->$action_name();
	
	}

	static function ErrorPage404()
	{
		include "./application/views/404_view.php";
    }
    
}
