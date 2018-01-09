<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");

class AuthenticationClass {
	public function __construct(){

	}

	public function checkAuthentication(){
		session_start();
		return isset($_SESSION['user_loggedin']);
	}
	
}