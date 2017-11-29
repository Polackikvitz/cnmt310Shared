<?php

require_once("PageAssignment.php");

require_once("playlistDataAccess.php");

require_once("verifyPresident.php");

$page = new Page("90FM Form");


$page->addHeadItem(
"<link rel='stylesheet' type='text/css' href='assgn2.css'>"
);

$page->addHeadItem(
"<h1>WWSP-90FM</h1>
<h3>Your Only Alternative</h3>
");
if(isset($_POST['userName'])&&isset($_POST['password']))
    verifyCredentials($_POST['userName'], $_POST['password']);
    
if(isset($_SESSION['valid'])){  
    
    if($_SESSION['valid']==true){
$page->addBodyItem("<p>Form</p>
<form method='POST' action='PageGo.php'>
<br />
Title:  <input type='text' name='title'><br />
Artist:  <input type='text' name='artist'><br />
Album:  <input type='text' name='album'><br />
Label:  <input type='text' name='label'><br />
<input type='submit' name='submit' value='Submit'>
</form>
<img src='90FMLogo.png'>"
					);




if(isset($_POST['title'])&&isset($_POST['artist'])&&isset($_POST['album'])&&isset($_POST['label']))
{
	$title = $_POST['title'];
	$artist = $_POST['artist'];
	$album = $_POST['album'];
	$label = $_POST['label'];
	addToQueue($title,$artist,$album,$label);
}

$arrayListOf = readPlayView();



$page->addBodyItem("<p name='list'>");
for($i = count($arrayListOf)-1; $i > 0; $i--){
	$page->addBodyItem("<br>");
	for($j = 0; $j < count($arrayListOf[$i]); $j++){
		$page->addBodyItem($arrayListOf[$i][$j]."<br>");
	}
	
}
        
    }else{
        $page->addBodyItem("Please use a valid username/password to log in.");
$page->addBodyItem("<form action=\"Login.php\">
		<input type=\"submit\" value=\"Login\" />
		</form>");
}
}else{
     $page->addBodyItem("Please log in to access the information on this page.");
$page->addBodyItem("<form action=\"Login.php\">
		<input type=\"submit\" value=\"Login\" />
		</form>");
}

$page->addBodyItem("</p>");

$page->addBodyItem("<form action='LinkMusic.php'>
<input type='submit' value='Current Hour Playlist'/></form> ");

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
