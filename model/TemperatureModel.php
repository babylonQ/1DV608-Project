<?php
/**
* Model class for Temperature units
* @author Mirza Durakovic
*/
class TemperatureModel extends UnitModel{
	
	private $result;
	/**
	* List of different convert units and
	* their relation to the base unit which
	* has a value of 1
	* @var array
	*/
	private $temperatureUnits = array(
		"Celsius",
		"Farenheit", 
		"Kelvin"	
		);

	/**
	* Constructor that passes these specific units
	* to the setUnits method in the UnitModel class
	*/
	public function __construct(){

		parent::setUnits($this->temperatureUnits);
	}

	/**
	* Method that must be done better with some loop or similar,
	* but no time atm.
	* It checks what options from the drop down menu are chosen and asks for 
	* result calculation based on that 
	* HTML string of all the units
	* @param integer $enteredValue
	* @param string from array $fromConvert
	* @param string from array $toConvert
	* @return float $result
	*/
	public function resultTemp($enteredValue, $fromConvert, $toConvert){
		if(!is_numeric($enteredValue) && $enteredValue != null)
			throw new InvalidArgumentException("Invalid input");
		
		if($enteredValue != 0){
			//Celsius to... 
			if($fromConvert == $this->temperatureUnits[0]){
				//Celsius
				if($toConvert == $this->temperatureUnits[0]){
					$this->result = $enteredValue;
					return (float)$this->result;
				}
				//Farenheit
				else if($toConvert == $this->temperatureUnits[1]){
					$this->result = $this->getCelsiusToFarenheit($enteredValue);
					return (float)$this->result;
				}
				//Kelvin
				else if($toConvert == $this->temperatureUnits[2]){
					$this->result = $this->getCelsiusToKelvin($enteredValue);
					return (float)$this->result;
				}
			}
			//Farenheit to...
			else if($fromConvert == $this->temperatureUnits[1]){
				//Celsius
				if($toConvert == $this->temperatureUnits[0]){
					$this->result = $this->getFarenheitToCelsius($enteredValue);
					return (float)$this->result;
				}
				//Farenheit
				else if($toConvert == $this->temperatureUnits[1]){
					$this->result = $enteredValue;
					return (float)$this->result;
				}
				//Kelvin
				else if($toConvert == $this->temperatureUnits[2]){
					$this->result = $this->getFarenheitToKelvin($enteredValue);
					return (float)$this->result;
				}
			}
			//Kelvin to...
			else if($fromConvert == $this->temperatureUnits[2]){
				//Celsius
				if($toConvert == $this->temperatureUnits[0]){
					$this->result = $this->getKelvinToCelsius($enteredValue);
					return (float)$this->result;
				}
				//Farenheit
				else if($toConvert == $this->temperatureUnits[1]){
					$this->result = $this->getKelvinToFarenheit($enteredValue);
					return (float)$this->result;
				}
				//Kelvin
				else if($toConvert == $this->temperatureUnits[2]){
					$this->result = $enteredValue;
					return (float)$this->result;
				}
			}
			
			//return (float)$this->result;
		}
		else return $this->result;
	}


	private function getCelsiusToFarenheit($enteredValue){

		$fahrenheit = $enteredValue * 9/5 +32;
        return $fahrenheit;
	}

	private function getCelsiusToKelvin($enteredValue){

		$kelvin = $enteredValue + 273.15;
        return $kelvin;
	}

	private function getFarenheitToCelsius($enteredValue){

		$celsius = 5/9 * ($enteredValue - 32);
        return $celsius ;
	}

	private function getFarenheitToKelvin($enteredValue){

		$kelvin = ($enteredValue + 459.67) * 5/9;
        return $kelvin;
	}

	private function getKelvinToCelsius($enteredValue){

		$celsius = $enteredValue - 273.15;
        return $celsius;
	}

	private function getKelvinToFarenheit($enteredValue){

		$farenheit = $enteredValue * 9/5 - 459.67;
        return $farenheit;
	}


}