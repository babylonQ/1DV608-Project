<?php

class CaseView{
	
	private static $convertToLower = 'CaseView::ConvertToLower';
	private static $convertToUpper = 'CaseView::ConvertToUpper';
	private static $convertToCapitalized = 'CaseView::ConvertToCapitalized';
	private static $convertToSentance = 'CaseView::ConvertToSentance';
	private static $value = 'CaseView::Value';
	private static $result = '';

	public function response() {

		return '<center>' . "<div style='width:700px;height:100px;padding:10px;border:10px solid yellowgreen;'>" . '
				<form method="post" > 
					
					<label for="' . self::$value . '">Enter text :</label><br />
					<input type="text" id="' . self::$value . '" name="' . self::$value . '" value="' . $this->setOrGetValue($this->setValue(), $this->setConvertPressed()) . '" style="width: 600px; height: 20px; cols="70" rows="50"" />
					
					
					<br /><br />
					
					<input type="submit" name="' . self::$convertToLower . '" value="All lowercase" />
					<input type="submit" name="' . self::$convertToUpper . '" value="All uppercase" />
					<input type="submit" name="' . self::$convertToCapitalized . '" value="Capitalized Case" />
					<input type="submit" name="' . self::$convertToSentance . '" value="Sentance Case" />
					
			</form></div></center>

			
		';
	}


	private function setOrGetValue($setValue, $chosenConvertPressed){
		if($setValue){
			return $this->result($setValue, $chosenConvertPressed);
		}
		else
			return $setValue;
	}

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
		if (isset($_POST[self::$value])) {
      		return ($_POST[self::$value]);
   		 }
	}

	/**
	* Calculates different combinations of chosen units
	* @param Integer $enteredValue
	* @param String $fromConvet
	* @param String $toConvert
	* @return Integer 
	*/
	private function result($enteredValue, $chosenConvertPressed){
		$val = '';
		switch($chosenConvertPressed){

			case "All lowercase":
			$val = strtolower($enteredValue);
			break;
			case "All uppercase":
			$val = strtoupper($enteredValue);
			break;
			case "Capitalized Case":
			$val = ucwords(strtolower($enteredValue));
			break;
			case "Sentance Case":
			$val = $this->sentenceUpper($enteredValue);
			break;
		}
		return $val;
	}

	private function sentenceUpper($string){
		$string = ucfirst(strtolower($string));
   		$string = preg_replace_callback('/[.!?].*?\w/', create_function('$matches', 'return strtoupper($matches[0]);'),$string);
 		return $string;
	}


}