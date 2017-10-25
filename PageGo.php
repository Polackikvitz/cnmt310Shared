<?php

require_once("PageAssignment.php");

require_once("playlistDataAccess.php");

$page = new Page("90FM Form");



$page->addHeadItem(
"<link rel='stylesheet' type='text/css' href='assgn2.css'>"
);

$page->addHeadItem(
"<h1>WWSP-90FM</h1>
<h3>Your Only Alternative</h3>
");

$page->addBodyItem("<p>Form</p>
<form method='GET' action='PageGo.php'>
<br />
Title:  <input type='text' name='title'><br />
Artist:  <input type='text' name='artist'><br />
Album:  <input type='text' name='album'><br />
Label:  <input type='text' name='label'><br />
<input type='submit' name='submit'>
</form>

<img src = '../webfiles/90FMLogo.png'
              >"
					);




if(isset($_GET['title'])&&isset($_GET['artist'])&&isset($_GET['album'])&&isset($_GET['label']))
{
	$title = $_GET['title'];
	$artist = $_GET['artist'];
	$album = $_GET['album'];
	$label = $_GET['label'];
	addToQueue($title,$artist,$album,$label);
}

$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );

$page->addBodyItem("<p name='list'>");
for($i = 0; $i < count($cars); $i++){
	$page->addBodyItem("<br>");
	for($j = 0; $j < count($cars[$i]); $j++){
		$page->addBodyItem($cars[$i][$j]."<br>");
	}
	
}
$page->addBodyItem("</p>");
$page ->addBottomItem(
"<a href='#'>Private Policy</a>
  <a href='#'>Help</a>
  <a href='#'>About us</a>
");


$page->setTop();
$page->setBody();
$page->setBottom();

print $page->getTop();
print $page->getBody();
print $page->getBottom();

?>