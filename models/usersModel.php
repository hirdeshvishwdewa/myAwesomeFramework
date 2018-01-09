<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");

require_once SITE_BASE . "/framework/ModelLoader.php";

class UsersModel extends ModelLoader{
	private $model;
	function __construct(){
		$this->model = "users";
		parent::__construct($this->model);
	}

	public function listUsers(){
		return $this->getAllEntities();
	}

	public function addUser($data){
		return $this->pdo->prepare("INSERT INTO " . $this->model . "(`user_name`, `user_email`, `user_password`) VALUES (?,?,MD5(?))")->execute($data);
	}
	
	public function updateUser($data){
		return $this->pdo->prepare("INSERT INTO " . $this->model . "(`user_name`, `user_email`, `user_password`) VALUES (?,?,MD5(?))")->execute($data);
	}
	
	public function removeUser($id){
		return $this->deleteEntity($id);
	}

	public function totalUsers(){
		return $this->totalEntity();
	}
	
	public function authenticate($email, $passwd){
		try{
			$md5_password= md5($passwd); //Password encryption
			$stmt = $this->pdo->prepare("SELECT id FROM users WHERE user_email=:userEmail AND user_password=:hashPasswd"); 
			$stmt->bindParam("userEmail", $email,PDO::PARAM_STR) ;
			$stmt->bindParam("hashPasswd", $md5_password,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			// var_dump($count);exit;
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			if($count){
				session_start();
				$_SESSION['user_loggedin']=$data->id;
				return true;
			}else{
				return false;
			} 
		}
		catch(PDOException $e) {
			return false;
		}
	}
}