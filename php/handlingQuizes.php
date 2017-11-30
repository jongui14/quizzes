<?php 
session_start (); 

$mota = $_SESSION['erabiltzailea'];

if($mota!='ikaslea'){
	echo '<script language="javascript" type="text/javascript">alert("Erabiltzaile mota desegokia!"); location.href="./layoutR.php"</script>';
}

?>


<!DOCTYPE>
<html>
  <head>
  		<style type="text/css">
			p{
				margin: 10px;
				color:#243447;
				background-color:#8fa1ad;
			}
		</style>
        <meta charset="utf-8">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script>
		$(document).ready(function(){
			
			$("input[type='reset']").on("click", function(event){
				$('#irudiaPantallan').attr('src', "undefined");
				$('#formularioaZuzena').html("");
			});

		
			
			$.get('../xml/counter.xml', function(d){
				var kont = $(d).find('kopurua');
				$(kont).on('change', function(ev) {
					
					erabiltzaileKopuruaLortu();

				});
			});
			
		});
		</script>
		

		
		<script type="text/javascript" language="JavaScript">//Galderak erakutsi
		xhr = new XMLHttpRequest();
		
		
		xhr.onreadystatechange = function(){
			if ((xhr.readyState==4)&&(xhr.status==200 )){ 
				{ document.getElementById("erakutsiGureGalderak").innerHTML= xhr.responseText;}
				erakutsi=false;
			} 
		}
		
		function galderakErakutsi(){
			xhr.open("GET","showQuestionsAJAX.php?eposta=<?php echo($_SESSION['eposta']); ?>", true);
			xhr.send();
		}

				
		</script>
		
		<script type="text/javascript" language="JavaScript">//Galderak ezkutatu

		function galderakEzkutatu(){
				document.getElementById("erakutsiGureGalderak").innerHTML= '<center><p onclick="galderakErakutsi()">Nire galderak ikusi<p></center>;'
		}

				
		</script>
		
		<script type="text/javascript" language="JavaScript">//Galdera kopurua eguneratu
		
		xhr1 = new XMLHttpRequest();
		xhr1.onreadystatechange = function(){
		if ((xhr1.readyState==4)&&(xhr1.status==200 )){ 
				 document.getElementById("galderaKopurua").innerHTML= xhr1.responseText;
			}
		}
		
		
		
		function galderaKopuruaEguneratu(){
			galderaKopurua();
			setInterval(galderaKopurua,20000);
		}
		function galderaKopurua(){
			kopurua=true;
			xhr1.open("GET","galderaKopurua.php?eposta=<?php echo($_SESSION['eposta']); ?>", true);
			xhr1.send();
		}
		</script>
		
		<script type="text/javascript" language="JavaScript">//Erabiltzaile kopurua lortu
		
		xhr2 = new XMLHttpRequest();
		xhr2.onreadystatechange = function(){
			if ((xhr2.readyState==4)&&(xhr2.status==200 )){				
				var erantzuna=xhr2.responseXML;
				document.getElementById("erabiltzaileKopurua").innerHTML="<p>" + erantzuna.getElementsByTagName('kopurua')[0].childNodes[0].nodeValue + "</p>";	
			}
		}
		
		function erabiltzaileKopuruaLortuEguneatu(){
			erabiltzaileKopuruaLortu();
			setInterval(erabiltzaileKopuruaLortu,2000);
		}
		function erabiltzaileKopuruaLortu(){
			xhr2.open("GET","../xml/counter.xml", true);
			xhr2.send();
		}
		</script>
	


		<script type="text/javascript" language="JavaScript">//Galderak berri bat txertatu
		xhr5 = new XMLHttpRequest();
		
		
		xhr5.onreadystatechange = function(){
			if ((xhr5.readyState==4)&&(xhr5.status==200 )){ 
				document.getElementById("formularioaZuzena").innerHTML= xhr5.responseText;
			} 
		}
		
		function galderaBerriaGehitu(){
			var eposta= "<?php echo($_SESSION['eposta']) ?>";
			var galdera= document.getElementById("galdera").value;
			var zuzena= document.getElementById("erantzun1").value;
			var okerra1= document.getElementById("erantzun2").value;
			var okerra2= document.getElementById("erantzun3").value;
			var okerra3= document.getElementById("erantzun4").value;
			var zailtasuna= document.getElementById("zailtasuna").value;
			var arloa= document.getElementById("arloa").value;	
			xhr5.open("POST", "addQuestionAJAX.php" , true);
			xhr5.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhr5.send("eposta="+encodeURIComponent(eposta)+"&galdera="+encodeURIComponent(galdera)+"&erantzun1="+encodeURIComponent(zuzena)+"&erantzun2="+encodeURIComponent(okerra1)+"&erantzun3="+encodeURIComponent(okerra2)+"&erantzun4="+encodeURIComponent(okerra3)+"&zailtasuna="+encodeURIComponent(zailtasuna)+"&arloa="+encodeURIComponent(arloa));

		}

				
		</script>
		
		
		<script type="text/javascript" language="JavaScript">//Erabiltzailea kendu
			xhr4 = new XMLHttpRequest();
			
			xhr4.onreadystatechange = function(){
			if ((xhr4.readyState==4)&&(xhr4.status==200 )){		
					location.href="./layoutR.php";
				}
			}
			
			function erabiltzaileaKendu(){
				xhr4.open("GET","erabiltzaileaKendu.php",true);
				xhr4.send();
			}

		</script>
		
    <title>Galdera Gehitu</title>
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleLab2.css' />

  </head>
  <body onload="erabiltzaileKopuruaLortuEguneatu();galderaKopuruaEguneratu();">		
	
