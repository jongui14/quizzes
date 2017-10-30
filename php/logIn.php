<!DOCTYPE>
<html>
  <head>
        <meta charset="utf-8">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script>
		$(document).ready(function(){

		});
		</script>

    <title>Galdera Gehitu</title>
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleLab2.css' />

  </head>
  <body>		
	<a href="../layout.html"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;position: relative; top: 10px; left: 30px;"></a>

  	<div id="guztia">
	<h2>KONTURA SARTU - LOGIN</h2>
	<div id="signUp">
  	<form id="datuakSartu" name="datuakSartu" method="post" action="./logIn.php" enctype="multipart/form-data">
	<br><br>
	<font face="arial" align="left" >Erabiltzailearen eposta: </font><input type="email" name="eposta" id="eposta" placeholder="xxx001@ikasle.ehu.eus" pattern="[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.eu?s" required><br><br>

	<font face="arial">Pasahitza:  </font><input type="password" name="pasahitza" id="pasahitza" pattern=".{6,}" required><br><br>
	
	<input id="boton1" class="botoia" type="submit" value="Logeatu">
	<input id="boton2" class="botoia" type="reset" value="Garbitu">
	<br><br>
	</form>
	</div>
	</div>

  </body>
</html>

<?php
if(isset($_POST['eposta'])){
	include 'configEzarri.php';

	$erab = trim($_POST['eposta']);
	$pass = trim($_POST['pasahitza']);

	$ema=$niremysqli->query("select * from users where eposta='$erab'");
	
	$lortutakoa=$row=$ema->fetch_object();

	if($pass == $lortutakoa->pasahitza){
		echo "<script>alert('Aurrera!');</script>";
		header("refresh:0; ../layoutR.php?eposta=".$erab);
	}else{
		echo 'Oker';
	}
	


	$ema->close();
	$niremysqli->close();
}

?>