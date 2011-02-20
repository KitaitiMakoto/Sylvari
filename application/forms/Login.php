<?php

require 'Zend/Form.php';

class Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('id', 'login')
             ->addElement('text', 'id', array(
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
