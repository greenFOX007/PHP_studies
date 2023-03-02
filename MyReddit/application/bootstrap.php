<?php
namespace application\core;
use \application\core\Route;
require('./config.php');

session_start();

spl_autoload_register(function($class){
    $path= str_replace('\\','/',$class . '.php');
    if(file_exists($path)){
        require $path;
    }else{
		Route::ErrorPage404();
		exit();
	}
});



Route::start(); // запускаем маршрутизатор
