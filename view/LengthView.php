<?php

class LengthView {

	private static $convert = 'LengthView::Convert';
	private static $value = 'LengthView::Value';
	private static $result = '';
	private static $message = '';
	private $selectedFrom = '';
	private $selectedTo = '';
	private $unitModel;

	public function __construct(){

		$this->unitModel = new UnitModel();
	}
	
	public function response() {

		return '<center>' . "<div style='width:700px;height:50px;padding:10px;border:10px solid yellowgreen;'>" . '
				<form method="post" > 
				
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
					
					<input type="submit" name="' . self::$convert . '" value="Convert" />
				
			</form></div></center>

		';
	}

	private function getUnits($select){
		$options='';
		foreach($this->unitModel->getLengthUnits() as $key => $value){

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
			case "milimeters":
				$val1=1000;
				break;
			case "centimeters":
				$val1=100;
				break;
			case "meters": 
				$val1 = 1;
				break;
			case "kilometers":
				$val1=0.001;
				break;
			case "foot":
				$val1=3.28084;
				break;
			case "inches":
				$val1=39.3701;
				break;
			case "yards":
				$val1=0.9144;
				break;
			case "miles":
				$val1=0.000621371;
				break;
			default:
				break;
			
		}
		$val2 = '';
		switch($toConvert)
		{
			case "milimeters":
				$val2=1000;
				break;
			case "centimeters":
				$val2=100;
				break;
			case "meters": 
				$val2 = 1;
				break;
			case "kilometers":
				$val2=0.001;
				break;
			case "foot":
				$val2=3.28084;
				break;
			case "inches":
				$val2=39.3701;
				break;
			case "yards":
				$val2=0.9144;
				break;
			case "miles":
				$val2=0.000621371;
				break;
			default:
				break;
			
		}
		$this->setToConvertValue();
		if($val1 != 0){
			self::$result = number_format((($enteredValue * $val2) / $val1), 2, '.', '');
			return (float)self::$result;
		}
		else 
			return self::$result;
	}

}