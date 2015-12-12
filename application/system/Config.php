<?php

namespace Application\System;

class Config 
{
	protected static $fullConfig;
	protected static $router;
	protected static $navigation;
	protected static $db;
	
	public function __construct()
	{
		self::$fullConfig = include($_SERVER['DOCUMENT_ROOT'] . '/../application/config/application-config.php');
		self::$router = (isset(self::$fullConfig['router'])) ? self::$fullConfig['router'] : array();
		self::$navigation = (isset(self::$fullConfig['navigation'])) ? self::$fullConfig['navigation'] : array();
		self::$db = (isset(self::$fullConfig['db'])) ? self::$fullConfig['db'] : array();
	}
	
	// pobranie konfiguracji routera
	public static function getRouterConfig()
	{
		return self::$router;
	}
	
	// pobranie konfiguracji nawigacji
	public static function getNavigationConfig()
	{
		return self::$navigation;
	}
	
	// pobranie konfiguracji bazy danych
	public static function getDbConfig()
	{
		return self::$db;
	}
}