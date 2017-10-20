<?php 

include 'configEzarri.php';

$irudia=addslashes (file_get_contents($_FILES['igoIrudia']['tmp_name']));

$sql = "INSERT INTO questions(eposta,galdera,zuzena,okerra1,okerra2,okerra3,zailtasuna,arloa,irudia)
		VALUES('$_POST[eposta]','$_POST[galdera]','$_POST[erantzun1]','$_POST[erantzun2]','$_POST[erantzun3]','$_POST[erantzun4]','$_POST[zailtasuna]','$_POST[arloa]','$irudia')";

		
if(!$niremysqli->query($sql)){
	die('Errorea: ' . $niremysqli->error);
	echo "Errorea gertatu da!";
	echo "<a href='../quizzes/addQuestion5.html'>Galdera berria egin.</a>";
}
echo "Erregistro bat gehitu da!";
echo "<p><a href='showQuestionsWithImages.php'>Erregistroak ikusi</a>";


$niremysqli->close();

?>