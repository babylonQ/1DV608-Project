<?php

class VolumeModel extends UnitModel{
	
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



	public function __construct(){

		parent::setUnits($this->volumeUnits);
	}

}