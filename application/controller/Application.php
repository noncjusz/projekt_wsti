<?php

namespace Application\Controller;

use Application\System\AbstractClass\Controller;

class Application extends Controller
{
	protected $applicationDb;
	protected $offerDb;
	
	public function formAction()
	{
		$offerId = $this->getParam('offer_id');
		$offer = $this->getTable('\Application\Model\OfferDb')->get($offerId);
		
		if(!$offer)
			return false;
			
		$valid = true;
		
		if(!empty($_POST)) {
			$application = new \Application\Model\Application();
			$application->exchangeArray($_POST);
			$application->setInputFilter($_POST);
			$application->getInputFilter();
			
			if($application->isValid()) {
				$this->getTable('\Application\Model\ApplicationDb')->insert($application->getArray());
				header('Location: /wniosek/' . $offerId . ',wyslano');
				exit();
			} else
				$valid = false;
		}
			
		return array(
			'offer' => $offer,
			'valid' => $valid,
		);
	}
	
	public function sentAction()
	{	
		return array(
		);
	}
	
}