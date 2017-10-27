<?php

require_once "verifyPresident.php";
require_once "Page.php";

$failure = false;

$page = new Page("The Football");

$page->addHeadItem("<link rel='stylesheet' type='text/css' href='pretty.css'>");

$page->addBodyItem("<p>");

if(checkForm($_POST['userName']))
{
	if(!verifyUserName($_POST['userName'])){
		$page->addBodyItem("Mr. President?");
		$failure = true;
	}
}
else
{
	$page->addBodyItem("Please enter your name Mr.President");
	$failure = true;
}

if(checkForm($_POST['password']))
{
	if(verifyPassword($_POST['password'])){
		$page->addBodyItem("M.A.D. has begun...");
	}
	else{
		$page->addBodyItem("DIE IMPOSTER COMMIE!!!!!");
	}
}
else
{
	$page->addBodyItem("\n<br/>Please enter your Password Mr.President");
	$failure = true;
}

$page->addBodyItem("</p>");
if($failure){
	$page->addBodyItem("<form action=\"http://cnmtsrv2.uwsp.edu/~ehodk843/lab3_home.php\">
		<input type=\"submit\" value=\"Try Again Mr.President\" />
		</form>");
}

$page->setTop();
$page->setBody();
$page->setBottom();

print $page->getTop();
print $page->getBody();
print $page->getBottom();
?>