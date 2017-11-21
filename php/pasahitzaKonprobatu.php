<?php

//nusoap.phpklasea gehitzen dugu
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$soapclient = new nusoap_client('http://localhost/lab/lab6/php/egiaztatuPasahitza.php');



if(isset($_GET['pasahitza'])){
	
	$result=trim($soapclient->call("egiaztatuPasahitza",array( 'x'=>$_GET['pasahitza'])));
	echo $result;
}

?>
