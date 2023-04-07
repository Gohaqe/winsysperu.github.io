<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=containers-us-west-195.railway.app;port=6715;dbname=railway",
			            "root",
			            "W9I6LAfoNObqooBCjZUh");

		$link->exec("set names utf8");

		return $link;

	}

}