<a href='layoutR.php'><img src="../img/home.png" id="atzeraArgazkia" style="width: 40px;height: 40px;position: relative; top: 10px; left: 30px;" ></a>
  
	<div align="right">
	<img src="
	<?php
	include 'configEzarri.php';
	$erab=$_SESSION['eposta'];
	$ema=$niremysqli->query("select * from users where eposta='$erab'");
	$row=$ema->fetch_object();
	$hutsa=$row->argazkia;
	if( $hutsa == '0'){
		echo '../img/hutsaGaldera.png';
	}else{
		echo 'data:image/jpeg;base64,'.base64_encode( $row->argazkia );
	}
	?>" id="profilekoArgazkia" style="width: 40px;height: 40px;position: relative; top: -15px;">
	<br><?php echo($_SESSION['eposta']); ?><br>
		<input id="boton1" class="botoia" type="button" onclick="erabiltzaileaKendu();" value="LogOut">
	</div>
	
<table>
<tr>
<td>
<center>
	<div id="guztia">
	<h4>EDITATZEN ARI DIREN ERABILTZAILE KOPURUA</h4>
	<div id="erabiltzaileKopurua">
	</div>
	</div>
</center>
</td>
<td>
<center>
	<div id="guztia">
	<h4>GALDERA KOPURUA</h4>
	<div id="galderaKopurua">
	</div>
	</div>
</center>
</td>
</tr>
<tr>
<td>
  	<div id="guztia">
	<h4>GALDERA GEHITU</h4>
	<div id="galdetegia">
  	<form id="galderaSartu" method="post" enctype="multipart/form-data">
	
	<input type="email" name="eposta" id="eposta" placeholder="xxx001@ikasle.ehu.eus" value="<?php echo($_SESSION['eposta']); ?>" pattern="[a-zA-Z]+[0-9]{3}@ikasle.ehu.eu?s"  hidden>
	
	<font face="arial">Galdera:  </font><input type="text" name="galdera" id="galdera" pattern=".{10,}" ><span id="galderaOker"></span><br><br>
	
	<font face="arial">Erantzun zuzena:  </font><input type="text" name="erantzun1" id="erantzun1" ><br><br>
	<font face="arial">Erantzun okerra:  </font><input type="text" name="erantzun2" id="erantzun2" ><br><br>
	<font face="arial">Erantzun okerra:  </font><input type="text" name="erantzun3" id="erantzun3" ><br><br>
	<font face="arial">Erantzun okerra:  </font><input type="text" name="erantzun4" id="erantzun4" ><br><br>

	<font face="arial">Galderaren zailtasuna (1-5): </font><input type="number" name="zailtasuna" id="zailtasuna" min="1" max="5" ><br><br>
	<font face="arial">Galderaren gai-arloa: </font><input type="text" name="arloa" id="arloa" ><br><br>
	
	
	<input id="boton1" class="botoia" type="button" value="Galdera bidali" onclick="galderaBerriaGehitu();">
	<input id="boton2" class="botoia" type="reset" value="Garbitu">
	
	</form>
	</div>
	</div>
	<div id="formularioaZuzena">
	</div>
</td>
<td>
	<div id="guztia">	
	<h4 >TXERTATUTAKO GALDERAK</h4>
	<div id="erakutsiGureGalderak" >
	<center><p onclick="galderakErakutsi()">Nire galderak ikusi<p></center>
	</div>	
	</div>
</td>
</tr>
</table>	

  </body>
</html>

