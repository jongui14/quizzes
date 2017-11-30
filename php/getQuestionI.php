<!-- KONTURATU NAIZ DANA HTMLA DALA EZ DETELA PHP-N JARRI ALDAUKO DET-->
<html>
<head>
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" language="JavaScript">
		xhr1 = new XMLHttpRequest();
		
		var baliozkoa = false;
		
		xhr1.onreadystatechange = function(){
			if ((xhr1.readyState==4)&&(xhr1.status==200 )){ 
				document.getElementById("erantzunaDiv").innerHTML=xhr1.responseText;
			} 
		}
		
		function lortuGaldera(){
			xhr1.open("GET","getQuestion.php?indizea="+document.getElementById("indizea").value, true);
			xhr1.send();
		}
	</script>
	<title>Get Question</title>
	<link rel='stylesheet' type='text/css' href='../stylesPWS/styleLab2.css' />
</head>
<body>
<a href="layoutR.php"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;"></a><br><br>
<center>
<h2> Galdera bilaketa </h2>
Idatzi nahi bilatu nahi duzun galderaren indize zenbakia:<input type='text' id='indizea' placeHolder="Idatzi indizea">
<input type='button' id='botoia' class='botoia' onclick='lortuGaldera();' value="Bilatu"><br><br>

Erantzuna:<div id='erantzunaDiv'>
</div>
</center>
</body>
</html>