<?php

require_once("config.php");
require_once("functions.php");

spl_autoload_register(function ($class) {
       include 'classes/' . $class . '.class.php';
});

ini_set('display_errors',  DEV_MODE);
ini_set('display_startup_errors', DEV_MODE);
error_reporting(DEV_MODE?E_ALL:E_USER);

set_exception_handler('custom_exception_handler');

$dispatcher = new \core\Dispatcher();
$dispatcher->run(isset($_GET['path'])?$_GET['path']:'');

?>