<?php
	class Conexion extends PDO {
		private $hostin = 'localhost';
		private $nombre = 'academico_edwintmz';
		private $usuari = 'root';
		private $paswor = '';
		
		public function __construct(){
			try{
				parent::__construct('mysql:host=' . $this->hostin . ';dbname=' . $this->nombre . ';charset=utf8', $this->usuari, $this->paswor, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			} catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
				exit;
			}
		}
	}
?>