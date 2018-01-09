<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");
require_once SITE_BASE . "/framework/ViewLoader.php";

class SiteController extends ViewLoader{
	public $requestVars;
	function __construct($request){
		$this->requestVars = $request;
		parent::__construct();
	}

	public function login(){
		$this->loadLogin($this->requestVars);
	}
	public function index(){
		if(!$this->checkAuthentication()){
			$this->redirect();
		}
		$this->loadView($this->requestVars);
	}

	public function authenticate(){
		// var_dump("expression");exit;
		require_once SITE_BASE . "/models/usersModel.php";
		$user  	= new UsersModel();
		$post 	= $this->requestVars['post'];
		if("" === $post['email'] || "" === $post['passwd']){
			$this->redirect();
		}
		if($user->authenticate($post['email'], $post['passwd']))
			$this->redirect('site', 'index');
		else
			$this->redirect('site', 'login');
	}

	public function logout(){
		session_destroy();
		session_unset();
		$this->redirect('site', 'login');	
	}

}