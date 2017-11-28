
<?php
function logEvent($event,$data)
{
	$date=date("Y-m-d"); // 2017-09-01 = 1 september 2017, datum is achteruit, zodat windows hem netjes sorteert.
	$logname="stats/".$date.".txt";
	$ip=$_SERVER['REMOTE_ADDR'];
	$time=date("H:i:s"); // uur 0-24, minuten met voorloop 0 , seconden met voorloop 0
	// regel die de gebeurtenis beschrijft.
	$log=$ip."|".$time."|".$event."|".$data.PHP_EOL;
	//PHP EOL = PHP end of line, dat teken kan per server verschillen
	file_put_contents($logname, $log, FILE_APPEND);
}

// dit script kun je makkelijk in een ander script invoegen
// je kunt daarna met logEvent("pageLoad","index.html");
// bijvoorbeeld een pageLoad event naar de logs schrijven.
// zorg dat er in de logs directory een .htaccess file staat met daarin "deny from all", anders kunnen mensen vanaf het internet erbij.


?>
