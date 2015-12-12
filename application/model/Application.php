<?php

namespace Application\Model;

use Application\System\AbstractClass\Model;

class Application extends Model {

	public $application_id;
	public $application_firstname;
	public $application_lastname;
	public $application_pesel;
	public $application_email;
	public $application_phone;
	public $application_offer;
	
	protected $inputFilter;
	
	public function exchangeArray($data)
	{
		$this->application_id = (isset($data['application_id'])) ? $data['application_id'] : null;
		$this->application_firstname = (isset($data['application_firstname'])) ? $data['application_firstname'] : null;
		$this->application_lastname = (isset($data['application_lastname'])) ? $data['application_lastname'] : null;
		$this->application_pesel = (isset($data['application_pesel'])) ? $data['application_pesel'] : null;
		$this->application_email = (isset($data['application_email'])) ? $data['application_email'] : null;
		$this->application_phone = (isset($data['application_phone'])) ? $data['application_phone'] : null;
		$this->application_offer = (isset($data['application_offer'])) ? $data['application_offer'] : null;
	}
	
	public function getArray()
	{
		return get_object_vars($this);
	}
	
	public function setInputFilter()
	{
		$this->inputFilter = array(
			'application_pesel' => array(
				'method' => 'validPESEL',
				'result' => false,
			),
		);
	}
	
	protected function validPESEL($pesel) {
		if(!preg_match('/^[0-9]{11}$/', $pesel))
			return false;

		$arrSteps = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
		$intSum = 0;
		
		for ($i = 0; $i < 10; $i ++)
			$intSum += $arrSteps[$i] * $pesel[$i];
			
		$int = 10 - $intSum % 10;
		$intControlNr = ($int == 10) ? 0 : $int;
		
		if($intControlNr == $pesel[10])
			return true;
		
		return false;
	}
	
}