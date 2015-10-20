<?php

class TemperatureView {

	private static $convert = 'TemperatureView::Convert';
	private static $value = 'TemperatureView::Value';
	private static $result = '';
	private $selectedFrom = '';
	private $selectedTo = '';
	private $unitModel;
	
	public function __construct(){

		$this->unitModel = new UnitModel();
	}

	public function response() {

		return '<center>' . "<div style='width:700px;height:50px;padding:10px;border:10px solid yellowgreen;'>" . '
				<form method="post" > <br />
					
					<label for="' . self::$value . '">From :</label>
					<input type="text" id="' . self::$value . '" name="' . self::$value . '" value="' . $this->setValue() . '" style="width: 70px;"/>
					'.$this->setFromConvertValue().'
					<select name = "units">
					'.$this->getUnits($this->selectedFrom).'
					</select>
					<label for="' . self::$result . '">To :</label>
					<input type="text" id="' . self::$result . '" name="' . self::$result . '" value="' . $this->result($this->setValue(), $this->getFromConvertValue(), $this->getToConvertValue()) . '" style="width: 70px;"/>
					
					<select name = "toconvertto">
					'.$this->getUnits($this->selectedTo).'
					</select>
					
					<input type="submit" name="' . self::$convert . '" value="Convert" /> <br />
				<a target="_blank" href="https://en.wikipedia.org/wiki/Celsius">Celsius</a><br />
				<a target="_blank" href="http://whatis.techtarget.com/definition/degree-Fahrenheit">Farenheit</a>
 		
			</form></div></center>

		';
	}

	private function getUnits($select){
		$options='';
		foreach($this->unitModel->getTemperatureUnits() as $key => $value){

			if($select == $value){

				$options .= '<option value="'.$value.'" selected>'.$value.'</option>';
			}
			else{

				$options .= '<option value="'.$value.'">'.$value.'</option>';
			}		
		}
		return $options;
	}

  	public function isConvertPressed(){
		return isset($_POST[self::$convert]);
	}

	public function setValue(){
		if (isset($_POST[self::$value])) {
      	return ($_POST[self::$value]);
   		 }
	}

	private function setFromConvertValue(){

		if(isset($_POST['units'])){
			$this->selectedFrom = $_POST['units'];
		}
	}

	private function getFromConvertValue(){

		if(isset($_POST['units'])){
			return $_POST['units'];
		}
	}

	private function setToConvertValue(){
		if(isset($_POST['toconvertto'])){
			$this->selectedTo = $_POST['toconvertto'];
		}
			
	}

	private function getToConvertValue(){
		if(isset($_POST['toconvertto'])){
			return $_POST['toconvertto'];
		}
	}

	/**
	* Calculates different combinations of chosen units
	* @param Integer $enteredValue
	* @param String $fromConvet
	* @param String $toConvert
	* @return Integer 
	*/
	private function result($enteredValue, $fromConvert, $toConvert){
		
		$val1 = '';
		switch($fromConvert)
		{
			case "Celsius":
				$val1=1;
				break;
			case "Farenheit":
				$val1= 33.8;
				break;
			case "Kelvin": 
				$val1 = 274.15;
				break;
			case "Rankine":
				$val1= 493.47;
				break;
			case "Réaumure":
				$val1=0.7999999999999987;
				break;
			default:
				break;
			
		}
		$val2 = '';
		switch($toConvert)
		{
			case "Celsius":
				$val2=1;
				break;
			case "Farenheit":
				$val2= 33.8;
				break;
			case "Kelvin": 
				$val2 = 274.15;
				break;
			case "Rankine":
				$val2= 493.47;
				break;
			case "Réaumure":
				$val2=0.7999999999999987;
				break;
			default:
				break;
			
		}
		
		$this->setToConvertValue();
		if($val1 != 0){
			self::$result = number_format((($enteredValue * $val2) / $val1), 4, '.', '');
			return (float)self::$result;
		}
		else{
			return self::$result;
		}
	}

}