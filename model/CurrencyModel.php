<?php
/**
* Model class for Currency units
* Contains a method where it fetches
* different units and calculates the result
* @author Mirza Durakovic
*/
class CurrencyModel extends UnitModel{
	
	/**
	* The result gotten from calculations
	* @var float
	*/
	private $result;

	/**
	* List of different convert units and
	* @var array
	*/
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
	
	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->currencyUnits);
	}

	/**
	* Calculates wanted combination of chosen units
	* @param Integer $enteredValue
	* @param String $fromConvet
	* @param String $toConvert
	* @return Integer 
	*/
	public function currencyResult($enteredValue, $fromConvert, $toConvert){
		if(!is_numeric($enteredValue) && $enteredValue != null)
			throw new InvalidArgumentException("Invalid input");
		
		$url = 'http://finance.yahoo.com/d/quotes.csv?f=l1d1t1&s='.$fromConvert.$toConvert.'=X';
		$handle = fopen($url, 'r');
 
		if ($handle) {
    		$fetch = fgetcsv($handle);	
   			 fclose($handle);
		}
		
		if($enteredValue != 0){
			$this->result = number_format(($enteredValue * $fetch[0]), 3, '.', '');
			return (float)$this->result;
		}
		else return $this->result;			
	}
}