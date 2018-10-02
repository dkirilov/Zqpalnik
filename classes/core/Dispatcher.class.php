<?php

namespace core;

class Dispatcher{
	
	private $page_name = null;
	private $params = null;
	
	public  function run($path){
		  $this->params = explode('/', $path);		  
		  $this->page_name = array_shift($this->params);
		  
		  if(empty($this->page_name)){
			   $this->page_name = DEFAULT_PAGE;
		  }		  
		  
		  \core\Template::render($this->page_name, DEFAULT_TEMPLATE, DEFAULT_LANG);
	}
	
	public function getPageName(){
		   return $this->page_name;
	}
	
	public function getParams(){
		 return $this->params;
	}
	
	public function getParam($param_no){
		 return $this->params[$param_no];
	}
	
}
?>