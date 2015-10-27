<?php 

require_once('view/HomeView.php');
require_once('view/LayoutView.php');
require_once('view/DateTimeView.php');
require_once('view/NavigationView.php');
require_once('controller/Controller.php');

require_once('view/AreaView.php');
require_once('model/UnitModel.php');
require_once('view/LengthView.php');
require_once('view/MassView.php');
require_once('view/TemperatureView.php');
require_once('view/CurrencyView.php');
require_once('view/CaseView.php');
require_once('view/SpeedView.php');
require_once('view/VolumeView.php');
require_once('view/TimeView.php');
require_once('view/AngleView.php');
require_once('view/BytesView.php');
require_once('model/MassModel.php');
require_once('model/AreaModel.php');
require_once('model/CurrencyModel.php');
require_once('model/LengthModel.php');
require_once('model/SpeedModel.php');
require_once('model/TemperatureModel.php');
require_once('model/VolumeModel.php');
require_once('model/TimeModel.php');
require_once('model/CaseModel.php');
require_once('model/AngleModel.php');
require_once('model/BytesModel.php');

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$lv = new LayoutView();
$dtv = new DateTimeView();
$nv = new NavigationView();
$c = new Controller();
$view = $c->start();

$lv->render($dtv, $nv, $view);
