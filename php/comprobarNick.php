<?php


$nick = trim($_GET['nick']);

$eposta = trim($_GET['eposta']);

	include 'configEzarri.php';

	$ema=$niremysqli->query("select * from users where eposta='$eposta'");
	
	$lortutakoa=$row=$ema->fetch_object();

	if($lortutakoa==null){
		echo 'EZ';
	}else{
		
		if( $nick == $lortutakoa->nick){
			echo 'BAI';	
		}else{
			echo 'EZ';		
		}
	}

	


	$ema->close();
	$niremysqli->close();

?>