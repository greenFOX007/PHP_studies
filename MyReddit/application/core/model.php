<?php
namespace application\core;
class Model
{
	private static $connect;

	public function __construct()
	{
		if(!self::$connect){
			self::$connect = mysqli_connect('localhost', 'root', '', 'myReddit');
		}
	}


	public function get_data()
	{

	}

	protected function get_one($query){
		try{
			if($result = mysqli_query(self::$connect,$query)){
				$data = mysqli_fetch_assoc($result);
				
			}else{
				throw new \Exception(mysqli_error(self::$connect));
			}

			return $data;
		}catch(\Throwable $e){
			echo $e->getMessage();
		}
	
	}

	protected function get_count($query){
		try{
			if($result = mysqli_query(self::$connect,$query)){
				$data = mysqli_fetch_row($result);
				
			}else{
				throw new \Exception(mysqli_error(self::$connect));
			}

			return $data[0];

		}catch(\Throwable $e){
			echo $e->getMessage();
		}
	}

	protected function get_many($query){
		try{
			if($result = mysqli_query(self::$connect,$query)){
				$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
				
			}else{
				throw new \Exception(mysqli_error(self::$connect));
			}

			return $data;
			
		}catch(\Throwable $e){
			echo $e->getMessage();
		}
	}

	protected function execute($query){
		try{
			if(!mysqli_query(self::$connect,$query)){
				throw new \Exception(mysqli_error(self::$connect));
				return false;
			}else{
				return true;
			}
		}catch(\Throwable $e){
			echo $e->getMessage();
		}
	}


}