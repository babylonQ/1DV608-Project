<?php
/**
* Model class for Time units
* @author Mirza Durakovic
*/
class TimeModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $areaUnits = array(
		"nanosecond" => 1000000000, 
		"microsecond" => 1000000, 
		"milisecond" => 1000, 
		"second" => 1, 
		"minute" => 0.0166667, 
		"hour" => 0.000277778, 
		"day" => 0.000011574,
		"week" => 0.0000016534, 
		"month" => 0.000000380517,
		"year" => 0.00000003171,
		"Lunar day" => 0.0000004236225489, 
		"Martian day" => 0.0000112644071768
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->areaUnits);
	}

}