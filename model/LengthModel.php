<?php
/**
* Model class for Length units
* @author Mirza Durakovic
*/
class LengthModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $lengthUnits = array(
		"milimeters" => 1000, 
		"centimeters" => 100, 
		"meters" => 1, 
		"kilometers" => 0.001, 
		"yards" => 3.28084, 
		"inches" => 39.3701, 
		"foot" => 0.9144, 
		"miles" => 0.000621371
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->lengthUnits);
	}

}