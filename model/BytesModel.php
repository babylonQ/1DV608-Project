<?php
/**
* Model class for Angle units
* @author Mirza Durakovic
*/
class BytesModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $bytesUnits = array(
		"bits" => 1, 
		"bytes" => 0.125, 
		"kilobytes" => 0.000125, 
		"megabytes" => 0.000000125,
		"gigabytes" => 0.000000000125,
		"terrabytes" => 0.000000000000125,
		"petabytes" => 0.00000000000000125	
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->bytesUnits);
	}

}