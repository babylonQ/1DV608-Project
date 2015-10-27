<?php
/**
* View class for Angle conversion
* @author Mirza Durakovic
*/
class BytesView {

	/**
	* These names are used in $_POST
	* @var string
	*/
	private static $convert = 'BytesView::Convert';
	private static $value = 'BytesView::Value';
	private static $selectedFrom = '';
	private static $selectedTo = '';
	private static $messageId = 'BytesView::Message';
	private static $result = null;
	
	/**
	* This message is showing caught exception if it happens
	* @var string
	*/
	private static $message = '';

	/**
  	* @var AngleModel class object
  	*/
  	private $unitModel;
	
	public function __construct(){

		$this->unitModel = new BytesModel();
	}

	/**
	* Method that returns header
	* @return string
	*/
	public function header() {
		return 'Bytes Converter';
	}

	/**
	* Method that returns information about the unit
	* @return string HTML
	*/
	public function getInfo(){
		return "<div style='width:600px;height:50px;padding:10px;border:0px solid yellowgreen;'><div align= justify>
      		The byte is a unit of digital information that most commonly consists of eight bits. Historically, the byte was the number of bits used to encode a single character of text in a computer
      		and for this reason it is the smallest addressable unit of memory in many computer architectures.
      		<hr></div></center>";
	}

	/**
	* Method that loops through the array of units,
	* takes the keys(strings) from the array and makes a
	* HTML string of all the units
	* @param string $select
	* @return string HTML $options
	*/
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

	//setter and getter methods

	public function getResult(){
		try{
			self::$result = $this->unitModel->result($this->setValue(), $this->getFromConvertValue(), $this->getToConvertValue(), $this->unitModel->getUnits());
		}catch(InvalidArgumentException $e){
			self::$message = "Enter numeric value";
		}
		return self::$result;
	}

  	public function isConvertPressed(){
		return isset($_POST[self::$convert]);
	}

	public function setValue(){
		if (isset($_POST[self::$value]))
      	return ($_POST[self::$value]);
	}

	public function setFromConvertValue(){

		if(isset($_POST['units']))
			self::$selectedFrom = $_POST['units'];
	}

	public function getFromConvertValue(){
		if(isset($_POST['units']))
			return $_POST['units'];
	}

	public function setToConvertValue(){
		if(isset($_POST['toconvertto']))
			self::$selectedTo = $_POST['toconvertto'];	
	}

	private function getToConvertValue(){
		if(isset($_POST['toconvertto']))
			return $_POST['toconvertto'];
	}

	public function getValue(){
		return self::$value;
	}

	public function getSelectedFrom(){
		return self::$selectedFrom;
	}

	public function getSelectedTo(){
		return self::$selectedTo;
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