<?php

require_once("PageAssignment.php");
$page = new PageAssignment("LinkPage");

$page->addBodyItem("<p>Recently Played</p>");
$page->addBodyItem("<p>PrevHour</p>

<a href="/home/jjord989/public_html/PageGo.php">EarlierHour</a>
");


?>