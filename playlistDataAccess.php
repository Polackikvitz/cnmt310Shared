<?php

function readPlayView(){
	$fh = @fopen("../webfiles/playQueue.txt","r");
	$queue = array(array());

	if(is_resource($fh)){
		while($line = fgets($fh)){
			$array1 = array();
			$array2 = array();
			$creds = explode("|", $line);
			$array2[] = rtrim($creds[0]);
			$array2[] = rtrim($creds[1]);
			$array2[] = rtrim($creds[2]);
			$array2[] = rtrim($creds[3]);
            $array2[] = rtrim($creds[4]);
			$queue[] = $array2;
			
		}
	}
	return $queue;
}

function addToQueue($title,$artist,$album,$label){
	$fh = @fopen("../webfiles/playQueue.txt","a");
	$toWrite = $title."|".$artist."|".$album."|".$label."|".date("Y-m-d H:i:s").PHP_EOL;
	if(is_resource($fh)){
		fwrite($fh,$toWrite);
	}
	return false;
}
?>
