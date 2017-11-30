<html>
<head>
<title>Galderak ikusi</title>
<link rel='stylesheet' type='text/css' href='../stylesPWS/styleLab2.css' />
<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" language="JavaScript">
		xhr1 = new XMLHttpRequest();
		
		var baliozkoa = false;
		
		xhr1.onreadystatechange = function(){
			if ((xhr1.readyState==4)&&(xhr1.status==200 )){ 
				document.getElementById("taula").innerHTML=xhr1.responseText;
			} 
		}
		
		function aldatuGaldera(){
			xhr1.open("GET","galderaAldatu.php?indizea="+document.getElementById("indizea").value
			+"&galdera="+document.getElementById("galdera").value
			+"&zuzena="+document.getElementById("zuzena").value
			+"&okerra1="+document.getElementById("okerra1").value
			+"&okerra2="+document.getElementById("okerra2").value
			+"&okerra3="+document.getElementById("okerra3").value
			+"&zailtasuna="+document.getElementById("zailtasuna").value
			+"&arloa="+document.getElementById("arloa").value, true);
			xhr1.send();
		}
	</script>
	
	<script type="text/javascript" language="JavaScript">
		xhr1 = new XMLHttpRequest();
		
		var baliozkoa = false;
		
		xhr1.onreadystatechange = function(){
			if ((xhr1.readyState==4)&&(xhr1.status==200 )){ 
				document.getElementById("taula").innerHTML=xhr1.responseText;
			} 
		}
		
		function hasieratuTaula(){
			xhr1.open("GET","galderenTaulaHasieratu.php", true);
			xhr1.send();
		}
	</script>
	
	
	<script type="text/javascript" language="JavaScript">//Galderak aldatu
		xhrGaldera = new XMLHttpRequest();
		
		var eposta="eposta";
		var galdera="galdera";
		var zuzena="zuzena";
		var okerra1="okerra1";
		var okerra2="okerra2";
		var okerra3="okerra3";
		var zailtasuna="zailtasuna";
		var arloa="arloa";

				
		xhrGaldera.onreadystatechange = function(){
			if ((xhrGaldera.readyState==4)&&(xhrGaldera.status==200 )){ 
				document.getElementById("erantzunaDiv").innerHTML=xhrGaldera.responseText;
			} 
		}
		
		function galderaAldatu(id,eremua,balioberria){
			xhrGaldera.open("GET","galderaAldatu.php?indizea="+id+"&"+eremua+"="+balioberria, true);
			xhrGaldera.send();
		}
	</script>
	
	
	
</head>
<body>
<div align="right">
	<img src="
	<?php

	include 'configEzarri.php';
	session_start();
	$erab=$_SESSION['eposta'];
	$ema=$niremysqli->query("select * from users where eposta='$erab'");
	$row=$ema->fetch_object();
	$hutsa=$row->argazkia;
	if( $hutsa == '0'){
		echo '../img/hutsaGaldera.png';
	}else{
		echo 'data:image/jpeg;base64,'.base64_encode( $row->argazkia );
	}
	?>" id="profilekoArgazkia" style="width: 40px;height: 40px;position: relative;">
	<br><?php echo($_SESSION['eposta']);  ?>
	</div> 
	<?php echo '<a href="layoutR.php?"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;"></a><br>'; ?>

	<div id="taula">
	<?php


include 'configEzarri.php';

$ema=$niremysqli->query("select * from questions");

echo '<table border=1><tr><th>ID</th><th>EPOSTA</th><th>GALDERA</th>
<th>ZUZENA</th><th>OKERRA1</th><th>OKERRA2</th><th>OKERRA3</th><th>ZAILTASUNA</th><th>ARLOA</th> </tr>';

$eposta="eposta";
$galdera="galdera";
$zuzena="zuzena";
$okerra1="okerra1";
$okerra2="okerra2";
$okerra3="okerra3";
$zailtasuna="zailtasuna";
$arloa="arloa";


while($row=$ema->fetch_object() ){
	echo '<tr>'
	.'<td>'.$row->id.'</td>'
	.'<td>'.$row->eposta.'</td>'
	.'<td><input type="text" value="'.$row->galdera.'"  onchange="galderaAldatu('.$row->id.','.$galdera.',this.value);"></td>'
	.'<td><input type="text" value="'.$row->zuzena.'"  onchange="galderaAldatu('.$row->id.','.$zuzena.',this.value);"></td>'
	.'<td><input type="text" value="'.$row->okerra1.'"  onchange="galderaAldatu('.$row->id.','.$okerra1.',this.value);"></td>'
	.'<td><input type="text" value="'.$row->okerra2.'"  onchange="galderaAldatu('.$row->id.','.$okerra2.',this.value);"></td>'
	.'<td><input type="text" value="'.$row->okerra3.'"  onchange="galderaAldatu('.$row->id.','.$okerra3.',this.value);"></td>'
	.'<td><input type="text" value="'.$row->zailtasuna.'"  onchange="galderaAldatu('.$row->id.','.$zailtasuna.',this.value);"></td>'
	.'<td><input type="text" value="'.$row->arloa.'"  onchange="galderaAldatu('.$row->id.','.$arloa.',this.value);"></td>'
	
	.'</tr>';
	}

echo '</table>';

$ema->close();
$niremysqli->close();


?>
	</div>
	

 <div id="erantzunaDiv">
 </div>

</body>
</html>