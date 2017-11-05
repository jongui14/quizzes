<html>
<head></head>
<body>
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
	?>" id="profilekoArgazkia" style="width: 40px;height: 40px;position: relative;">
	<br><?php echo($_GET["eposta"]); ?>
	</div>
</body>
</html>
<?php

include 'configEzarri.php';

//echo '<a href="../afterQuestion.php?eposta='.$_GET['eposta'].'"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;"></a>';
//echo '<a href="../layoutR.php?eposta='.$_GET['eposta'].'"> <img src="../img/home.png" id="home" style="width: 40px;height: 40px;"></a><br>';
echo '<a href="../layoutR.php?eposta='.$_GET['eposta'].'"> <img src="../img/atras.png" id="atzeraArgazkia" style="width: 40px;height: 40px;"></a><br>';

$ema=$niremysqli->query("select * from questions");

echo '<table border=1><tr><th>ID</th><th>EPOSTA</th><th>GALDERA</th>
<th>ZUZENA</th><th>OKERRA1</th><th>OKERRA2</th><th>OKERRA3</th><th>ZAILTASUNA</th><th>ARLOA</th><th>IRUDIA</th>  </tr>';

while($row=$ema->fetch_object() ){
	
	echo '<tr>'
	.'<td>'.$row->id.'</td>'
	.'<td>'.$row->eposta.'</td>'
	.'<td>'.$row->galdera.'</td>'
	.'<td>'.$row->zuzena.'</td>'
	.'<td>'.$row->okerra1.'</td>'
	.'<td>'.$row->okerra2.'</td>'
	.'<td>'.$row->okerra3.'</td>'
	.'<td>'.$row->zailtasuna.'</td>'
	.'<td>'.$row->arloa.'</td>';
	//echo '<td>'.$row->irudia.'</td>'.'</tr>';
	$hutsa=$row->irudia;
	if( $hutsa == '0'){
		echo '<td>'.'<img src="../img/hutsaGaldera.png" style="width:100px;height:100px;" />'.'</td>'
		.'</tr>';
	}else{
		echo '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode( $row->irudia ).'" style="width:100px;height:100px;" "/>'.'</td>'
		.'</tr>';
	}
}

echo '</table>';

echo "Gehitu galdera gehiago : ";
echo '<a href="../php/addQuestion.php?eposta='.$_GET['eposta'].'">Hemen.</a><br><br>';

$ema->close();
$niremysqli->close();


?>