<?php
/**
* View class for Temperature conversion
* @author Mirza Durakovic
*/
class TemperatureView {

	/**
	* These names are used in $_POST
	* @var string
	*/
	private static $convert = 'TemperatureView::Convert';
	private static $value = 'TemperatureView::Value';
	private static $selectedFrom = '';
	private static $selectedTo = '';
	private static $messageId = 'TemperatureView::Message';
	private static $result = null;

	/**
	* This message is showing caught exception if it happens
	* @var string
	*/
	private static $message = '';
	
	/**
  	* @var TemperatureModel class object
  	*/
	private $unitModel;

	public function __construct(){

		$this->unitModel = new TemperatureModel();
	}

	/**
	* Method that returns header
	* @return string
	*/
	public function header() {
		return 'Temperature Converter';
	}

	/**
	* Method that returns information about the unit
	* @return string HTML
	*/
	public function getInfo(){
		return "<div style='width:600px;height:70px;padding:10px;border:0px solid yellowgreen;'><div align= justify>
      		A temperature is an objective comparative measure of hot or cold. It is measured by a thermometer, which may work through the bulk behavior of a thermometric material, detection of thermal radiation, or particle kinetic energy. 
      		Several scales and units exist for measuring temperature, the most common being <b>Celsius</b> (denoted <b>°C</b>; formerly called centigrade), <b>Fahrenheit</b> (denoted <b>°F</b>), and, especially in science, <b>Kelvin</b> (denoted <b>K</b>).
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
			if($select == $value){
				$options .= '<option value="'.$value.'" selected>'.$value.'</option>';
			}
			else{
				$options .= '<option value="'.$value.'">'.$value.'</option>';
			}		
		}
		return $options;
	}

	/**
	* Method that gets the result and stores it
	* in a variable. It also stores the message
	* in a variable in case it catches an exception
	* @return float
	*/
	public function getResult(){
		try{
			self::$result = $this->unitModel->resultTemp($this->setValue(), $this->getFromConvertValue(), $this->getToConvertValue(), $this->unitModel->getUnits());
		}catch(InvalidArgumentException $e){
			self::$message = 'Enter numeric value';
		}
		return self::$result;
	}

	//setter and getter methods

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

	public function getToConvertValue(){
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