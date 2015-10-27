<?php
/**
* View class for Area conversion
* @author Mirza Durakovic
*/
class AreaView {

	/**
	 * These names are used in $_POST
	 * @var string
	 */
	private static $convert = 'AreaView::Convert';
	private static $value = 'AreaView::Value';
	private static $selectedFrom = '';
	private static $selectedTo = '';
	private static $messageId = 'AreaView::Message';
	private static $result = null;
	
	/**
	* This message showing some caught exception
	* @var string
	*/
	private static $message = '';
	
	/**
  	* @var AreaModel class object
  	*/
	private $unitModel;
	
	public function __construct(){

		$this->unitModel = new AreaModel();
	}

	/**
	* Method that returns header
	* @return string
	*/
	public function header() {
		return 'Area Converter';	
	}

	/**
	* Method that returns information about the unit
	* @return string HTML
	*/
	public function getInfo(){
		return "<div style='width:600px;height:70px;padding:10px;border:0px solid yellowgreen;'><div align= justify>
      		Area is the quantity that expresses the extent of a two-dimensional figure or shape, or planar lamina, in the plane. Surface area is its analog on the two-dimensional surface of a three-dimensional object.
      		<br/><b>Metric system</b> units are: <b>square meter</b>, <b>square kilometers</b>, <b>hecktar</b>.
      		<br/><b>Imperial system</b> units are: <b>square inch</b>, <b>square foot</b>, <b>square yard</b>, <b>square mile</b>, <b>acre</b>. 
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
			if($select == $key)
				$options .= '<option value="'.$key.'" selected>'.$key.'</option>';
			else
				$options .= '<option value="'.$key.'">'.$key.'</option>';	
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
			self::$result = $this->unitModel->result($this->setValue(), $this->getFromConvertValue(), $this->getToConvertValue(), $this->unitModel->getUnits());
		}catch(InvalidArgumentException $e){
			self::$message = "Enter numeric value";
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
		if(isset($_POST['toconvertto'])){
			self::$selectedTo = $_POST['toconvertto'];
		}	
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