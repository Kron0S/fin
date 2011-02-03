<?php

require_once 'Zend/Application/Resource/ResourceAbstract.php';
require_once 'Twig/Zend/View/Twig/TwigImplementation.php';

defined('DS')
    || define('DS', DIRECTORY_SEPARATOR);

class Twig_Zend_View_Twig_Twig
    extends Zend_Application_Resource_ResourceAbstract
{
	/**
	 * The Zend_View_TwigImplementation instance
	 * @var Zend_View_TwigImplementation
	 */
	protected $_view;
	
	/**
	 * (non-PHPdoc)
	 * @see library/Zend/Application/Resource/Zend_Application_Resource_Resource::init()
	 */
	public function init()
	{
		return $this->_getView();
	}
	
	/**
	 * Returns the Zend_View_TwigImplementationInstance. If not initialized,
	 * initializes the instance
	 */
	protected function _getView()
	{
		if (null === $this->_view)
		{
			$options = $this->getOptions();
			$view = new Twig_Zend_View_Twig_TwigImplementation(APPLICATION_PATH . DS . 'views' . DS . 'scripts', $options);
			Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')
               ->setView($view)
               ->setViewSuffix('html');
			
			$this->_view = $view;
		}
		
		return $this->_view;
	}
}