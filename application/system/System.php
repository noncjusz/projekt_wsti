<?php

namespace Application\System;

use Application\System\Router;

class System 
{
	protected $config;
	protected $router;
	protected $controller;
	protected $action;
	
	public function __construct()
	{
		$this->config = new Config();
		$this->router = new Router();
		
		$this->router->parseUri();
		
		$this->setController();
		$this->setAction();		
		
		$controller = new $this->controller();
		$action = $this->action . 'Action';
		$dataToView = $controller->$action();
		
		// jeżeli dane do widoku mają wartość fałsz i nie są tablicą, to następuje wywołanie błędu 404
		if(!$dataToView && !is_array($dataToView))
			$dataToView = $this->callError('404');
		
		$this->view = new View($this->controller, $this->action);
		$this->view->setViewFile($dataToView);
	}
	
	// ustawienie kontrolera
	public function setController($controller = false)
	{
		$this->controller = (!$controller) ? $this->router->getController() : $controller;
	}
	
	// ustawienie akcji
	public function setAction($action = false)
	{
		$this->action = (!$action) ? $this->router->getAction() : $action;
	}
	
	// wywołanie błędu 404
	public function callError($type = 'System')
	{
		$this->setController('Application\Controller\Error');
		$this->setAction('error' . $type);	
		
		$controller = new $this->controller();
		$action = $this->action . 'Action';
		return $controller->$action();
	}
}