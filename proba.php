<?php

		$lineas = file("txt/toppasswords.txt");

		foreach ($lineas as $linea_num => $linea) {
			echo $linea.'  '.strlen($linea).'<br />';
			if(trim($linea)==$_GET['pasahitza']){
				echo $linea.'  '.strlen($linea).'BAAAAI'.'<br />';
			}	
		}



?>