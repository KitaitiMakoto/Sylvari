<?php
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

define('APPLICATION_TEST_BOOTSTRAP_PATH', realpath(dirname(__FILE___) . '/application/bootstrap.php'));
define('LIBRARY_TEST_BOOTSTRAP_PATH', realpath(dirname(__FILE___) . '/library/bootstrap.php'));

set_include_path(
     APPLICATION_PATH . '/../library' . PATH_SEPARATOR .
     APPLICATION_PATH . '/controllers' . PATH_SEPARATOR .
     APPLICATION_PATH . '/models' . PATH_SEPARATOR .
     get_include_path()
);

require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->setFallbackAutoloader(TRUE);