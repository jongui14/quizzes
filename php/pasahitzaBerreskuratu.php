<html>
<head>
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
		
		<script type="text/javascript" language="JavaScript">//Nick-a konprobatu
			xhr4 = new XMLHttpRequest();
			
			xhr4.onreadystatechange = function(){
			if ((xhr4.readyState==4)&&(xhr4.status==200 )){
					document.getElementById("jasotakoa").innerHTML=xhr4.responseText;
					if(xhr4.responseText=='EZ'){
						document.getElementById("jasotakoa").innerHTML='Ez da existitzen eposta hori eta nick hori duen erabiltzailerik!<br><br><p>Berreskuratu nahi duzun kontuaren eposta</p><input type="text" name="eposta" id="eposta" ><br><br><p>Berreskuratu nahi duzun kontuaren nick-a</p><input type="text" name="nick" id="nick" ><br><br><input id="boton1" class="botoia" type="button" value="Konprobatu" onclick="nickaKonprobatu();">';
					}else{
						document.getElementById("jasotakoa").innerHTML='Jarri nahi duzun pasahitz berria.<br><br><div id="pasahitzarenKonprobaketaDiv"><font face="arial">Pasahitza:  </font><input type="password" name="pasahitza1" onchange="pasahitzaKonprobatu()" id="pasahitza1" pattern=".{6,}" required></div><br><font face="arial">Pasahitza errepikatu:  </font><input type="password" name="pasahitza2" id="pasahitza2" pattern=".{6,}" required><br><br><br><br><input id="boton1" class="botoia" type="button" value="Aldatu" onclick="pasahitzaAldatu();">';
					}
				}
			}
			
			function nickaKonprobatu(){
				epostarenBalio=document.getElementById("eposta").value;
				xhr4.open("GET","comprobarNick.php?eposta="+document.getElementById("eposta").value+"&nick="+document.getElementById("nick").value,true);
				xhr4.send();
			}

		</script>
		
		<script type="text/javascript" language="JavaScript">//Pass-a aldatu
			var epostarenBalio;
				
			xhr2 = new XMLHttpRequest();
			
			xhr2.onreadystatechange = function(){
				if ((xhr2.readyState==4)&&(xhr2.status==200 )){
						if(xhr2.responseText=='ONDO'){
							alert('Pahitza egoki aldatu da!');
							location.href="logIn.php";
						}else{
							alert('Errore bat gertatu da!');
							hasieratu();
						}
				}
			}
			
			function pasahitzaAldatu(){
				if(document.getElementById("pasahitza1").value==document.getElementById("pasahitza2").value){
					xhr2.open("GET","pasahitzaAldatu.php?eposta="+epostarenBalio+"&pasahitza="+document.getElementById("pasahitza1").value,true);
					xhr2.send();
				}else{
					alert('Pahitzak ez dira berdinak!');
				}

			}

		</script>
		
		<script type="text/javascript" language="JavaScript">//hasieratu
		function hasieratu(){
				document.getElementById("jasotakoa").innerHTML='<p>Berreskuratu nahi duzun kontuaren eposta</p><input type="text" name="eposta" id="eposta" ><br><br><p>Berreskuratu nahi duzun kontuaren nick-a</p><input type="text" name="nick" id="nick" ><br><br><input id="boton1" class="botoia" type="button" value="Konprobatu" onclick="nickaKonprobatu();">';
			}
		</script>



    <title>Pasahitza Berreskuratu</title>
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleLab2.css' />
	
</head>




<body onload="hasieratu();">


	<div id="guztia">
		<h2>PASAHITZA BERRESKURATU</h2>
		
		
		<div id="jasotakoa">

		
		</div>

	
	<br>
	
	
	</div>














</body>
</html>