<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");

require_once SITE_BASE . "/framework/ModelLoader.php";

class BlogsModel extends ModelLoader{
	private $model;
	function __construct(){
		$this->model = "blogs";
		parent::__construct($this->model);
	}

	public function listBlogs(){
		return $this->getAllEntities();
	}
	
	public function getBlog($id){
		return $this->getEntityById($id);
	}

	public function addBlog($data){
		return $this->pdo->prepare("INSERT INTO " . $this->model . "(`added_by`, `blog_name`, `blog_content`) VALUES (?,?,?)")->execute($data) ? $this->pdo->lastInsertId():null;
	}
	
	public function updateBlog($data){
		return $this->pdo->prepare("UPDATE " . $this->model . " SET `blog_name` = ?, `blog_content` = ? WHERE id=?")->execute($data);
	}
	
	public function removeBlog($id){
		return $this->deleteEntity($id);
	}
	
	public function totalBlogs(){
		return $this->totalEntity();
	}
}