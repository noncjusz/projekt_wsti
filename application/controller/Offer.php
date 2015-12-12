<?php

namespace Application\Controller;

use Application\System\AbstractClass\Controller;

class Offer extends Controller
{
	protected $offerDb;
	
	public function offerAction()
	{
		$offerId = $this->getParam('offer_id');
		$offer = $this->getTable('\Application\Model\OfferDb')->get($offerId);
		
		if(!$offer)
			return false;
			
		return array(
			'offer' => $offer,
		);
	}
	
}