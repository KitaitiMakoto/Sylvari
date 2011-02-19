<?php
$this->bootstrap = new Zend_Application(
                       APPLICATION_ENV,
                       APPLICATION_PATH . '/configs/application.ini'
                   );
$this->bootstrap();
$this->_frontController = $this->bootstrap->getBootstrap()->getResource('frontcontroller');