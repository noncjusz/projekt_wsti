<?php

namespace Application\Model;

use Application\System\AbstractClass\Db;

class ApplicationDb extends Db {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function fetchAll()
	{
		$stmt = $this->db->prepare('SELECT * FROM application');
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Application\Model\Application');
	}
	
	public function get($id = false)
	{
		if(!$id)
			return false;
			
		$stmt = $this->db->prepare("SELECT * FROM application WHERE application_id = ?");
		$stmt->execute(array($id));
		$row = $stmt->fetchObject('\Application\Model\Application');
		
		if(empty($row))
			return false;
			
		return $row;
	}
	
	public function insert($application)
	{
		$stmt = $this->db->prepare("INSERT INTO application (application_id, application_firstname, application_lastname, application_pesel, application_email, application_phone, application_offer) VALUES (:application_id, :application_firstname, :application_lastname, :application_pesel, :application_email, :application_phone, :application_offer)");
		$stmt->bindParam(':application_id', $application['application_id']);
		$stmt->bindParam(':application_firstname', $application['application_firstname']);
		$stmt->bindParam(':application_lastname', $application['application_lastname']);
		$stmt->bindParam(':application_pesel', $application['application_pesel']);
		$stmt->bindParam(':application_email', $application['application_email']);
		$stmt->bindParam(':application_phone', $application['application_phone']);
		$stmt->bindParam(':application_offer', $application['application_offer']);

		$stmt->execute();
		
		return $this->db->lastInsertId();
	}
	
}