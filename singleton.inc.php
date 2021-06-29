<?php
require_once("conexion.inc.php");


class Database() {
	private $_connection;
	private static $_instance;
	private $_server = $servidor;
	private $_user = $user;
	private $_password = $pass;
	private $_database = $db;
	
	public static function getInstance() {
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	private function _construct() {
		this->$_connection = new mysqli(this->_server, this->$_user, this->$_password, this->$_database);
		
		if (mysqli_connect_errno()) {
			trigger_error("Error al conectar a la base de datos");
		}
	}
	
	public function getQuery($sql) {
		$result = this->$_connection->query($sql);
		return $result->fetch_array();
	}
}


?>