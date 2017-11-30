<?php
session_start ();
?>
<!DOCTYPE>
<html>
  <head>
	<meta charset="utf-8">
    <title>Galdera Gehitu</title>
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleLab2.css' />

  </head>
  <body>		
	<a href="./layoutR.php"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;position: relative; top: 10px; left: 30px;"></a>

  	<div id="guztia">
	<h2>KONTURA SARTU - LOGIN</h2>
	<div id="signUp">
  	<form id="datuakSartu" name="datuakSartu" method="post" action="./logIn.php" enctype="multipart/form-data">
	<br><br>
	<font face="arial" align="left" >Erabiltzailearen eposta: </font><input type="email" name="eposta" id="eposta" placeholder="xxx001@ikasle.ehu.eus"  required><br><br>

	<font face="arial">Pasahitza:  </font><input type="password" name="pasahitza" id="pasahitza" pattern=".{6,}" required><br><br>
	
	<input id="boton1" class="botoia" type="submit" value="Logeatu">
	<input id="boton2" class="botoia" type="reset" value="Garbitu">
	<br>
	<a href="./pasahitzaBerreskuratu.php">Pasahitza berreskuratu!</a><br><br>
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

	if($lortutakoa==null){
		echo 'Oker';
	}else{
		$kodea='websistemak';
		
		if( crypt($pass, $kodea) == $lortutakoa->pasahitza){
			$_SESSION['erroreak']='0';
			
			
			$_SESSION['eposta']  = $erab;
			
			if($erab=='web000@ehu.es'){
				$_SESSION['erabiltzailea']  = 'irakaslea';
				echo '<script language="javascript" type="text/javascript">alert("Aurrera!"); location.href="reviewingQuizes.php"</script>';
			}else{
				$_SESSION['erabiltzailea']  = 'ikaslea';
				
				include ("erabiltzaileaGehitu.php");
				
				echo '<script language="javascript" type="text/javascript">alert("Aurrera!"); location.href="handlingQuizes.php"</script>';
			}
						
		}else{
			if(isset($_SESSION['erroreak'])){
				if($_SESSION['erroreak']=='3'){
					echo 'Oker'.'<br>';
					echo 'Saiakera kopurua gainditu duzu eta zure kontua blokeatu da momentuz!'.'<br>';
					echo 'Saiakera kopurua: 0';
				}else if($_SESSION['erroreak']=='2'){
					echo 'Oker'.'<br>';
					echo 'KONTUZ! Aukera bakarra duzu zure asmatzea blokeatua izan aurretik!'.'<br>';
					echo 'Saiakera kopurua: 1';
					$_SESSION['erroreak']='3';
				}else if($_SESSION['erroreak']=='1'){
					echo 'Oker, Saiatu berriz'.'<br>';
					$_SESSION['erroreak']='2';
					echo 'Saiakera kopurua: 2'.'<br>';
				}else if($_SESSION['erroreak']=='0'){
					echo 'Oker, Saiatu berriz'.'<br>';
					$_SESSION['erroreak']='1';
					echo 'Saiakera kopurua: 3'.'<br>';
				}
			}else{
				echo 'Oker, Saiatu berriz'.'<br>';
				$_SESSION['erroreak']='1';
				echo 'Saiakera kopurua: 3';
			}
		}
	}

	


	$ema->close();
	$niremysqli->close();
}

?>
