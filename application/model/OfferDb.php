<?php

namespace Application\Model;

use Application\System\AbstractClass\Db;

class OfferDb extends Db {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function fetchAll()
	{
		$stmt = $this->db->prepare('SELECT * FROM offer');
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Application\Model\Offer');
	}
	
	public function get($id = false)
	{
		if(!$id)
			return false;
			
		$stmt = $this->db->prepare("SELECT * FROM offer WHERE offer_id = ?");
		$stmt->execute(array($id));
		$row = $stmt->fetchObject('\Application\Model\Offer');
		
		if(empty($row))
			return false;
			
		return $row;
	}
	
}