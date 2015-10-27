<?php
/**
* Controller class that decides on wanted convert option
* @author Mirza Durakovic
*/
class Controller{

  /**
  * @var NavigationView class object
  */
	private $nv;
 
	public function __construct() {
			
			$this->nv = new NavigationView();
 
		}

  /**
  * The method checks what link is pressed
  * and based on that returns the wanted View
  * @return wanted view
  */
	public function start(){
		  if ($this->nv->areaLinkPressed()){
      		return new AreaView();
      }
      if ($this->nv->lengthLinkPressed()){
      		return new LengthView();
      }
      if ($this->nv->currencyLinkPressed()){
     		  return new CurrencyView();
      }
     if ($this->nv->temperatureLinkPressed()){
      		return new TemperatureView();
      }
     if ($this->nv->massLinkPressed()){
      		return new MassView();
      }
     if ($this->nv->speedLinkPressed()){
          return new SpeedView();
      }
     if ($this->nv->caseLinkPressed()){
      		return new CaseView();
      }
     if($this->nv->volumeLinkPressed()){
          return new VolumeView();
     }
     if($this->nv->timeLinkPressed()){
          return new TimeView();
     }
     if($this->nv->angleLinkPressed()){
          return new AngleView();
     }
     if($this->nv->bytesLinkPressed()){
          return new BytesView();
     }
     else return new HomeView();
	}
	
}