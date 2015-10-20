<?php

class WeightView {

	private static $convert = 'WeightView::Convert';
	private static $value = 'WeightView::Value';
	private $selectedFrom = '';
	private $selectedTo = '';
	private static $result = '';
	private $unitModel;

	public function __construct(){

		$this->unitModel = new UnitModel();
	}

	//<p id="' . self::$messageId . '">' . $message . '</p>
					
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

	public function getUnits($select){
		$options='';
		foreach($this->unitModel->getWeightUnits() as $key => $value){
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
		if (isset($_POST[self::$value]))
      	return ($_POST[self::$value]);
	}

	private function setFromConvertValue(){

		if(isset($_POST['units']))
			$this->selectedFrom = $_POST['units'];
	}

	private function getFromConvertValue(){
		if(isset($_POST['units']))
			return $_POST['units'];
	}

	private function setToConvertValue(){
		if(isset($_POST['toconvertto']))
			$this->selectedTo = $_POST['toconvertto'];	
	}

	private function getToConvertValue(){
		if(isset($_POST['toconvertto']))
			return $_POST['toconvertto'];
	}

	/**
	* Calculates different combinations of chosen units
	* @param Integer $enteredValue
	* @param String $fromConvet
	* @param String $toConvert
	* @return Integer 
	*/
	private function result($enteredValue, $fromConvert, $toConvert){
		$unit = $this->unitModel->getWeightUnits();
		$val1 = '';
		switch($fromConvert)
		{
			case $unit[0]:
				$val1=1;
				break;
			case $unit[1]:
				$val1= 0.001;
				break;
			case $unit[2]: 
				$val1 = 0.000001;
				break;
			case $unit[3]:
				$val1= 0.000157473;
				break;
			case $unit[4]:
				$val1=0.00220462;
				break;
			case $unit[5]:
				$val1=0.0352739200000000003;
				break;
			
			
		}
		$val2 = '';
		switch($toConvert)
		{
			case $unit[0]:
				$val2=1;
				break;
			case $unit[1]:
				$val2= 0.001;
				break;
			case $unit[2]: 
				$val2 = 0.000001;
				break;
			case $unit[3]:
				$val2= 0.000157473;
				break;
			case $unit[4]:
				$val2=0.00220462;
				break;
			case $unit[5]:
				$val2=0.0352739200000000003;
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