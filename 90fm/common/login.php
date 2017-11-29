<?php

if(isset($_POST['uid'])&&isset($_POST['pwd'])){
	$_SESSION['login_user'] = false;
	$_SESSION['login_admin'] = false;
	$permissions = null;//permission bits from database 
	if(count($permissions) > 0)
	{
		if($permissions[0] == 1)
		{
			$_SESSION['login_user'] = true;
		}
		if($permissions[1] == 1)
		{
			$_SESSION['login_admin'] = true;
		}
		//reload page
		header("Location: http://cnmtsrv2.uwsp.edu/~ehodk843/90fm/90fmHome.php");
	}
	else
	{
		//print incorrect username/password
		header("Location: http://cnmtsrv2.uwsp.edu/~ehodk843/90fm/90fmHome.php");
		}
}
    
?>