<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");

require_once SITE_BASE . "/framework/DBLoader.php";

class ModelLoader extends DBLoader{
	private $model;
	function __construct($model){
		$this->model = $model;
		parent::__construct();
	}

	public function getEntityById($id){
		$stmt = $this->pdo->prepare('SELECT * FROM `' . $this->model . '` WHERE id = ?');
		$stmt->execute([$id]);
		return $stmt->fetch();
	}

	public function getAllEntities(){
		$query = 'SELECT * FROM `' . $this->model . '` WHERE 1';
		$stmt = $this->pdo->query($query);
		$data = null;
		while ($row = $stmt->fetch()){
		    $data[$row['id']] = $row;
		}
		return $data;
	}

	public function deleteEntity($id){
		$stmt = $this->pdo->prepare("DELETE FROM " . $this->model . " WHERE id = ?");
		$stmt->execute([$id]);
		return $stmt->rowCount();
	}

	public function totalEntity(){
		return $this->pdo->query("SELECT count(*) FROM " . $this->model)->fetchColumn();
	}
}