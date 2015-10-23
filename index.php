<?php 

require_once('view/HomeView.php');
require_once('view/LayoutView.php');
require_once('view/DateTimeView.php');
require_once('view/NavigationView.php');
require_once('controller/MasterController.php');

require_once('view/AreaView.php');
require_once('model/UnitModel.php');
require_once('view/LengthView.php');
require_once('view/WeightView.php');
require_once('view/TemperatureView.php');
require_once('view/CurrencyView.php');
require_once('view/CaseView.php');
require_once('view/SpeedView.php');
require_once('view/VolumeView.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$v = new HomeView();
$lv = new LayoutView();
$dtv = new DateTimeView();
$nv = new NavigationView();
$mc = new MasterController();
$view = $mc->start();

$lv->render($dtv, $nv, $view);
