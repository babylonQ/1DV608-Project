<?php

class UnitModel{
	

	private $weightUnits = array("Grams", "Kilograms", "Tonne", "Stone", "Pound", "Ounce");

	private $areaUnits = array("Square meter", "Square kilometer", "Square mile", "Square yard", "Square foot", "Square inch", "Hectar", "Acre");

	private $currencyUnits = array("BAM", "BGN", "BYR", "CAD", "CZK", "DZD", "EGP", "EUR", "GBP", "HRK", "KPW", "LBP", "MKD", "MXN", "NOK", "SEK", "USD");
	
	private $lengthUnits = array("milimeters", "centimeters", "meters", "kilometers", "yards", "inches", "foot", "miles");
	
	private $temperatureUnits = array("Celsius", "Farenheit", "Kelvin", "Rankine", "Réaumure");
	
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

}