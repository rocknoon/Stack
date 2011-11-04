<?php

class IndexController extends Stack_ZendX_Controller_Action_Front
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	
    	
        $userFrontMod = Stack_User_Factory::Front();
        
        $user = $userFrontMod->getMyInformation();
        
        $this->assign( "user" , $user );
       
    }


}

