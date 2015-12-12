<?php

namespace Application\System;

class View 
{	
	protected $controllerName;
	protected $actionName;

	protected $viewFile;

	public function __construct($controllerName, $actionName)
	{
		$this->controllerName = (isset($controllerName)) ? $controllerName : false;
		$this->actionName = (isset($actionName)) ? $actionName : false;
	}
	
	// sprawdzenie czy istnieje plik widoku
	public function existsViewFile()
	{
		$this->viewFile = $_SERVER['DOCUMENT_ROOT'] . '/../application/view/' . str_replace('application\controller\\', '', strtolower($this->controllerName)) . '/' . str_replace('action', '', strtolower(preg_replace('/[A-Z]/', '-$0', $this->actionName))) . '.phtml';
		
		if(file_exists($this->viewFile))
			return true;
		
		return false;
	}
	
	// ustawienie pliku widoku
	public function setViewFile($dataToView = array())
	{
		if(!$this->existsViewFile())
			return false;
	
		if(!empty($dataToView))
			foreach($dataToView as $varName => $varValue)
				${$varName} = $varValue;
		
		$content = $this->viewFile;
		
		return include_once($_SERVER['DOCUMENT_ROOT'] . '/../application/view/layout.phtml');
	}
}