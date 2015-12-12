<?php

namespace Application\Model;

use Application\System\AbstractClass\Model;

class Offer extends Model {

	public $offer_id;
	public $offer_url;
	public $offer_bank;
	public $offer_name;
	public $offer_description;
	public $offer_interest;
	public $offer_commission;
	public $offer_max_credit_amount;
	public $offer_max_credit_time;
	public $offer_monthly_fee_for_account;
	public $offer_preparation_fee;
	
}