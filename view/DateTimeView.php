<?php

date_default_timezone_set("Europe/Sarajevo");
class DateTimeView {


	public function show() {

		$timeString = date("l") . ', the '. date("jS") . ' of ' . date("F") . ' ' . date("o") . ', The time is ' . date("G:i");

		return '<br /><center><p>' . $timeString . '</p></center>';
	}
}