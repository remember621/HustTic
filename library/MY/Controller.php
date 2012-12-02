<?php
class MY_Controller extends Zend_Controller_Action
{
	protected $session;
	protected $log;
	
	public function init()
	{
		parent::init();
		$this->log = Zend_Registry::get('log');
		$this->session = new Zend_Session_Namespace("identify");
		$mouduleName = parent::getFrontController()->getRequest()->getModuleName();
		
		if ($mouduleName == 'admin')
		{
			$this->session = new Zend_Session_Namespace("admin");
			if($this->session->admin != null){
				$this->view->placeholder('admin')->exchangeArray($this->session->admin);
			}else{
				$this->view->placeholder('admin')->exchangeArray(array());
			}
		}
		else
		{
			$this->session = new Zend_Session_Namespace("user");
			if($this->session->user != null){
				$this->view->placeholder('user')->exchangeArray($this->session->user);
			}else{
				$this->view->placeholder('user')->exchangeArray(array());
			}
		}
	}
    
	
    public function getParam($name = null)
    {
    	return $this->_request->getParam($name); 
    }
    

    
	public function check_dir($path)
	{
		if (!is_dir($path))
		{
			$this->check_dir(dirname($path));
			mkdir($path,0777);
		}
	}
	
	
}