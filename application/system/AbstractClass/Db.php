<?php

namespace Application\System\AbstractClass;

use Application\System\Config;

abstract class Db 
{	
	protected $db;
	
	public function __construct()
	{
		$config = new Config();
		$config = $config->getDbConfig();
		
		try {
			$this->db = new \PDO('mysql:host=' . $config['connection']['host'] . ';dbname=' . $config['connection']['db'], $config['connection']['user'], $config['connection']['password']);
		} catch (PDOException $e) {
			echo $e->getMessage();
			die();
		}
	}
}