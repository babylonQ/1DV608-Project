<?php

class UnitModel{

	private $result;
	
	private $weightUnits = array(
		"Grams" => 1, 
		"Kilograms" => 0.001, 
		"Tonne" => 0.000001, 
		"Stone" => 0.000157473, 
		"Pound" => 0.00220462, 
		"Ounce" => 0.0352739200000000003
		);
	
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
	
	private $temperatureUnits = array(
		"Celsius" => 1, 
		"Farenheit" => 33.8, 
		"Kelvin" => 274.15, 
		"Rankine" => 493.47, 
		"Réaumure" => 0.7999999999999987
		);
	
	private $speedUnits = array(
		"meters/second" => 1, 
		"kilometers/hour" => 3.6, 
		"miles/hour" => 2.23694, 
		"feet/second" => 3.28084, 
		"knots" => 1.94384
		);

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

	private $currencyUnits = array("BAM", "BGN", "BYR", "CAD", "CZK", "DZD", "EGP", "EUR", "GBP", "HRK", "KPW", "LBP", "MKD", "MXN", "NOK", "SEK", "USD");
	
	/**
	* Calculates different combinations of chosen units
	* @param Integer $enteredValue
	* @param String $fromConvet
	* @param String $toConvert
	* @param Array $unit
	* @return Integer 
	*/
	
	public function result($enteredValue, $fromConvert, $toConvert, $unit){
		
		$val1 = null;
		foreach($unit as $key => $value)
			{
				if($key == $fromConvert){
					$val1 = $value;	
				}
			}
			
		$val2 = null;
		foreach($unit as $key => $value)
			{
				if($key == $toConvert){
					$val2 = $value;	
				}
			}

		if($val1 != 0){
			$this->result = number_format((($enteredValue * $val2) / $val1), 2, '.', '');
			return (float)$this->result;
		}
		else 
			return $this->result;
	}

	//get different units

	public function getWeightUnits(){
		return $this->weightUnits;
	}

	public function getAreaUnits(){
		return $this->areaUnits;
	}

	public function getCurrencyUnits(){
		return $this->currencyUnits;
	}

	public function getLengthUnits(){
		return $this->lengthUnits;
	}

	public function getTemperatureUnits(){
		return $this->temperatureUnits;
	}

	public function getSpeedUnits(){
		return $this->speedUnits;
	}

	public function getVolumeUnits(){
		return $this->volumeUnits;
	}

}