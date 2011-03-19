<?php

class Form_Decorator_Logout
    extends Zend_Form_Decorator_Abstract
{
    public function render($content)
    {
        return 'Hello, ' . $this->getOption('userName') . '!';
    }
}