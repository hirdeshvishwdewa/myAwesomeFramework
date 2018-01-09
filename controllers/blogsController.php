<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");
require_once SITE_BASE . "/framework/ViewLoader.php";

class BlogsController extends ViewLoader{
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
		$this->loadView($this->requestVars);
	}
	
	public function submit(){
		require_once SITE_BASE . "/models/blogsModel.php";
		$blog  	= new BlogsModel();
		$post 	= $this->requestVars['post'];
		// var_dump($post);exit;
		if("" === $post['title'] || "" === $post['content']){
			$this->redirect('blogs', 'index');
			var_dump("expression");exit;
		}

		$data[] = 1;
		$data[] = $post['title'];
		$data[] = $post['content'];
		$id = $blog->addBlog($data);
		if(null !== $id)
			$this->redirect('blogs', 'view', $id);
		else
			$this->redirect('blogs', 'index');
	}
	
	public function edit(){
		require_once SITE_BASE . "/models/blogsModel.php";
		$blog  	= new BlogsModel();
		$id 	= $this->requestVars['id'];
		$this->loadView($this->requestVars, $blog->getBlog($id));
	}

	public function update(){
		require_once SITE_BASE . "/models/blogsModel.php";
		$blog  	= new BlogsModel();
		$id 	= $this->requestVars['id'];
		$post 	= $this->requestVars['post'];
		if(!isset($post)){
			$this->redirect('blogs', 'index');
		}

		$data[]	= $post['title'];
		$data[]	= $post['content'];
		$data[] = $id;
		
		if($blog->updateBlog($data))
			$this->redirect('blogs', 'view', $id);
		else
			$this->redirect('blogs', 'index');
	}

	public function view(){
		require_once SITE_BASE . "/models/blogsModel.php";
		$blog  	= new BlogsModel();
		$id 	= $this->requestVars['id'];
		$this->loadView($this->requestVars, $blog->getBlog($id));
	}	

	public function remove(){
		require_once SITE_BASE . "/models/blogsModel.php";
		$blog  	= new BlogsModel();
		$id 	= $this->requestVars['id'];
		$blog->removeBlog($id);
		$this->redirect('blogs', 'index');
	}

}