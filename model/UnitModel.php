<?php

class UnitModel{

	private $result;
	private $unit = array();

	public function setUnits($unit){

		$this->unit = $unit;

	}
	
	/**
	* Calculates different combinations of chosen units
	* @param Integer $enteredValue
	* @param String $fromConvet
	* @param String $toConvert
	* @param Array $unit
	* @return Integer 
	*/
	public function result($enteredValue, $fromConvert, $toConvert, $unit){
		if(!is_numeric($enteredValue) && $enteredValue != null){
			throw new InvalidArgumentException("Invalid input");
		}
		$val1 = null;
		foreach($unit as $key => $value)
			{
				if($key == $fromConvert){
					$val1 = $value;	
				}
			}
			
		$val2 = null;
		foreach($unit as $key => $value)
			{
				if($key == $toConvert){
					$val2 = $value;	
				}
			}

		if($val1 != 0){
			$this->result = number_format((($enteredValue * $val2) / $val1), 2, '.', '');
			return (float)$this->result;
		}
		else 
			return $this->result;
	}

	/**
	* Calculates different combinations of chosen units
	* @param Integer $enteredValue
	* @param String $fromConvet
	* @param String $toConvert
	* @return Integer 
	*/
	public function currencyResult($enteredValue, $fromConvert, $toConvert){
			if(!is_numeric($enteredValue) && $enteredValue != null){
				throw new InvalidArgumentException("Invalid input");
			}
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
			else 
				return $this->result;
				
	}

	public function getUnits(){
		return $this->unit;
	}

}