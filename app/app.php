<?php
$config=include("../config.php");
require("../vendor/autoload.php");

spl_autoload_register(function($class){
	$file=dirname(__FILE__)."/controller/$class.php";
	if(file_exists($file)){
		include($file);
		return;
	}
	$file=dirname(__FILE__)."/core/$class.php";
	if(file_exists($file)){
		include($file);
		return;
	}
});

Route::bootstrap($config);

function Logic($controller)
{
	return new $controller;
}


