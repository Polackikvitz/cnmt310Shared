<?php

require_once("../common/90fm.php");

$body = "";
$page = new WWSP("Top five this week");
$page->addHeadItem("<link rel='stylesheet' type='text/css' href='../css/style.css'>");

$txt = htmlspecialchars($_GET['stack']);

$body .= "Displaying stack:  " ;
$body .= $txt;

if($_GET['stack']=="honda"){
	$body .= "<p>The best tec is VTEC :)</p>";
}

/*$query = "Select Songs.title, Artist.name, numPlays.countPlay
from Songs, Artist, Played, 
	(Select  Songs.title, Count(Played.songID) AS countPlay
    From Songs, Played
    WHERE Played.time between adddate(now(),-7) and now() AND Songs.id = Played.songID
		AND Played.stackID = $txt
    Group By Songs.title) numPlays
where Played.songID = Songs.ID AND Songs.artistID = Artist.id 
	AND Songs.title = numPlays.title
order by numPlays.countPlay DESC
limit 5;";
$result = mysqli_query($link,$query);
if (!result) {
print "Error\n";
exit;
}
while ($valueArray = mysqli_fetch_assoc($result)) {
    var_dump($valueArray);
}*/


$page->setTop();
$page->setBottom();

print $page->getTop();
print $body;
print $page->getBottom();

?>