<?php


	require_once('../lib/nusoap.php');
      
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
      
    $server = new soap_server();
    $server->register("egiaztatuPasahitza");
    $server->service($HTTP_RAW_POST_DATA);

?>