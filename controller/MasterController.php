<?php

class MasterController{

	private $nv;
 
	public function __construct() {
			
			$this->nv = new NavigationView();
 
		}

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
     if ($this->nv->weightLinkPressed()){
      		return new WeightView();
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
     else return new HomeView();
	}
	
}