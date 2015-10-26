<?php

class TemperatureModel extends UnitModel{
	
	private $temperatureUnits = array(
		"Celsius" => 1, 
		"Farenheit" => 33.8, 
		"Kelvin" => 274.15, 
		"Rankine" => 493.47, 
		"Réaumure" => 0.7999999999999987
		);

	public function __construct(){

		parent::setUnits($this->temperatureUnits);
	}

}