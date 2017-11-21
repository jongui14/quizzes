<?php

//nusoap.phpklasea gehitzen dugu
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

//soapclientmotadun objektua sortzen dugu. http://www.mydomain.com/server.php 
//erabiliko den SOAP zerbitzua non dagoen zehazten url horrek

$soapclient = new nusoap_client('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl', true);


//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
//eta itzultzen diguna inprimatzen dugu

if(isset($_GET['eposta'])){
	
	$result=trim($soapclient->call("egiaztatuE",array( 'x'=>$_GET['eposta'])));
	
	echo $result;

}


?>