<?php

	 define('DEV_MODE', true);
	 
     define('IS_HTTPS',  (empty($_SERVER['HTTPS'])?0:1));
	 define('HTTP_PROTOCOL', (IS_HTTPS?'https':'http'));

	 define('BASE_URL', HTTP_PROTOCOL . '://' . $_SERVER['HTTP_HOST']);
	 define('FILES_DIR_URL',  BASE_URL .  '/files/');
	 define('TEMPLATES_DIR_URL',   BASE_URL .  '/templates/');
	 define('WIDGETS_DIR_URL',   BASE_URL .  '/widgets/');
	
	 define('DS', DIRECTORY_SEPARATOR);
     define('BASE_DIR', __DIR__ . DS);
	 define('FILES_DIR', BASE_DIR . DS . 'files' . DS);
	 define('TEMPLATES_DIR', BASE_DIR . DS . 'templates' . DS);
	 define('WIDGETS_DIR', BASE_DIR . DS . 'widgets' . DS);	 
	 
	 define('DEFAULT_LANG', 'bg');
	 define('DEFAULT_CHARSET', 'UTF-8');
	 define('DEFAULT_TEMPLATE', 'Zqpalnik');	 
	 define('DEFAULT_PAGE', 'home');
	 
	 define('SITE_NAME', 'Zqpalnik');

	 
	 $LANG = array();
?>