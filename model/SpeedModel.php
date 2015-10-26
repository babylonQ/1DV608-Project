<?php

class SpeedModel extends UnitModel{
	
	private $speedUnits = array(
		"meters/second" => 1, 
		"kilometers/hour" => 3.6, 
		"miles/hour" => 2.23694, 
		"feet/second" => 3.28084, 
		"knots" => 1.94384
		);

	public function __construct(){

		parent::setUnits($this->speedUnits);
	}

}