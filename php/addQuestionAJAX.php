<?php 


if(isset($_POST['eposta'])){

include 'configEzarri.php';

$eposta = trim($_POST['eposta']);
$galdera= trim($_POST['galdera']);
$zuzena= trim($_POST['erantzun1']);
$okerra1= trim($_POST['erantzun2']);
$okerra2= trim($_POST['erantzun3']);
$okerra3= trim($_POST['erantzun4']);
$zailtasuna= trim($_POST['zailtasuna']);
$arloa= trim($_POST['arloa']);

echo '<center><div id="guztia"><p>';

if(!preg_match("^[a-zA-Z][0-9]{3}@ikasle\.ehu\.eu?s^", $eposta)){
	echo "		Eposta gaizki jarri duzu.";
	exit(1);
}
if(!preg_match("^.{10,}^", $galdera)){
	echo "		Galderaren luzera ez da zuzena.";
	exit(1);
}
if(strlen($zuzena)==0){
	echo "		Erantzun zuzenean zerbait idatzi behar da.";
	exit(1);
}
if(strlen($okerra1)==0){
	echo "		Erantzun zuzenean zerbait idatzi behar da.";
	exit(1);
}
if(strlen($okerra2)==0){
	echo "		Erantzun oker guztietan zerbait idatzi behar da.";
	exit(1);
}
if(strlen($okerra3)==0){
	echo "		Erantzun oker guztietan zerbait idatzi behar da.";
	exit(1);
}
if(strlen($arloa)==0){
	echo "		Arloan zerbait idatzi behar da.";
	exit(1);
}
if(!preg_match("^[1-5]{1}^", $zailtasuna)){
	echo "		Zailtasuna ez da zuzena.";
}

$sql = "INSERT INTO questions(eposta,galdera,zuzena,okerra1,okerra2,okerra3,zailtasuna,arloa,irudia)
		VALUES('$_POST[eposta]','$_POST[galdera]','$_POST[erantzun1]','$_POST[erantzun2]','$_POST[erantzun3]','$_POST[erantzun4]','$_POST[zailtasuna]','$_POST[arloa]','0')";

		
if(!$niremysqli->query($sql)){
	die('Errorea: ' . $niremysqli->error);
	echo "Errorea gertatu da datu basean txertatzean!";
	exit(1);
}



$niremysqli->close();
	
	
	

	/*
	XML
	*/
try{
$galderakXML = simplexml_load_file("../xml/questionsTransAuto.xml");

$assessmentItem = $galderakXML->addChild('assessmentItem');
$assessmentItem->addAttribute('complexity', $zailtasuna);
$assessmentItem->addAttribute('subject', $arloa);

$itemBody = $assessmentItem->addChild('itemBody');
$p = $itemBody -> addChild('p',$galdera);

$correctResponse = $assessmentItem->addChild('correctResponse');
$value = $correctResponse -> addChild('value',$zuzena);

$incorrectResponses = $assessmentItem->addChild('incorrectResponses');
$value1 = $incorrectResponses -> addChild('value1',$okerra1);
$value2 = $incorrectResponses -> addChild('value2',$okerra2);
$value3 = $incorrectResponses -> addChild('value3',$okerra3);

echo $galderakXML -> asXML("../xml/questionsTransAuto.xml");


$XML2 = new SimpleXMLElement('../xml/questions.xml', null, true);

$assessmentItem = $XML2->addChild('assessmentItem');
$assessmentItem->addAttribute('complexity', $zailtasuna);
$assessmentItem->addAttribute('subject', $arloa);

$itemBody = $assessmentItem->addChild('itemBody');
$p = $itemBody -> addChild('p',$galdera);

$correctResponse = $assessmentItem->addChild('correctResponse');
$value = $correctResponse -> addChild('value',$zuzena);

$incorrectResponses = $assessmentItem->addChild('incorrectResponses');
$value1 = $incorrectResponses -> addChild('value',$okerra1);
$value2 = $incorrectResponses -> addChild('value',$okerra2);
$value3 = $incorrectResponses -> addChild('value',$okerra3);

echo $XML2 -> asXML("../xml/questions.xml");


 

}catch(Exception $e){
	echo 'Arazoa XML fitxategian txertatzean!';
	exit(1);
}



}
echo 'Galdera egoki txertatu da!';
echo '</p></div></center>';
?>
