<?php
class View extends Smarty
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplateDir(APP_ROOT."/app/views");
		$this->setCompileDir(APP_ROOT."/runtime/tpl_compile_cache");
		$this->setCacheDir(APP_ROOT.'/runtime/tpl_cache/');
		$this->caching = false;
		$this->cache_lifetime  = 120;
	}
};

