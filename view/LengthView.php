<?php

class LengthView {

	private static $convert = 'LengthView::Convert';
	private static $value = 'LengthView::Value';
	private static $result = '';
	private static $message = '';
	private static $messageId = 'LengthView::Message';
	private $selectedFrom = '';
	private $selectedTo = '';
	private $unitModel;

	public function __construct(){

		$this->unitModel = new LengthModel();
	}

	public function header() {

		return 'Length Converter';
	}

	public function getInfo(){
		return '<center>' . "<div style='width:600px;height:40px;padding:10px;border:0px solid yellowgreen;'>" . '
      Length is the measurement of distance. It is used to count how far or how long something is from each other. Length can be measured using various measurement systems - Imperial system , Metric system and non International System of Units(Non SI Units).
      <hr></div></center>';
	}

	public function getUnits($select){
		$options='';
		foreach($this->unitModel->getUnits() as $key => $value){

			if($select == $key){
				$options .= '<option value="'.$key.'" selected>'.$key.'</option>';
			}
			else{
				$options .= '<option value="'.$key.'">'.$key.'</option>';
			}		
		}
		return $options;
	}

	public function getResult(){
		try{
			self::$result = $this->unitModel->result($this->setValue(), $this->getFromConvertValue(), $this->getToConvertValue(), $this->unitModel->getUnits());
		}catch(InvalidArgumentException $e){
			self::$message = "Enter numeric value";
		}
		return self::$result;
	}

  	
	public function setValue(){
		if (isset($_POST[self::$value]))
      		return ($_POST[self::$value]);
	}

	public function setFromConvertValue(){
		if(isset($_POST['units']))
			$this->selectedFrom = $_POST['units'];
	}

	public function getFromConvertValue(){
		if(isset($_POST['units']))
			return $_POST['units'];
	}

	public function setToConvertValue(){
		if(isset($_POST['toconvertto']))
			$this->selectedTo = $_POST['toconvertto'];
	}

	public function getToConvertValue(){
		if(isset($_POST['toconvertto']))
			return $_POST['toconvertto'];
	}

	public function getValue(){
		return self::$value;
	}

	public function getSelectedFrom(){
		return $this->selectedFrom;
	}

	public function getSelectedTo(){
		return $this->selectedTo;
	}

	public function getResultt(){
		return self::$result;
	}

	public function getConvert(){
		return self::$convert;
	}

	public function getMessageId(){
		return self::$messageId;
	}

	public function getMessage(){
		return self::$message;
	}

}