<?php

require_once("Page.php");

$page = new Page("The Football");

$page->addHeadItem("<link rel='stylesheet' type='text/css' href='pretty.css'>");

$page->addBodyItem("<p>Mr President, the Russians have launched.</p>\n
<form method=\"post\" action=\"football.php\">\n
User Name:  <input type=\"text\" name=\"userName\"><br />\n
Password:  <input type=\"password\" name=\"password\"><br />\n
<input type=\"submit\" name=\"submit\" value=\"Launch\">");

$page->setTop();
$page->setBody();
$page->setBottom();

print $page->getTop();
print $page->getBody();
print $page->getBottom();

?>