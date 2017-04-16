<?php

class DB
{
	public static function get_connection()
	{
		$path = ROOT . '/config/db.php';
		$params = include($path);

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$user = $params['user'];
		$password = $params['password'];

		$db = new PDO($dsn, $user, $password);
		$db->exec('set names utf8');
		
		return $db;
	}
}