<?php

require_once("../common/90fm.php");

$body = "";
$page = new WWSP("90FM");
$page->addHeadItem("<link rel='stylesheet' type='text/css' href='../css/style.css'>");

$body .= "<p>Top 10 Songs of the Last 7 days</p>
		<form action='topTenPlayed.php' method='get'>
		<input type='submit' name='Top 10' value='Top 10'>
		</form>
		<br><br><br>
		<p>Top 5 Songs of the Last 7 days per stack</p>
		<form action='topFivePlayed.php' method='get'>
		<select name='stack'>
			<option value='volvo'>Volvo</option>
			<option value='saab'>Saab</option>
			<option value='mercedes'>Mercedes</option>
			<option value='audi'>Audi</option>
			<option value='pontiac'>Pontiac</option>
			<option value='honda'>Honda</option>
		</select>
		<br>
		<input type='submit' value='Top 5'>
		</form>
		";

$page->setTop();
$page->setBottom();

print $page->getTop();
print $body;
print $page->getBottom();

?>