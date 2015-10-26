<?php

class LengthModel extends UnitModel{
	
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

	public function __construct(){

		parent::setUnits($this->lengthUnits);
	}

}