<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");

//Read request

//load parameters

//load controller

class Framework {
	private $requestVars;
	function __construct(){
		// var_dump(SITE_BASE_URL);exit;
		$this->loadRequest();
	}

	public function display(){
		//load controller
		$this->loadController();
	}

	private function loadRequest(){
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
			case 'POST':
				$this->requestVars = $this->readRequest($this->loadParams());
				break;
			default:
				//go to invalid request type error page
				echo "Invalid Request!<br />";
				break;
		}		
	}

	private function readRequest($request){
		return $this->checkRequestForRequiredFields($request) ? $request : false;
	}
	
	
	/**
	* loads 
	*/
	private function loadParams(){
		$request 			= null;
		$getRequestParams 	= $_SERVER['QUERY_STRING'];

		if("" === $getRequestParams){
			//call default controller
			echo "Controller not defined<br />";
			header("Location: index.php?option=site&task=login");
			// return null;	
		}

		//check the GET variables
		parse_str($_SERVER['QUERY_STRING'], $getRequestParams);
		//check the POST variables
		$getRequestParams['post'] = $_POST;
		// var_dump($getRequestParams);exit;		
		// controller option is set, load request type array
		
		return $getRequestParams;
	}

	private function checkRequestForRequiredFields($request){
		if(isset($request['option']) && "" !== $request['option'] && is_string($request['option']) && file_exists(SITE_BASE . "/requests/" . $request['option'] . "Request.php")){
			require_once SITE_BASE . "/requests/" . $request['option'] . "Request.php";
			//because of time constraint can not work on request section
			return true;
		}
		return false;
	}

	private function loadController(){
		$controllerClassName = $this->requestVars['option'] . "Controller";
		$controllerClassName = ucwords($controllerClassName);
		
		$controllerPath = SITE_BASE . "/controllers/" . $controllerClassName . ".php";
		if(!file_exists($controllerPath)){
			echo "controller not found";
			header("Location: index.php?option=site&task=login");
			// return false;			
		}
		require_once $controllerPath;
		$controllerClassName = ucwords($controllerClassName);
		$controller = new $controllerClassName($this->requestVars);
		$task = null;
		// echo "controller found";
		//load controller method
		
		if(!isset($this->requestVars['task']) || "" === $this->requestVars['task'] || !is_string($this->requestVars['task'])) {
			$controller->default();
		}else{
			$task = $this->requestVars['task'];
			$controller->$task();
		}
	}
}