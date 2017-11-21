<?php

//nusoap.phpklasea gehitzen dugu
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

//HEMEN AZPIKO LINK HAU ALDATU BEHAR DEZU
$soapclient = new nusoap_client('http://localhost/lab/lab6/php/getQuestionWZ.php?wsdl');



if(isset($_GET['indizea'])){	
	$result=$soapclient->call("getQuestion",array( 'x'=>$_GET['indizea']));
	echo $result;
}

?>