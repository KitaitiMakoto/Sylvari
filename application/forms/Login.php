<?php

require 'Zend/Form.php';

class Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('user-id', 'login')
             ->addElement('text', 'userid', array(
                   'label' => 'Login ID:',
                   'required' => true
               ))
             ->addElement('password', 'password', array(
                   'label' => 'Password:',
                   'required' => true
               ))
             ->addElement('submit', 'login', array('label' => 'Login'));
    }
}
