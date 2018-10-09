<?php

namespace core;

class Template{
	
	public static function render($page_name, $template_name, $lang_code){
	     self::loadLanguage($page_name, $template_name, $lang_code);
	     self::loadPage($page_name, $template_name);
	}
	
	public static function render404($template_name){
		include_once(TEMPLATES_DIR_URL . $template_name . '/front/404.php');
	}
	
	public static function getTitle(){
		global $dispatcher, $LANG;
		
		 if(!empty($LANG['page_title'])){
			 return $LANG['page_title'];
		 }else if(!empty($dispatcher)){
			 return $dispatcher->getPageName();
		 }else{
			 throw new \Exception('You must to load a page before you can get page titles!');
		 }
	}
	
	private static function loadLanguage($page_name, $template_name, $lang_code){
		     global $LANG;
			 
			 // Loading common language file
		      $path = TEMPLATES_DIR . $template_name .  DS . "lang" . DS . $lang_code . DS . "common.lang.php";
               if(file_exists($path)){
                    require_once($path);
               }else{
				    throw new \Exception('Common language file is missing!', 404);
			   }
			   
			   // Loading the language file related with current page
		       $path = TEMPLATES_DIR . $template_name . DS . "lang" . DS . $lang_code . DS . $page_name . ".lang.php";
               if(file_exists($path)){
                    require_once($path);
               }else{
				    throw new \Exception('No language file for current page!', 404);
			   }
	}

	private static function loadPage($page_name, $template_name){
		global $dispatcher,$LANG;
		
	     $header_path = TEMPLATES_DIR . $template_name . DS . 'front' . DS . 'common' . DS . 'header.phtml';
		 $footer_path = TEMPLATES_DIR . $template_name . DS . 'front' . DS . 'common' . DS . 'footer.phtml';
		 $backend_path = TEMPLATES_DIR . $template_name . DS . 'back' . DS . $page_name . '.back.php';
		 $frontend_path = TEMPLATES_DIR . $template_name . DS. 'front' . DS . $page_name . '.front.php';
		 
		 if(file_exists($header_path)){
			 include_once($header_path);			 
		 }else{
			 throw new \Exception('No header file!',404);
		 }
		 
		 if(file_exists($backend_path)){
			 include_once($backend_path);			 
		 }else{
			 throw new \Exception('No backend file!',404);
		 }
		 
		 if(file_exists($frontend_path)){
			 include_once($frontend_path);			 
		 }else{
			 throw new \Exception('No frontend file!',404);
		 }
		 	
		if(file_exists($footer_path)){
			 include_once($footer_path);			 
		 }else{
			 throw new \Exception('No footer file!',404);
		 }
	}
}

?>