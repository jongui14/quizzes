<!DOCTYPE>
<html>
  <head>
        <meta charset="utf-8">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script>
		$(document).ready(function(){
			
			$("input[type='reset']").on("click", function(event){
				$('#irudiaPantallan').attr('src', "undefined");

			});
			$("input[type='submit']").on("click", function(event){
				if(typeof ($('#irudiaPantallan').attr('src')) != "undefined"){
					$('#galderaSartu').attr('action', 'addQuestionwithImage.php');
				}
			});
			
			$('#igoIrudia').on('change', function(ev) {
				var f = ev.target.files[0];
				var fr = new FileReader();
				
				fr.onload = function(ev2) {
					console.dir(ev2);
					$('#irudiaPantallan').attr('src', ev2.target.result);
				};
				
				fr.readAsDataURL(f);
			});
			
		});
		
		</script>

    <title>Galdera Gehitu</title>
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleLab2.css' />

  </head>
  <body>		
	<a href="../layoutR.php?eposta=<?php echo($_GET["eposta"]); ?>"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;position: relative; top: 10px; left: 30px;"></a>
	
	<div align="right">
	<img src="
	<?php
	include 'configEzarri.php';
	$erab=$_GET["eposta"];
	$ema=$niremysqli->query("select * from users where eposta='$erab'");
	$row=$ema->fetch_object();
	$hutsa=$row->argazkia;
	if( $hutsa == '0'){
		echo '../img/hutsaGaldera.png';
	}else{
		echo 'data:image/jpeg;base64,'.base64_encode( $row->argazkia );
	}
	?>" id="profilekoArgazkia" style="width: 40px;height: 40px;position: relative; top: -15px;">
	<br><?php echo($_GET["eposta"]); ?>
	</div>

  	<div id="guztia">
	<h2>GALDERA GEHITU - HTML5</h2>
	<div id="galdetegia">
  	<form id="galderaSartu" name="galderaSartu" method="post" action="addQuestion.php" enctype="multipart/form-data">
	
	<font face="arial" align="left" >Egilearen eposta: </font><input type="email" name="eposta" id="eposta" placeholder="xxx001@ikasle.ehu.eus" value="<?php echo($_GET["eposta"]); ?>" pattern="[a-zA-Z]+[0-9]{3}@ikasle.ehu.eu?s" required><br><br>
	
	<font face="arial">Galdera:  </font><input type="text" name="galdera" id="galdera" pattern=".{10,}" required><span id="galderaOker"></span><br><br>
	
	<font face="arial">Erantzun zuzena:  </font><input type="text" name="erantzun1" id="erantzun1" required><br><br>
	<font face="arial">Erantzun okerra:  </font><input type="text" name="erantzun2" id="erantzun2" required><br><br>
	<font face="arial">Erantzun okerra:  </font><input type="text" name="erantzun3" id="erantzun3" required><br><br>
	<font face="arial">Erantzun okerra:  </font><input type="text" name="erantzun4" id="erantzun4" required><br><br>

	<font face="arial">Galderaren zailtasuna (1-5): </font><input type="number" name="zailtasuna" id="zailtasuna" min="1" max="5" required><br><br>
	<font face="arial">Galderaren gai-arloa: </font><input type="text" name="arloa" id="arloa" required><br><br>
	
	<font face="arial">Gehitu irudia:</font><input id="igoIrudia" name="igoIrudia" type="file" accept="image/*"><span id="argazkiaOker"></span><br><br>
	
	<img id="irudiaPantallan"/><br>
	
	<input id="boton1" class="botoia" type="submit" value="Galdera bidali">
	<input id="boton2" class="botoia" type="reset" value="Garbitu">
	
	</form>
	</div>
	</div>

  </body>
</html>

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
		VALUES('$_POST[eposta]','$_POST[galdera]','$_POST[erantzun1]','$_POST[erantzun2]','$_POST[erantzun3]','$_POST[erantzun4]','$_POST[zailtasuna]','$_POST[arloa]','0')";

		
if(!$niremysqli->query($sql)){
	die('Errorea: ' . $niremysqli->error);
	echo "Errorea gertatu da!";
	echo "<a href='../quizzes/addQuestion5.html'>Galdera berria egin.</a>";
}
echo "Erregistro bat gehitu da!";
echo "<p><a href='erakutsiGalderak.php'>Erregistroak ikusi</a>";


$niremysqli->close();
	
}
?>