<?php
/**
* Model class for Units which takes the units and calculates
* the result to whatever view class asked for it
* @author Mirza Durakovic
*/
class UnitModel{

	/**
	* The result gotten from calculations
	* @var float
	*/
	private $result;
	
	/**
	* The array of required convert units
	* @var array
	*/
	private $unit = array();

	/**
	* Sets the required convert units
	* @param array $unit 
	*/
	public function setUnits($unit){

		$this->unit = $unit;
	}
	
	/**
	* Calculates different combinations of chosen from and to units
	* The method cycles through 2 foreach loops finding the selected from and to units,
	* assigns the values to variables and calculates the result
	* @param Integer $enteredValue
	* @param String $fromConvet
	* @param String $toConvert
	* @param Array $unit
	* @return Integer $result
	*/
	public function result($enteredValue, $fromConvert, $toConvert, $unit){
		if(!is_numeric($enteredValue) && $enteredValue != null)
			throw new InvalidArgumentException("Invalid input");
		$val1 = null;
		foreach($unit as $key => $value){
			if($key == $fromConvert){
				$val1 = $value;	
			}
		}			
		$val2 = null;
		foreach($unit as $key => $value){
			if($key == $toConvert){
				$val2 = $value;	
			}
		}
		if($val1 != 0){
			$this->result = number_format((($enteredValue * $val2) / $val1), 2, '.', '');
			return (float)$this->result;
		}
		else return $this->result;
	}

	/**
	* Gets the required convert units
	*/
	public function getUnits(){
		return $this->unit;
	}
}