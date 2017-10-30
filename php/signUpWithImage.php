<?php
include 'configEzarri.php';

$eposta = trim($_POST['eposta']);
$deitura= trim($_POST['deitura']);
$nick= trim($_POST['nick']);
$pasahitza= trim($_POST['pasahitza1']);
$argazkia=addslashes (file_get_contents($_FILES['igoIrudia']['tmp_name']));

$sql = "INSERT INTO users(eposta,deitura,nick,pasahitza,argazkia)
		VALUES('$_POST[eposta]','$_POST[deitura]','$_POST[nick]','$_POST[pasahitza1]','$argazkia')";

		
if(!$niremysqli->query($sql)){
	die('Errorea: ' . $niremysqli->error);
	echo "Errorea gertatu da!";
	echo "<a href='./signUp.html'>Berriro saiatu.</a>";
}
echo "Erabiltzaile bat gehitu da!";
echo "<p><a href='../layout.html'>Hasiera</a>";
echo "<p><a href='../php/singUp.html'>Beste erabiltzaile bat gehitu</a>";


$niremysqli->close();
	
?>