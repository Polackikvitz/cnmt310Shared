<?php

require_once "PageAssignment.php";

require_once "playlistDataAccess.php";

session_start();

function verifyCredentials($userName, $password){
    $_SESSION['valid'] = false;
$fh = @fopen("password.txt","r");
	if(is_resource($fh)){
		while($line = fgets($fh)){
			$creds = explode("|", $line);
			if ($userName == rtrim($creds[0]))
			{
                if ($password == rtrim($creds[1]))
			     {
				    $_SESSION['valid'] = true;
			     }
			}
		}
	}
}
    
?>