<?php
/**
* Model class for Angle units
* @author Mirza Durakovic
*/
class AngleModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $angleUnits = array(
		"degree" => 1, 
		"radian" => 0.0174533, 
		"gradian" => 1.111111606261876, 
		"turn" => 0.00278	
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->angleUnits);
	}

}