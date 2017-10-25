<?php

function readPlayView(){
	$fh = @fopen("../webfiles/playQueue.txt","r");
	$queue = array(array());
	$lineNum = 0;

	if(is_resource($fh)){
		while($line = fgets($fh)&& $lineNum < 1){
			$array1 = array();
			$array2 = array();
			$creds = explode("|", $line);
			$array2[] = rtrim($creds[0]);
			$array2[] = rtrim($creds[1]);
			$array2[] = rtrim($creds[2]);
			$array2[] = rtrim($creds[3]);
			$queue[] = array2;
			
			//$queue[$lineNum][0] = rtrim($creds[0]);
			//$queue[$lineNum][1] = rtrim($creds[1]);
			//$queue[$lineNum][2] = rtrim($creds[2]);
			//$queue[$lineNum][3] = rtrim($creds[3]);
			$lineNum++;
		}
	}
	return $queue;
}

function addToQueue($title,$artist,$album,$label){
	$fh = @fopen("../webfiles/playQueue.txt","a");
	$toWrite = $title."|".$artist."|".$album."|".$label.PHP_EOL;
	if(is_resource($fh)){
		fwrite($fh,$toWrite);
	}
	return false;
}
?>
