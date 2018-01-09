<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");
require_once SITE_BASE . "/framework/AuthenticationClass.php";

class ViewLoader extends AuthenticationClass {
	public $requestVars;
	public $viewData;
	function __construct(){
		parent::__construct();
	}

	protected function loadView($request, $data = null){
		//load header, left and right panels
		$this->requestVars 	= $request;
		$this->viewData 	= $data;
		
		$this->loadHeader();
		$this->loadSideBar();
		$this->loadContent($request, $data);
		$this->loadFooter();
	}

	public function loadLogin(){
		require_once SITE_BASE . "/views/templates/login.php";
	}

	private function loadHeader(){
		//
		require_once SITE_BASE . "/views/templates/header.php";
	}

	private function loadSideBar(){
		//
		require_once SITE_BASE . "/views/templates/sidebar.php";
	}
	
	private function loadFooter(){
		//
		require_once SITE_BASE . "/views/templates/footer.php";
	}
	
	private function loadContent($request, $data = null){
		require_once SITE_BASE . "/views/" . $request['option'] . "/" . $request['task'] .".php";
	}
	protected function redirect($option = "site", $task = "login", $id = null){
		header("Location:" . SITE_BASE_URL . "/index.php?option=" . $option . "&task=" . $task . (null !== $id ? "&id=" . $id : ""));
	}
}