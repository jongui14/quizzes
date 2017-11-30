<?php 

session_start (); 

$kontagailua = simplexml_load_file("../xml/counter.xml");

$online = $kontagailua->kopurua;
$online = (int) $online;
$online--;
									
$kontagailua->kopurua[0]=$online;
			
			
echo $kontagailua -> asXML("../xml/counter.xml");
		
unset($_SESSION['erabiltzailea']);
		
session_destroy ();
						
//echo '<script language="javascript" type="text/javascript">location.href="layoutR.php?eposta='.$_GET["eposta"].' "</script>';

?>