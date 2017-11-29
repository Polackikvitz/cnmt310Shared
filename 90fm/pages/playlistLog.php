<?php

require_once("../common/90fm.php");

$body = "";
$page = new WWSP("90FM");
$page->addHeadItem("<link rel='stylesheet' type='text/css' href='../css/style.css'>");

$body .= "<p>Form</p>
	<form method='GET' action='PageGo.php'>
	<br />
	Title:  <input type='text' name='title'><br />
	Artist:  <input type='text' name='artist'><br />
	Album:  <input type='text' name='album'><br />
	Label:  <input type='text' name='label'><br />
	<input type='submit' name='submit' value='Submit'>
	</form>
	<img src='../img/90FMLogo.png'>";


if(isset($_GET['title'])&&isset($_GET['artist'])&&isset($_GET['album'])&&isset($_GET['label']))
{
	$title = $_GET['title'];
	$artist = $_GET['artist'];
	$album = $_GET['album'];
	$label = $_GET['label'];
	addToQueue($title,$artist,$album,$label);
}

//$arrayListOf = readPlayView();



$body .= "<p name='list'>";
/*
for($i = count($arrayListOf)-1; $i > 0; $i--){
	$page->addBodyItem("<br>");
	for($j = 0; $j < count($arrayListOf[$i]); $j++){
		$page->addBodyItem($arrayListOf[$i][$j]."<br>");
	}
	
}
*/

$page->setTop();
$page->setBottom();

print $page->getTop();
print $body;
print $page->getBottom();

?>
