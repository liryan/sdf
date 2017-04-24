<?php
class Base{
	private $db;
	private $when;
	private $method;
	public function __construct(){
		session_start();
		if(@$_REQUEST['admin']=="liruiyan"){
			$_SESSION['admin']=1;
		}
	}

	public function check()
	{
		if(@$_SESSION['admin']==1){
			return true;
		}
		die("<h1>Forbidden access</h1>");
	}

	public function when($url)
	{
		$url=rtrim($url,"/");
		$this->when=$url;
		if(!array_key_exists($url,Route::$table)){
			Route::$table[$url]=['class'=>$this];
		}
		else{
			throw new Exception($url." has exists in ROUTE");
		}
		return $this;
	}

	public function input($key,$value=''){
		if(array_key_exists($key,$_POST)){
			return $_POST[$key];
		}
		if(array_key_exists($key,$_GET)){
			return $_GET[$key];
		}
		return $value;
	}

	public function invoke($method)
	{
		if(array_key_exists($this->when,Route::$table)){
			Route::$table[$this->when]['method']=$method;			
		}
		return $this;
	}
	
	public function show($tpl='')
	{
		if(array_key_exists($this->when,Route::$table)){
			Route::$table[$this->when]['type']='show';			
		}
		return $this;
	}

	public function json()
	{
		if(array_key_exists($this->when,Route::$table)){
			Route::$table[$this->when]['type']='json';			
		}
		return $this;
	}
};
