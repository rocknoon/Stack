<?php

	class IAMM_ZendX_Controller_Action_Admin extends IAMM_ZendX_Controller_Action
	{
	    
	    public function preDispatch(){
	    	parent::preDispatch();
	    	$this->_appendBasicJs();
	    	$this->_initAdmin();
	    	$this->_checkAdmin();
	    	
	    }
	    

	    
	    private function _checkAdmin(){
	    	
	    	$adminMod = IAMM_Admin_Factory::Factory();
	    	
	   	 	$notneedCheck = preg_match( "/upload/" , $this->_request->getActionName() );
	   		
	   	 	if( ($this->_request->getActionName() == 'login' && $this->_request->getControllerName() == 'index') || 
	   	 		 $this->_request->getActionName() == 'postlogin' && $this->_request->getControllerName() == 'index' ||
	   	 		 $notneedCheck ){
	   	 		 	return true;
	   	 		 }
	    	
	    	$adminMod = IAMM_Admin_Factory::Factory();
			$isLogined = $adminMod->isLogined();

			if( !$isLogined ){
				$this->_helper->redirector->gotoSimple('login', 'index' , 'admin');
			}

	    }
	    
	  
	    
	 
	    
		private function _initAdmin(){
			$adminMod = IAMM_Admin_Factory::Factory();
			$adminMod->generDefaultAdmin();
	    }
	    
	    
	    
		private function _appendBasicJs(){
	    	
			$this->appendJs('js/jquery-1.6.4.min.js');
			$this->appendJs('js/rocknoon/include.js');
	    	
	    }
	    
	    
	    
	    
	}
?>