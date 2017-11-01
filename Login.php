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

$page->addBodyItem("<p>Login</p>\n
<form method=\"post\" action=\"PageGo.php\">\n
Username:  <input type=\"text\" name=\"userName\"><br />\n
Password:  <input type=\"password\" name=\"password\"><br />\n
<input type=\"submit\" name=\"submit\" value='Login'>");

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