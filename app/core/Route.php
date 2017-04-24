<?php

class Route
{
	public static $table;
	public static $db;
	public static function run()
	{
		$uri=$_SERVER['REQUEST_URI'];
		$urlinfo=parse_url($uri);	
		$url=rtrim($urlinfo['path'],"/");
		if(array_key_exists($url,static::$table)){
			$data=call_user_func([static::$table[$url]['class'],static::$table[$url]['method']]);
			if(static::$table[$url]['type']=='show'){
				$view=new View();
				$view->assign('data',$data);
				$view->display(strtolower(static::$table[$url]['method']).".tpl.php");
			}
			else if(static::$table[$url]['type']=='json'){
				echo json_encode($data);
			}
		}
		else{
			header("HTTP/1.1 404 Not Found");
		}
	}

	public static function bootstrap($config)
	{
		static::$table=[];
		DB::bootstrap($config);
	}
};
