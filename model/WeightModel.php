<?php

class WeightModel extends UnitModel{
	
	private $weightUnits = array(
		"Grams" => 1, 
		"Kilograms" => 0.001, 
		"Tonne" => 0.000001, 
		"Stone" => 0.000157473, 
		"Pound" => 0.00220462, 
		"Ounce" => 0.0352739200000000003
		);

	public function __construct(){

		parent::setUnits($this->weightUnits);
	}

}