<?php

class SpeedView {

	private static $convert = 'SpeedView::Convert';
	private static $value = 'SpeedView::Value';
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
					<br />
					<label for="' . self::$value . '">From :</label>
					<input type="text" id="' . self::$value . '" name="' . self::$value . '" value="' . $this->setValue() . '" style="width: 70px;"/>
					
					'.$this->setFromConvertValue().'
					<select name = "units">
					'.$this->getUnits($this->selectedFrom).'
					</select>
					
					'.$this->setToConvertValue().'
					<label for="' . self::$result . '">To :</label>
					<input type="text" id="' . self::$result . '" name="' . self::$result . '" value="' . $this->getResult() . '" style="width: 70px;"/>
					
					<select name = "toconvertto">
					'.$this->getUnits($this->selectedTo).'
					</select>
					
					<input type="submit" name="' . self::$convert . '" value="Convert" />
				
			</form></div></center>

		';
	}

	private function getUnits($select){
		$options='';
		foreach($this->unitModel->getSpeedUnits() as $key => $value){

			if($select == $key){
				$options .= '<option value="'.$key.'" selected>'.$key.'</option>';
			}
			else{
				$options .= '<option value="'.$key.'">'.$key.'</option>';
			}		
		}
		return $options;
	}

	private function getResult(){

		self::$result = $this->unitModel->result($this->setValue(), $this->getFromConvertValue(), $this->getToConvertValue(), $this->unitModel->getSpeedUnits());
		return self::$result;
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

	

}