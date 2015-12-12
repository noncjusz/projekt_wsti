<?php

namespace Application\System\AbstractClass;

abstract class Model
{
	protected $notValid = array();
	
	public function getInputFilter()
	{
		if(isset($this->inputFilter)) {
			foreach($this->inputFilter as $key => $item) {
				if(isset($this->$key)) {
					$methodName = $item['method'];
					$this->inputFilter[$key]['result'] = $this->$methodName($this->$key);
				}
			}
		
			return $this->inputFilter;
		}
		
		return false;
	}
	
	public function isValid()
	{
		if(isset($this->inputFilter)) {
			foreach($this->inputFilter as $key => $item) {
				if(!$item['result'])
					$this->notValid[] = $key;
			}
			
			if(!empty($this->notValid))
				return false;
		}
		
		return true;
	}
	
	public function getNotValid()
	{
		return $this->notValid;
	}
	
}