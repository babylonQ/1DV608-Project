<?php
/**
* View class for Currency conversion
* @author Mirza Durakovic
*/
class CurrencyView {

	/**
	 * These names are used in $_POST
	 * @var string
	 */
	private static $convert = 'CurrencyView::Convert';
	private static $value = 'CurrencyView::Value';
	private static $messageId = 'CurrencyView::Message';
	private static $message = null;
	private static $result = '';
	private static $selectedFrom = '';
	private static $selectedTo = '';
	
	/**
  	* @var CurrencyModel class object
  	*/
	private $unitModel;

	public function __construct(){

		$this->unitModel = new CurrencyModel();
	}

	/**
	* Method that returns header
	* @return string
	*/
	public function header() {

		return 'Currency Converter';
	}

	/**
	* Method that returns information about the unit
	* @return string HTML
	*/
	public function getInfo(){
		return '<center>' . "<div style='width:600px;height:40px;padding:10px;border:0px solid yellowgreen;'>" . '
      Length is the measurement of distance. It is used to count how far or how long something is from each other. Length can be measured using various measurement systems - Imperial system , Metric system and non International System of Units(Non SI Units).
      <hr></div></center>';
	}

	/**
	* Method that loops through the array of units,
	* takes the unit values(strings) from the array and makes a
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
				self::$result = $this->unitModel->currencyResult($this->setValue(), $this->getFromConvertValue(), $this->getToConvertValue());
				return self::$result;
			}catch(InvalidArgumentException $e){
				self::$message = "Enter numeric value";
			}
	}

	//setter and getter methods

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
		
  	public function isConvertPressed(){
		return isset($_POST[self::$convert]);
	}

	public function setValue(){
		if (isset($_POST[self::$value])) 
      		return ($_POST[self::$value]);
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