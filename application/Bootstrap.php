<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	protected function _initAutoload() 
	{
		$moduleLoader = new Zend_Application_Module_Autoloader(array( 
		'namespace' => '', 
		'basePath' => APPLICATION_PATH)); 
		return $moduleLoader; 
 	}
 	
	/*
	 * 初始化页面布局
	 */
	protected function _initViewHelpers() 
	{ 
		$this->bootstrap('layout');
		$layout = $this->getResource('layout'); 
		$view = $layout->getView(); 
		$view->doctype('XHTML1_STRICT'); 
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8'); 
		$view->headTitle()->setSeparator(' - '); 
		$view->headTitle('HustTic'); 
	}
	/*
	 * 初始化布局助手
	 */	
	protected function _initLayoutHelper()
	{ 
		$this->bootstrap('frontController'); 
		$layout = Zend_Controller_Action_HelperBroker::addHelper( new MY_Controller_Action_Helper_LayoutLoader());
	}
	
	/*
	 * 初始化邮件服务
	 */	
	protected function _initMail()
	{
		$options = $this->getOption("mail");
		$host = $options['transport']['host'];
		$username = $options['transport']['username'];
		$password = $options['transport']['password'];
		$auth = $options['transport']['auth'];
		
		$config = array('auth' => $auth,
		'username' => $username,
		'password' => $password);
		
		$transport = new Zend_Mail_Transport_Smtp($host, $config);
		Zend_Registry::set('transport',$transport);

	}
	
	/*
	 * 初始化日志信息
	 */
	protected function _initLog(){
		$log = $this->getOption("log");
		$filepath = $log['stream'].'/log-'.date('Y-m-d').'.php';
		$mode = $log['mode'];
		$writer = new Zend_Log_Writer_Stream($filepath,$mode);
		$logger = new Zend_Log($writer);
		Zend_Registry::set('log',$logger);
	}

}

