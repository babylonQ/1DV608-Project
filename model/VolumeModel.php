<?php
/**
* Model class for Volume units
* @author Mirza Durakovic
*/
class VolumeModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $volumeUnits = array(
		"mililiter" => 1000, 
		"centiliter" => 100, 
		"kiloliter" => 0.0001, 
		"liter" => 1, 
		//imperial
		"fluid ounce" => 35.19506520,
		"gallon" => 0.21996905,
		"pint" => 1.75975326,
		"quart" => 0.87987700
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->volumeUnits);
	}

}