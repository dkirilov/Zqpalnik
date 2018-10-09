<?php
      
	  namespace core;
	  
	  abstract class Widget{
		  
		     private $widget_name = null;
		     private $translations  = null;
			 private $user_lang = null;
			 private $widget_dir = null;
			 private $widget_lang_dir = null;
			 private $widget_front_dir_url = null;
			 
			 
			 public function  __construct($user_lang, $wgt_name){
				  $this->setWidgetName($wgt_name);
				  $this->setWidgetDir(WIDGETS_DIR . DEFAULT_TEMPLATE . DS . $wgt_name . DS);				 
				  $this->setUserLang($user_lang);
				  $this->loadTranslations();
			 }
			 
			 private function setWidgetName($wgt_name){
				   // TODO: Widget name validation
				   
				   $this->widget_name = $wgt_name;
			 }
			 
			 public function getWidgetName(){
				  return $this->widget_name;
			 }
			 
			 private function setWidgetDir($path_to_dir){
				  if(file_exists($path_to_dir)){
					  $this->widget_dir = $path_to_dir;
					  $this->widget_front_dir_url = WIDGETS_DIR_URL . DEFAULT_TEMPLATE . "/{$this->getWidgetName()}/front/";
				  }else{
					  throw new \Exception("Widget dir '{$path_to_dir}' doesn't exist!");
				  }
			 }
			 
			 private function setUserLang($lang_code){
				 $this->widget_lang_dir = $this->widget_dir . "lang/$lang_code/";
			     if(file_exists($this->widget_lang_dir)){
                    $this->user_lang = $lang_code;
				 }else{
					 throw new \Exception("Selected language is not available for this widget!");
				 }
			 }
			 
			 private function loadTranslations(){
				   $widget_lang_files = scandir($this->widget_lang_dir);
				   foreach($widget_lang_files as $wgt_fn){
					    if(file_exists($this->widget_lang_dir  . $wgt_fn) && strpos($wgt_fn, '.lang.php') !== false){
							 include_once($this->widget_lang_dir . $wgt_fn);
						}
				   }
				   
				   $this->translations = $wgt_lang;
			 }
			 
			 public function getTranslation($transl_id){
				  if(empty($transl_id)){
					  throw new \Exception('You must provide $transl_id parameter with a value!');
				  }
				  if(empty($this->translations)){
					   throw new \Exception('Translations array is empty! May be the translations are not loaded successfully.');
				  }
				  if(empty($this->translations[$transl_id])){
					   throw new \Exception("Translation with id '$transl_id' doesn't exist!");
				  }
				  
				  return $this->translations[$transl_id];
			 }
			 
			 public function render(){
                   global $dispatcher;
			 
				   $back_index_path = $this->widget_dir . 'back' . DS . 'index.back.php';
				   $front_index_path = $this->widget_dir . 'front' . DS . 'index.phtml';
				   
				   if(file_exists($back_index_path)){
					    include_once($back_index_path);
				   }
				   if(file_exists($front_index_path)){
     				   include_once($front_index_path);
				   }else{
					    throw new \Exception("Widget's index.phtml file is missing!");
				   }				   
			}
			 
	  }
?>