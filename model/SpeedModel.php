<?php
/**
* Model class for Speed units
* @author Mirza Durakovic
*/
class SpeedModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $speedUnits = array(
		"meters/second" => 1, 
		"kilometers/hour" => 3.6, 
		"miles/hour" => 2.23694, 
		"feet/second" => 3.28084, 
		"knots" => 1.94384
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->speedUnits);
	}

}