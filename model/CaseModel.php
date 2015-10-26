<?php
/**
* Model class for Volume units
* @author Mirza Durakovic
*/
class CaseModel{

	/**
	 * These names are used in switch
	 * @var string
	 */
	private $lowercase = "All lowercase";
	private $uppercase = "All uppercase";
	private $capitalized = "Capitalized Case";
	private $sentance = "Sentance Case";
	
	/**
	* Method that outputs different result depending on what button
	* is pressed
	* @param String $enteredValue
	* @param String $chosenConvertPressed
	* @return String 
	*/
	public function result($enteredValue, $chosenConvertPressed){
		$val = '';
		switch($chosenConvertPressed){
			case $this->lowercase:
			$val = strtolower($enteredValue);
			break;
			case $this->uppercase:
			$val = strtoupper($enteredValue);
			break;
			case $this->capitalized:
			$val = ucwords(strtolower($enteredValue));
			break;
			case $this->sentance:
			$val = $this->sentenceUpper($enteredValue);
			break;
		}
		return $val;
	}

	/**
	* Method that returns string with uppercase characters in the beginning and
	* after a dot.
	* @param string $string
	* @return string
	*/
	private function sentenceUpper($string){
		$string = ucfirst(strtolower($string));
   		$string = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'),$string);
 		return $string;
	}
}