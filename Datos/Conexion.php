<?php 
	class Conexion {
		public function conectar(){
			$host		= "localhost";
			//$dbname 	= "id9900614_db_condominio";
			$dbname 	= "db_condominio";
			//$usuario 	= "id9900614_alex";
			$usuario 	= "root";
			$password	= "123456";
			$password	= "";

			$link = new PDO("mysql:host=$host;dbname=$dbname",$usuario,$password);
			return $link;
		}
	}