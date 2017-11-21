<?php
	//nusoap.php klasea gehit d zenugu
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');

	//soapcli t en mot da un obj kt e ua sort d htt // d i / h tzen dugu. http://www.mydomain.com/server.php
	//erabiliko den SOAP zerbitzua non dagoen zehazten url horrek
	$soapclient = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl', true);

	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
	//eta itzultzen diguna inprimatzen dugu
	if (isset($ POST['batu _ gai1'])){
		echo '<h1>Batuketa da: ' . $soapclient->call('egiaztatuEmaila',array( 'x'=>$_POST['batugai1'],'y'=>$_POST['batugai1'])). '</h1>';
		echo '<h2>Request</h2><pre>'.htmlspecialchars($soapclient->request, ENT_QUOTES).'</pre>';
		echo '<h2>Response</h2><pre>'.htmlspecialchars($soapclient->response,ENT_QUOTES).'</pre>';

		
		

}
?>
		//echo '<h2>Debug</h2>';
		//echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';