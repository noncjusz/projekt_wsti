<?php

namespace Application\Controller;

use Application\System\AbstractClass\Controller;

class Ranking extends Controller
{
	protected $offerDb;
	
	public function rankingAction()
	{	
		$offers = $this->getTable('\Application\Model\OfferDb')->fetchAll();
	
		return array(
			'offers' => $offers,
		);
	}
	
}