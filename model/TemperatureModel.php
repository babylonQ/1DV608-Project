<?php
/**
* Model class for Temperature units
* @author Mirza Durakovic
*/
class TemperatureModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $temperatureUnits = array(
		"Celsius" => 1, 
		"Farenheit" => 33.8, 
		"Kelvin" => 274.15, 
		"Rankine" => 493.47, 
		"Réaumure" => 0.7999999999999987
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->temperatureUnits);
	}

}