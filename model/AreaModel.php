<?php

class AreaModel extends UnitModel{
	
	private $areaUnits = array(
		"Square meter" => 1, 
		"Square kilometer" => 0.000001, 
		"Square mile" => 0.0000003861, 
		"Square yard" => 1.19599, 
		"Square foot" => 10.7639, 
		"Square inch" => 1550, 
		"Hectar" => 0.0001, 
		"Acre" => 0.000247105
		);

	public function __construct(){

		parent::setUnits($this->areaUnits);
	}

}