<?php
/**
* View class for Mass conversion
* @author Mirza Durakovic
*/
class MassView {

	/**
	* These names are used in $_POST
	* @var string
	*/
	private static $convert = 'MassView::Convert';
	private static $value = 'MassView::Value';
	private static $selectedFrom = '';
	private static $selectedTo = '';
	private static $messageId = 'MassView::Message';
	private static $result = null;
	
	/**
	* This message is showing caught exception if it happens
	* @var string
	*/
	private static $message = '';

	/**
  	* @var MassModel class object
  	*/
  	private $unitModel;
	
	public function __construct(){

		$this->unitModel = new MassModel();
	}

	/**
	* Method that returns header
	* @return string
	*/
	public function header() {
		return 'Mass Converter';
	}

	/**
	* Method that returns information about the unit
	* @return string HTML
	*/
	public function getInfo(){
		return "<div style='width:600px;height:90px;padding:10px;border:0px solid yellowgreen;'><div align= justify>
      		Mass is a dimensionless quantity representing the amount of matter in a particle or object. Mass is measured by determining the extent to which a particle or object resists a change in its direction or speed when a force is applied.
      		In short, mass is how heavy something is without gravity. This means the mass of an object is the same on earth and in space.
      		<br/><b>Metric system</b> units are: <b>grams</b>, <b>kilograms</b>, <b>tonne</b>.
      		<br/><b>Imperial system</b> units are: <b>ounce</b>, <b>pound</b>, <b>stone</b>. 
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