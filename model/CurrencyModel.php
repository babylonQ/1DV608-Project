<?php

class CurrencyModel extends UnitModel{
	
	private $currencyUnits = array(
		"BAM", 
		"BGN", 
		"BYR", 
		"CAD", 
		"CZK", 
		"DZD", 
		"EGP", 
		"EUR", 
		"GBP", 
		"HRK", 
		"KPW", 
		"LBP", 
		"MKD", 
		"MXN", 
		"NOK", 
		"SEK", 
		"USD"
		);
	

	public function __construct(){

		parent::setUnits($this->currencyUnits);
	}

}