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
			
			$("input[type='submit']").on("click", function(e){
				if(typeof ($('#irudiaPantallan').attr('src')) != "undefined"){
					$('#datuakSartu').attr('action', '../php/signUpWithImage.php');
				}
				var pass1 = $('#pasahitza1');
				var pass2 = $('#pasahitza2');
			
				<!-- Konparaketa egiten saiatzeko hau egin det, ez dakit nola egin. -->
				if(egokia && baliozkoa){
					if(pass1.val()!=pass2.val()){
						alert("Pasahitzak ez dira berdinak!! Zuzendu");
						e.preventDefault(e);
					}				
				}else{
					alert("Errespetatu pantailako oharrak!");
					e.preventDefault(e);
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
		
		<script type="text/javascript" language="JavaScript">//Eposta konprobatu
		xhr = new XMLHttpRequest();
		
		var egokia=false;
		
		xhr.onreadystatechange = function(){
			if ((xhr.readyState==4)&&(xhr.status==200 )){
				var idatzi='<font face="arial" align="left" >Erabiltzailearen eposta: </font><input type="email" name="eposta" id="eposta" placeholder="xxx001@ikasle.ehu.eus" onchange="erabiltzaileaKonprobatu()" value="'+document.getElementById("eposta").value +'" pattern="[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.eu?s" required>';
				if(xhr.responseText=="EZ"){
					document.getElementById("epostarenKonprobaketarenDiv").innerHTML=idatzi+'<img src="../img/equisRojo.png" id="atzeraArgazkia" style="width: 10px;height: 10px;">'+"  Korreo hori ez da eogkia";
					egokia=false;
				}else{
					document.getElementById("epostarenKonprobaketarenDiv").innerHTML=idatzi+'<img src="../img/tickVerde.png" id="atzeraArgazkia" style="width: 10px;height: 10px;">';
					//document.getElementById("epostarenKonprobaketarenDiv").innerHTML= xhr.responseText;
					egokia=true;
				}
			} 
		}
		
		function erabiltzaileaKonprobatu(){
			xhr.open("GET","erabiltzaileaKonprobatu.php?eposta="+document.getElementById("eposta").value, true);
			xhr.send();
		}
		
		</script>
		
		<script type="text/javascript" language="JavaScript">//Pasahitza konprobatu
		xhr1 = new XMLHttpRequest();
		
		var baliozkoa = false;
		
		xhr1.onreadystatechange = function(){
			if ((xhr1.readyState==4)&&(xhr1.status==200 )){ 
				var idatzi='<font face="arial">Pasahitza:  </font><input type="password" name="pasahitza1" onchange="pasahitzaKonprobatu()" id="pasahitza1" pattern=".{6,}" value="'+document.getElementById("pasahitza1").value +'" required>';
				if(xhr1.responseText=="BALIOGABEA"){
					document.getElementById("pasahitzarenKonprobaketaDiv").innerHTML=idatzi+'<img src="../img/harridura.png" id="atzeraArgazkia" style="width: 10px;height: 10px;">'+"  Pasahitza ez da nahiko segurua";
					baliozkoa=false;
				}else{
					document.getElementById("pasahitzarenKonprobaketaDiv").innerHTML=idatzi;
					baliozkoa=true;
				}

			} 
		}
		
		function pasahitzaKonprobatu(){
			xhr1.open("GET","pasahitzaKonprobatu.php?pasahitza="+document.getElementById("pasahitza1").value, true);
			xhr1.send();
		}
		
		</script>

    <title>Galdera Gehitu</title>
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleLab2.css' />

  </head>
  <body>		
	<a href="../layout.html"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;position: relative; top: 10px; left: 30px;"></a>

  	<div id="guztia">
	<h2>ERABILTZAILEA GEHITU - HTML5</h2>
	<div id="signUp">
  	<form id="datuakSartu" name="datuakSartu" method="post" action="./signUp.php" enctype="multipart/form-data">
	<br><br>
	<div id="epostarenKonprobaketarenDiv">
	<font face="arial" align="left" >Erabiltzailearen eposta: </font><input type="email" name="eposta" id="eposta" placeholder="xxx001@ikasle.ehu.eus" onchange="erabiltzaileaKonprobatu()" pattern="[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.eu?s" required>
	</div>
	<!--<input type="button" value="konprobatu" onclick="erabiltzaileaKonprobatu()">-->
	<br>
	<!-- Azpikoa ez dakit oso ondo daon, mas o menos funtzionatzen do -->
	<font face="arial">Deiturak:  </font><input type="text" name="deitura" id="deitura" pattern="[A-Z]{1}[a-z]{0,}\s[A-Z]{1}[a-z]{0,}[a-zA-Z\s]{0,}" required><span id="galderaOker"></span><br><br>
	
	<font face="arial">Nick izena:  </font><input type="text" name="nick" id="nick" pattern="^[-a-zA-Z0-9@\.+_]+$" required><br><br>
	<!-- Ez dakit konparatzen bi pasahitzak -->
	<div id="pasahitzarenKonprobaketaDiv">
	<font face="arial">Pasahitza:  </font><input type="password" name="pasahitza1" onchange="pasahitzaKonprobatu()" id="pasahitza1" pattern=".{6,}" required>
	</div>
	<br>
	<font face="arial">Pasahitza errepikatu:  </font><input type="password" name="pasahitza2" id="pasahitza2" pattern=".{6,}" required><br><br>

	<font face="arial">Argazkia:</font><input id="igoIrudia" name="igoIrudia" type="file" accept="image/*"><span id="argazkiaOker"></span><br><br>
	
	<img id="irudiaPantallan"/><br>
	
	<input id="boton1" class="botoia" type="submit" value="Erregistratu">
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
	$eposta = trim($_POST['eposta']);
	$deitura= trim($_POST['deitura']);
	$nick= trim($_POST['nick']);
	$pasahitza= trim($_POST['pasahitza1']);

	$sql = "INSERT INTO users(eposta,deitura,nick,pasahitza,argazkia)
		VALUES('$_POST[eposta]','$_POST[deitura]','$_POST[nick]','$_POST[pasahitza1]','0')";

		
	if(!$niremysqli->query($sql)){
		die('Errorea: ' . $niremysqli->error);
		echo ("Errorea gertatu da!");
		echo ("<a href='./signUp.html'>Berriro saiatu.</a>");
	}
	
	echo "Erabiltzaile bat gehitu da!";
	echo "<p><a href='../layout.html'>Hasiera</a>";
	echo "<p><a href='../php/singUp.php'>Beste erabiltzaile bat gehitu</a>";

	$niremysqli->close();	
}
?>
