<?php


	require_once('../lib/nusoap.php');
	
	$server = new nusoap_server();
	//HEMEN AZPIKO LINK HAU BAITA ALDATU BEHAR DEZU (HAU HODEIEK ETA HOLA ZEUKEAN BAINO LEHEN ZEUKEZUN MODUA BAITA USTET FUNTZIONAU BEHARKO ZOLA configureWSDL eta hoi...)
    $ns="https://websistemakjongui.000webhostapp.com/lab6/php/egiaztatuPasahitza.php?wsdl";
	$server->configureWSDL('egiaztatuPasahitza', $ns);
	$server->wsdl->schemaTargetNamespace = $ns;
	
	$server->register('egiaztatuPasahitza',array('x'=>'xsd:string'),array('e'=>'xsd:string'),$ns);

      
	//funtzioa inplementatzen dugu
	function egiaztatuPasahitza($x){
		
		$lerroak = fopen('../txt/toppasswords.txt','r');
		
		while (!feof($lerroak)){

			if (trim(fgets($lerroak)) == $x){
				
				fclose($lerroak);
				return "BALIOGABEA";
			}
		}
		
		fclose($lerroak);
		return "BALIOZKOA";

	}
      
	if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
	$server->service($HTTP_RAW_POST_DATA);
?>