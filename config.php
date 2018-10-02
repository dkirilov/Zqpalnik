<?php

     define('IS_HTTPS',  (empty($_SERVER['HTTPS'])?0:1));
	 define('HTTP_PROTOCOL', (IS_HTTPS?'https':'http'));
	 define('BASE_URL', HTTP_PROTOCOL . '://' . $_SERVER['HTTP_HOST']);
	 
	 define('DEV_MODE', true);
	 
	 define('FILES_DIR',  'files/');
	 define('TEMPLATES_DIR', 'templates/');
	 
	 define('DEFAULT_LANG', 'bg');
	 define('DEFAULT_CHARSET', 'UTF-8');
	 define('DEFAULT_TEMPLATE', 'Zqpalnik');	 
	 define('DEFAULT_PAGE', 'home');
	 
	 define('SITE_NAME', 'Zqpalnik');

	 
	 $LANG = array();
?>