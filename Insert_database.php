<?php

session_start();

require_once("PageGo.php");
require_once("DbClass.php");

$database = new DB();

if (!$database->getConnStatus()) {

  print "An error has occurred with connection\n";

  exit;

}

$safeQuery= "";
$result= " ";

if(isset($_POST['title'])&&isset($_POST['artist'])&&isset($_POST['album'])&&isset($_POST['label']))
{

$safeTitle = $database->dbEsc($_POST['title']);
$safeArtist = $database->dbEsc($_POST['artist']);
$safeAlbum = $database->dbEsc($_POST['album']);
$safeLabel = $database->dbEsc($_POST['label']);
}

$query = "";
#INSERT STATEMENTS
IF (isset($_POST['title'])){
$query .= "INSERT INTO Song (title, albumID, artistID)" .
"VALUES ('{$safeTitle}',(SELECT id FROM album al WHERE al.name='{$safeAlbum}'),
(SELECT id FROM artist al WHERE al.name='{$safeAlbum}'))
WHERE NOT EXISTS (SELECT * FROM Song s
Join Artist a
ON a.id = s.artistID
Join Album al
ON al.id = s.albumID
WHERE s.title = '{$safeTitle}'
And a.name = '{$safeArtist}'
And al.name = '{$safeAlbum}');";
$safeQuery .= $database->dbEsc($query);

}

IF (isset($_POST['artist'])){
$query .= "INSERT INTO Artist (name)" .
"VALUES ('{$safeArtist}')
WHERE NOT EXISTS (SELECT * FROM Artist WHERE artist = '{$safeArtist}');";
$safeQuery .= $database->dbEsc($query);

}

IF (isset($_POST['label'])){
$query .= "INSERT INTO Label (name)" .
"VALUES ('{$safeLabel}')
WHERE NOT EXISTS (SELECT * FROM Label WHERE label = '{$safeLabel}');";
$safeQuery .= $database->dbEsc($query);

}

IF (isset($_POST['album'])){
$query .= "INSERT INTO Albumn (name)" .
"VALUES ('{$safeAlbum}')
WHERE NOT EXISTS (SELECT * FROM Albumn WHERE album = '{$safeAlbum}');";
$safeQuery .= $database->dbEsc($query);

}

$query .= " INSERT INTO played(songID, time, stackID, djID)" .
"Values(songName, playTime, playStackID, djsID);";

$safeQuery .= $database->dbEsc($query);
$result .= $database->dbCall($safeQuery);

if (!$result) { 

print "Error\n";
 
exit;
 
}
 

/*STATEMENTS //If have issue with join queries maybe move Set into each query */
$query .= " 
Set songName = '';
Set albumName = '';
Set artistName = '' ;
Set labelName = '';
Set playTime = now();
Set djsID = '';
Set albumLabelID = 0;
Set songArtistID = 0;
Set songAlbumnID = 0;
Set playStackID = 0;
";

$query .= " 
Select *
	From  song 
	Join album
	On song.albumID = album.id
	Join artist
	On song.artistID = artist.id
	Join label
	On albumn.labelID = label.id
	Where song.name = titleName
	And album.name = albumName
	And artist.name = artistName
	And label.name = labelName;";

$query .= " 
Select *
From artist
Where artist.name = artistName;";

$query .= " 
  Select *
From album
Join label
On album.labelID = label.id
Where album.name = albumName
And label.name = labelName;";

$query .= " 
Select *
From label
Where label.name = labelName;";

$safeQuery .= $database->dbEsc($query);


$result .= $database->dbCall($safeQuery);

if (!$result) { 

print "Error\n";
 
exit;
 
}
 

var_dump($result);


/*
#Update 

$query .= "UPDATE Songs SET title= 'testupdate'
WHERE ('{$safeArtist}');";

$safeQuery .= $database->dbEsc($query);


$result .= $database->dbCall($safeQuery);

if (!result) { 

print "Error\n";
 
exit;
 
}
 

print "Update statement executed, affected rows: " . $result . "\n"; 
*/

?>