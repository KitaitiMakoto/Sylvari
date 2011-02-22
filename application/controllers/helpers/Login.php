<?php

require_once 'Zend/Controller/Action/Helper/Abstract.php';

require_once 'Zend/Config/Ini.php';
require_once 'Zend/Auth.php';
require_once 'Zend/Auth/Adapter/DbTable.php';

require_once APPLICATION_PATH . '/forms/Login.php'; // should be autoloaded
require_once APPLICATION_PATH . '/forms/Logout.php'; // should be autoloaded

class Sylvari_Action_Helper_Login extends Zend_Controller_Action_Helper_Abstract
{    
    public function preDispatch()
    {
        $controller = $this->getActionController();
        $auth = Zend_Auth::getInstance();
        $request = $this->getRequest();
        
        if ($auth->hasIdentity()) {
            if ($request->getPost('logout')) {
                $auth->clearIdentity();
                $controller->view->account = new Form_Login;
                return;
            } else {
                $controller->view->account = new Form_Logout;
            }
        } else {
            if (!$request->getPost('userid')) {
                $controller->view->account = new Form_Login;
                return;
            }
            $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'database');
            $db = Zend_Db::factory($config);
            $adapter = new Zend_Auth_Adapter_DbTable($db, 'users', 'id', 'hashed_key', 'md5(?)');// parameters should be extracted to outer file
            $adapter
                ->setIdentity($request->getPost('userid'))
                ->setCredential($request->getPost('password'));
            $result = $auth->authenticate($adapter);
            if ($result->isValid()) {
                //$auth->getStorage()->write($adapter->getResultRowObject(NULL, 'password'));
                $controller->view->account = new Form_Logout;
            } else {
                foreach ($result->getMessages() as $message) {
                    print($message . "<br>\n");
                }
                $controller->view->account = new Form_Login;
            }
        }
    }
}
