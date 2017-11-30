<?php 
$kontagailua = simplexml_load_file("../xml/counter.xml");

$online = $kontagailua->kopurua;
$online = (int) $online;
$online++;
									
$kontagailua->kopurua[0]=$online;
			
			
$kontagailua -> asXML("../xml/counter.xml");
			
						
//echo '<script language="javascript" type="text/javascript">location.href="handlingQuizes.php?eposta='.$_GET["eposta"].' "</script>';

?>