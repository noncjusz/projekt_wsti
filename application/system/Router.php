<?php

namespace Application\System;

use Application\System\Config;

class Router 
{
	protected $uri;
	protected $routerConfig;
	
	protected $controller;
	protected $action;
	
	public function __construct()
	{
		$this->routerConfig = Config::getRouterConfig();
		$this->setUri();
	}
	
	// ustawienie URI
	public function setUri()
	{
		$this->uri = $_SERVER['REQUEST_URI'];
	}
	
	// pobranie URI
	public function getUri()
	{
		return $this->uri;
	}
	
	// analizowanie URI i ustawienie kontrolera i akcji do późniejszego wywołania
	public function parseUri()
	{	
		$current = $this->getCurrentUriFromConfig();
		
		$this->controller = ($current) ? $current['options']['controller'] : 'Application\Controller\Error';
		$this->action = ($current) ? $current['options']['action'] : 'error404';
	}
	
	// pobranie informacji o aktualnym URI z konfiguracji
	public function getCurrentUriFromConfig()
	{
		foreach($this->routerConfig as $item) {			
			$result = $this->matchUri($item);
			
			if($result)
				return $result;
		}
			
		return false;
	}
	
	private function matchUri($item) 
	{
		if($item['type'] == 'literal') {
			if($item['uri'] == $this->uri)
				return $item;
		} elseif($item['type'] == 'segment') {
			$pattern = $item['uri'];
			
			foreach($item['variables'] as $variable => $reg)
				$pattern = str_replace(':' . $variable, $reg, $pattern);
		
			$pattern = str_replace('/', '\/', $pattern);
			$pattern = '/^' . $pattern . '$/';
			
			if(preg_match($pattern, $this->uri))
				return $item;
		}
	}
	
	// pobranie kontrolera
	public function getController()
	{
		return (isset($this->controller)) ? $this->controller : false;
	}
	
	// pobranie akcji
	public function getAction()
	{
		return (isset($this->action)) ? $this->action : false;
	}
}