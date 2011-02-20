<?php

require_once 'Zend/Controller/Action/Helper/Abstract.php';
require_once 'Zend/Auth.php';
require_once APPLICATION_PATH . '/forms/Login.php'; // should be autoloaded
require_once APPLICATION_PATH . '/forms/Logout.php'; // should be autoloaded

class Sylvari_Action_Helper_Login extends Zend_Controller_Action_Helper_Abstract
{    
    public function preDispatch()
    {
        $controller = $this->getActionController();
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $controller->view->account = new Form_Logout;
        } else {
            $controller->view->account = new Form_Login;
        }
    }
}
