<?php

	$lokal=1;
	
	if($lokal==0){
			
		$niremysqli = new mysqli("localhost", "root", "", "quiz");
		
		if ($niremysqli->connect_errno) {
			die( "Huts egin du konexioak MySQL-ra: (".
			$niremysqli-> connect_errno . ") " .
			$niremysqli-> connect_error );
			
		}
		
		echo "Konexioa egin da:" . $niremysqli->host_info;
		
	}else{
					
		$niremysqli = new mysqli("localhost", "id2921316_jon", "websistemak", "id2921316_quiz");
		
		if ($niremysqli->connect_errno) {
			die( "Huts egin du konexioak MySQL-ra: (".
			$niremysqli-> connect_errno . ") " .
			$niremysqli-> connect_error );
			
		}
		
		echo "Konexioa egin da:" . $niremysqli->host_info;
		
	}

		
	
?>