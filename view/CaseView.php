<?php
/**
* View class for Case conversion
* @author Mirza Durakovic
*/
class CaseView{
	
	/**
	 * These names are used in $_POST
	 * @var string
	 */
	private static $convertToLower = 'CaseView::ConvertToLower';
	private static $convertToUpper = 'CaseView::ConvertToUpper';
	private static $convertToCapitalized = 'CaseView::ConvertToCapitalized';
	private static $convertToSentance = 'CaseView::ConvertToSentance';
	private static $value = 'CaseView::Value';
	private static $result = '';
	
	/**
  	* @var AreaModel class object
  	*/
	private $caseModel;

	public function __construct(){
		$this->caseModel = new CaseModel();
	}

	/**
	* Method that returns header
	* @return string
	*/
	public function header() {
		return 'Case Converter';
	}

	/**
	* Method that checks is something entered in the text field.
	* In case it is, return the result which is processed string
	* @param string $setValue
	* @param string $chosenConvertPressed
	* @return string 
	*/
	public function setOrGetValue($setValue, $chosenConvertPressed){
		if($setValue){
			return $this->caseModel->result($setValue, $chosenConvertPressed);
		}
		else return $setValue;
	}

	//setter and getter methods

  	public function setConvertPressed(){
  		if(isset($_POST[self::$convertToLower]))
  			return $_POST[self::$convertToLower];
		else if(isset($_POST[self::$convertToUpper]))
  			return $_POST[self::$convertToUpper];
  		else if(isset($_POST[self::$convertToCapitalized]))
  			return $_POST[self::$convertToCapitalized];
  		else if(isset($_POST[self::$convertToSentance]))
  			return $_POST[self::$convertToSentance];
  		else return false;
	}

	public function setValue(){
		if (isset($_POST[self::$value]))
      		return ($_POST[self::$value]);
	}

	public function getValue(){
		return self::$value;
	}

	public function convertToLower(){
		return self::$convertToLower;
	}

	public function convertToUpper(){
		return self::$convertToUpper;
	}

	public function convertToCapitalized(){
		return self::$convertToCapitalized;
	}

	public function convertToSentance(){
		return self::$convertToSentance;
	}
}