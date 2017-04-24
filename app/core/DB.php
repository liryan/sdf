<?php
class DB{
	private static $db;
	public static function bootstrap($config)
	{
		$conn=new \Pixie\Connection('mysql', $config);
		static::$db =new \Pixie\QueryBuilder\QueryBuilderHandler($conn);
	}

	public static function __callStatic($funcname, $arguments)
    {
        return call_user_func_array([static::$db,$funcname],$arguments); 
    }
}
