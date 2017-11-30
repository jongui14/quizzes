<?php

$eposta = trim($_GET['eposta']);
$pasahitza = trim($_GET['pasahitza']);

include 'configEzarri.php';


$kodea='websistemak';
$pass=crypt($pasahitza,$kodea);

$sql = "UPDATE users
		SET pasahitza='$pass'
		WHERE eposta='$eposta'";

		
if(!$niremysqli->query($sql)){
		die('Errorea: ' . $niremysqli->error);
		echo ("Errorea gertatu da!");
		echo ("<a href='./layoutR.php'>Berriro saiatu.</a>");
	}

$niremysqli->close();

echo 'ONDO';


?>