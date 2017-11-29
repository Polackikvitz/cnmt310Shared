<?php

require_once("../common/90fm.php");

$body = "";
$page = new WWSP("Admin Edit");
$page->addHeadItem("<link rel='stylesheet' type='text/css' href='../css/style.css'>");

if(isset($_SESSION['login_admin']))
{
	if($_SESSION['login_admin'] == 1)
	{
		$body .= "<p>Admin Edit</p>";
	}
	else
	{
		$body.= "<p>Please login to an admin account</p>";
	}
}
else{
	$body .= "<p>Please login</p>";
}

$page->setTop();
$page->setBottom();

print $page->getTop();
print $body;
print $page->getBottom();

?>
