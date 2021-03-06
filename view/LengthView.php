<?php
/**
* View class for Length conversion
* @author Mirza Durakovic
*/
class LengthView {

	/**
	 * These names are used in $_POST
	 * @var string
	 */
	private static $convert = 'LengthView::Convert';
	private static $value = 'LengthView::Value';
	private static $selectedFrom = '';
	private static $selectedTo = '';
	private static $messageId = 'LengthView::Message';
	private static $result = null;

	/**
	* This message is showing caught exception if it happens
	* @var string
	*/
	private static $message = '';

	/**
  	* @var LengthModel class object
  	*/
	private $unitModel;

	public function __construct(){

		$this->unitModel = new LengthModel();
	}

	/**
	* Method that returns header
	* @return string
	*/
	public function header() {
		return 'Length Converter';
	}

	/**
	* Method that returns information about the unit
	* @return string HTML
	*/
	public function getInfo(){
		return "<div style='width:600px;height:130px;padding:10px;border:0px solid yellowgreen;'><div align= justify>Length is the measurement of distance. It is used to count how far or how long something is from each other. 
     		Historically, units of length may have been derived from the lengths of human body parts, the distance travelled in a number of paces, the distance between landmarks or places on the Earth, or arbitrarily on the length of some fixed object. 
     		Length can be measured using various measurement systems - Imperial system, Metric system and non International System of Units(Non SI Units).
      		<br/><b>Metric system</b> units are: <b>milimeters</b>, <b>centimeters</b>, <b>meters</b>, <b>kilometers</b>.
      		<br/><b>Imperial system</b> units are: <b>inches</b>, <b>feet</b>, <b>yards</b>, <b>miles</b>.
      		</div>
      		<hr>";
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