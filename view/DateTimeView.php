<?php
/**
* View class for Date and Time
* @author Mirza Durakovic
*/
date_default_timezone_set("Europe/Sarajevo");
class DateTimeView {

	/**
	* Method that returns html string of current time
	* @return string HTML
	*/
	public function show() {

		$timeString = date("l") . ', the '. date("jS") . ' of ' . date("F") . ' ' . date("o") . ', The time is ' . date("G:i");

		return '<br /><center><p>' . $timeString . '</p></center>';
	}
}