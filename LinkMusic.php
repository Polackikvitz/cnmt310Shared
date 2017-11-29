<?php

require_once("PageAssignment.php");
require_once("DbClass.php");
$page = new Page("LinkPage");
$database = new DB();
$database->__construct();

$page->addBodyItem("<p>Current Hour</p>");

$database-> dbConnect();
if (!$database->getConnStatus()) { 
print "An error has occurred with connection\n"; 
exit; 
} 
$query = "";
$safeQuery = "";
$result = "";

$query = " 
Set @startTime = GETDATE();
Set @endTime = DATEADD(hh,1,GETDATE());
Select stack.name, song.title, artist.name,albumn.name, label.name
from played, stack, song, artist, albumn, label
where played.stackID = stack.id AND played.songID = song.id AND song.albumnID = albumn.id AND 
albumn.labelID = label.id AND (song.artistID = artist.id AND played.time between startTime and endTime)
ORDER BY played.time asc; ";

$safeQuery = $database->dbEsc($query);

$result = $database->dbCall($safeQuery);

if (!$result) { 

$result = print "Error1\n";
 
}
 
print($result);


$page->addBodyItem("<form action='LinkMusic.php' method='POST'>
<input type='submit' value='myFunction1()' text='Pevious Hour Playlist' name='torun' /></form> ");

$page->addBodyItem("<form action='LinkMusic.php' method='POST'>
<input type='submit' value='myFunction2()' text='Pevious Hour Playlist' name='torun1' /></form> ");

if ($_POST['torun']== "myFunction1()"){
	
$query = " 
Set @stTime = DATEADD(hh,-1,GETDATE());
Set @edTime = GETDATE();
Select stack.name, song.title, artist.name,albumn.name, label.name
FROM played, stack, song, artist, albumn, label
WHERE played.stackID = stack.id AND played.songID = song.id AND song.albumnID = albumn.id AND 
albumn.labelID = label.id AND (song.artistID = artist.id AND played.time between stTime and edTime)
ORDER BY played.time asc; ";

$safeQuery = $database->dbEsc($query);
$result = $database->dbCall($safeQuery);

if (!$result) { 

$result = print "Error2\n";
 
exit;
 
}
 
return $result;

}
	
	
if($_POST['torun1'] == "myFunction2()"){
	
	$query = " 
Set @startTime = GETDATE();
Set @sTime = DATEADD(hh,1,GETDATE());
Set @eTime = GETDATE();
Select stack.name, song.title, artist.name,albumn.name, label.name
from played, stack, song, artist, albumn, label
where played.stackID = stack.id AND played.songID = song.id AND song.albumnID = albumn.id AND 
albumn.labelID = label.id AND (song.artistID = artist.id AND played.time between sTime and eTime)
ORDER BY played.time asc;";

$safeQuery = $database->dbEsc($query);

$result = $database->dbCall($safeQuery);

if (!$result) { 

print "Error3\n";
 
exit;
 
}

return $result;
}

$page->setTop();
$page->setBody();
$page->setBottom();

print $page->getTop();
print $page->getBody();
print $page->getBottom();

?>