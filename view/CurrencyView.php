<?php

class CurrencyView {

	private static $convert = 'CurrencyView::Convert';
	private static $value = 'CurrencyView::Value';
	private static $result = '';
	private $selectedFrom = '';
	private $selectedTo = '';

	private $unitModel;
	public function __construct(){

		$this->unitModel = new UnitModel();
	}
	
	public function responseRegister() {
		
		$response = $this->generateCurrencyFormHTML(self::$message);
		
		return $response;
	}

	public function response() {

		return '<center>' . "<div style='width:700px;height:50px;padding:10px;border:10px solid yellowgreen;'>" . '
				<form method="post" > 
				
					
					<label for="' . self::$value . '">From :</label>
					<input type="text" id="' . self::$value . '" name="' . self::$value . '" value="' . $this->setValue() . '" style="width: 70px;"/>
					'.$this->setFromConvertValue().'
					<select name = "currency">
					'.$this->getUnits($this->selectedFrom).'
					</select>
					<label for="' . self::$result . '">To :</label>
					<input type="text" id="' . self::$result . '" name="' . self::$result . '" value="'. $this->result().'" style="width: 70px;"/>
					
					<select name = "toconvertto">
					'.$this->getUnits($this->selectedTo).'
					</select>
					
					<input type="submit" name="' . self::$convert . '" value="Convert" />
				
			</form></div></center>
 				
		';
	}

	private function getUnits($select){
		$options='';
		foreach($this->unitModel->getCurrencyUnits() as $key => $value){

			if($select == $value){
				$options .= '<option value="'.$value.'" selected>'.$value.'</option>';
			}
			else{
				$options .= '<option value="'.$value.'">'.$value.'</option>';
			}
				
			
		}
		return $options;
	}

	public function setFromConvertValue(){

		if(isset($_POST['currency'])){
			$this->selectedFrom = $_POST['currency'];
		}
	}

	public function setToConvertValue(){
			$this->selectedTo = $_POST['toconvertto'];
	}
		
  	public function isConvertPressed(){
		return isset($_POST[self::$convert]);
	}

	public function setValue(){
		if (isset($_POST[self::$value])) {
      	return ($_POST[self::$value]);
   		 }
	}

	public function getValue(){
		if (isset($_POST[self::$value])) {
      	return ($_POST[self::$value]);
   		 }
	}

	public function result(){
		if (isset($_POST[self::$value])) {
			$value = $this->getValue();
			$from = $_POST['currency'];
			$to = $_POST['toconvertto'];
			$url = 'http://finance.yahoo.com/d/quotes.csv?f=l1d1t1&s='.$from.$to.'=X';
			$handle = fopen($url, 'r');
 
			if ($handle) {
    			$fetch = fgetcsv($handle);
    			self::$result = number_format(($value * $fetch[0]), 3, '.', '');
   			 	fclose($handle);
			}
		
			$this->setToConvertValue();
			return (float)self::$result;
   		 }
   		
	}

}