<?php

require_once 'Zend/View/Interface.php';
require_once 'Twig/Autoloader.php';

class Twig_Zend_View_Twig_TwigImplementation
	implements Zend_View_Interface
{
	/**
	 * The twig loader instance
	 * @var Twig_Environment
	 */
	protected $_twigEnv;
	
	/**
	 * The twig loader instance
	 * @var Twig_Loader_Interface
	 */
	protected $_twigLoader;
	
	/**
	 * A map of all registered variables
	 * @var array
	 */
	protected $_variablesMap = array();
	
	/**
	 * Class constructor
	 * @param string $templateBasePath The views base path
	 * @param array $envOptions 
	 */
	public function __construct($templateBasePath, array $envOptions = array())
	{
		$zendAutoloader = Zend_Loader_Autoloader::getInstance();
		$zendAutoloader->pushAutoloader(array('Twig_Autoloader', 'autoload'));
		
		$this->_twigLoader = new Twig_Loader_Filesystem($templateBasePath);
		$this->_twigEnv = new Twig_Environment($this->_twigLoader, $envOptions);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::getEngine()
	 * @return Twig_Environment
	 */
	public function getEngine()
	{
		return $this->_twigEnv;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::setScriptPath()
	 */
	public function setScriptPath($path)
	{
	 	$this->_twigEnv->getLoader()->setPaths($path);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::getScriptPaths()
	 */
	public function getScriptPaths()
	{
		return $this->_twigEnv->getLoader()->getPaths();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::setBasePath()
	 */
	public function setBasePath($path, $classPrefix = 'Zend_View')
	{
		$this->setScriptPath($path);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::addBasePath()
	 */
	public function addBasePath($path, $classPrefix = 'Zend_View')
	{
		$this->setScriptPath($path); 
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::__set()
	 */
	public function __set($key, $value)
	{
		$this->assign($key, $value);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::__isset()
	 */
	public function __isset($key)
	{
		return isset($this->_variablesMap[$key]);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::__unset()
	 */
	public function __unset($key)
	{
		unset($this->_variablesMap[$key]);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::assign()
	 */
	public function assign($key, $value = NULL)
	{
		if (!is_null($value)) {
			$this->_variablesMap[$key] = $value;
		} elseif (is_array($key)) {
			$this->_variablesMap = array_merge($this->_variablesMap, $key);
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::clearVars()
	 */
	public function clearVars()
	{
		$this->_variablesMap = array();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::getVars()
	 */
	public function getVars()
	{
		$vars   = get_object_vars($this);
		foreach ($vars as $key => $value) {
			if ('_' == substr($key, 0, 1)) {
				unset($vars[$key]);
			}
		}

		return $vars;
	}

	/**
	 * (non-PHPdoc)
	 * @see library/Zend/View/Zend_View_Interface::render()
	 */
	public function render($name)
	{
		$template = $this->_twigEnv->loadTemplate($name);
		return $template->render($this->_variablesMap);
	}
}