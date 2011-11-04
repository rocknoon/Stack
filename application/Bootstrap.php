<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

/**
	 * @var Zend_Controller_Front
	 */
	protected $_front;

	
	protected function _initFront(){
		$this->bootstrap('frontController');
		$this->_front = $this->getResource('frontController');
	}
	
	protected function _initView(){
		
		$view = new Zend_View();
		
		$view->setEncoding( 'UTF-8' );
		$view->doctype( Zend_View_Helper_Doctype::XHTML11 );
		
		$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer($view);
		Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
		
		Zend_Registry::set( 'view' , $view );
	}
	

	protected function _initWfAjax(){
    	
    	$wfAjax = new WeFlex_ZendX_Controller_Action_Helper_WfAjax();
    	Zend_Controller_Action_HelperBroker::addHelper( $wfAjax );
    	
    	return $wfAjax;
    	
    }
    
	protected function _initControllers()
    {
    	$this->_front->addControllerDirectory(APPLICATION_PATH . '/admin/controllers', 'admin');
    }
    
	protected function _initRouter(){
		
		
		$newsViewRouter = new Zend_Controller_Router_Route(
		    'news/:link',
		    array(
		        'controller' => 'news',
		        'action'     => 'view',
		    	'module'	 => 'default'
		    )
		);

		$artistViewRouter = new Zend_Controller_Router_Route(
		    'artist/:link',
		    array(
		        'controller' => 'artist',
		        'action'     => 'view',
		    	'module'	 => 'default'
		    )
		);
		
		$artistDiscographyRouter = new Zend_Controller_Router_Route(
		    'artist/discography/:link',
		    array(
		        'controller' => 'artist',
		        'action'     => 'discography',
		    	'module'	 => 'default'
		    )
		);
		
		$artistVideoRouter = new Zend_Controller_Router_Route(
		    'artist/video/:link',
		    array(
		        'controller' => 'artist',
		        'action'     => 'video',
		    	'module'	 => 'default'
		    )
		);
		
		$artistAudioRouter = new Zend_Controller_Router_Route(
		    'artist/audio/:link',
		    array(
		        'controller' => 'artist',
		        'action'     => 'audio',
		    	'module'	 => 'default'
		    )
		);
		
		$artistAgendaRouter = new Zend_Controller_Router_Route(
		    'artist/agenda/:link',
		    array(
		        'controller' => 'artist',
		        'action'     => 'agenda',
		    	'module'	 => 'default'
		    )
		);
		
		$artistRiderRouter = new Zend_Controller_Router_Route(
		    'artist/rider/:link',
		    array(
		        'controller' => 'artist',
		        'action'     => 'rider',
		    	'module'	 => 'default'
		    )
		);
		
		$pageRouter = new Zend_Controller_Router_Route(
		    'page/:key',
		    array(
		        'controller' => 'cms',
		        'action'     => 'index',
		    	'module'	 => 'default'
		    )
		);
	
		
		
		
		
		$router = $this->_front->getRouter();
		
		$router->addRoute('news-view', $newsViewRouter);
		$router->addRoute('artist-view', $artistViewRouter);
		$router->addRoute('artist-discography', $artistDiscographyRouter);
		$router->addRoute('artist-video', $artistVideoRouter);
		$router->addRoute('artist-audio', $artistAudioRouter);
		$router->addRoute('artist-rider', $artistRiderRouter);
		$router->addRoute('artist-agenda', $artistAgendaRouter);
		
		$router->addRoute('page', $pageRouter);
	
		
	}
	


}