<?php

require_once dirname(__FILE__) . '/../../test_helper.php';

class IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public $bootstrap = APPLICATION_TEST_BOOTSTRAP_PATH;
    
    public function testMustHaveLinkToSerialPageOfCurrentUser()
    {
        $this->login();
        $this->dispatch('/');
                
        $this->assertQuery('a[href="serials/admin"]');
    }
    
    // Tests for Login action helper
    public function testLoginFormRenderedWhenNotLoggedIn()
    {
        $this->addLoginHelper()
            ->dispatch('/');
        
        $this->assertQuery('form#login');
        $this->assertQuery('input[name="userid"]');
        $this->assertQuery('input[name="password"]');
    }
    
    public function testLogoutButtonRenderedWhenLoggedIn()
    {
        $this->login()
            ->dispatch('/');
        
        $this->assertQuery('form#logout');
        $this->assertQuery('input[name="logout"]');
        
    }
    
    private function addLoginHelper()
    {
        require_once APPLICATION_PATH . '/controllers/helpers/Login.php';
        $loginHelper = new Sylvari_Action_Helper_Login;
        Zend_Controller_Action_HelperBroker::addHelper($loginHelper);
        return $this;
    }
    
    private function login($userid = 'admin', $password = 'horselord')
    {
        $this->addLoginHelper();
        $this->request
            ->setMethod('POST')
            ->setPost(array(
                'userid' => $userid,
                'password' => $password
            ));
        return $this;
    }
}