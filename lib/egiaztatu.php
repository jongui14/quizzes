<?php
	//nusoap.php klasea gehitzen dugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	//soap server motako objektua sortzen dugu 
	$server = new soap_server;
	
	//inplementatu nahi dugun funtzioa erregistratzen dugu
	//funtzio bat baino gehiago erregistra liteke …
	$server->register('egiaztatu');
	
	//funtzioa inplementatzen da
	function egiaztatu($eposta){
		return 'Bai';
	}
	
	//nusoap klaseko service metodoari dei egiten diogu
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
	
?>