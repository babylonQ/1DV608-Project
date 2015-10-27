<?php
/**
* Model class for Mass units
* @author Mirza Durakovic
*/
class MassModel extends UnitModel{
	
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $massUnits = array(
		"Grams" => 1, 
		"Kilograms" => 0.001, 
		"Tonne" => 0.000001, 
		"Stone" => 0.000157473, 
		"Pound" => 0.00220462, 
		"Ounce" => 0.0352739200000000003
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->massUnits);
	}

}