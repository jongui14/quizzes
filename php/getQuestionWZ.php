<?php

	require_once('../lib/nusoap.php');
            
			
			
    $server = new nusoap_server();
	//HEMEN AZPIKO LINK HAU BAITA ALDATU BEHAR DEZU (HAU HODEIEK ETA HOLA ZEUKEAN BAINO LEHEN ZEUKEZUN MODUA BAITA USTET FUNTZIONAU BEHARKO ZOLA configureWSDL eta hoi...)
    $ns="https://websistemakjongui.000webhostapp.com/lab6/php/getQuestion.php?wsdl";
	$server->configureWSDL('getQuestion', $ns);
	$server->wsdl->schemaTargetNamespace = $ns;
	
	$server->register('getQuestion',array('x'=>'xsd:int'),array('e'=>'xsd:string'),$ns);

	function getQuestion($x){
	include 'configEzarri.php';
	$galderak=$niremysqli->query("select * from questions where id=$x");
	
	if ($galderak->num_rows > 0) {
		$galdera = $galderak->fetch_object();
		$erantzuna = "Galderaren testua: " . $galdera->galdera . "<br/>" . "Erantzun zuzena: " . $galdera->zuzena . "<br/>" . "Zailtasuna: " . $galdera->zailtasuna . "<br/>";
		return $erantzuna;
	}else{
		$erantzuna = "Galderaren testua: " . "<br/>". "Erantzun zuzena: " . "<br/>" . " Zailtasuna: 0 " . "<br/>";
		return $erantzuna;
	}
}

if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>