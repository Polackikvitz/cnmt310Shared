<?php

function checkForm($value) {
  $valueCheck = false;
  if (isset($value) && !empty($value)) {
    $valueCheck = true;
  }
  return $valueCheck;
} 

function verifyUserName($userName){
<<<<<<< HEAD
	$fh = @fopen("/home/ehodk843/webfiles/password.txt","r");
	if(is_resource($fh)){
		while($line = fgets($fh)){
			$creds = explode("|", $line);
			if ($userName == rtrim($creds[0]))
			{
				return true;
			}
		}
	}
	return false;
}

function verifyPassword($password){
		$fh = @fopen("/home/ehodk843/webfiles/password.txt","r");
	if(is_resource($fh)){
		while($line = fgets($fh)){
			$creds = explode("|", $line);
			if ($password == rtrim($creds[1]))
			{
				return true;
			}
		}
	}
	return false;
}
=======
	if($userName == "Mr.President"){
		return true;
	}
	else{
		return false;
	}
}

function verifyPassword($password){
	if($password == "Steveizdab0mb"){
		return true;
	}
	else{
		return false;
	}
}

>>>>>>> bcd5f2dc1f4089e39e0b15cd09fd8ba665d8cdba
?>
