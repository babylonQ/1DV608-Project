<?php
/**
* View class for Navigation
* @author Mirza Durakovic
*/
class NavigationView {

  /**
   * These names are used in $_GET
   * @var string
   */
	private static $areaLink = "area";
	private static $lengthLink = "length";
	private static $weightLink = "weight";
	private static $temperatureLink = "temperature";
	private static $currencyLink = "currency";
	private static $volumeLink = "volume";
  private static $speedLink = "speed";
  private static $caseLink = "case";
  private static $timeLink = "time";
  private static $angleLink = "angle";
  private static $bytesLink = "bytes";
	private static $backLink = '';


  /**
  * Method that checks what links are pressed. Based on that, 
  * it will generate either all the links or link to home
  * @return string
  */
	public function renderLink() {

 	 	if($this->anyLinkPressed() == false){
 	 		return $this->renderLinks();
 	 	}
   	else{
 	 		return $this->renderBackLink();
 	 	}
 	 }

  //bunch of getters

	public function areaLinkPressed() {	
    	return isset($_GET[self::$areaLink]);
  	}

  public function lengthLinkPressed() {	
    	return isset($_GET[self::$lengthLink]);
  	}

  public function currencyLinkPressed() { 
      return isset($_GET[self::$currencyLink]);
    }

  public function temperatureLinkPressed() { 
      return isset($_GET[self::$temperatureLink]);
    }

  public function weightLinkPressed() { 
      return isset($_GET[self::$weightLink]);
    }

  public function speedLinkPressed() { 
      return isset($_GET[self::$speedLink]);
    }

  public function caseLinkPressed() { 
      return isset($_GET[self::$caseLink]);
    }

  public function volumeLinkPressed() { 
      return isset($_GET[self::$volumeLink]);
    }

  public function timeLinkPressed() { 
      return isset($_GET[self::$timeLink]);
    }

  public function angleLinkPressed() { 
      return isset($_GET[self::$angleLink]);
    }

  public function bytesLinkPressed() { 
      return isset($_GET[self::$bytesLink]);
    }

  /**
  * Method that checks if any of the following links are pressed
  * @return boolean
  */
  public function anyLinkPressed() {
      if(
        isset($_GET[self::$lengthLink]) || 
        isset($_GET[self::$areaLink])|| 
        isset($_GET[self::$weightLink])|| 
        isset($_GET[self::$temperatureLink])|| 
        isset($_GET[self::$currencyLink])|| 
        isset($_GET[self::$volumeLink])||
        isset($_GET[self::$caseLink])||
        isset($_GET[self::$caseLink])||
        isset($_GET[self::$speedLink])||
        isset($_GET[self::$timeLink])||
        isset($_GET[self::$angleLink])||
        isset($_GET[self::$bytesLink])) 
            return true;
          else
            return false;
    }
    
  /**
  * Method that returns HTML string of converter links
  * @return string HTML
  */
	public function renderLinks() {
      return "<center><div align= 'center' style='width:200px;height:380px;padding:10px;border:10px solid yellowgreen;'>
      		  
      		  <a href='?" . self::$lengthLink . "'>Length</a><br /><br />
      		  <a href='?" . self::$weightLink . "'>Weight</a><br /><br />
            <a href='?" . self::$speedLink . "'>Speed</a><br /><br />
      		  <a href='?" . self::$temperatureLink . "'>Temperature</a><br /><br />
            <a href='?" . self::$areaLink . "'>Area</a><br /><br />
            <a href='?" . self::$angleLink . "'>Angle</a><br /><br />
            <a href='?" . self::$volumeLink . "'>Volume</a><br /><br />
            <a href='?" . self::$timeLink . "'>Time</a><br /><br />
            <a href='?" . self::$bytesLink . "'>Bytes</a><br /><br />
      		  <a href='?" . self::$currencyLink . "'>Currency</a><br /><br />
            <a href='?" . self::$caseLink . "'>Case Converter</a><br /><br />
            </div></center>";
 	 }

  /**
  * Method that returns HTML string of home link
  * @return string HTML
  */
 	 public function renderBackLink() {
      return "<center><a href='?" . self::$backLink . "'>Home</a></center><br />";
 	 }
}
