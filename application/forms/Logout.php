<?php

require_once 'Zend/Form.php';

class Form_Logout extends Zend_Form
{
    private $_userName;
    
    public function init()
    {
        
        $decorator = new Form_Decorator_Logout(array('userName' => $this->_userName));
        $userName = new Zend_Form_Element('userid', array('decorators' => array($decorator)));
        
        $this
            ->setMethod('post')
            ->setAttrib('id', 'logout')
            ->addElement($userName)
            ->addElement('submit', 'logout', array('label' => 'Logout'));
    }
    
    protected function setUserName($userName)
    {
        $this->_userName = $userName;
    }
}

