<?php
/**
* Model class for Area units
* @author Mirza Durakovic
*/
class AreaModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
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

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->areaUnits);
	}

}