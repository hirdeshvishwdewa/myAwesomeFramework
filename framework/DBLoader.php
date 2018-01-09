<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");
require_once SITE_BASE . "/configs/dbConfig.php";
class DBLoader {
	protected $pdo;
	function __construct(){
		$dsn = "mysql:host=" . db_host . ";dbname=" . db_name . ";charset=" . db_charset;
		$opt = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$this->pdo = new PDO($dsn, db_user, db_pswd, $opt);
	}
}