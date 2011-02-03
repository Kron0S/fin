<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Настройка загрузчика
	 */
	public function _initLoader() 
	{
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->setFallbackAutoloader(true);
	}
	public function _initCache()
	{
		$config = $this->config->cache;
		$this->cache = $this->_getCache($config);
		Zend_Registry::set('cache', $this->cache);
		return $this;
	}
 
	protected function _getCache($config)
	{
		if($config)
		{
			$cache = Zend_Cache::factory(
				$config->frontendName,
				$config->backendName,
				$config->frontendOptions->toArray(),
				$config->backendOptions->toArray()
			);
			return $cache;
		}
		else
			return false;
	}
	public function _initDbAdapter()
	{
		$this->bootstrap('db');
		$dbAdapter = $this->getResource('db'); 
		Zend_Registry::set('db', $dbAdapter);
	}
	protected function _initZFDebug()
	{
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace('ZFDebug');
		$this->bootstrap('FrontController');
		$front = $this->getResource('FrontController');

		$options = array(
			 'plugins' => array(
				//'Auth',
				//'Cache' => array('backend' => $cache->getBackend()), 
				//'Text',
				//'Time',
				'Variables',
				'Html', 
				'Database' => array('adapter' => $db), 
				'Exception', 
				'File', 
				'Memory', 
				'Registry',
			)
		);
		$zfdebug = new ZFDebug_Controller_Plugin_Debug($options);
		$front->registerPlugin($zfdebug);
	}
}

