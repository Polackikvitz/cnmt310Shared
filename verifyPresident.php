<?php


function checkForm($value) {
  $valueCheck = false;
  if (isset($value) && !empty($value)) {
    $valueCheck = true;
  }
  return $valueCheck;
} 

function verifyCredentials($userName, $password){
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
	$_SESSION['valid'] = false;
}



?>