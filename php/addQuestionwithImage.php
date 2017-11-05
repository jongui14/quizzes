<?php 

include 'configEzarri.php';

$eposta = trim($_POST['eposta']);
$galdera= trim($_POST['galdera']);
$zuzena= trim($_POST['erantzun1']);
$okerra1= trim($_POST['erantzun2']);
$okerra2= trim($_POST['erantzun3']);
$okerra3= trim($_POST['erantzun4']);
$zailtasuna= trim($_POST['zailtasuna']);
$arloa= trim($_POST['arloa']);
$irudia=addslashes (file_get_contents($_FILES['igoIrudia']['tmp_name']));

if(!preg_match("^[a-zA-Z][0-9]{3}@ikasle\.ehu\.eu?s^", $eposta)){
	echo "		Eposta gaizki jarri duzu.";
	echo "<a href='../quizzes/addQuestion5.html'>Berriz betetzeko.</a>";
	exit(1);
}
if(!preg_match("^.{10,}^", $galdera)){
	echo "		Galderaren luzera ez da zuzena.";
	echo "<a href='../quizzes/addQuestion5.html'>Berriz betetzeko.</a>";
	exit(1);
}
if(strlen($zuzena)==0){
	echo "		Erantzun zuzenean zerbait idatzi behar da.";
	echo "<a href='../quizzes/addQuestion5.html'>Berriz betetzeko.</a>";
	exit(1);
}
if(strlen($okerra1)==0){
	echo "		Erantzun zuzenean zerbait idatzi behar da.";
	echo "<a href='../quizzes/addQuestion5.html'>Berriz betetzeko.</a>";
	exit(1);
}
if(strlen($okerra2)==0){
	echo "		Erantzun oker guztietan zerbait idatzi behar da.";
	echo "<a href='../quizzes/addQuestion5.html'>Berriz betetzeko.</a>";
	exit(1);
}
if(strlen($okerra3)==0){
	echo "		Erantzun oker guztietan zerbait idatzi behar da.";
	echo "<a href='../quizzes/addQuestion5.html'>Berriz betetzeko.</a>";
	exit(1);
}
if(strlen($arloa)==0){
	echo "		Arloan zerbait idatzi behar da.";
	echo "<a href='../quizzes/addQuestion5.html'>Berriz betetzeko.</a>";
	exit(1);
}
if(!preg_match("^[1-5]{1}^", $zailtasuna)){
	echo "		Zailtasuna ez da zuzena.";
	echo "<a href='../quizzes/addQuestion5.html'>Berriz betetzeko.</a>";
	exit(1);
}
$sql = "INSERT INTO questions(eposta,galdera,zuzena,okerra1,okerra2,okerra3,zailtasuna,arloa,irudia)
		VALUES('$_POST[eposta]','$_POST[galdera]','$_POST[erantzun1]','$_POST[erantzun2]','$_POST[erantzun3]','$_POST[erantzun4]','$_POST[zailtasuna]','$_POST[arloa]','$irudia')";

		
if(!$niremysqli->query($sql)){
	die('Errorea: ' . $niremysqli->error);
	echo "Errorea gertatu da!";
	echo "<a href='../quizzes/addQuestion5.html'>Galdera berria egin.</a>";
}


$niremysqli->close();

echo '<script language="javascript" type="text/javascript"> location.href="afterQuestion.php?eposta='.$eposta.'"</script>';


?>