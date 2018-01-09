<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");
require_once SITE_BASE . "/framework/ViewLoader.php";

class UsersController extends ViewLoader{
	public $requestVars;
	function __construct($request){
		$this->requestVars = $request;
		parent::__construct();
		if(!$this->checkAuthentication()){
			$this->redirect();
		}
	}

	public function index(){
		$this->loadView($this->requestVars);
	}

	public function create(){
		require_once SITE_BASE . "/models/usersModel.php";
		$user  	= new UsersModel();
		$post 	= $this->requestVars['post'];
		if("" === $post['name'] || "" === $post['email'] || "" === $post['pswd']){
			$this->redirect('users', 'index');
		}
		$data[] = $post['name'];
		$data[] = $post['email'];
		$data[] = $post['pswd'];
		$user->addUser($data);
		$this->redirect('users', 'index');
	}
	
	public function edit(){
		require_once SITE_BASE . "/models/usersModel.php";
		$user  	= new UsersModel();
		$id 	= $this->requestVars['id'];
		$post 	= $this->requestVars['post'];
		if(!isset($post)){
			$this->redirect('users', 'index');
		}

		$data['id']		 		= $id;
		$data['user_name'] 		= $post['name'];
		$data['user_email'] 	= $post['email'];
		$data['user_password'] 	= $post['pswd'];
		
		$user->updateUser($data);
		$this->redirect('users', 'index');
	}

	public function remove(){
		require_once SITE_BASE . "/models/usersModel.php";
		$user  	= new UsersModel();
		$id 	= $this->requestVars['id'];
		if(!isset($post)){
			$this->redirect('users', 'index');
		}
		$user->deleteUser($data);
		$this->redirect('users', 'index');
	}



}