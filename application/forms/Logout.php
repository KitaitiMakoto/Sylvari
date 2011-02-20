<?php

require_once 'Zend/Form.php';

class Form_Logout extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('id', 'logout')
             ->addElement('submit', 'logout', array('label' => 'Logout'));
    }


}

