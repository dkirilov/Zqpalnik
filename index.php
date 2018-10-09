<?php

require_once("config.php");
require_once("functions.php");

spl_autoload_register(function ($class) {
	   if(file_exists(WIDGETS_DIR . DEFAULT_TEMPLATE . DS . $class . DS . $class . '.class.php')){
		   include_once(WIDGETS_DIR . DEFAULT_TEMPLATE . DS . $class . DS . $class . '.class.php');
	   }else{
           include_once(BASE_DIR . 'classes' . DS . $class . '.class.php');
	   }
});

ini_set('display_errors',  DEV_MODE);
ini_set('display_startup_errors', DEV_MODE);
error_reporting(DEV_MODE?E_ALL:E_USER);

set_exception_handler('custom_exception_handler');

$dispatcher = new \core\Dispatcher();
$dispatcher->run(isset($_GET['path'])?$_GET['path']:'');

?>