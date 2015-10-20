<?php

class NavigationView {


	private static $areaLink = "area";
	private static $lengthLink = "length";
	private static $weightLink = "weight";
	private static $temperatureLink = "temperature";
	private static $currencyLink = "currency";
	private static $volumeLink = "volume";
  private static $caseLink = "case";
	private static $backLink = '';

	public function renderLink() {

 	 	if($this->anyLinkPressed() == false){
 	 		return $this->renderLinks();
 	 	}
 	 	else{
 	 		return $this->renderBackLink();
 	 	}
 	 }

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

     public function caseLinkPressed() { 
      return isset($_GET[self::$caseLink]);
    }


    public function anyLinkPressed() {
        if(isset($_GET[self::$lengthLink]) || isset($_GET[self::$areaLink])|| isset($_GET[self::$weightLink])|| isset($_GET[self::$temperatureLink])|| isset($_GET[self::$currencyLink])|| isset($_GET[self::$volumeLink])||isset($_GET[self::$caseLink])) 
            return true;
          else
            return false;
    }
    

	 public function renderLinks() {
      return "<center><div style='width:200px;height:250px;padding:10px;border:10px solid yellowgreen;'>
      		  <a href='?" . self::$areaLink . "'>Area</a><br /><br />
      		  <a href='?" . self::$lengthLink . "'>Length</a><br /><br />
      		  <a href='?" . self::$weightLink . "'>Weight</a><br /><br />
      		  <a href='?" . self::$temperatureLink . "'>Temperature</a><br /><br />
      		  <a href='?" . self::$currencyLink . "'>Currency</a><br /><br />
      		  <a href='?" . self::$volumeLink . "'>Volume</a><br /><br />
            <a href='?" . self::$caseLink . "'>Case Converter</a></div></center><br /><br />";
 	 }

 	 public function renderBackLink() {
      return "<center><a href='?" . self::$backLink . "'>Home</a></center><br />";
 	 }

 	 public function backToIndex(){
		header('Location:/?');
	}


}
