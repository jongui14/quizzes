<?php 
$kontagailua = simplexml_load_file("../xml/counter.xml");

$online = $kontagailua->kopurua;
$online = (int) $online;
$online--;
									
$kontagailua->kopurua[0]=$online;
			
			
echo $kontagailua -> asXML("../xml/counter.xml");
			
						
//echo '<script language="javascript" type="text/javascript">location.href="layoutR.php?eposta='.$_GET["eposta"].' "</script>';

?>