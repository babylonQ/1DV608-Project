<?php

class AreaView {

	private static $convert = 'AreaView::Convert';
	private static $value = 'AreaView::Value';
	private static $result = '';
	private $selectedFrom = '';
	private $selectedTo = '';
	private $unitModel;
	
	public function __construct(){

		$this->unitModel = new UnitModel();
	}

	//private $units = array("Square meter", "Square kilometer", "Square mile", "Square yard", "Square foot", "Square inch", "Hectar", "Acre");

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
					
					<input type="submit" name="' . self::$convert . '" value="Convert" /><br />
					
			</form></div></center>

			<a target="_blank" href="http://whatis.techtarget.com/definition/square-meter-meter-squared">Square Meter</a>
 		
		';
	}

	private function getUnits($select){
		$options='';
		foreach($this->unitModel->getAreaUnits() as $key => $value){

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
			case "Square meter":
				$val1=1;
				break;
			case "Square kilometer":
				$val1= 0.000001;
				break;
			case "Square mile": 
				$val1 = 0.0000003861;
				break;
			case "Square yard":
				$val1= 1.19599;
				break;
			case "Square foot":
				$val1=10.7639;
				break;
			case "Square inch":
				$val1= 1550;
				break;
			case "Hectar":
				$val1= 0.000000064516;
				break;
			case "Acre":
				$val1=0.00000015942;
				break;
			default:
				break;
			
		}
		$val2 = '';
		switch($toConvert)
		{
		case "Square meter":
				$val2 = 1;
				break;
			case "Square kilometer":
				$val2 = 0.000001;
				break;
			case "Square mile": 
				$val2 = 0.0000003861;
				break;
			case "Square yard":
				$val2 = 1.19599;
				break;
			case "Square foot":
				$val2 = 10.7639;
				break;
			case "Square inch":
				$val2 = 1550;
				break;
			case "Hectar":
				$val2 = 0.0001;
				break;
			case "Acre":
				$val2 = 0.000247105;
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