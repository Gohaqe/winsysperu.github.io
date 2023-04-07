<?php

class Conexion{

	static public function conectar(){

		$host = 'containers-us-west-34.railway.app';
		$port = '6206';
		$db   = 'railway';
		$user = 'root';
		$pass = 'Eih2YULlJwL4OLsUIUVa';
		$charset = 'utf8mb4';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
		try {
   		 	$pdo = new \PDO($dsn, $user, $pass);
			} catch (\PDOException $e) {
    		throw new \PDOException($e->getMessage(), (int)$e->getCode());
			}

	}

}


