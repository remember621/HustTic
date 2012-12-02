<?php
class Default_Bootstrap extends Zend_Application_Module_Bootstrap
{
	protected function _initAutoload() 
	{
		$moduleLoader = new Zend_Application_Module_Autoloader(array( 
		'namespace' => 'default', 
		'basePath' => APPLICATION_PATH)); 
		return $moduleLoader; 
 	}
}