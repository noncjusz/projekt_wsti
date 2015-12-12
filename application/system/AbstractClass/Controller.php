<?php

namespace Application\System\AbstractClass;

use Application\System\Router;

abstract class Controller
{

	protected function getTable($table)
	{
		$field = explode('\\', $table);
		$field = lcfirst(end($field));
		
		if(!$this->$field)
			$this->$field = new $table();
			
		return $this->$field;
	}
	
	protected function getParam($param = false)
	{
		if(!$param)
			return false;
	
		$router = new Router();
		$current = $router->getCurrentUriFromConfig();
		$currentUriPattern = preg_replace('/[\?)\(?]/', '', $current['uri']);
		$currentUriPattern = preg_split('/(\/|,)/', substr($currentUriPattern, 1));
		$currentUri = $router->getUri();
		$currentUri = preg_split('/(\/|,)/', substr($currentUri, 1));
		
		$value = false;
		foreach($currentUriPattern as $i => $part) {
			if(strpos($part, ':') === false)
				continue;
					
			if($part == ':' . $param) {
				$value = ($currentUri[$i] && isset($currentUri[$i])) ? $currentUri[$i] : false;
				break;
			}
		}
		
		return $value;
	}
	
}