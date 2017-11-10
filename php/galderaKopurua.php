<?php

include 'configEzarri.php';

$eposta = trim($_GET['eposta']);
$guztiak=$niremysqli->query("select * from questions");
$nireak=$niremysqli->query("select * from questions where eposta='$eposta'");

$kont1=0;
$kont2=0;

while($row1=$guztiak->fetch_object() ){
	$kont1++;
}

while($row2=$nireak->fetch_object() ){
	$kont2++;
}

echo '<p>Guztiak: '.$kont1.'  Nireak: '.$kont2.'</p>';

$guztiak->close();
$nireak->close();

$niremysqli->close();


?>